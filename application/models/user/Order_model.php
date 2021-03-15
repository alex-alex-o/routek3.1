<?php
	class Order_model extends CI_Model{
           
            public function get_all_orders($actual = 0, $typeID = 2, $payed = false){
                $userID    = $this->session->userdata("user_id");

                $where = "1 = 1";
                if ($actual == "1") {
                    $where = "oi.created_at >= (NOW() - INTERVAL 3 MONTH)";
                } elseif ($actual == "2") {
                    $where = "oi.created_at < (NOW() - INTERVAL 3 MONTH)";
                }
                
                $payedWhere = "(oi.status_id = 1)";
                if ($payed) {
                    $payedWhere  = "oi.status_id <> 1";
                }
                $sql = "SELECT oi.id, 
                               oi.name as name,
                               os.name as status,
                               oi.payed_at,
                               os.sort_order as status_order, 
                               os.id as status_id,
                               oi.created_at, 
                               ofr.lead_time,
                               m.name as technology,
                               m.short_name as technology_short,
                               shipped_at,
                               ofr.cost as cost,
                               ofr.shipping_cost as shipping_cost,
                               ofr.finish_cost   as finish_cost,
                               ofr.lead_time,
                               snapshot, 
                               filling,
                               oi.quantity, 
                               oi.created_at, 
                               ma.name as material, 
                               c.name as color, 
                               size_x, 
                               size_y, 
                               size_z, 
                               snapshot, 
                               filling, 
                               q.value as quality,
                               o.public_id
                        FROM ci_order_items oi
                        LEFT JOIN  ci_order_statuses os ON oi.status_id     = os.id
                        LEFT JOIN  ci_offers         ofr ON ofr.order_item_id = oi.id AND is_selected = 1
                        LEFT JOIN ci_machines       m  ON m.id = oi.technology_id
                        LEFT JOIN  ci_materials      ma ON ma.id = oi.material_id
                        LEFT JOIN  ci_colors         c  ON c.id = oi.color_id
                        LEFT JOIN  ci_qualities      q  ON q.id = oi.quality_id
                        INNER JOIN ci_orders         o  ON o.id = oi.order_id AND user_id = $userID
                        WHERE $where AND oi.order_type_id = $typeID AND $payedWhere
                        ORDER BY oi.created_at DESC
                       ";

                       // WHERE EXISTS (SELECT id FROM ci_orders o WHERE o.id = oi.order_id AND user_id = $userID) AND $where AND oi.order_type_id = $typeID
                $query = $this->db->query($sql);

                return $query->result_array();    
            }
            
            public function get_order_files($id) {
                $sql = "SELECT * 
                        FROM ci_order_item_files oif
                        WHERE oif.order_item_id = $id";
                
                $query = $this->db->query($sql);

                return $query->result_array();                
            }

            // TODO: Совпадает с Home/get_order -> Сделать единой            
            public function get_order($publicID) {
                $userID = $this->session->userdata("user_id");
                
                $sql = "SELECT oi.*, 
                               ofr.lead_time, 
                               c.name as company, 
                               c.city, 
                               s.name as status, 
                               t.name as technology, 
                               t.short_name as technology_short,
                               m.name as material, 
                               cl.name as color, 
                               q.value as quality,
                               o.public_id
                        FROM ci_order_items oi 
                        INNER JOIN ci_offers    ofr      ON oi.id = ofr.order_item_id AND is_selected = 1
                        LEFT  JOIN ci_companies c       ON c.id  = ofr.company_id
                        LEFT  JOIN ci_order_statuses s  ON s.id  = oi.status_id
                        LEFT  JOIN ci_machines       t  ON t.id  = oi.technology_id
                        LEFT  JOIN ci_materials      m  ON m.id  = oi.material_id
                        LEFT  JOIN ci_colors         cl ON cl.id = oi.color_id
                        LEFT  JOIN ci_qualities      q  ON q.id  = oi.quality_id
                        INNER JOIN ci_orders         o  ON o.id  = oi.order_id AND user_id = $userID
                        WHERE o.public_id = '$publicID'";

                $query = $this->db->query($sql);

                return $query->row_array();                
            }            
            

            public function change_status ($id, $statusID = null) {
                
                if (empty($statusID)) {
                     $statusID = $this->input->post('status_id');
                }
                
                $this->db->where('id', $id);
                $this->db->update('ci_order_items', 
                        array(
                            'status_id' => $statusID
                        )
                );        
                
            }
            
            public function save_as_payed($publicID) {
                $this->db->where("public_id", $publicID);
                $order = $this->db->get('ci_orders')->row_array();

                $this->db->where("order_id", $order["id"]);
                $orderItem = $this->db->get('ci_order_items')->row_array();
                
                $this->db->where('id', $orderItem["id"]);
                $this->db->update('ci_order_items', 
                        array(
                            'status_id' => $orderItem["order_type_id"] == 1 ? 2 : 6,
                            'payed_at'  => date('Y-m-d H:i:s')
                        )
                );                  
            }


	}

?>