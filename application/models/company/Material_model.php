<?php
	class Material_model extends CI_Model{
		public function save($data) {
                    return true;
		}
		
		//---------------------------------------------------
		public function get_materials(){
                    $sql = "SELECT *
                            FROM ci_materials 
                            WHERE active = 1";
                    
                    $query = $this->db->query($sql);
                            
                    return $query->result_array();
		}
                
                public function get_cost() {
                    $sql = "SELECT cost
                            FROM ci_materials
                            WHERE id = " . $this->input->post('material_id');
                    
                    $query = $this->db->query($sql);
                            
                    return $query->row_array();
                    
                }
                
	}

?>