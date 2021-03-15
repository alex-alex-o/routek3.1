<?php
	class Offer_model extends CI_Model{
            
            public function get_offer($id) {
                $sql = "SELECT oi.id, 
                               of.id as offer_id,
                               oi.name as name,
                               os.name as status, 
                               os.sort_order as status_order, 
                               os.id as status_id,
                               quantity, oi.created_at, 
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
                               oi.description
                        FROM ci_order_items oi
                        LEFT JOIN ci_order_statuses os ON oi.status_id     = os.id
                        INNER JOIN ci_offers         of ON of.order_item_id = oi.id
                        WHERE of.id = $id
                       ";
                
                $query = $this->db->query($sql);

                return $query->row_array();     
            }
            
            public function get_all_offers() {
                $userID    = $this->session->userdata("user_id");
                $companyID = $this->session->userdata("company_id");

                $sql = "SELECT oi.id, 
                               oi.name as name,
                               of.id as offer_id,
                               os.name as status, 
                               os.sort_order as status_order, 
                               os.id as status_id,
                               quantity, oi.created_at, 
                               of.company_id, 
                               of.request_date,
                               of.response_date,
                               commited_by_user, 
                               answered_by_company,
                               of.cost
                               
                        FROM ci_order_items oi
                        LEFT JOIN ci_order_statuses os ON oi.status_id     = os.id
                        INNER JOIN ci_offers         of ON of.order_item_id = oi.id AND of.company_id = $companyID
                        WHERE oi.order_type_id = 2 AND status_id in (8, 9, 10)
                       ";
                
                $query = $this->db->query($sql);

                return $query->result_array();                    
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
                            'response_date'       => date('Y-m-d H:i:s'),
                            'answered_by_company' => 1
                        )
                );
                
                return true;
            }            

	}

?>