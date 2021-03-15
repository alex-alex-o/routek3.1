<?php
class Actions_logger
{
	
	 protected $CI;
	
	public function __construct(){
		$this->CI =&get_instance();
				//$CI->load->library('session');
		$this->save();
		//echo 'start Logger';
		
	}
	
	
	public function save($data = null){
		//$this->load->library('session');
		
		//$this->CI->load->helper('url');
		$this->CI->load->library('session');
		var_dump($this->CI->session->userdata());

			
	
	}
	
	

	
	
}