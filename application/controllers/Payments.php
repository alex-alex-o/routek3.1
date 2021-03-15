<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Payments extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('user/order_model', 'order_model');
        $this->load->model('payment_model',    'payment_model');
    }
    
    public function yandex() {
        // Webhook от Яндекс.Кассы
        $response = json_decode(trim(file_get_contents('php://input')), true);
        
        // Завершить платеж (обновить окончательный статус в БД) 
        $this->payment_model->close(
            $response["object"]["id"], 
            $response["object"]["status"]
        );
        
        // Если платеж успешен, то меняем статус заказа
        if ($response["object"]["status"] == "succeeded") {
            $payment = $this->payment_model->get_details($response["object"]["id"]);
            $this->order_model->save_as_payed($payment["order_id"], 6);
        }
    }
}
?>