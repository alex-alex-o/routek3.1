<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends MY_Controller {
    public function __construct() {
            parent::__construct();
            
            $this->load->model('company/machine_model',  'machine_model');
            $this->load->model('company/material_model', 'material_model');
            $this->load->model('company/finishes_model', 'finishes_model');
            $this->load->model('company/color_model',    'color_model');            
            $this->load->model('order_model',       'order_model');
            $this->load->model('activity_model',         'activity_model');
            $this->load->model('status_model',           'status_model');
            $this->load->model('payment_model',          'payment_model');
            $this->load->model('orderType_model',        'orderType_model');
            
            $this->load->library('datatable'); // loaded my custom serverside datatable library
    }

    //-----------------------------------------------------------------------
    public function index($actuality = null, $typeID = 2) {
        $actualities = array(
           "1"   => "Текущие",
           "2" => "Архивные",
           "0" => "Все" 
        );

        $data['typeID']       = $typeID;
        $data['orderTypes']   = $this->orderType_model->get_all(); 
        $data['actualOrders'] = $this->order_model->get_all_orders($actuality, $typeID, true);
        $data['actuality']    = $actuality;
        $data['actualities']  = $actualities;

        $data['view']      = 'company/orders/index';
        $this->load->view('layout', $data);
    }
    
    public function view($publicID) {
        $data['view']       = 'company/orders/details';
        $data['order']      = $this->order_model->get_order_by_id($publicID);
        if (!$data['order']) {
            redirect("company/orders/index");
        }
        $files              = $this->order_model->get_order_files($data['order']['id']);
        $data['files']      = $files;
        
        $data['documents']  = null;
        $data['models']     = null;
        $data['images']     = null;
        foreach($files as $file) {
            $info = pathinfo($file["file_name"]);
            switch (strtolower($info['extension'])) {
                case "stl":
                case "obj":
                case "3ds":
                    $data['models'][] = $file;
                    break;
                case "jpg":
                case "jpeg":
                case "png":
                case "tiff":
                case "gif":
                case "bmp":
                    $data['images'][] = $file;
                    break;
                case "pdf":
                    $data['documents'][]  = $file;
                break;
            }
        }
        $data['machines']  = $this->machine_model->get_machines();
        $data['materials'] = $this->material_model->get_materials();
        $data['finishes']  = $this->finishes_model->get_all();
        $data['colors']    = $this->color_model->get_colors();
        //$data['offers']    = $this->order_model->get_order_offers($id);
        $data['statuses']  = $this->status_model->get_all($data['order']['order_type_id']);
        
        $this->load->view('layout', $data);
    }
    
    
    public function complete($id) {
        $this->order_model->change_status($id);
        
        redirect("/company/orders/view/$id");
    }
}
?>