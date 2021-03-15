<?php
	class Library_model extends CI_Model{

		public function add_item($data){
			return $this->db->insert('ci_model_library', $data);
		}

		public function get_all(){
			$query = $this->db->get('ci_model_library');
			return $result = $query->result_array();
		}

		public function edit_item($data, $id){
			$this->db->where('id', $id);
			$this->db->update('ci_model_library', $data);
			return true;

		}

		public function get_item_by_id($id){
			$query = $this->db->get_where('ci_model_library', array('id' => $id));
			return $result = $query->row_array();
		}

	}

?>	