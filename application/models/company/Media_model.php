<?php
    class Media_model extends CI_Model{

        public function get_media_type($typeID){
            $sql = "SELECT *
                    FROM ci_media_types t 
                    WHERE t.id = $typeID
                   ";

            $query = $this->db->query($sql);

            return $result = $query->row_array();
        }

        public function get_media($companyID, $typeID){
            $sql = "SELECT m.*
                    FROM ci_media m 
                    WHERE m.company_id = $companyID AND m.media_type_id = $typeID
                   ";

            $query = $this->db->query($sql);

            return $result = $query->result_array();
        }
        
        public function add_media($data)
        {
            $this->db->insert('ci_media', $data);
            return true;
        }
        
    }

?>