<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends PB_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->model('company/machine_model',  'machine_model');
        $this->load->model('company/material_model', 'material_model');
        $this->load->model('company/finishes_model', 'finishes_model');
        $this->load->model('company/color_model',    'color_model');
        $this->load->model('user/user_model',      'user_model');
        $this->load->model('admin/admin_model',      'admin_model');
        $this->load->model('order_model',          'order_model');
        $this->load->model('shipping_model',       'shipping_model');
        $this->load->model('offer_model',          'offer_model');
        $this->load->model('library_model',        'library_model');
        $this->load->model('quality_model',        'quality_model');
        $this->load->model('payment_model',  'payment_model');        
        $this->load->model('auth_model',  'auth_model');        
        $this->load->model('company/company_model', 'company_model');
    }
    
    //-------------------------------------------------------------------------
    public function index ($orderTypeID = 2, $errorTypeID = null) {
        if(!empty($_POST)) {
            $userID = $this->session->userdata('user_id');
            if ($userID) {
                $publicID = $this->order_model->add($userID, $orderTypeID);
                // redirect('home/order/' . $publicID);
            } else {
                $publicID = $this->order_model->add(null, $orderTypeID);
                // redirect('home/order');
            }
            
            if ($orderTypeID == 1) {
                redirect("user/offers/index");
            } else {
                redirect("home/order/$publicID");
            }
        }
        
        $data['acceptFiles'] = ".stl,.obj";
        if ($orderTypeID == 1) {
            $data['acceptFiles'] = ".jpg,.jpeg,.gif,.png,.pdf,.doc,.docx,.txt";
        }
        
        $this->load->library("utils");
        $data['maxFileSize']  = $this->utils->fileUploadMaxSize();
        
        $data['orderTypeID']  = $orderTypeID;
        $data['technologies'] = $this->machine_model->get_machines();
        if ($errorTypeID == 1) {
            $data['error'] = true;
        }
        $this->load->view('home/index', $data);            
    }
    
    public function order($publicID = null) {
        $this->session->set_userdata('initial_url', current_url());
        
        if(!empty($_POST)) {
            $userID = $this->session->userdata('user_id');
            if ($userID) {
                // $shippingInfoID = $this->shipping_model->add($userID);
                // $this->order_model->save($userID, $shippingInfoID);
                // $this->order_model->save($userID);
            } else {
                $pass = $this->auth_model->generateStrongPassword(9, false, 'luds');
                $data = array(
                    'name'       => $this->input->post('name'),
                    'username'   => $this->input->post('email'),
                    'company'    => $this->input->post('name'),
                    'phone'      => $this->input->post('phone'),
                    'email'      => $this->input->post('email'),
                    'role'       => 3,
                    'password'   => password_hash($pass, PASSWORD_BCRYPT),
                    'is_active'  => $this->input->post('registerme') ? 1 : 0,
                    'is_verify'  => 1,
                    'token'      => md5(rand(0,1000)),    
                    'last_ip'    => '',
                    'session_id' => $this->session->session_id,
                    'created_at' => date('Y-m-d : h:m:s'),
                    'updated_at' => date('Y-m-d : h:m:s'),
                    'ip'         => $_SERVER['REMOTE_ADDR']
                );
                
                $data   = $this->security->xss_clean($data);
                $result = $this->auth_model->register($data);
                
                // Если пользователь автоматически зарегистирован
                if (!$result){
                    show_404();
                } else {
                    // Обновляем заказ
                    $company = $this->company_model->get_user_company($result);

                    $data = array(
                        'name'    => $this->input->post('name'), 
                        'user_id' => $result,
                        'email'   => $this->input->post('email'),
                        'role'    => 3
                    );
                    
                    if ($company) {
                        $data['company_id']   = $company['id'];
                        $data['company_name'] = $company['name'];
                        $data['company_logo'] = $company['logo'];
                    }
                    
                    $this->session->set_userdata($data);                    
                    $this->order_model->save_deferred();
                }
                
                $shippingInfoID = $this->shipping_model->add();
                $this->order_model->save_shipping_info($publicID, $shippingInfoID);
                
                if (!$this->input->post('registerme')) {
                    redirect("home/welcome");
                } else {
                    $order = $this->order_model->get_order_by_id($publicID);
                    
                    // Отправить письмо с паролем
                    $this->load->library("notifications");
                    $this->notifications->send(12,
                        array(
                            "[order_id]"   => $order["name"],
                            "[order_url]"  => base_url() . "user/offers/",
                            "[user_name]"  => $data['name'], 
                            "[user_email]" => $data['email'],
                            "[pass]"       => $pass
                        )
                    );
                                    

                    // Редирект на страницу заказов
                    redirect("user/offers/index");                    
                }
                
            }
        }
        
        $data['title']         = 'Главная';
        $data['technologies']  = $this->machine_model->get_machines();
        $data['materials']     = $this->material_model->get_materials();
        $data['finishes']      = $this->finishes_model->get_all();
        $data['colors']        = $this->color_model->get_colors();
        $data['qualities']     = $this->quality_model->get_all();
        $data['publicID']      = $publicID;
    
        $userID = $this->session->userdata('user_id');
        if ($userID) {
            $order = $this->order_model->get_order_by_id($publicID);
            $data['shippings']  = $this->shipping_model->get_by_user($userID);
        } else {
            //$order = $this->order_model->get_deffered_orders($this->session->session_id);
            $order = $this->order_model->get_deffered_order($this->session->session_id);
//            if ($order["shipping_info_id"]) {
//                $data['shippingInfo']  = $this->shipping_model->get_by_id($order["shipping_info_id"]);
//            }
        }
        
        if (empty($order)) {
            redirect("/home/index");
        }
        
        $data['order'] = $order;

        $url = '';
        $files    = $this->order_model->get_order_files($order["id"]);        
        foreach($files as $model) {
            $url = base_url() . $model["path"] . '/' . $model['file_name']; 
            break;
        }
        $data['firstModelUrl'] = $url;
        $data['phone']         = ($val = $this->session->userdata('phone'))? $val :'';
        $data['email']         = ($val = $this->session->userdata('email'))? $val :'';        
        
        $this->load->view('home/order', $data);
        
    }
    
    public function helper() {
        $data = array();
        
        if(!empty($_POST)) {
            redirect('home/order');
        }

        $this->load->view('home/helper', $data);
    }
    
    public function signin() {
        $data['title']     = 'Войти';

        $this->load->view('home/signin', $data);
    }
    
    public function get_cost() {
        $result = $this->material_model->get_cost();
        if (isset($result["cost"])) {
            echo json_encode(array("cost" => $result["cost"]));
        } else {
            echo json_encode(array("cost" => 0));
        }
    }
    
  
    public function delivery() {
        $this->load->library('delivery');
        
        $this->delivery->setCredentials(
                "9F91D987-BD41-4E27-88C6-273BFD5C448C", 
                "artem@routek.tech",
                "Routek12345"
        );
        
        var_dump($this->delivery->getSessionID());
        
    }
    
    public function welcome() {
        $data['title']     = 'Спасибо за заказ!';

        $this->load->view('home/welcome', $data);        
    }
}


?>