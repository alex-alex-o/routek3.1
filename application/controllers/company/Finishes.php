<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Finishes extends MY_Controller {
    public function __construct() {
            parent::__construct();
            $this->load->model('company/finishes_model', 'finishes_model');
            $this->load->model('company/company_model', 'company_model');
    }

    //-----------------------------------------------------------------------
    public function index() {
        $data['view']     = 'company/finishes';
        
        $data['finishes'] = $this->finishes_model->get_finishes($this->session->userdata("company_id"));
        $this->load->view('layout', $data);
    }
    
    public function save_company_finish() {
        $this->finishes_model->save_company_finish();
    }
}
?>