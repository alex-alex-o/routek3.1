<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Engeneer extends MY_Controller {
	public function __construct(){
            parent::__construct();
            $this->load->model('admin/company_model', 'company_model');
            $this->load->model('activity_model','activity_model');
            $this->load->library('functions');
	}
        
        public function dashboard() {
            
        }
        
	//-------------------------------------------------------------------------
	public function index(){
            $data['company'] = $this->company_model->get_user_company($this->session->userdata('user_id'));
            $data['title']   = 'Профиль конструктора';
            $data['view']    = 'admin/engeneer';
            $this->load->view('layout', $data);
	}

        public function save_common() {
            $logoPath = null;
            
            $oldLogo = $this->input->post('old_logo');
            $path    = "public/images/";
                
            if(!empty($_FILES['logo']['name'])) {
                
                if (!empty($oldLogo)) {
                    $this->functions->delete_file($oldLogo);
                }

                $result = $this->functions->file_insert($path, 'logo', 'image', '9097152');
                if($result['status'] == 1) {
                    $logoPath = $path.$result['msg'];
                } else {
                    $this->session->set_flashdata('error', $result['msg']);
                    redirect(base_url('admin/company'), 'refresh');
                }
            }
            
            $result = $this->company_model->save_common($logoPath);
            
            if ($result) {
                // Add User Activity
                $this->activity_model->add(11);

                $this->session->set_flashdata('msg', 'Информация успешно сохранена!');
                redirect(base_url('admin/company'), 'refresh');
            }            
        }

        public function save_covid() {
            $result = $this->company_model->save_covid();
        }
        
        public function save_address() {
            $result = $this->company_model->save_address();
        }

        public function save_bank() {
            $result = $this->company_model->save_bank();
        }
        
        
        public function save_industries() {
            
        }

        //-------------------------------------------------------------------------
	public function change_pwd(){
		$id = $this->session->userdata('admin_id');
		if($this->input->post('submit')){
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('confirm_pwd', 'Confirm Password', 'trim|required|matches[password]');
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

					$this->session->set_flashdata('msg', 'Password has been changed successfully!');
					redirect(base_url('admin/profile'));
				}
			}
		}
		else{
			$data['user'] = $this->admin_model->get_user_detail();
			$data['title'] = 'Change Password';
			$data['view'] = 'admin/profile';
			$this->load->view('layout', $data);
		}
	}
}

?>	