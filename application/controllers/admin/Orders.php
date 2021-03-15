<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends MY_Controller {
    public function __construct() {
            parent::__construct();
            
            $this->load->model('company/machine_model',  'machine_model');
            $this->load->model('company/material_model', 'material_model');
            $this->load->model('company/finishes_model', 'finishes_model');
            $this->load->model('company/color_model',    'color_model');            
            $this->load->model('admin/order_model',    'order_model');
            $this->load->model('user/user_model',     'user_model');
            $this->load->model('status_model',           'status_model');
            $this->load->model('activity_model',      'activity_model');
            
            $this->load->library('datatable'); // loaded my custom serverside datatable library
    }

    //-----------------------------------------------------------------------
    public function index($statusID = null) {
        $data['orders']   = $this->order_model->get_all_offers();
        $data['statuses'] = $this->status_model->get_all(1);
        $data['view']      = 'admin/orders/index';
        $data['status_id'] = $statusID;
        
        $this->load->view('layout', $data);
    }

    public function view($id) {
        $data['view']       = 'admin/orders/order_view';
        $data['order']      = $this->order_model->get_order($id);
        $data['statuses']   = $this->order_model->get_company_statuses();
        //$data['statuses']   = $this->order_model->get_user();
        
        $files              = $this->order_model->get_order_files($id);
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
        $data['machines']   = $this->machine_model->get_machines();
        $data['materials']  = $this->material_model->get_materials();
        $data['finishes']   = $this->finishes_model->get_all();
        $data['colors']     = $this->color_model->get_colors();

        $this->load->view('layout', $data);
    }
    
    //-----------------------------------------------------------------------
    public function datatable_json(){				   					   
        $records = $this->order_model->get_all_offers();
        $data    = array();

        if (!$records['data']){
            echo json_encode(null);
            return;
        }
        
        foreach ($records['data']  as $row)
        {  
            $data[]= array(
                $row['name'],
                $row['quantity'],
                $row['status'],
                $row['created_at'],
                '
                <a title  = "Просмотр"  class = "view btn btn-sm btn-info" href="'.base_url('admin/orders/view/'.$row['id']).'"> <i class="material-icons">visibility</i></a>
                ',
            );
        }
        
        $records['data'] = $data;
        echo json_encode($records);
    }
    
    public function change_status($id) {
        $this->order_model->change_status($id);
        
        redirect("/admin/orders/view/$id");
    }
}
?>