<?php

	class OrderType_model extends CI_Model{

            public function get_all() {
                $sql = "SELECT * FROM ci_order_types";

                $query = $this->db->query($sql);

                return $query->result_array();
            }
        }
        
        
?>