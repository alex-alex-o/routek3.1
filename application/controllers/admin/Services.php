<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends MY_Controller {
    public function __construct() {
            parent::__construct();
            $this->load->model('admin/services_model', 'services_model');
            $this->load->model('admin/company_model', 'company_model');
    }

    //-----------------------------------------------------------------------
    public function index() {
        $data['view']     = 'admin/services';
        
        $data['services'] = $this->services_model->get_services($this->session->userdata("company_id"));
        $this->load->view('layout', $data);
    }
    
    public function save_company_service() {
        $this->services_model->save_company_service();
    }
}
?>