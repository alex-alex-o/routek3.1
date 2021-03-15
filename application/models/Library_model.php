<?php
	class Library_model extends CI_Model{
            public function get_models() {
                $query = $this->db->query("
                        SELECT id, name, model_file
                        FROM ci_model_library 
                        WHERE active = 1"
                );
                
                return $query->result_array();
            }
	}

?>