<?php
	class Auth_model extends CI_Model{

            public function login($data) {
                $query = $this->db->get_where('ci_users', array('email' => $data['email']));
                if ($query->num_rows() == 0){
                    return false;
                } else {
                    //Compare the password attempt with the password we have stored.
                    $result = $query->row_array();
                    $validPassword = password_verify($data['password'], $result['password']);
                    if ($validPassword){
                        return $result = $query->row_array();
                    }
                }
            }
            
            public function pre_register($data) {
                    $this->db->insert("ci_tmp_users", array(
                        'phone'      => $data['phone'],
                        'email'      => $data['email'],
                        'created_at' => $data['created_at'],
                        'session_id' => $data['session_id'],
                        'f_ip' 		 => $data['ip']
                    ));
                    $userID = $this->db->insert_id();

                return true;    
            }            
            
            //--------------------------------------------------------------------
            public function register($data) {
                
                if (!$this->check_user_mail($data["email"])) {
                    //  $this->db->insert('ci_users', $data);
                    $this->db->insert("ci_users", array(
                        'name'       => $data['name'],
                        'role'       => $data['role'],
                        'username'   => $data['email'],
                        'phone'      => $data['phone'],
                        'email'      => $data['email'],
                        'password'   => $data['password'],
                        'is_active'  => $data['is_active'],
                        'is_verify'  => $data['is_verify'],
                        'token'      => $data['token'],    
                        'last_ip'    => $data['last_ip'],
                        'session_id' => ($data['session_id']) ? $data['session_id'] : '',
                        'created_at' => $data['created_at'],
                        'updated_at' => $data['updated_at'],
                        'f_ip'       => ($data['ip']) ? $data['ip'] : ''
                    ));
                    $userID = $this->db->insert_id();

                    $this->db->insert('ci_companies', 
                        array(
                            "name"       => empty($data["company"]) ? $data["name"] : $data["company"],
                            'created_at' => $data['created_at']
                        )
                    );
                    $companyID = $this->db->insert_id();
                    
                    $this->db->insert('ci_users_companies', array(
                        "company_id" => $companyID,
                        "user_id"    => $userID
                    ));
                                        
                    return $userID;
                }
                
                return false;
            }

            public function company_register($data) {
                if (!$this->check_user_mail($data["email"])) {
                    
                    if ($data["is_free_medic_construct"]) {
                        $data['role'] = 2;
                    } else {
                        $data['role'] = 5;
                    }
                    
                    $this->db->insert("ci_users", array(
                        'name'       => $data['name'],
                        'role'       => $data['role'],
                        'username'   => $data['email'],
                        'phone'      => $data['phone'],
                        'email'      => $data['email'],
                        'password'   => $data['password'],
                        'is_active'  => $data['is_active'],
                        'is_verify'  => $data['is_verify'],
                        'token'      => $data['token'],    
                        'last_ip'    => $data['last_ip'],
                        'created_at' => $data['created_at'],
                        'updated_at' => $data['updated_at'],
                        'f_ip' => $data['ip']
                    ));
                    $userID = $this->db->insert_id();
                    
                    $this->db->insert('ci_companies', 
                        array(
                            "name"  => $data["company"],
                            "city"  => $data["city"],
                            "is_free_medic_construct"  => $data["is_free_medic_construct"]  ? true : false,
                            "is_free_medic_production" => $data["is_free_medic_production"] ? true : false
                        )
                    );
                    $companyID = $this->db->insert_id();
                    
                    $this->db->insert('ci_users_companies', array(
                        "company_id" => $companyID,
                        "user_id"    => $userID
                    ));
                    
                    return true;
                }
                return false;
            }

            public function engeneer_register($data) {

                if (!$this->check_user_mail($data["email"])) {
                        
                    $this->db->insert("ci_users", array(
                        'name'       => $data['name'],
                        //'company'    => $data['company'],
                        'role'       => $data['role'],
                        'username'   => $data['email'],
                        'phone'      => $data['phone'],
                        'email'      => $data['email'],
                        'password'   => $data['password'],
                        'is_active'  => $data['is_active'],
                        'is_verify'  => $data['is_verify'],
                        'token'      => $data['token'],    
                        'last_ip'    => $data['last_ip'],
                        'created_at' => $data['created_at'],
                        'updated_at' => $data['updated_at'],
                        'f_ip' => $data['ip']
                        
                    ));
                    $userID = $this->db->insert_id();
                    
                    $this->db->insert('ci_companies', 
                        array(
                            "name"  => $data["company"],
                            "email"    => $data["email"],
                            "is_free_medic_construct" => $data["is_free_medic_construct"] ? true : false
                        )
                    );
                    $companyID = $this->db->insert_id();
                    
                    $this->db->insert('ci_users_companies', array(
                        "company_id" => $companyID,
                        "user_id"    => $userID
                    ));
                    
                    return true;
                }
                return false;
            }            
            
            //--------------------------------------------------------------------
            public function email_verification($code) {
                $this->db->select('email, token, is_active');
                $this->db->from('ci_users');
                $this->db->where('token', $code);
                $query = $this->db->get();
                $result= $query->result_array();
                $match = count($result);
                if($match > 0){
                    $this->db->where('token', $code);
                    $this->db->update('ci_users', array('is_verify' => 1, 'token'=> ''));
                    return true;
                } else {
                    return false;
                }
            }
            
            //============ Check User Email ============
	    function check_user_mail($email) {
	    	$result = $this->db->get_where('ci_users', array('email' => $email));

	    	if($result->num_rows() > 0){
                    $result = $result->row_array();
                    return $result;
	    	} else {
                    return false;
	    	}
	    }
            
	    //============ Update Reset Code Function ===================
	    public function update_reset_code($reset_code, $user_id) {
	    	$data = array('password_reset_code' => $reset_code);
	    	$this->db->where('id', $user_id);
	    	$this->db->update('ci_users', $data);
	    }

	    //============ Activation code for Password Reset Function ===================
	    public function check_password_reset_code($code){

	    	$result = $this->db->get_where('ci_users',  array('password_reset_code' => $code ));
	    	if($result->num_rows() > 0){
	    		return true;
	    	}
	    	else{
	    		return false;
	    	}
	    }
	    //============ Reset Password ===================
	    public function reset_password($id, $new_password){
                $data = array(
                    'password_reset_code' => '',
                    'password' => $new_password
                );
                
                $this->db->where('password_reset_code', $id);
                $this->db->update('ci_users', $data);
                
                return true;
	    }
            
            //--------------------------------------------------------------------
            public function get_admin_detail(){
                $id = $this->session->userdata('admin_id');
                $query = $this->db->get_where('ci_users', array('id' => $id));
                
                return $result = $query->row_array();
            }
            
            //--------------------------------------------------------------------
            public function update_admin($data){
                $id = $this->session->userdata('admin_id');
                $this->db->where('id', $id);
                $this->db->update('ci_users', $data);
                
                return true;
            }
            
            //--------------------------------------------------------------------
            public function change_pwd($data, $id){
                $this->db->where('id', $id);
                $this->db->update('ci_users', $data);
                
                return true;
            }
		
            // Check Recaptcha
            public function check_recaptcha_status()
            {
                $this->db->select('recaptcha_status');
                $this->db->where('id',1);
                $status = $this->db->get('ci_general_settings')->row_array()['recaptcha_status'];
                if($status == '1')
                        return true;
                else
                        return false;
            }
            
            public function generateStrongPassword($length = 9, $add_dashes = false, $available_sets = 'luds')
            {
                    $sets = array();
                    if(strpos($available_sets, 'l') !== false)
                            $sets[] = 'abcdefghjkmnpqrstuvwxyz';
                    if(strpos($available_sets, 'u') !== false)
                            $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
                    if(strpos($available_sets, 'd') !== false)
                            $sets[] = '23456789';
                    if(strpos($available_sets, 's') !== false)
                            $sets[] = '!@#$%&*?';

                    $all = '';
                    $password = '';
                    foreach($sets as $set)
                    {
                            $password .= $set[array_rand(str_split($set))];
                            $all .= $set;
                    }

                    $all = str_split($all);
                    for($i = 0; $i < $length - count($sets); $i++)
                            $password .= $all[array_rand($all)];

                    $password = str_shuffle($password);

                    if(!$add_dashes)
                            return $password;

                    $dash_len = floor(sqrt($length));
                    $dash_str = '';
                    while(strlen($password) > $dash_len)
                    {
                            $dash_str .= substr($password, 0, $dash_len) . '-';
                            $password = substr($password, $dash_len);
                    }
                    $dash_str .= $password;
                    return $dash_str;
            }            

	}

?>