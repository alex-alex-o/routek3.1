<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Test extends PB_Controller {
	
	public function home(){
		
		//$this->load->library('session');
		//var_dump($this->session->userdata());
		$this->load->library('Actions_logger');
		
		die('test');
	}
	
	
	}