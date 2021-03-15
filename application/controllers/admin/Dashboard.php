<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends MY_Controller {
    public function __construct(){
        parent::__construct();
        
        $this->load->model('admin/dashboard_model', 'dashboard_model');
    }

    public function index() {
        $data['title'] = 'Dashboard';
        $data['view']  = 'admin/dashboard/index';
        
        $data['companies_count'] = $this->dashboard_model->get_all_companies();
        $data['users_count']     = $this->dashboard_model->get_all_users();
        $data['orders_count']    = $this->dashboard_model->get_all_orders();
        // $data['completed_count'] = $this->order_model->get_company_orders_count(7);
        
        $this->load->view('layout', $data);
    }
}
?>