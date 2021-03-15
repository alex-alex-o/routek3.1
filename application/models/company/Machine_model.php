<?php
	class Machine_model extends CI_Model{
		public function save_company_machine($data, $companyMachineID = null) {
                    if (empty($data)) {
                        return false;
                    }
                    
                    // $this->db->trans_start();
                    if (!empty($companyMachineID)) {
                        $this->db->where('id', $companyMachineID);
                        $this->db->update('ci_company_machines', $data);
                    } else {
                        $this->db->insert('ci_company_machines', $data);
                        $companyMachineID = $this->db->insert_id();
                    }

                    if (!is_null($this->input->post("param"))) {
                        if (!empty($companyMachineID)) {
                            $this->db->delete('ci_company_machines_machineparameters', 
                                array('companymachine_id' => $companyMachineID)
                            );     
                        }
                        
                        foreach ($this->input->post("param") as $key => $parameter) {
                            $data = array(
                                "companymachine_id"   => $companyMachineID,
                                "machineparameter_id" => $key,
                                "value"               => $parameter,
                            );
                    
                            $this->db->insert('ci_company_machines_machineparameters', $data);
                        }
                    }
                    //$this->db->trans_complete();

                    return true;
		}
		
                //---------------------------------------------------
                //
		// get all users for server-side datatable processing (ajax based)
//		public function get_all_machines(){
//                    $companyID = $this->session->userdata("company_id");
//                    
//                    if ($companyID === null) {
//                        return array(
//                            "recordsTotal"    => 0, 
//                            "recordsFiltered" => 0,
//                            'data' => null
//                        );
//                    }
//                    
//                    $sql = "SELECT m.name as machine_type, m.short_name, cm.* 
//                            FROM ci_company_machines cm
//                            INNER JOIN ci_machines m 
//                            ON cm.machine_id = m.id";
//                    
//                    return $this->datatable->LoadJson($sql, "company_id = $companyID");
//		}

		//---------------------------------------------------
		// get all user records
		public function get_machines($showOnBoard = null){
                    $where = '';
                    if (!empty($showOnBoard) && $showOnBoard == true) {
                        $where = " AND show_on_board = 1";
                    }
                    $sql = "SELECT id, 
                                   short_name as name, 
                                   name as full_name,
                                   description, 
                                   image_url, 
                                   details_link, 
                                   is_default
                            FROM ci_machines 
                            WHERE active = 1 AND machinegroup_id = 2 $where
                            ORDER BY is_default DESC";
                    
                    $query = $this->db->query($sql);
                            
                    return $query->result_array();
		}
                
                public function get_machine_params() {
                    $machineID = $this->input->get("machineID");

                    if (empty($machineID)) {
                        return null;
                    }
                    
                    $sql = "SELECT *
                            FROM ci_machines m 
                            LEFT JOIN ci_machines_machineparameters mmp ON m.id = mmp.machine_id
                            LEFT JOIN ci_machineparameters           mp ON mp.id = mmp.machineparameter_id
                            WHERE m.id = $machineID
                            ORDER BY sort_order";
                    
                    $query = $this->db->query($sql);

                    return $query->result_array();
                }

                public function get_machine_param_values() {
                    $companyMachineID = $this->input->get("companyMachineID");

                    if (empty($companyMachineID)) {
                        return null;
                    }
                    
                    $sql = "SELECT mp.name as name, mp.id as id, cmp.value, mp.type as type
                            FROM ci_machines_machineparameters              mmp
                            LEFT JOIN ci_machineparameters                  mp  ON mp.id = mmp.machineparameter_id
                            LEFT JOIN ci_company_machines                   cm  ON mmp.machine_id  = cm.machine_id 
                            LEFT JOIN ci_company_machines_machineparameters cmp ON cmp.machineparameter_id = mp.id AND companymachine_id = cm.id
                            WHERE cmp.companymachine_id = $companyMachineID
                            ORDER BY sort_order";
        
                    $query = $this->db->query($sql);

                    return $query->result_array();
                }

		//---------------------------------------------------
		// Count total user for pagination
		public function count_all_machines(){
			return $this->db->count_all('ci_machines');
		}

		//---------------------------------------------------
		// Get all users for pagination
		public function get_all_machines_for_pagination($limit, $offset){
			$wh = array();	
			$this->db->order_by('id', 'desc');
			$this->db->limit($limit, $offset);

			if(count($wh)>0){
				$WHERE = implode(' and ',$wh);
				$query = $this->db->get_where('ci_machines', $WHERE);
			}
			else{
				$query = $this->db->get('ci_machines');
			}
                        
			return $query->result_array();
		}

		//---------------------------------------------------
		// Оборудование по ID
		public function get_company_machine_by_id($id){
                    $query = $this->db->get_where('ci_company_machines', array('id' => $id));
                    return $result = $query->row_array();
		}

                public function get_company_machine_params_by_id($id){
                    $query = $this->db->get_where('ci_company_machines', array('id' => $id));
                    return $result = $query->row_array();
		}

                public function get_machine_parameter_by_id ($id) {
                    $query = $this->db->get_where(
                        'ci_machineparameters', 
                        array('id' => $id)
                    );
                    
                    return $result = $query->row_array();
                }

	}

?>