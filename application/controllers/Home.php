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
        $this->load->model('helper_model', 'helper_model');
        
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
            
            if ($this->input->post("helper")) {
                redirect("home/helper/$publicID/1");
            } else {
                // Если заказ инженерных работ
                if ($orderTypeID == 1) {
                    redirect("user/offers/index");
                } else {
                    redirect("home/order/$publicID");
                }
            }
        }
        
        $data['acceptFiles'] = ".stl,.obj";
        // Если заказ инженерных работ
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
        
        $data['phone'] = ($val = $this->session->userdata('phone'))? $val :'';
        $data['email'] = ($val = $this->session->userdata('email'))? $val :'';        
        
        $this->load->view('home/index', $data);            
    }
    
    public function order($publicID = null) {
        $this->session->set_userdata('initial_url', current_url());
        $userID = $this->session->userdata('user_id');

        if(!empty($_POST) && !$userID) {
            
//            $this->session->set_flashdata('terms', $this->input->post());
//            $this->session->set_flashdata('warning', 'reCaptcha Error');
            
//            if (!$this->input->post('terms')) {
//                redirect("home/order/$publicID/show_her");
//            }
                
            // Авторегистрация пользователя
            $userID = $this->_createUserAccount();
            $this->_setUserSessionParams($userID);

            // Проставление user_id по session_id в заказе 
            // для неавторизованного пользователя 
            $this->order_model->save_deferred();

            // Добавление адреса доставки и привязка к заказу
            $shippingInfoID = $this->shipping_model->add();
            $this->order_model->save_shipping_info($publicID, $shippingInfoID);

            $order = $this->order_model->get_order_by_id($publicID);

//            $this->notify("user_create");
            // Отправить письмо с паролем
//            $this->load->library("notifications");
//            $this->notifications->send(12,
//                array(
//                    "[order_id]"   => $order["name"],
//                    "[order_url]"  => base_url() . "user/offers/",
//                    "[user_name]"  => $data['name'], 
//                    "[user_email]" => $data['email'],
//                    "[pass]"       => $pass
//                )
//            );

            // Редирект на welcome
            redirect("home/welcome");
        }
        
        $data['title']        = 'Заказ';
        $data['publicID']     = $publicID;
        $data['technologies'] = $this->machine_model->get_machines();
        $data['materials']    = $this->material_model->get_materials();
        $data['finishes']     = $this->finishes_model->get_all();
        $data['colors']       = $this->color_model->get_colors();
        $data['qualities']    = $this->quality_model->get_all();
        $data['phone']        = ($val = $this->session->userdata('phone'))? $val :'';
        $data['email']        = ($val = $this->session->userdata('email'))? $val :'';
        
        if ($userID) {
            $data['shippings'] = $this->shipping_model->get_by_user($userID);
            $order             = $this->_getUserOrder($userID, $publicID);
            
        } else {
            $order = $this->order_model->get_deffered_order($this->session->session_id);
            
            // Если сессия истекла и заказ не найден, возврат к новому заказу
            if (!$order) {
                redirect("home/index");
            }
        }
        
        $data['order']         = $order;
        $data['firstModelUrl'] = $this->_getFirstModelUrl($order["id"]);
        
        $this->load->view('home/order', $data);
    }
    
    public function helper($publicID, $step = null) {
        $data = array();
        if ($step) {
            if ($step <= 1) {
                $this->session->set_userdata('helper_variants', []);
            }

            $data["publicID"]  = $publicID;
            $data["questions"] = $this->helper_model->get_question($step);
            $data["nextStep"]  = $this->helper_model->get_next_step($step);
            if ($data["nextStep"] == null) {
                $data["materials"] = $this->helper_model->get_materials_by_variants($this->session->userdata('helper_variants'));//_by_properties();
            }
        }
        
        if(!empty($_POST)) {
            if ($this->input->post('order')){
                $this->order_model->change_order_material($publicID);
                redirect("home/order/$publicID");
            } else {
                $variants = $this->session->userdata('helper_variants');
                $variants[$step] = $this->input->post('variant');
                $this->session->set_userdata('helper_variants', $variants);
            } 
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
    
    public function save_order_params() {
        if (!empty($_POST)) {
            $publicID = $this->input->post('public_id');
            $this->order_model->save($publicID);
            redirect("home/order/$publicID");
        }
    }
    
    public function welcome() {
        $data['title']     = 'Спасибо за заказ!';

        $this->load->view('home/welcome', $data);        
    }
    
    // Создание аккаунта пользователя
    private function _createUserAccount() {
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
        
        return $result;
    }
    
    // Добавление параметров пользователя и компании в сессию
    private function _setUserSessionParams($userID) {
        $company = $this->company_model->get_user_company($userID);

        $data = array(
            'name'    => $this->input->post('name'), 
            'user_id' => $userID,
            'email'   => $this->input->post('email'),
            'role'    => 3
        );

        if ($company) {
            $data['company_id']   = $company['id'];
            $data['company_name'] = $company['name'];
            $data['company_logo'] = $company['logo'];
        }

        $this->session->set_userdata($data);        
    }
    
    private function _getFirstModelUrl($orderID) {
        $url = '';
        $files    = $this->order_model->get_order_files($orderID);        
        foreach($files as $model) {
            $url = base_url() . $model["path"] . '/' . $model['file_name']; 
            return $url;
        }
    }
    
    private function _getUserOrder($userID, $publicID) {
        if ($userID) {
            return $this->order_model->get_order_by_id($publicID);
        }
         
        return $this->order_model->get_deffered_order($this->session->session_id);
    }
}


?>