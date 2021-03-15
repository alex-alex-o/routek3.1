<?php
	class Finishes_model extends CI_Model{
            public function save_company_finish()
            {
                $data = array(
                    "company_id"  => $this->input->post('company_id'),
                    "finish_id"   => $this->input->post('finish_id')
                );

                if ($this->input->post('value') === 'true') {
                    $query = $this->db->get_where('ci_company_finishes', 
                        array(
                            'company_id'=> $data["company_id"], 
                            'finish_id' => $data["finish_id"]
                        )
                    );

                    if ($query->row()) {
                        return;
                    }
                    
                    $this->db->insert('ci_company_finishes', $data);
                } else {
                    $this->db->delete('ci_company_finishes', 
                        array(
                            'company_id' => $data["company_id"], 
                            'finish_id'  => $data["finish_id"]
                        )
                    );  
                }
            }    

            public function get_finishes($id) {

                $query = $this->db->query("
                        SELECT f.id as id, f.name as name, fg.name as group_name, fg.id as group_id, cf.company_id as value
                        FROM   ci_finishes f 
                        LEFT JOIN (SELECT * FROM ci_company_finishes WHERE company_id = '$id') cf ON cf.finish_id = f.id
                        LEFT JOIN ci_finishes_groups fg ON f.group_id = fg.id
                        WHERE fg.id = 1
                        ORDER BY fg.id, f.id
                        "
                );
                $finishes = $query->result_array();

                $result = array();
                foreach($finishes as $finish) {
                    $key = ($finish["group_id"] === null ? 0 : $finish["group_id"]);
                    $result[$key]["name"]    = $finish["group_name"];
                    $result[$key]["items"][] = $finish;
                }

                return $result;
            }
            
            public function get_all() {

                $query = $this->db->query("
                        SELECT *
                        FROM   ci_finishes"
                );
                
                return $query->result_array();            }
            
	}

?>