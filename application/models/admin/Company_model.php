<?php
    class Company_model extends CI_Model{
        
        public function get_by_id($id){
            $query = $this->db->get_where('ci_companies', array('id' => $id));
            
            return $result = $query->row_array();
        }
                
        public function get_company_users($id) {
            
            $sql = "SELECT u.*
                   FROM ci_companies c 
                   LEFT JOIN ci_users_companies cu ON c.id = cu.company_id
                   LEFT JOIN ci_users u ON cu.user_id = u.id
                   WHERE c.id = $id
                   ";
            
            $query = $this->db->query($sql);
            
            $result = $query->result_array();
            

            return $result;
            
        }
        
        public function get_company_note($id){
            $query = $this->db->get_where('ci_company_notes', array('id' => $id));
            
            $result = $query->row_array();

            if (empty($result)) {
                $result = array("user_id" => null,
                    "details" => null,
                    "problems" => null,
                    "result" => null,
                    'id' => null
                );
            }
            
            return $result;
        }
        
        public function get_company_notes($id) {
            
            $sql = "SELECT cn.*, u.name, u.username, o.name as owner_name
                   FROM ci_company_notes cn
                   LEFT JOIN ci_users u ON cn.user_id = u.id
                   LEFT JOIN ci_users o ON cn.owner_id = o.id
                   WHERE cn.company_id = $id
                   ORDER BY cn.created_at DESC
                       
                   ";
            
            $query = $this->db->query($sql);
            
            return $query->result_array();
            
        }        
        
        public function add_note($companyID) {
            
            $data = array(
                            'user_id'    => $this->input->post('user_id'),
                            'details'    => $this->input->post('details'),
                            'result'     => $this->input->post('result'),
                            'problems'   => $this->input->post('problems'),
                            'created_at' => date('Y-m-d : h:m:s'),
                            'owner_id'   => $this->session->userdata('user_id'),
                            'company_id' => $companyID
                        );

            $this->db->insert('ci_company_notes', $data);
        }
        
        public function save_note($id) {
            $data = array(
                            'user_id'    => $this->input->post('user_id'),
                            'details'    => $this->input->post('details'),
                            'result'     => $this->input->post('result'),
                            'problems'   => $this->input->post('problems'),
                            'created_at' => date('Y-m-d : h:m:s'),
                            'owner_id'   => $this->session->userdata('user_id')
                        );
            
            $this->db->where('id', $id);
            $this->db->update('ci_company_notes', $data);
        }
        
        public function get_all() {
                   
            $sql = "SELECT c.*, u.name as user_name, u.email as user_email
                   FROM ci_companies c 
                   LEFT JOIN ci_users_companies cu ON c.id = cu.company_id
                   LEFT JOIN ci_users u ON cu.user_id = u.id
                   
                   ";
            
            $query = $this->db->query($sql);
            
            return $query->result_array();
        }
        
        public function get_all_json() {
                   
            $sql = "SELECT * FROM ci_companies";
                    
            return $this->datatable->LoadJson($sql, "");
        }

        public function block($id, $block) {
            $sql = "UPDATE ci_companies SET is_blocked = $block 
                    WHERE id = $id";
            
            $this->db->query($sql);       
            
            $sql = "UPDATE ci_users u SET is_active = (NOT (1 = $block))
                    WHERE EXISTS (SELECT id FROM ci_users_companies 
                                  WHERE u.id = user_id AND company_id = $id)";
            
            return $this->db->query($sql);
        }
    }

?>