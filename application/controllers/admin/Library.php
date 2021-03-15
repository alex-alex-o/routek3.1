<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Library extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/library_model', 'library_model');
                $this->load->model('company/machine_model',  'machine_model');
                $this->load->model('company/material_model', 'material_model');
                
		$this->load->model('activity_model','activity_model');
	}
	//------------------------------------------------------------------------
	public function index(){
		$data['all_items'] = $this->library_model->get_all();
		$data['title'] = 'Библиотека моделей';
		$data['view'] = 'admin/library/library_list';
		$this->load->view('layout', $data);
	}
        
	//------------------------------------------------------------------------
	public function add(){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('name', 'Название', 'trim|min_length[3]|is_unique[ci_user_groups.group_name]|required');
			if ($this->form_validation->run() == FALSE) {
				$data['title'] = 'Добавить модель';
				$data['view'] = 'admin/library/library_add';
				$this->load->view('layout', $data);
			}
			else{
				$data = array(
					'name' => $this->input->post('name'),
				);
				$data = $this->security->xss_clean($data);
				$result = $this->library_model->add_item($data);
				if($result){

					// Add User Activity
					$this->activity_model->add(8);

					$this->session->set_flashdata('msg', 'Модель добавлена!');
					redirect(base_url('admin/library'));
				}
			}
		}
		else{
			$data['title'] = 'Добавить модель';
			$data['view'] = 'admin/library/library_add';
                        $data['machines']  = $this->machine_model->get_machines();
                        $data['materials'] = $this->material_model->get_materials();
                        
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