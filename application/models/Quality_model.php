<?php

	class Quality_model extends CI_Model{

            public function get_all() {
                $sql = "SELECT * FROM ci_qualities ORDER BY sort_order";

                $query = $this->db->query($sql);

                return $query->result_array();
            }
        }
        
        
?>