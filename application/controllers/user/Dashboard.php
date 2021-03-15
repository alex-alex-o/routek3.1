<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends UR_Controller {
    public function __construct(){
       
        parent::__construct();
        $this->load->model('user/dashboard_model', 'dashboard_model');
        $this->load->model('user/order_model',     'order_model');
        $this->load->model('company/machine_model',  'machine_model');
        $this->load->model('company/material_model', 'material_model');
        
    }

    public function index(){
        $data['title']        = 'Onboarding';
        $data['view']         = 'user/dashboard/index';
        //$data['features']     = $this->dashboard_model->get_features();
        // $data['materials']    = $this->material_model->get_materials();
        //$data['technologies'] = $this->machine_model->get_machines(true);
        $data['cards']     = $this->dashboard_model->get_cards();
        
        $this->load->view('layout', $data);
    }
    
    
    public function ajax_showed() {
        $this->dashboard_model->hide_panel();
    }
}
?>