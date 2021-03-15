<?php
	class User_model extends CI_Model{
            //--------------------------------------------------------------------
            public function get_user_detail($id = null){
                if (!$id) {
                    $id = $this->session->userdata('user_id');
                }
                
                $query = $this->db->get_where('ci_users', array('id' => $id));
                return $result = $query->row_array();
            }
            
            //--------------------------------------------------------------------
            public function add_user(){
                if(!$this->session->userdata('user_id')) {
                    $this->db->where('id', $id);
                    $this->db->update('ci_users', $data);
                    return true;
                }
            }
            
            //--------------------------------------------------------------------
            public function update_user($data){
                $id = $this->session->userdata('user_id');
                $this->db->where('id', $id);
                $this->db->update('ci_users', $data);
                return true;
            }
            
            //--------------------------------------------------------------------
            public function change_pwd($data, $id){
                $this->db->where('id', $id);
                $this->db->update('ci_users', $data);
                return true;
            }

            public function get_files() {
                $id = $this->session->userdata('user_id');
                $sql = "SELECT oif.* 
                        FROM ci_order_item_files oif
                        INNER JOIN ci_order_items oi ON oif.order_item_id = oi.id
                        INNER JOIN ci_orders o ON o.id = oi.order_id
                        WHERE o.user_id = $id
                        ORDER BY created_at DESC";
                
                $query = $this->db->query($sql);

                return $query->result_array();                
            }
	}

?>