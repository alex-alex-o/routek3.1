<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Group extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/group_model', 'group_model');
		$this->load->model('activity_model','activity_model');
	}
	//------------------------------------------------------------------------
	public function index(){
		$data['all_groups'] = $this->group_model->get_all_groups();
		$data['title'] = 'Роли';
		$data['view'] = 'admin/group/group_list';
		$this->load->view('layout', $data);
	}
	//------------------------------------------------------------------------
	public function add(){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('group_name', 'Роль', 'trim|min_length[3]|is_unique[ci_user_groups.group_name]|required');
			if ($this->form_validation->run() == FALSE) {
				$data['title'] = 'Add Group';
				$data['view'] = 'admin/group/group_add';
				$this->load->view('layout', $data);
			}
			else{
				$data = array(
					'group_name' => $this->input->post('group_name'),
				);
				$data = $this->security->xss_clean($data);
				$result = $this->group_model->add_group($data);
				if($result){

					// Add User Activity
					$this->activity_model->add(8);

					$this->session->set_flashdata('msg', 'Роль добавлена!');
					redirect(base_url('admin/group'));
				}
			}
		}
		else{
			$data['title'] = 'Add Group';
			$data['view'] = 'admin/group/group_add';
			$this->load->view('layout', $data);
		}
	}
	public function edit($id=0){
		if($this->input->post('submit')){
			$data = array(
				'group_name' => $this->input->post('group_name'),
			);
			$data = $this->security->xss_clean($data);
			$result = $this->group_model->edit_group($data, $id);
			if($result){
				// Add User Activity
				$this->activity_model->add(9);

				$this->session->set_flashdata('msg', 'Роль обновлена!');
				redirect(base_url('admin/group'));
			}
		}
		else{
			$data['group'] = $this->group_model->get_group_by_id($id);
			$data['title'] = 'Редактировать';
			$data['view'] = 'admin/group/group_edit';
			$this->load->view('layout', $data);
		}
	}
	public function del($id){
		$this->db->delete('ci_user_groups', array('id' => $id));

		// Add User Activity
		$this->activity_model->add(9);

		$this->session->set_flashdata('msg', 'Роль удалена!');
		redirect(base_url('admin/group'));
	}
}

?>