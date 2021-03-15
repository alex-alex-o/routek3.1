<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Premoderation extends MY_Controller {
    public function __construct() {
            parent::__construct();
            
            $this->load->model('company/machine_model',  'machine_model');
            $this->load->model('company/material_model', 'material_model');
            $this->load->model('company/finishes_model', 'finishes_model');
            $this->load->model('company/color_model',    'color_model');
            $this->load->model('admin/company_model',    'company_model');
            $this->load->model('admin/order_model',      'order_model');
            $this->load->model('offer_model',            'offer_model');
            $this->load->model('user/user_model',        'user_model');
            $this->load->model('activity_model',         'activity_model');
            $this->load->model('shipping_model',         'shipping_model');
            
            //$this->load->library('datatable'); // loaded my custom serverside datatable library
    }

    //-----------------------------------------------------------------------
    public function index($statusID = null) {
        $data['view']   = 'admin/premoderation/index';
        $data['orders'] = $this->order_model->get_orders($statusID);

        $this->load->view('layout', $data);
    }

    public function view($id) {
        $data['view']     = 'admin/premoderation/view';
        $data['order']    = $this->order_model->get_order($id);
        $data['offers']   = $this->order_model->get_order_offers($id);
        $data['user']     = $this->user_model->get_user_detail($data['order']['user_id']);
        $data['shipping'] = $this->shipping_model->get_by_id($data['order']['shipping_info_id']);
        $data['cost']     = $this->order_model->get_cost($data['order']['material_id'], $data['order']['volume']);
        
        $data['selectedOfferID'] = null;
        
        if (empty($data['offers'])) {
            $this->order_model->create_empty_offers($id);
            $data['offers'] = $this->order_model->get_order_offers($id);
        } else {
            foreach($data['offers'] as $offer) {
                if ($offer["is_selected"]) {
                    $data['selectedOfferID'] = $offer["id"];
                    break;
                }
            }
        }
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
        $data['companies']  = $this->company_model->get_all();
        $data['machines']   = $this->machine_model->get_machines();
        $data['materials']  = $this->material_model->get_materials();
        $data['finishes']   = $this->finishes_model->get_all();
        $data['colors']     = $this->color_model->get_colors();

        $this->load->view('layout', $data);
    }
    
    public function save_offer() {
        $this->order_model->save_offer();
    }
    
    public function select_offer() {
        $this->order_model->select_offer();        
    }
    
    public function company_select($id) {
        if($this->input->post('submit')) {
            $this->approveOffer($id, $this->input->post("company"));
        } else {
            $data['view']       = 'admin/premoderation/company_select';
            $data['companies']  = $this->company_model->get_all();
            $data['id']         = $id;
            $this->load->view('layout', $data);
        }
    }
    
    public function approve($id) {
        $this->approveOffer($id, null);
    }
    
    private function approveOffer($id, $selectedCompanies = null) {
        $this->order_model->approve($id);

        $this->load->library("notifications");
        $companies = $this->offer_model->send_to_companies($id, $selectedCompanies);
        foreach($companies as $company) {                        
            $this->notifications->send(5, $company);
        }        
        redirect("/admin/premoderation/index");        
    }
}
?>