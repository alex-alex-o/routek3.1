<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Company extends MY_Controller {
	public function __construct(){
            parent::__construct();
            
            $this->load->model('admin/company_model', 'company_model');
            $this->load->model('activity_model','activity_model');
            
            $this->load->library('datatable'); 
            $this->load->library('functions');
	}
        
        public function dashboard() {
            
        }
        
	//-------------------------------------------------------------------------
	public function index(){
            // $data['company'] = $this->company_model->get_all();
            $data['title']   = 'Администратор';
            $data['view']    = 'admin/companies/company_list';
            
            $this->load->view('layout', $data);
	}

        public function view($id) {
            $data['view']    = 'admin/companies/view';
            $data['company'] = $this->company_model->get_by_id($id);
            $data['users']   = $this->company_model->get_company_users($id);
            $data['notes']   = $this->company_model->get_company_notes($id);

            $this->load->view('layout', $data);
        }

        public function add_note($companyID) {
            $data['view']        = 'admin/companies/note';
            $data['company']     = $this->company_model->get_by_id($companyID);
            $data['users']       = $this->company_model->get_company_users($companyID);
            $data['companyNote'] = $this->company_model->get_company_note(null);

            if($this->input->post('submit')){
                $this->company_model->add_note($companyID);
                redirect(base_url('admin/company/view/' . $companyID));    
            }
            $this->load->view('layout', $data);
        }

        public function note($companyID = null, $id = null) {
            $data['view']        = 'admin/companies/note';
            $data['company']     = $this->company_model->get_by_id($companyID);
            $data['users']       = $this->company_model->get_company_users($companyID);
            $data['companyNote'] = $this->company_model->get_company_note($id);

            
            if($this->input->post('submit')){
                $this->company_model->save_note($id);
                redirect(base_url('admin/company/view/' . $companyID));    
            }            
            $this->load->view('layout', $data);
        }

        public function datatable_json(){				   					   
            $records = $this->company_model->get_all_json();
            $data    = array();

            if (!$records['data']){
                echo json_encode(null);
                return;
            }

            foreach ($records['data']  as $row)
            {  
                $data[]= array(
                    '<a href = "' . base_url('admin/company/view/' . $row['id']) . '">' . (!empty($row['name']) ? $row['name'] : 'Без названия') . '</a>',
                    $row['phone'],
                    $row['city'] . ", " . $row['street'] . ", " . $row['building'] . " " . $row['office'],
                    $row['created_at'],
                    ($row['is_blocked'] == 0 
                    ? '<a  title = "Заблокировать"  class = "btn btn-primary"   href="'.base_url('admin/company/block/'.$row['id'] . '/1').'">Заблокировать</a>' 
                    : '<a  title = "Разблокировать" class = "btn btn-secondary" href="'.base_url('admin/company/block/'.$row['id'] . '/0').'">Разблокировать</a>')
                );
            }

            $records['data'] = $data;
            echo json_encode($records);
        }
        
        
        
        public function block($id, $block) {
            $this->company_model->block($id, $block);
         
            redirect(base_url('admin/company/index'));
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