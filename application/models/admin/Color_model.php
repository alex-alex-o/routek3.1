<?php
	class Color_model extends CI_Model{
		public function save($data) {
                    return true;
		}
		
		//---------------------------------------------------
		public function get_colors(){
                    $sql = "SELECT *
                            FROM ci_colors";
                    
                    $query = $this->db->query($sql);
                            
                    return $query->result_array();
		}
	}

?>