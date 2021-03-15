<?php
	class Offer_model extends CI_Model{
            
            public function get_offer($id) {
                $sql = "SELECT * FROM ci_offers WHERE id = $id";
                $query = $this->db->query($sql);
                return $query->row_array();
            }
            
            public function company_refuse($id) {
                if (empty($id)) {
                    return null;
                }
                
                $this->db->where('id', $id);
                $this->db->update('ci_offers', 
                        array(
                            'response_date'  => date('Y-m-d H:i:s'),
                            'refused_by_company' => 1
                        )
                );
                
                return true;                
            }
            
            public function send_to_companies($orderItemID, $selectedCompanies = null){
                if (empty($orderItemID)) {
                    return null;
                }

                $sql       = "SELECT * FROM ci_companies";
                $query     = $this->db->query($sql);
                $companies = $query->result_array();
                
                $results = array();
                foreach($companies as $company) {
                    if (!(isset($selectedCompanies) && isset($selectedCompanies[$company["id"]]))) {
                        continue;
                    } 
                    
                    $this->db->insert('ci_offers', 
                        array(
                            "company_id"    => $company["id"],
                            "order_item_id" => $orderItemID,
                            "created_at"    => date('Y-m-d H:i:s'),
                            "modified_at"   => date('Y-m-d H:i:s'),
                            'request_date'  => date('Y-m-d H:i:s'),
                        )
                    );
                    $offerID = $this->db->insert_id();

                    $sql = "SELECT u.* 
                            FROM ci_users u 
                            INNER JOIN ci_users_companies uc 
                            ON u.id = uc.user_id AND uc.company_id = " . $company["id"];
                    
                    $query = $this->db->query($sql);
                    
                    $users = $query->result_array();
                    
                    foreach($users as $user) {
                        $results[] = array(
                            "[user_name]"  => $user["name"], 
                            "[user_email]" => $user["email"],
                            "[order_id]"   => $orderItemID,
                            "[offer_id]"   => $offerID,
                            "[order_url]"  => base_url() . "/company/orders/view/" . $orderItemID,
                            "[offer_url]"  => base_url() . "/company/offers"
                        );
                    }
                }
                
                $this->db->where('id', $orderItemID);
                $this->db->update('ci_order_items', array('status_id' => 4));
                
                return $results;
            }
            
            public function send_to_company($id, $orderItemID){
                if (empty($id)) {
                    return null;
                }
                
                $this->db->where('id', $id);
                $this->db->update('ci_offers', 
                        array(
                            'commited_by_user' => 1
                        )
                );
                
                $this->db->where('id', $orderItemID);
                $this->db->update('ci_order_items', array('status_id' => 5));
                
                return true;
            }            
            
            public function send_to_user($id){
                if (empty($id)) {
                    return null;
                }
                
                $this->db->where('id', $id);
                $this->db->update('ci_offers', 
                        array(
                            'cost'                => $this->input->post('cost'),
                            'lead_time'           => $this->input->post('lead_time'),
                            'comment'             => $this->input->post('comment'),
                            'response_date'       => date('Y-m-d : h:m:s'),
                            'answered_by_company' => 1
                        )
                );
                
                return true;
            }

            public function get_sent_user_offers($userID, $statusID = null){
                if (empty($userID)) {
                    return null;
                }
                
                $where = "";
                if ($statusID != 3) {
                    $where = "NOT EXISTS(SELECT id FROM ci_offers WHERE a.id = order_item_id AND commited_by_user = 1)";
                }
                
                $sql = "SELECT * FROM 
                (
                SELECT of.order_item_id as id, 
                       of.order_item_id as name, 
                       oi.created_at, 
                       count(*) as count
                FROM ci_offers of
                INNER JOIN ci_order_items oi ON of.order_item_id = oi.id
                INNER JOIN ci_orders o       ON oi.order_id = o.id
                WHERE user_id = $userID 
                GROUP BY of.order_item_id, oi.created_at    
                ORDER BY of.order_item_id ASC
                ) a";


                return $this->datatable->LoadJson($sql, $where);
            }
            
            public function get_user_offers($userID, $statusID = null){
                if (empty($userID)) {
                    return null;
                }
                $where = "";
                if ($statusID == 1) {
                    $where = " AND answered_by_company = 1 AND commited_by_user = 0";
                } 
                if ($statusID == 2) {
                    $where = " AND commited_by_user    = 1";
                }
                
                $sql = "SELECT of.id, CONCAT('Заказ ', oi.id) as name, of.created_at, answered_by_company, commited_by_user, lead_time
                        FROM ci_offers of
                        INNER JOIN ci_order_items oi ON of.order_item_id = oi.id
                        INNER JOIN ci_orders o       ON oi.order_id = o.id
                        ";

                return $this->datatable->LoadJson($sql, "user_id = $userID  $where", "");
            }
            
            public function get_company_offers($companyID){
                if (empty($companyID)) {
                    return null;
                }

                $sql = "SELECT id, CONCAT('Предложение ', id) as name, created_at, answered_by_company, commited_by_user, lead_time
                        FROM ci_offers";

                //return $this->datatable->LoadJson($sql, "company_id = $companyID AND refused_by_company = 0 AND request_date >= NOW() - INTERVAL 3 DAY ");
                return null;
            }            
	}

?>