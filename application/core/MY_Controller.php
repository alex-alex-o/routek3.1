<?php
class PB_Controller extends CI_Controller
{
	function __construct()
	{
            parent::__construct();

            $global_data['general_settings'] = $this->setting_model->get_general_settings();
            $this->general_settings = $global_data['general_settings'];
            date_default_timezone_set($this->general_settings['timezone']);
            
            $this->load->view('home/counter');
	}
}

class MY_Controller extends CI_Controller
{
	function __construct()
	{
            parent::__construct();
            
//            if(!$this->session->has_userdata('is_admin_login'))
//            {
//                    redirect('auth/login');
//            }

            if(!$this->session->has_userdata('role') || $this->session->userdata('role') != 2 && $this->session->userdata('role') != 5 && $this->session->userdata('role') != 1)
            {
                $this->session->set_userdata('initial_url', current_url());
                //$this->session->set_userdata(array("initial_url" => current_url()));
                
                redirect('auth/login');
            }

		//general settings
            $global_data['general_settings'] = $this->setting_model->get_general_settings();
            $this->general_settings = $global_data['general_settings'];

            //set timezone
            date_default_timezone_set($this->general_settings['timezone']);
            
            $this->load->view('home/counter');
	}
}

class UR_Controller extends CI_Controller
{
	function __construct()
	{
            parent::__construct();
            if(!$this->session->has_userdata('role') 
                    || $this->session->userdata('role') != 3
            ) {
                $this->session->set_userdata('initial_url', current_url());
                         
                redirect('auth/login');
            }

            //general settings
            $global_data['general_settings'] = $this->setting_model->get_general_settings();
            $this->general_settings = $global_data['general_settings'];
            
            //set timezone
            date_default_timezone_set($this->general_settings['timezone']);
	}
}

?>