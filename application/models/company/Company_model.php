<?php
    class Company_model extends CI_Model{

        public function save_common($logoPath = null) {
            $data = array(
                "name"              => $this->input->post('name'),
                "email"             => $this->input->post('email'),
                "phone"             => $this->input->post('phone'),
                "description"       => $this->input->post('description'),
                "is_public_profile" => $this->input->post('is_public_profile') ? true : false,
            );
            
            if (!empty($logoPath)) {
                $data["logo"] = $logoPath;
            }
            
            $this->db->where('id', $this->session->userdata('company_id'));
            
            return $this->db->update('ci_companies', $data);
        }

        public function save_address() {
            $data = array(
                "zip"               => $this->input->post('zip'),
                "region"            => $this->input->post('region'),
                "city"              => $this->input->post('city'),
                "street"            => $this->input->post('street'),
                "building"          => $this->input->post('building'),
                "office"            => $this->input->post('office'),
            );
            
            $this->db->where('id', $this->session->userdata('company_id'));
            
            return $this->db->update('ci_companies', $data);
        }

        public function save_bank() {
            $data = array(
                "inn"         => $this->input->post('inn'),
                "kpp"         => $this->input->post('kpp'),
                "bik"         => $this->input->post('bik'),
                "account"     => $this->input->post('account'),
                "kor_account" => $this->input->post('kor_account')
            );
            
            $this->db->where('id', $this->session->userdata('company_id'));
            
            return $this->db->update('ci_companies', $data);
        }

        public function save_covid() {
            $data = array(
                "is_free_medic_production" => $this->input->post('is_free_medic_production') ? true : false,
                "is_free_medic_construct"  => $this->input->post('is_free_medic_construct') ? true : false,
            );
            
            $this->db->where('id', $this->session->userdata('company_id'));
            
            return $this->db->update('ci_companies', $data);
        }
        
        
        public function save_industries() {

        }

        public function get_user_company($userID){
            $sql = "SELECT c.*
                    FROM ci_users u 
                    INNER JOIN ci_users_companies uc ON u.id = uc.user_id
                    INNER JOIN ci_companies c       ON c.id = uc.company_id
                    WHERE u.id = $userID
                   ";

            $query = $this->db->query($sql);
            if (!$query) {
                return null;
            }
                
            return $result = $query->row_array();
        }
        
        public function get_users($companyID) {
            $sql = "SELECT u.id, u.name, u.email
                    FROM ci_users u 
                    INNER JOIN ci_users_companies uc 
                            ON u.id = uc.user_id
                           AND uc.company_id = $companyID
                   ";
            
            $query = $this->db->query($sql);
            if (!$query) {
                return null;
            }
                
            return $result = $query->result_array();
            
        }
        
        public function get_companies() {
            $sql = "SELECT * FROM ci_companies";
            
            $query = $this->db->query($sql);
            if (!$query) {
                return null;
            }
                
            return $result = $query->result_array();
            
        }        
    }

?>