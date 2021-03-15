<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Offers extends MY_Controller {
    public function __construct() {
            parent::__construct();
            
            $this->load->model('engeneer/order_model', 'order_model');
            $this->load->model('engeneer/offer_model', 'offer_model');
            $this->load->model('user/user_model',  'user_model');
            $this->load->model('activity_model',   'activity_model');
            $this->load->model('status_model',     'status_model');
            
            $this->load->library('datatable'); // loaded my custom serverside datatable library
    }

    //-----------------------------------------------------------------------
    public function index() {
        $data['view']     = 'engeneer/offers/index';
        $data['statuses'] = $this->status_model->get_all(2);
        $data['orders']   = $this->offer_model->get_all_offers();
        
        $this->load->view('layout', $data);
    }

    public function view($id) {
        $data['view']     = 'engeneer/offers/view';
        $offer = $this->offer_model->get_offer($id);
        $data['offer'] = $offer;
        $files         = $this->order_model->get_order_files($offer["id"]);
                
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

        
        $this->load->view('layout', $data);
    }    
    
    public function send_to_user($id) {
        $this->offer_model->send_to_user($id);
        redirect("engeneer/offers/view/$id");
    }
}
?>