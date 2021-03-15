<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Order extends MY_Controller {
    public function __construct(){
        parent::__construct();
        
        $this->load->model('admin/machine_model', 'machine_model');
        $this->load->model('admin/material_model', 'material_model');
        $this->load->model('admin/finishes_model', 'finishes_model');
        $this->load->model('admin/color_model', 'color_model');
        $this->load->model('admin/user_model', 'user_model');
        $this->load->model('admin/order_model', 'order_model');
    }
    
    //-------------------------------------------------------------------------
    public function index() {
         // var_dump($this->session->session_id);
                 
        $data['title']     = 'Заказы';
        $data['machines']  = $this->machine_model->get_machines();
        $data['materials'] = $this->material_model->get_materials();
        $data['finishes']  = $this->finishes_model->get_all();
        $data['colors']    = $this->color_model->get_colors();
        
        $this->load->view('home/index', $data);
    }
    
    public function save() {
        if ($this->input->post('submit')) {
            if ($this->session->has_userdata('user_id')) {
                // $this->user_model->add_user();
            } else if (isset($this->session->session_id)) {
                // $this->user_model->save_customer();
                //if ($this->user_model->save_customer()) {
                    
                //}
            }
            
            //$this->order_model->save();
        }
    }
    
    public function upload() {
        $target_dir = "/var/www/html/uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$_FILES['file']['name'])) {
           $status = 1;
        }
        echo "<h1>test</h1>";
        //echo '{"result" : "OK"}';
    }
    
    public function get_cost() {
        $result = $this->material_model->get_cost();
        if (isset($result["cost"])) {
            echo json_encode(array("cost" => $result["cost"]));
        } else {
            echo json_encode(array("cost" => 0));
        }
    }
}


?>