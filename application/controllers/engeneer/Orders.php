<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends MY_Controller {
    public function __construct() {
            parent::__construct();
            
            $this->load->model('engeneer/order_model', 'order_model');
            $this->load->model('user/user_model',  'user_model');
            $this->load->model('activity_model',   'activity_model');
            $this->load->model('status_model',     'status_model');
            
            $this->load->library('datatable'); // loaded my custom serverside datatable library
    }

    //-----------------------------------------------------------------------
    public function index() {
        $data['view']     = 'engeneer/orders/index';
        $data['statuses'] = $this->status_model->get_all(2);
        $data['orders']   = $this->order_model->get_all_orders();
        
        $this->load->view('layout', $data);
    }

    public function result_upload($userID, $orderID, $orderItemID) {
        $result = array('status' => 'error' , 'message' => 'Не выполнено!');
        try {
            if (!empty($userID) && !empty($orderID) && !empty($orderItemID)) {
                $path = "./uploads/users/" . $userID . "/" . $orderID . "/" . $orderItemID;
                if (!is_dir($path)) {
                    mkdir($path, 0777, true);
                }   

                for($i = 0; $i < count($_FILES["files"]["name"]); $i ++) {
                    $fileName = uniqid() . "." . pathinfo($_FILES["files"]["name"][$i])["extension"];
                    if (move_uploaded_file($_FILES["files"]["tmp_name"][$i], $path . "/" . $fileName)) {
                        $data = array(
                            'file_name'     => $fileName,
                            'orig_name'     => $_FILES["files"]["name"][$i],
                            'path'          => $path,
                            'created_at'    => date('Y-m-d H:i:s'),
                            'order_item_id' => $orderItemID,
                            'order_file_type_id' => 2
                        );
                        $this->db->insert('ci_order_item_files', $data);
                    }
                }

                $result = array('status' => 'success' , 'message' => 'Файл закачан');
            }
            
        } catch (Exception $ex) {
             
            $result = array('status' => 'success' , 'message' => 'Ошибка: ' . $ex->getMessage());
        }        
        redirect(base_url("engeneer/orders/view/$orderItemID"));

    }
    
    public function delete_file($id, $orderID){
        $this->db->delete('ci_order_item_files', array('id' => $id));

        $this->session->set_flashdata('msg', 'Файл удален!');

        redirect(base_url("engeneer/orders/view/$orderID"));
    }
    
    public function complete($id) {
        $this->order_model->complete_order($id);
        redirect(base_url("engeneer/orders/index"));
    }
    
    
    public function view($id) {
        $data['view']  = 'engeneer/orders/view';
        $order         = $this->order_model->get_order($id);
        $data['order'] = $order;
        $files         = $this->order_model->get_order_files($id, 1);
        
        $data['resultFiles'] = $this->order_model->get_order_files($id, 2);
        
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
    
}
?>