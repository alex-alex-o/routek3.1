<?php
class Common 
{	
	private $ci;
	
	public function __construct()
	{
		$this->ci=& get_instance();
		$this->ci->load->database();
	}
	//--------------------------------------------
	
	public function get_status_system(){
		
		
		$this->ci->db->where('tag', 'status');
        $query = $this->ci->db->get('ci_system');
        
        if(empty($query))
        	return false; // error
        
			if($query->row()->val == 'production')
				return true;
		
		return false; 
		
	}
	
		
}
?>