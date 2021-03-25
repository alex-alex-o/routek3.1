<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('mailer');
		$this->load->library('recaptcha');

                $this->load->model('order_model', 'order_model');
                $this->load->model('offer_model', 'offer_model');
                $this->load->model('company/company_model', 'company_model');
                $this->load->model('auth_model', 'auth_model');
                $this->load->model('shipping_model', 'shipping_model');
		$this->load->model('activity_model','activity_model');
	}
	//-------------------------------------------------------------------------
	public function index(){
		if($this->session->has_userdata('is_admin_login'))
		{
                    redirect('admin/dashboard');
		}
		if($this->session->has_userdata('is_user_login'))
		{
                    redirect('user/profile');
		}
		else{
                    redirect('auth/login');
		}
	}
	//-------------------------------------------------------------------------	
	public function login(){
            $url = $this->input->get('url', TRUE);
            
            if($this->input->post('submit')){
		    
                // for google recaptcha
    		if ($this->auth_model->check_recaptcha_status() == true) {
                    if (!$this->recaptcha_verify_request()) {
                        $this->session->set_flashdata('form_data', $this->input->post());
                        $this->session->set_flashdata('warning', 'reCaptcha Error');
                        redirect(base_url('auth/login'));
                        exit();
                    }
                }
        
                $this->form_validation->set_rules('email',    'Email',  'trim|required');
                $this->form_validation->set_rules('password', 'Пароль', 'trim|required');

                
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('auth/login');
                } else {
                    $data = array(
                        'email'    => $this->input->post('email'),
                        'password' => $this->input->post('password')
                    );
                    
                    $data   = $this->security->xss_clean($data);
                    $result = $this->auth_model->login($data);
                                
                    if ($result) {
                        if ($result['is_verify'] == 0) {
                            $this->session->set_flashdata('warning', 'Подтвердите свой Email!');
                            redirect(base_url('auth/login'));
                            exit;
                        }

                        $this->session->userdata["role"] = $result["role"];

                        $data = array(
                            'name'    => $result['name'], 
                            'user_id' => $result['id'],
                            'email'   => $this->input->post('email')
                        );

                        switch ($this->session->userdata["role"]) {
                            case 1:
                                $data['is_admin_login'] = true;
                                
                                $this->session->set_userdata($data);
                                $this->activity_model->add(4);
                                
                                redirect(base_url('admin/premoderation'), 'refresh');
                                break;
                            case 2:
                                $company = $this->company_model->get_user_company($data['user_id']);
                                
                                $data['is_user_login'] = true;
                                $data['company_id']    = $company['id'];
                                $data['company_name']  = $company['name'];
                                $data['company_logo']  = $company['logo'];
                                
                                $this->session->set_userdata($data);
                                $this->activity_model->add(4);
                                
                                if ($this->session->has_userdata('initial_url')) {
                                    redirect($this->session->userdata('initial_url'), 'refresh');
                                } else {
                                    redirect(base_url('company/orders/index'), 'refresh');
                                }
                                
                                break;
                            case 3:
                                $company = $this->company_model->get_user_company($data['user_id']);
                                
                                if ($company) {
                                    $data['company_id']   = $company['id'];
                                    $data['company_name'] = $company['name'];
                                    $data['company_logo'] = $company['logo'];
                                }
                                
                                $this->session->set_userdata($data);
                                // Сохранение отложенного заказа
                                $orderNum = $this->order_model->save_deferred();
                                
                                if ($orderNum) {
                                    $this->load->library("notifications");
                                    $this->notifications->send(6,
                                        array(
                                            "[order_id]"   => $orderNum,
                                            "[order_url]"  => base_url() . "user/offers/",
                                            "[user_name]"  => $data['name'], 
                                            "[user_email]" => $data['email']
                                        )
                                    ); 

                                    $this->activity_model->add(4);
                                }

                                if ($this->session->has_userdata('initial_url')) {
                                    redirect($this->session->userdata('initial_url'), 'refresh');
                                } else {
                                    redirect(base_url('user/dashboard'), 'refresh');
                                }
                                
                                
                                break;
                            case 4:
                                $this->session->set_userdata($data);
                                
                                $this->activity_model->add(4);
                                
                                redirect(base_url('manager/dashboard'), 'refresh');

                                break;
                            case 5:
                                $company = $this->company_model->get_user_company($data['user_id']);
                                
                                $data['is_user_login'] = true;
                                $data['company_id']    = $company['id'];
                                
                                $this->session->set_userdata($data);
                                $this->activity_model->add(4);
                                
                                redirect(base_url('admin/dashboard'), 'refresh');
                                
                                break;
                        }
                        
                    } else {
                        $data['msg'] = 'Неверный email или пароль!';
                        $this->load->view('auth/login', $data);
                    }
                }
                
            } else {
                $data['title'] = 'Вход в систему';
                $this->load->view('auth/login');
            }
	}	

	//-------------------------------------------------------------------------
	public function register(){
		if($this->input->post('submit')) {
		    
		    // for google recaptcha
//                    if ($this->auth_model->check_recaptcha_status() == true) {
//                        if (!$this->recaptcha_verify_request()) {
//                            $this->session->set_flashdata('form_data', $this->input->post());
//                            $this->session->set_flashdata('warning', 'reCaptcha Error');
//                            redirect(base_url('auth/register'));
//                            exit();
//                        }
//                    }
            
                    // $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[ci_users.username]');
                    $this->form_validation->set_rules('name', 'Имя', 'trim|required');
                    // $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
                    $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[ci_users.email]|required');
                    $this->form_validation->set_rules('password', 'Пароль', 'trim|required');
                    $this->form_validation->set_rules('confirm_password', 'Подтверждение пароля', 'trim|required|matches[password]');
                    $this->form_validation->set_rules('terms', 'Условия использования', 'required');
                    
                    $emailExists = $result = $this->auth_model->check_user_mail($this->input->post('email'));

                    if ($this->form_validation->run() == FALSE || $emailExists) {
                        $data['title'] = 'Регистрация';
                        $this->load->view('auth/register', $data);
                    }
                    else{
                        $data = array(
                                'name'       => $this->input->post('name'),
                                // 'lastname' => $this->input->post('lastname'),
                                'username'   => $this->input->post('email'),
                                'company'    => $this->input->post('company'),
                                'phone'      => $this->input->post('phone'),
                                'city'       => $this->input->post('city'),
                                'email'      => $this->input->post('email'),
                                'role'       => 3,
                                'password'   =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                                'is_active'  => 1,
                                'is_verify'  => 1,
                                'token'      => md5(rand(0,1000)),    
                                'last_ip'    => '',
                                'created_at' => date('Y-m-d : h:m:s'),
                                'updated_at' => date('Y-m-d : h:m:s'),
                        );

                        
                        $data   = $this->security->xss_clean($data);
                        $result = $this->auth_model->register($data);
                        if($result) {
//                            //sending welcome email to user
//                            $name = $data['firstname']; //.' '.$data['lastname'];
//                            $email_verification_link = base_url('auth/verify/').'/'.$data['token'];
//                            $body = $this->mailer->Tpl_Registration($name, $email_verification_link);
//                            
//                            $this->load->helper('email_helper');
//                            $to      = $data['email'];
//                            $subject = 'Активируйте ваш аккаунт';
//                            $message =  $body ;
//                            $email   = sendEmail($to, $subject, $message, $file = '' , $cc = '');
//                            $email   = true;
//                            if($email) {
//                                $this->session->set_flashdata('success', 'Ваш аккаунт создан. Пройдите верификацию, перейдя по ссылке из отправленного нами письма.');	
                            
                            
                                $this->load->library("notifications");

                                $this->notifications->send(1,
                                    array(
                                        "[user_name]"  => $this->input->post('name'), 
                                        "[user_email]" => $this->input->post('email')
                                    )
                                );                            
                            
                                redirect(base_url('auth/login'));
//                            } else {
//                                echo 'Ошибка отсылки Email';
//                            }
                        } else {
                            $this->session->set_flashdata('warning', 'Ошибка регистрации. Обратитесь в службу поддержки.');
                            redirect(base_url('auth/register'));
                            exit();
                        }
                    }
		}
		else{
                    $data['title'] = 'Регистрация';
                    $user = $this->shipping_model->get_by_session_id();
                    if ($user) {
                        $data["name"]  = $user["recipient"];
                        $data["email"] = $user["email"];
                        $data["phone"] = $user["phone"];
                    }
                    $this->load->view('auth/register', $data);
		}
	}

	public function company_register(){
		if ($this->input->post('submit')) {
		    
		    // for google recaptcha
                    if ($this->auth_model->check_recaptcha_status() == true) {
                        if (!$this->recaptcha_verify_request()) {
                            $this->session->set_flashdata('form_data', $this->input->post());
                            $this->session->set_flashdata('warning', 'reCaptcha Error');
                            redirect(base_url('auth/company_register'));
                            exit();
                        }
                    }
            
                    // $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[ci_users.username]');
                    $this->form_validation->set_rules('name',    'Имя', 'trim|required');
                    // $this->form_validation->set_rules('company', 'Компания', 'trim|required');
                    $this->form_validation->set_rules('phone',   'Телефон',  'trim|required');
                    $this->form_validation->set_rules('city',    'Город',    'trim|required');
                    // $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
                    $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[ci_users.email]|required');
                    $this->form_validation->set_rules('password', 'Пароль', 'trim|required|min_length[8]');
                    $this->form_validation->set_rules('confirm_password', 'Подтверждение пароля', 'trim|required|matches[password]');

                    if ($this->form_validation->run() == FALSE) {
                        $data['title'] = 'Регистрация';
                        $this->load->view('auth/company_register', $data);
                    }
                    else{
                        $data = array(
                                'name'       => $this->input->post('name'),
                                'company'    => $this->input->post('company'),
                                'city'       => $this->input->post('city'),
                                'role'       => 2,
                                'phone'      => $this->input->post('phone'),
                                // 'lastname' => $this->input->post('lastname'),
                                'username'   => $this->input->post('email'),
                                'email'      => $this->input->post('email'),
                                'password'   =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                                'is_active'  => 1,
                                'is_verify'  => 1,
                                'token'      => md5(rand(0,1000)),    
                                'last_ip'    => '',
                                'created_at' => date('Y-m-d : h:m:s'),
                                'updated_at' => date('Y-m-d : h:m:s'),
                                'is_free_medic_construct'  => $this->input->post('is_free_medic_construct'),
                                'is_free_medic_production' => $this->input->post('is_free_medic_production'),
                        );
                        
                        $data   = $this->security->xss_clean($data);
                        $result = $this->auth_model->company_register($data);
                        
                        if($result) {
//                            //sending welcome email to user
//                            $name = $data['firstname']; //.' '.$data['lastname'];
//                            $email_verification_link = base_url('auth/verify/').'/'.$data['token'];
//                            $body = $this->mailer->Tpl_Registration($name, $email_verification_link);
//                            
//                            $this->load->helper('email_helper');
//                            $to      = $data['email'];
//                            $subject = 'Активируйте ваш аккаунт';
//                            $message =  $body ;
//                            $email   = sendEmail($to, $subject, $message, $file = '' , $cc = '');
//                            $email   = true;
//                            if($email) {
//                                $this->session->set_flashdata('success', 'Ваш аккаунт создан. Пройдите верификацию, перейдя по ссылке из отправленного нами письма.');	
                            
                                $this->load->library("notifications");

                                $this->notifications->send(2,
                                    array(
                                        "[user_name]"  => $this->input->post('name'), 
                                        "[user_email]" => $this->input->post('email')
                                    )
                                );  
                                
                                if ($this->input->post('registration_type') === "manager") {
                                    redirect(base_url('/admin/premoderation/view/' . $this->input->post('order_id')));
                                } else {
                                    redirect(base_url('auth/login'));
                                }
//                            } else {
//                                echo 'Ошибка отсылки Email';
//                            }
                        } else {
                            $this->session->set_flashdata('warning', 'Невозможно зарегистрировать компанию. Обратитесь в службу поддержки.');
                            redirect(base_url('auth/company_register'));
                            exit();
                        }
                    }
		}
		else{
                    $data['title'] = 'Регистрация Исполнителя';
                    $this->load->view('auth/company_register', $data);
		}
	}

	public function engeneer_register(){
		if($this->input->post('submit')) {
		    
		    // for google recaptcha
                    if ($this->auth_model->check_recaptcha_status() == true) {
                        if (!$this->recaptcha_verify_request()) {
                            $this->session->set_flashdata('form_data', $this->input->post());
                            $this->session->set_flashdata('warning', 'reCaptcha Error');
                            redirect(base_url('auth/engeneer_register'));
                            exit();
                        }
                    }
            
                    // $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[ci_users.username]');
                    $this->form_validation->set_rules('name',    'Имя', 'trim|required');
                    $this->form_validation->set_rules('phone',   'Телефон',  'trim|required');
                    // $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
                    $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[ci_users.email]|required');
                    $this->form_validation->set_rules('password', 'Пароль', 'trim|required|min_length[8]');
                    $this->form_validation->set_rules('confirm_password', 'Подтверждение пароля', 'trim|required|matches[password]');

                    if ($this->form_validation->run() == FALSE) {
                        $data['title'] = 'Регистрация';
                        $this->load->view('auth/engeneer_register', $data);
                    }
                    else{
                        $data = array(
                                'name'       => $this->input->post('name'),
                                'company'    => $this->input->post('company'),
                                'role'       => 5,
                                'phone'      => $this->input->post('phone'),
                                // 'lastname' => $this->input->post('lastname'),
                                'username'   => $this->input->post('email'),
                                'email'      => $this->input->post('email'),
                                'password'   =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                                'is_active'  => 1,
                                'is_verify'  => 1,
                                'token'      => md5(rand(0,1000)),    
                                'last_ip'    => '',
                                'created_at' => date('Y-m-d : h:m:s'),
                                'updated_at' => date('Y-m-d : h:m:s'),
                                'is_free_medic_construct' => $this->input->post('is_free_medic_construct')
                        );
                        
                        $data   = $this->security->xss_clean($data);
                        $result = $this->auth_model->engeneer_register($data);
                        
                        if($result) {
//                            //sending welcome email to user
//                            $name = $data['firstname']; //.' '.$data['lastname'];
//                            $email_verification_link = base_url('auth/verify/').'/'.$data['token'];
//                            $body = $this->mailer->Tpl_Registration($name, $email_verification_link);
//                            
//                            $this->load->helper('email_helper');
//                            $to      = $data['email'];
//                            $subject = 'Активируйте ваш аккаунт';
//                            $message =  $body ;
//                            $email   = sendEmail($to, $subject, $message, $file = '' , $cc = '');
//                            $email   = true;
//                            if($email) {
//                                $this->session->set_flashdata('success', 'Ваш аккаунт создан. Пройдите верификацию, перейдя по ссылке из отправленного нами письма.');	
                                redirect(base_url('auth/login'));
//                            } else {
//                                echo 'Ошибка отсылки Email';
//                            }
                        } else {
                            $this->session->set_flashdata('warning', 'Невозможно зарегистрировать компанию. Обратитесь в службу поддержки.');
                            redirect(base_url('auth/engeneer_register'));
                            exit();
                        }
                    }
		} else {
                    $data['title'] = 'Регистрация Проектировщика';
                    $this->load->view('auth/engeneer_register', $data);
		}
	}
        
        public function pre_register(){
            if($this->input->post('submit')) {
                $phone = ($val = $this->input->post('phone')) ? $val : ''; 
                $email = ($val = $this->input->post('email')) ? $val : '';	

                if(!empty($email) or !empty($phone)){
                    $data = array( 'phone' => $phone
                                             , 'email' => $email
                                             , 'session_id' => $this->session->session_id
                                             , 'created_at' => date('Y-m-d : h:m:s')
                                             , 'ip' => $_SERVER['REMOTE_ADDR']);

                    $data   = $this->security->xss_clean($data);

                    $this->session->set_userdata('phone', $phone);
                    $this->session->set_userdata('email', $email);

                   
                    $result = $this->auth_model->pre_register($data);
                    echo "{'result':$result}";
                }
            }	
	}        
        
	//----------------------------------------------------------	
	public function verify(){
		$verification_id = $this->uri->segment(3);
		$result = $this->auth_model->email_verification($verification_id);
		if($result){
			$this->session->set_flashdata('success', 'Your email has been verified, you can now login.');	
			redirect(base_url('auth/login'));
		}
		else{
			$this->session->set_flashdata('success', 'The url is either invalid or you already have activated your account.');	
			redirect(base_url('auth/login'));
		}	
	}

	//--------------------------------------------------		
	public function forgot_password(){
		if($this->input->post('submit')){
		    
                        // for google recaptcha
                        if ($this->auth_model->check_recaptcha_status() == true) {
                            if (!$this->recaptcha_verify_request()) {
                                $this->session->set_flashdata('form_data', $this->input->post());
                                $this->session->set_flashdata('warning', 'reCaptcha Error');
                                redirect(base_url('auth/forgot_password'));
                                exit();
                            }
                        }
            
			//checking server side validation
			$this->form_validation->set_rules('email', 'Email', 'valid_email|trim|required');
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('auth/forget_password');
				return;
			}
                        
			$email = $this->input->post('email');
			$response = $this->auth_model->check_user_mail($email);
			if($response){
				$rand_no        = rand(0,1000);
				$pwd_reset_code = md5($rand_no.$response['id']);
				$this->auth_model->update_reset_code($pwd_reset_code, $response['id']);

				$reset_link = base_url('auth/reset-password/'.$pwd_reset_code);
				//$body = $this->mailer->Tpl_PwdResetLink($name, $reset_link);
                                $this->load->library("notifications");
                                $email = $this->notifications->send(10,
                                    array(
                                        "[user_name]"  => $response['name'],
                                        "[reset_link]" => $reset_link, 
                                        "[user_email]" => $response['email']
                                    )
                                );    
//
//				$this->load->helper('email_helper');
//				$to      = $email;
//				$subject = 'Восстановление пароля';
//				$message =  $body ;
//				$email   = sendEmail($to, $subject, $message, $file = '' , $cc = '');
				if($email){
					$this->session->set_flashdata('success', 'Мы отправили вам инструкции по восстановлению пароля');

					redirect(base_url('auth/forgot-password'));
				} else {
					$this->session->set_flashdata('error', 'Ошибка восстановления пароля');
					redirect(base_url('auth/forgot-password'));
				}
			}
			else{
				$this->session->set_flashdata('error', 'Ошибка заполнения поля Email');
				redirect(base_url('auth/forgot-password'));
			}
		}
		else{
			$data['title'] = 'Восстановить пароль';
			$this->load->view('auth/forget_password',$data);	
		}
	}

	//--------------------------------------------------		
	public function reset_password($id=0){
		// check the activation code in database
		if($this->input->post('submit')){
			$this->form_validation->set_rules('password', 'Пароль', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('confirm_password', 'Подтверждение пароля', 'trim|required|matches[password]');

			if ($this->form_validation->run() == FALSE) {
				$result = false;
				$data['reset_code'] = $id;
				$data['title'] = 'Сбросить пароль';
				$this->load->view('auth/reset_password',$data);
			}   
			else{
				$new_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
				$this->auth_model->reset_password($id, $new_password);
				$this->session->set_flashdata('success', 'Пароль обновлен. Войдите в платформу.');
				redirect(base_url('auth/login'));
			}
		}
		else{
			$result = $this->auth_model->check_password_reset_code($id);
			if($result){
				$data['reset_code'] = $id;
				$data['title'] = 'Сбросить пароль';
				$this->load->view('auth/reset_password',$data);
			}
			else{
				$this->session->set_flashdata('error', 'Код недействителен.');
				redirect(base_url('auth/forgot-password'));
			}
		}
	}

	//-------------------------------------------------------------------------
	public function profile(){
		if($this->input->post('submit')){
			$data = array(
				'username' => $this->input->post('username'),
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
				'mobile_no' => $this->input->post('mobile_no'),
				'updated_at' => date('Y-m-d : h:m:s'),
			);
			$data = $this->security->xss_clean($data);
			$result = $this->auth_model->update_admin($data);
			if($result){

				// Add User Activity
				$this->activity_model->add(6);

				$this->session->set_flashdata('msg', 'Profile has been Updated Successfully!');
				redirect(base_url('auth/profile'), 'refresh');
			}
		}
		else{
			$data['admin'] = $this->auth_model->get_admin_detail();
			$data['title'] = 'User Profile';
			$data['view'] = 'auth/profile';
			$this->load->view('layout', $data);
		}
	}
	//-------------------------------------------------------------------------
	public function change_pwd(){
            $id = $this->session->userdata('admin_id');
            if($this->input->post('submit')) {
                    
                $this->form_validation->set_rules('password', 'Password', 'trim|required');
                $this->form_validation->set_rules('confirm_pwd', 'Confirm Password', 'trim|required|matches[password]');

                if ($this->form_validation->run() == FALSE) {
                    $data['admin'] = $this->auth_model->get_admin_detail();
                    $data['view'] = 'auth/profile';
                    $this->load->view('layout', $data);
                } else {
                    $data = array(
                            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
                    );
                    $data = $this->security->xss_clean($data);
                    $result = $this->auth_model->change_pwd($data, $id);
                    if($result) {
                        // Add User Activity
                        $this->activity_model->add(7);

                        $this->session->set_flashdata('msg', 'Пароль изменен!');
                        redirect(base_url('auth/profile'));
                    }
                }
            } else {
                $data['title'] = 'Смена пароля';
                $data['view'] = 'auth/change_pwd';
                
                $this->load->view('layout', $data);
            }
	}
	//-------------------------------------------------------------------------
	public function logout(){
            // Add User Activity
            $this->activity_model->add(5);

            $this->session->sess_destroy();
            
            redirect(base_url('auth/login'), 'refresh');
	}
	
	//verify recaptcha
    public function recaptcha_verify_request()
    {
        $recaptcha = $this->input->post('g-recaptcha-response');
        if (!empty($recaptcha)) {
            $response = $this->recaptcha->verifyResponse($recaptcha);
            if (isset($response['success']) && $response['success'] === true) {
                return true;
            }
        }
        return false;
    }

    public function check_email() {
        $result = $this->auth_model->check_user_mail($this->input->post('email'));
        
        echo json_encode(array("exists" => !$result ? false : true));
    }

    public function check_user() {
        $data = array(
            'email'    => $this->input->post('email'),
            'password' => $this->input->post('password')
        );

        $data   = $this->security->xss_clean($data);
        $result = $this->auth_model->login($data);

        echo json_encode(array("success" => $result));
    }
    
}  // end class


?>