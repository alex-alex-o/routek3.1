<?php

	class Status_model extends CI_Model{

            public function get_all($statusTypeID = null) {
                if (empty($statusTypeID)) {
                    return null;
                }

                $sql = "SELECT * FROM ci_order_statuses
                        WHERE 
                        order_type_id = $statusTypeID
                        ORDER BY sort_order";

                $query = $this->db->query($sql);

                return $query->result_array();
            }
        }
        
        
?>