<?php
	class Helper_model extends CI_Model{
            
//            public function get_question($id) {
//                $sql = "SELECT q.id as question_id, 
//                               q.text, 
//                               v.id as value_id, 
//                               v.value 
//                        FROM ci_questions q 
//                        LEFT JOIN ci_variants v ON q.id = v.question_id
//                        WHERE id = $id";
//                
//                $query = $this->db->query($sql);
//                return $query->row_array();
//            }

            public function get_next_step($id) {
                $sql = "SELECT id 
                        FROM ci_questions WHERE sort_order > $id
                        ORDER BY sort_order
                        LIMIT 0,1"; 
                
                $query = $this->db->query($sql);
                
                $queryResult = $query->row_array();
                if (!$queryResult) {
                    return null;
                }

                return $queryResult["id"];
            }
            
            public function get_materials_by_variants($variants) {
                if (!$variants){
                    return null;
                }
                
                $variantList = "";
                foreach($variants as $variant) {
                    $variantList .= $variant . ",";
                }
                $variantList = "(". substr($variantList, 0, strlen($variantList) - 1) . ")";
                
                
                $sql = "SELECT m.id, m.name, count(*) as cnt
                    FROM ci_materials m 
                    INNER JOIN ci_variants_materials vm ON m.id = vm.material_id
                    WHERE variant_id in $variantList
                    GROUP by m.id, m.name
                    ORDER BY cnt DESC
                    LIMIT 0, 2";
                
                
                $query = $this->db->query($sql);

                return $query->result_array();
                
            }
            
            public function get_question($id) {
                $sql = "SELECT q.id as question_id, 
                               q.text, 
                               v.id as value_id, 
                               v.value 
                        FROM ci_questions q 
                        LEFT JOIN ci_variants v ON q.id = v.question_id
                        WHERE q.id = $id
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