<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends UR_Controller {
    public function __construct() {
            parent::__construct();
            
            $this->load->model('company/machine_model',  'machine_model');
            $this->load->model('company/material_model', 'material_model');
            $this->load->model('company/finishes_model', 'finishes_model');
            $this->load->model('company/color_model',    'color_model');            
            $this->load->model('user/order_model',       'order_model');
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

        $data['view']      = 'user/orders/index';
        $this->load->view('layout', $data);
    }

    public function view($publicID = null) {
        $data['view']       = 'user/orders/details';
        $data['order']      = $this->order_model->get_order($publicID);
        if (!$data['order'] || empty($publicID)) {
            redirect("user/orders/index");
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
    
    //-----------------------------------------------------------------------
//    public function datatable_json($statusID = null){				   					   
//        $records = $this->order_model->get_all_orders($statusID);
//        $data    = array();
//
//        if (!$records['data']){
//            echo json_encode(null);
//            return;
//        }
//        
//        foreach ($records['data']  as $row)
//        {  
//            $data[]= array(
//                $row['name'],
//                $row['quantity'],
//                $row['status'],
//                $row['created_at'],
//                '<a title = "Просмотр" class = "view btn btn-sm btn-info" href="'.base_url('user/orders/view/'.$row['id']).'"> <i class="material-icons">visibility</i></a>',
//            );
//        }
//        
//        $records['data'] = $data;
//        echo json_encode($records);
//    }
    
    public function pay($id) {
        $currency = "RUB";
        $settings = get_general_settings();
        
        $this->load->library('payment');
        
        $order = $this->order_model->get_order($id);
        
        // Установка данных для доступа к платежной системе
        $this->payment->setCredentials(
            $settings["yandex_token"], 
            $settings["yandex_store_id"],
            $settings["yandex_return_url"]
        );
        
        // Количество попыток совершить платеж
        $attemps = 0;
        
        // Отправить данные и полчить объект платежа
        $payment = $this->payment->createPayment($id, 
                $order["cost"], 
                $currency,
                "Оплата заказа"
        );

        if (isset($payment->type) && $payment->type == "error") {
            redirect(base_url('user/offers/index'));
        }
        
        if ($payment->status == "canceled") {
            $storedPayment = $this->payment_model->get_details($payment->id);
            
            if ($storedPayment && $storedPayment["status"] != "succeeded") {
                $attemps = (isset($storedPayment["attemps"]) ? $storedPayment["attemps"] : 0)  + 1;
                $payment = $this->payment->createPayment($id, 
                        $order["cost"], 
                        $currency,
                        "Оплата заказа",
                        $attemps
                );
            }
        }
        
        // Сохранение данных платежа
        if (isset($payment)) {
            $this->payment_model->create(
                $payment->id, 
                $id, 
                $order["cost"], 
                $currency, 
                $payment->status,
                $attemps
            );
        }
        
        // Переход на сайт платежной системы для совершения платежа
        $this->payment->pay();
    }
    
//    public function select_offer($id) {
//        $orderID = $this->order_model->select_offer($id);
//        if ($orderID) {
//            redirect(base_url('user/orders/pay/' . $orderID));
//        }
//    }
		
}
?>