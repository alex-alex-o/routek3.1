<?php
	class Shipping_model extends CI_Model{
            
            public function get_by_id($id) {
                if (!$id) {
                    return null;  
                }
                
                $sql = "SELECT * 
                        FROM ci_shipping_info 
                        WHERE id = $id";

                $query = $this->db->query($sql);

                
                // TODO: Сделать множественный адрес
                // return $query->result_array();
                $result = $query->row_array();

                return $result;  
            }    

            public function get_by_user($userID) {
                $sql = "SELECT * 
                        FROM ci_shipping_info 
                        WHERE user_id = $userID";
                
                $query = $this->db->query($sql);

                return $query->result_array();
            }               
            
            // Добавление адреса заказа
            public function add($userID = null) {
                if (!$userID) {
                    $userID = 0;
                }

                $data = array(
                    "zip"         => $this->input->post('zip'),
                    "region"      => $this->input->post('region'),
                    "city"        => $this->input->post('city'),
                    "street"      => $this->input->post('street'),
                    "house"       => $this->input->post('house'),
                    "office"      => $this->input->post('office'),
                    "first_name"  => ($this->input->post('first_name') !== null ? $this->input->post('first_name') : ""),
                    "last_name"   => ($this->input->post('lastt_name') !== null ? $this->input->post('last_name') : ""),
                    "middle_name" => ($this->input->post('middle_name')!== null ? $this->input->post('middle_name') : ""),
                    "recipient"   => $this->input->post('recipient'),
                    "phone"       => $this->input->post('phone'),
                    "email"       => $this->input->post('email'),
                    "user_id"     => $userID
                );
                
                $this->db->insert('ci_shipping_info', $data);
                $shippingID = $this->db->insert_id();

                return $shippingID;
            }
            
            // Сохранение 
//            public function save($userID) {
//
//                $sql =  "SELECT *
//                         FROM  ci_shipping_info 
//                         WHERE user_id = $userID";
//                
//                $query = $this->db->query($sql);
//                $order = $query->row_array();
//                
//                if (empty($order)) {
//                    return null;
//                }
//                
//                $data = array(
//                    "order_id"       => $order["order_id"],
//                    "technology_id"  => $this->input->post('technology_id'),
//                    "quantity"       => $this->input->post('quantity'),
//                    "material_id"    => $this->input->post('material_id'),
//                    "color_id"       => $this->input->post('color_id'),
//                    "description"    => $this->input->post('description'),
//                    "filling"        => $this->input->post('filling'),
//                    "quality_id"     => $this->input->post('quality_id'),
//                    "no_model"       => 0,
//                    "is_free"        => false,
//                    "cost"           => 0,
//                    "order_type_id"  => 2,
//                    "pre_moderation" => 1,
//                    "volume"         => $this->input->post('volume')
//                );
//                
//                $this->db->where('id', $order["order_item_id"]);
//                $this->db->update('ci_order_items', $data);
//
//                return $this->input->post('public_id');
//            }
            
            public function get_by_session_id(){
                $id = $this->session->session_id;
                if (empty($id)) {
                    return null;
                }
                $sql = "SELECT si.*
                        FROM  ci_orders o
                        INNER JOIN ci_shipping_info si ON o.shipping_info_id = si.id
                        WHERE o.session_id = '$id'";
                
                $query = $this->db->query($sql);
                
                return $query->row_array();
            }
            
	}

?>