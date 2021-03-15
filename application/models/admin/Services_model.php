<?php
	class Services_model extends CI_Model{
            public function save_company_service()
            {
                $data = array(
                    "company_id"   => $this->input->post('company_id'),
                    "service_id"   => $this->input->post('service_id')
                );

                if ($this->input->post('value') === 'true') {
                    $query = $this->db->get_where('ci_company_services', 
                        array(
                            'company_id' => $data["company_id"], 
                            'service_id' => $data["service_id"]
                        )
                    );

                    if ($query->row()) {
                        return;
                    }
                    
                    $this->db->insert('ci_company_services', $data);
                } else {
                    $this->db->delete('ci_company_services', 
                        array(
                            'company_id' => $data["company_id"], 
                            'service_id' => $data["service_id"]
                        )
                    );  
                }
            }    

            public function get_services($id) {

                $query = $this->db->query("
                        SELECT f.id as id, f.name as name, fg.name as group_name, fg.id as group_id, cf.company_id as value
                        FROM   ci_services f 
                        LEFT JOIN (SELECT * FROM ci_company_services WHERE company_id = '$id') cf ON cf.service_id = f.id
                        LEFT JOIN ci_services_groups fg ON f.group_id = fg.id
                        WHERE fg.id = 1
                        ORDER BY fg.id, f.id
                        "
                );
                $services = $query->result_array();

                $result = array();
                foreach($services as $service) {
                    $key = ($service["group_id"] === null ? 0 : $service["group_id"]);
                    $result[$key]["name"]    = $service["group_name"];
                    $result[$key]["items"][] = $service;
                }

                return $result;
            }
            
            public function get_all() {

                $query = $this->db->query("
                        SELECT *
                        FROM   ci_services"
                );
                
                return $query->result_array();            }
            
	}

?>