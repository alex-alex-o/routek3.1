<?php
	class Dashboard_model extends CI_Model {
            
            public function get_features() {
                $sql = "SELECT f.*, fv.url, fv.youtube_id
                        FROM ci_features f 
                        LEFT JOIN ci_feature_videos fv ON f.id = fv.feature_id";
                
                $query = $this->db->query($sql);

                return $query->result_array();                
            }

            public function get_cards() {
                if (!$this->session->has_userdata("user_id")) {
                    return;
                }
                $userID = $this->session->userdata("user_id");
                        
                $sql = "SELECT ob.*
                        FROM ci_onboarding ob 
                        WHERE NOT EXISTS(SELECT user_id FROM ci_user_cards WHERE user_id = $userID AND card_id = ob.id AND hidden = 1)
                       ";

                $query = $this->db->query($sql);

                return $query->result_array();                
            }        
            
            public function hide_panel() {
                if (!$this->session->has_userdata("user_id")) {
                    return;
                }
                
                $data = array(
                    "card_id" => $this->input->post('id'),
                    "user_id" => $this->session->userdata("user_id"),
                    "hidden" => 1
                );
                
                $query = $this->db->get_where('ci_user_cards', 
                    array(
                        'user_id' => $this->session->userdata("user_id"), 
                        'card_id' => $this->input->post('id')
                    )
                );

                if ($query->row()) {
                    $this->db->update('ci_user_cards', $data);
                } else {
                    $this->db->insert('ci_user_cards', $data);
                }                
            }
	}

?>
