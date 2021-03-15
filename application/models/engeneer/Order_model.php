<?php
	class Order_model extends CI_Model{
            public function get_order_files($id, $typeID = null) {
                $typeWhere = "";
                if ($typeID) {
                    $typeWhere = " AND order_file_type_id = $typeID";
                }
                
                $sql = "SELECT * 
                        FROM ci_order_item_files oif
                        WHERE oif.order_item_id = $id $typeWhere";
                
                $query = $this->db->query($sql);
                
                return $query->result_array();                
            }
            
            public function get_order($id) {
                $companyID = $this->session->userdata("company_id");
                
                $sql = "SELECT oi.id, 
                               of.id as offer_id,
                               oi.name as name,
                               os.name as status, 
                               os.sort_order as status_order, 
                               os.id as status_id,
                               oi.quantity, 
                               oi.created_at, 
                               of.company_id, 
                               of.request_date,
                               of.response_date,
                               of.lead_time,
                               of.comment,
                               commited_by_user, 
                               answered_by_company,
                               of.cost,
                               oi.size_x,
                               oi.size_y,
                               oi.size_z,
                               oi.description,
                               oi.payed_at,
                               oi.started_at,
                               oi.order_id as order_id,
                               o.user_id as user_id
                        FROM ci_order_items oi
                        LEFT JOIN ci_order_statuses os ON oi.status_id     = os.id
                        INNER JOIN ci_offers        of ON of.order_item_id = oi.id AND of.company_id = $companyID
                        INNER JOIN ci_orders        o  ON oi.order_id      = o.id
                        WHERE oi.id = $id AND status_id in (2,3,12) AND commited_by_user = 1
                       ";
                
                $query = $this->db->query($sql);

                return $query->row_array();             
            }
            
            public function get_all_orders(){
                $userID    = $this->session->userdata("user_id");
                $companyID = $this->session->userdata("company_id");

                $sql = "SELECT oi.id, 
                               oi.name as name,
                               os.name as status,
                               of.cost,
                               oi.payed_at,
                               os.sort_order as status_order, 
                               os.id as status_id,
                               quantity, oi.created_at, 
                               of.company_id, 
                               of.lead_time,
                               commited_by_user, 
                               of.request_date,
                               of.response_date,
                               oi.started_at,
                               answered_by_company
                        FROM ci_order_items oi
                        LEFT JOIN ci_order_statuses os ON oi.status_id     = os.id
                        INNER JOIN ci_offers         of ON of.order_item_id = oi.id AND of.company_id = $companyID
                        WHERE oi.order_type_id = 2 AND status_id in (2,3,12) AND commited_by_user = 1
                       ";
                
                $query = $this->db->query($sql);

                return $query->result_array();    
            }
            
            public function change_status ($id, $statusID) {
        
                $this->db->where('id', $id);
                $this->db->update('ci_order_items', 
                        array(
                            'status_id' => $statusID
                        )
                );        
                
            }
            
            public function complete_order($id) {
                $this->change_status ($id, 3);
            }
	}

?>