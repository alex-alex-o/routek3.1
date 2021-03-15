<?php
	class Order_model extends CI_Model{
            public function approve($id) {
                $this->db->where('id', $id);
                $this->db->update('ci_order_items', array('pre_moderation' => 0));
                
            }
            
            public function get_order_files($id) {
                $sql = "SELECT * 
                        FROM ci_order_item_files oif
                        WHERE oif.order_item_id = $id";
                
                $query = $this->db->query($sql);

                return $query->result_array();                
            }
            
            public function get_order($id) {
                $userID = $this->session->userdata("user_id");
                
                $sql = "SELECT oi.*, o.user_id, o.shipping_info_id
                        FROM ci_orders o
                        INNER JOIN ci_order_items oi ON o.id = oi.order_id
                        WHERE oi.id = $id";

                $query = $this->db->query($sql);

                return $query->row_array();                
            }
            
            public function get_orders() {
                $sql = "SELECT oi.id, 
                               oi.name as name, 
                               oi.created_at, 
                               oi.quantity, 
                               m.name as technology, 
                               mt.name as material, 
                               c.name as color,
                               '' as snapshot, 
                               u.name as user_name, 
                               u.email, 
                               oi.description 
                        FROM ci_order_items oi 
                        LEFT JOIN ci_orders           o  ON oi.order_id      = o.id
                        LEFT JOIN ci_users            u  ON o.user_id        = u.id
                        LEFT JOIN ci_machines         m  ON oi.technology_id = m.id
                        LEFT JOIN ci_materials        mt ON oi.material_id   = mt.id
                        LEFT JOIN ci_colors           c  ON oi.color_id      = c.id
                        LEFT JOIN ci_order_item_files md ON oi.id            = md.order_item_id
                        ORDER BY created_at DESC
                        LIMIT 0, 50
                        ";

                // return $this->datatable->LoadJson($sql, "pre_moderation = 1");
                $query = $this->db->query($sql);

                return $query->result_array();              
            }
            
            public function get_order_offers($orderItemID){
                $sql = "SELECT ofr.id as id, 
                               ofr.cost,
                               ofr.shipping_cost,
                               ofr.finish_cost,
                               ofr.lead_time,
                               c.name as company_name,
                               c.id as company_id,
                               is_selected
                        FROM ci_offers ofr 
                        INNER JOIN ci_order_items oi ON oi.id = ofr.order_item_id
                        INNER JOIN ci_orders o       ON o.id  = oi.order_id
                        LEFT  JOIN ci_companies c    ON c.id  = ofr.company_id
                        WHERE oi.id = $orderItemID
                       ";

                $query = $this->db->query($sql);

                return $query->result_array();              
            }
	
            public function create_empty_offers($orderItemID) {
                for($i = 0; $i < 5; $i ++) {
                    $data = array(
                        "order_item_id" => $orderItemID,
                        //"company_id"    => 0,
                        "cost"          => 0,
                        "shipping_cost" => 0,
                        "finish_cost"   => 0,
                        "lead_time"     => 0,
                        "comment"       => 0,
                        "created_at"    => date("Y-m-d H:i:s"),
                        "modified_at"   => date("Y-m-d H:i:s")
                    );
                    $this->db->insert("ci_offers", $data);
                }
            }
            
            public function get_all_offers(){
                $userID    = $this->session->userdata("user_id");

                $sql = "SELECT oi.id, 
                               oi.name as name,
                               os.name as status,
                               ofr.cost as offer_cost,
                               oi.cost as cost,
                               oi.payed_at,
                               os.sort_order as status_order, 
                               os.id as status_id,
                               oi.quantity,
                               oi.created_at, 
                               ofr.company_id, 
                               ofr.lead_time,
                               commited_by_user, 
                               ofr.request_date,
                               ofr.response_date,
                               oi.started_at,
                               answered_by_company,
                               m.short_name as technology,
                               shipped_at,
                               lead_time,
                               snapshot, 
                               filling,
                               u.name  as customer_name,
                               u.email as customer_email,
                               c.name as company_name,
                               c.id as company_id
                        FROM ci_order_items oi
                        INNER JOIN ci_orders o ON o.id = oi.order_id
                        LEFT JOIN ci_users u ON o.user_id = u.id
                        LEFT JOIN ci_order_statuses os ON oi.status_id     = os.id
                        INNER JOIN ci_offers         ofr ON ofr.order_item_id = oi.id AND commited_by_user = 1
                        LEFT JOIN ci_companies c ON c.id = ofr.company_id
                        INNER JOIN ci_machines m ON m.id = oi.technology_id
                        WHERE EXISTS (SELECT id FROM ci_orders o WHERE o.id = oi.order_id)
                       ";
                
                $query = $this->db->query($sql);

                return $query->result_array();    
            }

            public function get_cost($materialID, $volume) {
                
                //UPDATE ci_materials b
                //INNER JOIN 
                //    (
                //    SELECT name, min(cost) as Price
                //    FROM `ci_material_properties` 
                //    WHERE cost > 0
                //    GROUP BY name
                //) a  ON a.name = b.name
                //INNER JOIN ci_material_properties c ON a.Price = c.cost AND a.name = c.name
                //SET b.material_property_id = c.id
                //WHERE active = 1        
                
                $sql = "SELECT mp.cost as cost
                        FROM ci_materials m
                        INNER JOIN ci_material_properties mp ON mp.id = m.material_property_id
                        WHERE m.id = $materialID";
                $query  = $this->db->query($sql);
                $result = $query->row_array();    

                if (!isset($result["cost"])) {
                    return 0;
                }
                
                try  {
                    $xml = file_get_contents("http://www.cbr.ru/scripts/XML_daily.asp?date_req=" . date("d/m/Y"));
                    $doc = new DOMDocument;
                    $doc->loadXML($xml);

                    $xpath = new DOMXPath($doc);
                    $query = "//ValCurs/Valute[@ID='R01235']/Value";
                    $rate  = floatval(str_replace(',', '.', str_replace('.', '', $xpath->query($query)[0]->nodeValue)));
                            
                } catch (Exception $ex) {
                    return 0;
                }

                return round($rate * $result["cost"] * 1.3 * $volume, 2);
            }
            
            public function save_offer() {
                $data = array(
                    $this->input->post('name') => $this->input->post('value')
                );

                $this->db->where("id", $this->input->post('id'));
                $this->db->update("ci_offers", $data);

                return $this->input->post('id');
            }
            
            public function select_offer() {
                $data = array(
                    "is_selected" => true
                );

                $this->db->where("id", $this->input->post('id'));
                $this->db->update("ci_offers", $data);

                $this->db->where("id", $this->input->post('id'));
                $offer = $this->db->get('ci_offers')->row_array();
                
                $data = array(
                    "cost" => $offer["cost"] + $offer["shipping_cost"] + $offer["finish_cost"]
                );
                
                $this->db->where("id", $offer["order_item_id"]);
                $this->db->update("ci_order_items", $data);

                
                return $this->input->post('id');
                
            }
        }

?>