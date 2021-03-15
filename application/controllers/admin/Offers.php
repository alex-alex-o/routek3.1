<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Offers extends MY_Controller {
    public function __construct() {
            parent::__construct();
            
            $this->load->model('admin/machine_model',  'machine_model');
            $this->load->model('admin/material_model', 'material_model');
            $this->load->model('admin/finishes_model', 'finishes_model');
            $this->load->model('admin/color_model',    'color_model');            
            $this->load->model('user/order_model',     'order_model');
            $this->load->model('offer_model',          'offer_model');
            $this->load->model('activity_model',       'activity_model');
            
            $this->load->library('datatable'); // loaded my custom serverside datatable library
    }

    //-----------------------------------------------------------------------
    public function index($statusID = null) {
        $data['view']      = 'admin/offers/offer_list';
        
        $this->load->view('layout', $data);
    }

    public function view($id) {
        $data['view']       = 'admin/offers/offer_view';
        $offer              = $this->offer_model->get_offer($id);
        $data['offer']      = $offer;
        $data['order']      = $this->order_model->get_order($offer["order_item_id"]);
        $files              = $this->order_model->get_order_files($offer["order_item_id"]);
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
    public function datatable_json($companyID){				   					   
        $records = $this->offer_model->get_company_offers($companyID);
        $data    = array();

        if (!$records['data']){
            echo json_encode(null);
            return;
        }
        
        foreach ($records['data']  as $row)
        {  
            $status = "";
            if ($row['answered_by_company']) {
                $status = '<span class="label bg-orange">Предложение отправлено</span>';
            }
            
            if ($row['commited_by_user']) {
                $status = '<span class="label bg-orange">Принято заказчиком</span>';
            }
            
            $row["status"] = $status;
            $data[]= array(
                $row['name'],
                $row['created_at'],
                $row["status"],
                '
                <a title  = "Просмотр"       class = "view btn btn-sm btn-info"     href="'.base_url('admin/offers/view/'.$row['id']).'"> <i class="material-icons">visibility</i></a>
                ',
            );
        }
        
        $records['data'] = $data;
        echo json_encode($records);
    }
    
    public function send_to_user($id) {
        $this->offer_model->send_to_user($id);
        redirect("admin/offers/view/$id");
    }
}
?>