<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Machines extends MY_Controller {
    public function __construct() {
            parent::__construct();
            $this->load->model('company/machine_model', 'machine_model');
            $this->load->model('activity_model',      'activity_model');
            $this->load->library('datatable'); // loaded my custom serverside datatable library
    }

    //-----------------------------------------------------------------------
    public function index() {
        $data['view'] = 'company/machines/machine_list';
        $this->load->view('layout', $data);
    }
                
    //-----------------------------------------------------------------------
    public function datatable_json(){				   					   
        $records = $this->machine_model->get_all_machines();
        $data    = array();

        if (!$records['data']){
            echo json_encode(null);
            return;
        }
        
        foreach ($records['data']  as $row)
        {  
            $data[]= array(
                $row['short_name'],
                $row['name'],
                $row['quantity'],
                '
                <a title  = "Просмотр"       class = "view btn btn-sm btn-info"      href="'.base_url('company/machines/edit/'.$row['id']).'"> <i class="material-icons">visibility</i></a>
                <a  title = "Редактировать" class = "update btn btn-sm btn-primary" href="'.base_url('company/machines/edit/'.$row['id']).'"> <i class="material-icons">edit</i></a>
                <a  title = "Удалить"       class = "delete btn btn-sm btn-danger"  data-href="'.base_url('company/machines/del/'.$row['id']).'" data-toggle="modal" data-target="#confirm-delete"> <i class="material-icons">delete</i></a>
                ',
            );
        }
        
        $records['data'] = $data;
        echo json_encode($records);
    }
    
    public function get_machine_params() {
        echo json_encode($this->machine_model->get_machine_params());
    }

    public function get_machine_param_values() {
        echo json_encode($this->machine_model->get_machine_param_values());
    }
    
    //-----------------------------------------------------------------------
                
    public function add() {
        $data['machines'] = $this->machine_model->get_machines();
        
        if($this->input->post('submit')) {
            $this->form_validation->set_rules('machine_id', 'Технология', 'trim|required');
            $this->form_validation->set_rules('name',       'Производитель/Модель',         'trim|min_length[3]|required');
            $this->form_validation->set_rules('quantity',   'Количество',       'trim|required|integer');
            
            foreach ($this->input->post("param") as $key => $parameter) {
                $param = $this->machine_model->get_machine_parameter_by_id ($key);
                $this->form_validation->set_rules('param[' . $param["id"] . ']',  $param["name"], 'trim|integer');
            }

            if ($this->form_validation->run() == FALSE) {
                    $data['view'] = 'company/machines/machine_add';
                    $this->load->view('layout', $data);
            } else {
                $data = array(
                    'machine_id' => $this->input->post('machine_id'),
                    'name'       => $this->input->post('name'),
                    'quantity'   => $this->input->post('quantity'),
                    'company_id' => $this->session->userdata('company_id')
                );

                $data   = $this->security->xss_clean($data);
                $result = $this->machine_model->save_company_machine($data);

                if($result) {
                    $this->session->set_flashdata('msg', 'Оборудование успешно добавлено!');
                    redirect(base_url('company/machines'));
                }
            }
        } else {
            $data['view'] = 'company/machines/machine_add';
            $this->load->view('layout', $data);
        }

    }
		
    //-----------------------------------------------------------------------
    public function edit($id = 0) {
        
        $data['machines'] = $this->machine_model->get_machines();
        if($this->input->post('submit')) {
            $this->form_validation->set_rules('machine_id', 'Технология', 'trim|required');
            $this->form_validation->set_rules('name',       'Производитель/Модель',         'trim|min_length[3]|required');
            $this->form_validation->set_rules('quantity',   'Количество',       'trim|required|integer');
            
            foreach ($this->input->post("param") as $key => $parameter) {
                $param = $this->machine_model->get_machine_parameter_by_id ($key);
                $this->form_validation->set_rules('param[' . $param["id"] . ']',  $param["name"], 'trim|integer');
            }

            if ($this->form_validation->run() == FALSE) {
                $data['companyMachine'] = $this->machine_model->get_company_machine_by_id($id);
                $data['view'] = 'company/machines/machine_edit';
                
                $this->load->view('layout', $data);
            } else {
                $data = array(
                    'machine_id' => $this->input->post('machine_id'),
                    'name'       => $this->input->post('name'),
                    'quantity'   => $this->input->post('quantity'),
                    'company_id' => $this->session->userdata('company_id'),
                );

                $data   = $this->security->xss_clean($data);
                $result = $this->machine_model->save_company_machine($data, $id);
                
                if($result) {
                    $this->session->set_flashdata('msg', 'Оборудование успешно обновлено!');
                    redirect(base_url('company/machines'));
                }
            }
        } else {
            $data['companyMachine'] = $this->machine_model->get_company_machine_by_id($id);
            $data['view']           = 'company/machines/machine_edit';

            $this->load->view('layout', $data);
        }
    }
    //-----------------------------------------------------------------------
    public function del($id = 0){
        $this->db->delete('ci_company_machines', array('id' => $id));

        $this->session->set_flashdata('msg', 'Оборудование было удалено!');

        redirect(base_url('company/machines'));
    }
}
?>