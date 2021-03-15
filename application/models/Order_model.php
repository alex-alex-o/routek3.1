<?php
	class Order_model extends CI_Model{

            // Добавление заказа
            public function add($userID = null, $orderTypeID = 2) {
                $orderItemID = null;
                if ($userID) {
                    $data = array(
                        "user_id" => $userID
                    );
                } else {
                    $data = array(
                        "session_id" => $this->session->session_id
                    );
                }
                $publicID = uniqid();
                $data["public_id"] = $publicID;
                $data['ip'] = $_SERVER['REMOTE_ADDR'];                        
                
                $this->db->insert('ci_orders', $data);
                $orderID = $this->db->insert_id();

                $name = "Z" . ($orderTypeID == 1 ? "E" : "3D") . "-" . $orderID;
                // Если 3D-печать
                if ($orderTypeID == 2) {
                    $data = array(
                        "name"           => $name,
                        "order_id"       => $orderID,
                        "quantity"       => 1,
                        "technology_id"  => $this->input->post('technology_id'),
                        "material_id"    => 1,
                        "color_id"       => 1,
                        "finish_id"      => 0,
                        "size_x"         => $this->input->post('size_x'),
                        "size_y"         => $this->input->post('size_y'),
                        "size_z"         => $this->input->post('size_z'),
                        "no_model"       => 0,
                        "is_free"        => false,
                        "description"    => "",
                        "volume"         => $this->input->post('volume'),
                        "cost"           => 0,
                        "order_type_id"  => $orderTypeID,
                        "pre_moderation" => 1,
                        "filling"        => 100,
                        "quality_id"     => 1,
                        "volume"         => $this->input->post('volume'),
                        "snapshot"       => $this->input->post('snapshot')
                    );
                } else {
                    $data = array(
                        "name"           => $name,
                        "order_id"       => $orderID,
                        "quantity"       => 1,
                        "technology_id"  => 0,
                        "material_id"    => 0,
                        "color_id"       => 0,
                        "finish_id"      => 0,
                        "size_x"         => 0,
                        "size_y"         => 0,
                        "size_z"         => 0,
                        "no_model"       => 0,
                        "is_free"        => false,
                        "description"    => $this->input->post('description'),
                        "volume"         => 0,
                        "cost"           => 0,
                        "order_type_id"  => $orderTypeID,
                        "pre_moderation" => 1,
                        "filling"        => 0,
                        "quality_id"     => 0,
                        "volume"         => 0,
                        "snapshot"       => ""
                    );
                    
                }
//                if ($this->input->post('model_select') == "library") {
//                    $data["library_model_id"] = $this->input->post('model_id');
//                }
                
                $this->db->insert('ci_order_items', $data);
                $orderItemID = $this->db->insert_id();

//                if ($this->input->post('model_select') == "library") {
//                    return $orderItemID;
//                }
                
                if (!empty($orderID) && !empty($orderItemID)) {
                    $path = "./uploads/orders/" . $orderID . "/" . $orderItemID;
                    if (!is_dir($path)) {
                        mkdir($path, 0777, true);
                    }

                    for($i = 0; $i < count($_FILES["files"]["name"]); $i ++) {
                        $fileName = uniqid() . "." . pathinfo($_FILES["files"]["name"][$i])["extension"];
                        if (move_uploaded_file($_FILES["files"]["tmp_name"][$i], $path . "/" . $fileName)) {
                            $data = array(
                                'file_name'     => $fileName,
                                'orig_name'     => $_FILES["files"]["name"][$i],
                                'path'          => $path,
                                'created_at'    => date('Y-m-d H:i:s'),
                                'order_item_id' => $orderItemID
                            );
                            $this->db->insert('ci_order_item_files', $data);
                        }
                    }
                }
                
                return $publicID;
            }
            
            public function get_order_by_id($publicID) {
                $userID = $this->session->userdata("user_id");
                
                $sql = "SELECT oi.*, 
                               ofr.lead_time, 
                               c.name as company, 
                               c.city, 
                               s.name as status, 
                               t.short_name as technology, 
                               t.short_name as technology_short,
                               m.name as material, 
                               cl.name as color, 
                               q.value as quality,
                               o.public_id
                        FROM ci_order_items oi 
                        LEFT  JOIN ci_offers    ofr      ON oi.id = ofr.order_item_id AND is_selected = 1
                        LEFT  JOIN ci_companies c       ON c.id  = ofr.company_id
                        LEFT  JOIN ci_order_statuses s  ON s.id  = oi.status_id
                        LEFT  JOIN ci_machines       t  ON t.id  = oi.technology_id
                        LEFT  JOIN ci_materials      m  ON m.id  = oi.material_id
                        LEFT  JOIN ci_colors         cl ON cl.id = oi.color_id
                        LEFT  JOIN ci_qualities      q  ON q.id  = oi.quality_id
                        INNER JOIN ci_orders         o  ON o.id  = oi.order_id
                        WHERE o.public_id = '$publicID'";

                $query = $this->db->query($sql);

                return $query->row_array();    
            }

            public function get_order_files($id) {
                $sql = "SELECT * 
                        FROM ci_order_item_files oif
                        WHERE oif.order_item_id = $id";
                
                $query = $this->db->query($sql);

                return $query->result_array();                
            }         
           
            public function get_deffered_order($sessionID) {
                $sql =  "SELECT oi.*,
                               t.short_name as technology, 
                               m.name as material, 
                               cl.name as color, 
                               q.value as quality,
                               o.public_id as public_id,
                               o.shipping_info_id
                        FROM ci_order_items oi 
                        INNER JOIN ci_orders o          ON o.id  = oi.order_id
                        LEFT  JOIN ci_machines       t  ON t.id  = oi.technology_id
                        LEFT  JOIN ci_materials      m  ON m.id  = oi.material_id
                        LEFT  JOIN ci_colors         cl ON cl.id = oi.color_id
                        LEFT  JOIN ci_qualities      q  ON q.id  = oi.quality_id
                        WHERE o.session_id = '$sessionID'";

                $query = $this->db->query($sql);

                return $query->row_array();
                
            }
           
            public function get_all_orders($actual = 0, $typeID = 2, $payed = false){
                $companyID    = $this->session->userdata("company_id");

                if (empty($companyID)) {
                    return null;
                }
                
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
                        LEFT JOIN  ci_offers         ofr ON ofr.order_item_id = oi.id AND is_selected = 1 AND company_id = $companyID
                        LEFT JOIN  ci_machines       m  ON m.id = oi.technology_id
                        LEFT JOIN  ci_materials      ma ON ma.id = oi.material_id
                        LEFT JOIN  ci_colors         c  ON c.id = oi.color_id
                        LEFT JOIN  ci_qualities      q  ON q.id = oi.quality_id
                        INNER JOIN ci_orders         o  ON o.id = oi.order_id 
                        WHERE $where AND oi.order_type_id = $typeID AND $payedWhere
                        ORDER BY oi.created_at DESC
                       ";
                    
                       // WHERE EXISTS (SELECT id FROM ci_orders o WHERE o.id = oi.order_id AND user_id = $userID) AND $where AND oi.order_type_id = $typeID
                $query = $this->db->query($sql);

                return $query->result_array();    
            }
            
            public function get_session_id($userID) {
                $sql = "SELECT session_id 
                        FROM ci_orders o
                        WHERE o.user_id = $userID";
                
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
            
            // Сохранение заказа
            public function save($userID = null, $shippingInfoID = null) {

                $sql =  "SELECT o.id as order_id, oi.id as order_item_id
                        FROM ci_order_items oi 
                        INNER JOIN ci_orders o          ON o.id  = oi.order_id
                        WHERE o.public_id = '" . $this->input->post('public_id') . "'";
                $query = $this->db->query($sql);
                $order = $query->row_array();
                
                if (empty($order)) {
                    return null;
                }
                
                $data = array(
                    "order_id"       => $order["order_id"],
                    "technology_id"  => $this->input->post('technology_id'),
                    "quantity"       => $this->input->post('quantity'),
                    "material_id"    => $this->input->post('material_id'),
                    "color_id"       => $this->input->post('color_id'),
                    "description"    => $this->input->post('description'),
                    "filling"        => $this->input->post('filling'),
                    "quality_id"     => $this->input->post('quality_id'),
                    "no_model"       => 0,
                    "is_free"        => false,
                    "cost"           => 0,
                    "pre_moderation" => 1
                );
                
                $this->db->where('id', $order["order_item_id"]);
                $this->db->update('ci_order_items', $data);
                
                if ($shippingInfoID) {
                    $data = array("shipping_info_id" => $shippingInfoID);
                    
                    $this->db->where('id', $order["order_id"]);
                    $this->db->update('ci_orders', $data);
                }
                
                return $this->input->post('public_id');
            }
            
            // Проставление в таблице ORDERS user_id, если пользователь зарегистрировался или вошел
            public function save_deferred() {
                $this->db->where('session_id', $this->session->session_id);
                $this->db->update('ci_orders', array('user_id' => $this->session->userdata('user_id')));
                
                $sql = "SELECT oi.name
                        FROM ci_orders o 
                        INNER JOIN ci_order_items oi ON o.id = oi.order_id
                        WHERE o.session_id = '" . $this->session->session_id . "'";
                
                $query  = $this->db->query($sql);
                $result = $query->row_array();
                
                return $result["name"];
            }
            
            public function save_shipping_info($publicID, $shippingInfoID) {
                $this->db->where('public_id', $publicID);
                $this->db->update('ci_orders', array('shipping_info_id' => $shippingInfoID));
                
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