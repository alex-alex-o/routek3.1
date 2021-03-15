<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Shipping extends UR_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->model('order_model',    'order_model');
        $this->load->model('shipping_model', 'shipping_model');
            
    }

    //-----------------------------------------------------------------------
    public function index($publicID) {
        if (empty($publicID)) {
            show_404();
        }

        if (!empty($_POST)) {
            $this->order_model->save_shipping_info($publicID, $this->input->post('shipping_info_id'));

            // $order = $this->order_model->get_by_id($publicID);
            
//            $this->load->library("notifications");
//            $this->notifications->send(6,
//                array(
//                    "[order_id]"   => $order["id"],
//                    "[order_url]"  => base_url() . "user/offers/"
//                    //"[user_name]"  => $data['name'], 
//                    //"[user_email]" => $data['email']
//                )
//            ); 
                                
            redirect("user/offers");
        }
        
        $userID            = $this->session->userdata('user_id');
        $data["view"]      = "user/shipping";
        $data["shippings"] = $this->shipping_model->get_by_user($userID);
        $data["publicID"]  = $publicID;
        
        
        $this->load->view("user/shipping", $data);
    }
    
    public function add($publicID) {
        $this->shipping_model->add($this->session->userdata('user_id'));
        redirect("user/shipping/$publicID");
    }
    
}
?>