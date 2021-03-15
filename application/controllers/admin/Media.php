<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends MY_Controller {
    public function __construct() {
            parent::__construct();
            $this->load->model('admin/media_model',   'media_model');
            $this->load->model('admin/company_model', 'company_model');
    }

    public function products() {
        $this->_showMedia(1);
    }

    public function certificates() {
        $this->_showMedia(2);
    }

    public function gallery() {
        $this->_showMedia(3);
    }

    public function upload($typeID) {
        if($_FILES) {
            $path = "./uploads/" . $this->session->userdata('company_id') . "/";
            
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            } 

            $config = array(
                    'upload_path'   => $path,
                    'allowed_types' => "gif|jpg|png|jpeg|pdf",
                    'encrypt_name'  => TRUE,
                    'overwrite'     => TRUE,
                    'max_size'      => "20480000", // It is 2 MB(2048 Kb)
                    'max_height'    => "6000",
                    'max_width'     => "6000"
            );


            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file'))
            {
               
                $data = array(
                    'original_name' => $this->upload->data('orig_name'),
                    'name'          => $this->upload->data('file_name'),
                    'created_at'    => date('Y-m-d H:i:s'),
                    'company_id'    => $this->session->userdata('company_id'),
                    'media_type_id' => $typeID
                );

                $data = $this->security->xss_clean($data);

                $this->media_model->add_media($data);

                $this->session->set_flashdata('msg', 'Файлы успешно закачаны!');

                $return = array('status' => 'success' , 'message' => 'Файл закачан');

                echo json_encode($return);
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                $return = array('status' => 'error' , 'message' => '');

                echo json_encode($return);
            }
        } 
    }
    
    private function _showMedia($typeID) {
        $data['view']       = 'admin/media';
        $data['media']      = $this->media_model->get_media($this->session->userdata('company_id'), $typeID);
        $data['media_type'] = $this->media_model->get_media_type($typeID);
        
        $this->load->view('layout', $data);
    }
}
?>