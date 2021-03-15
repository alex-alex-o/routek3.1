<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/admin_model', 'admin_model');
		$this->load->model('activity_model','activity_model');
	}
	//-------------------------------------------------------------------------
	public function index(){
		if($this->input->post('submit')){
                    $data = array(
                        'username'   => $this->input->post('email'),
                        //'firstname' => $this->input->post('firstname'),
                        //'lastname'  => $this->input->post('lastname'),
                        'name'       => $this->input->post('name'),
                        'email'      => $this->input->post('email'),
                        //'mobile_no'  => $this->input->post('mobile_no'),
                        'phone'      => $this->input->post('phone'),
                        'updated_at' => date('Y-m-d : h:m:s'),
                    );
                    
                    $data   = $this->security->xss_clean($data);
                    $result = $this->admin_model->update_user($data);
                    
                    if($result){
                        // Add User Activity
                        $this->activity_model->add(6);

                        $this->session->set_flashdata('msg', 'Данные успешно обновлены');
                        redirect(base_url('admin/profile'), 'refresh');
                    }
		}
		else{
                    $data['user'] = $this->admin_model->get_user_detail();
                    $data['title'] = 'Профиль пользователя';
                    $data['view'] = 'admin/profile';
                    $this->load->view('layout', $data);
		}
	}

	//-------------------------------------------------------------------------
	public function change_pwd(){
		$id = $this->session->userdata('admin_id');
		if($this->input->post('submit')){
			$this->form_validation->set_rules('password', 'Пароль', 'trim|required');
			$this->form_validation->set_rules('confirm_pwd', 'Подтверждение пароля', 'trim|required|matches[password]');
			if ($this->form_validation->run() == FALSE) {
				$data['user'] = $this->admin_model->get_user_detail();
				$data['view'] = 'admin/profile';
				$this->load->view('layout', $data);
			}
			else{
				$data = array(
					'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
				);
				$data = $this->security->xss_clean($data);
				$result = $this->admin_model->change_pwd($data, $id);
				if($result){

					// Add User Activity
					$this->activity_model->add(7);

					$this->session->set_flashdata('msg', 'Пароль был изменен');
					redirect(base_url('admin/profile'));
				}
			}
		}
		else{
			$data['user'] = $this->admin_model->get_user_detail();
			$data['title'] = 'Сменить пароль';
			$data['view'] = 'admin/profile';
			$this->load->view('layout', $data);
		}
	}
}

?>	