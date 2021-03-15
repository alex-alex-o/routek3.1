<?php
	class Dashboard_model extends CI_Model{

		public function get_all_users(){
			return $this->db->where('role', 3)->from("ci_users")->count_all_results();
		}
                
		public function get_all_companies(){
			return $this->db->count_all('ci_companies');
		}

		public function get_all_orders(){
			return $this->db->count_all('ci_orders');
		}
                
		public function get_active_users(){
			$this->db->where('is_active', 1);
			return $this->db->count_all_results('ci_users');
		}
                
		public function get_deactive_users(){
			$this->db->where('is_active', 0);
			return $this->db->count_all_results('ci_users');
		}
	}

?>
