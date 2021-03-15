<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Files extends UR_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('user/user_model', 'user_model');
    }
    //-------------------------------------------------------------------------
    public function index(){
        $data['files']   = $this->user_model->get_files();
        $data['title']  = 'Профиль';
        $data['view']   = 'user/files';
        $this->load->view('layout', $data);
    }

}

?>	