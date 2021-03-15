<?php
	class Helper_model extends CI_Model{
            
            public function get_question($id) {
                $sql = "SELECT q.id as question_id, 
                               q.text, 
                               v.id as value_id, 
                               v.value 
                        FROM ci_questions q 
                        LEFT JOIN ci_variants v ON q.id = v.question_id
                        WHERE id = $id";
                
                $query = $this->db->query($sql);
                return $query->row_array();
            }

            public function get_all_questions() {
                $sql = "SELECT q.id as question_id, 
                               q.text, 
                               v.id as value_id, 
                               v.value 
                        FROM ci_questions q 
                        LEFT JOIN ci_variants v ON q.id = v.question_id
                        ORDER BY parent_id";
                
                $query = $this->db->query($sql);
                
                $queryResult = $query->result_array();
                if (!$queryResult) {
                    return null;
                }

                $questions = [];
                foreach($queryResult as $item) {
                    $variant = [
                        "id"    => $item["value_id"], 
                        "value" => $item["value"]
                    ];
                
                    if (!isset($questions[$item["question_id"]])) {
                        $questions[$item["question_id"]] = [
                            "id"        => $item["question_id"],
                            "text"      => $item["text"],
                            "variants"  => [$variant],
                            "materials" => []
                        ];
                    } else {
                        //$questions[$item["question_id"]];
                        $questions[$item["question_id"]]["variants"][] = $variant;
                    }
                }
                
                return $questions;
            }
            
            public function get_variants($questionID) {
                $sql = "SELECT id, 
                               value 
                        FROM ci_variants
                        WHERE question_id = $questionID";

                $query = $this->db->query($sql);
                
                $queryResult = $query->result_array();
                
                $variants = [];
                foreach($queryResult as $item) {
                    $variants[] = [
                        "id"    => $item["id"],
                        "value" => $item["value"]
                    ];
                }
                
                return $variants;
            }
            
            public function save_variant($questionID, $variant) {
                $data = [
                    "question_id" => $questionID,
                    "value"       => $variant
                ];
                
                $this->db->insert('ci_variants', $data);
                
                return $this->db->insert_id();                
            }
            
            public function get_materials($variantID) {
                
            }
            
	}

?>