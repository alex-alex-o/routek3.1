<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends MY_Controller {
    public function __construct(){
        parent::__construct();
        
        $this->load->model('user/order_model', 'order_model');
    }

    public function index() {
        $data['title'] = 'Dashboard';
        $data['view']  = 'company/dashboard/index';
        $data['order_count']     = $this->order_model->get_company_orders_count();
        $data['offers_count']    = $this->order_model->get_company_offers_count();
        $data['progress_count']  = $this->order_model->get_company_orders_count(6);
        $data['completed_count'] = $this->order_model->get_company_orders_count(7);
        
        $this->load->view('layout', $data);
    }
}
?>