<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Helper extends MY_Controller {
    public function __construct(){
        parent::__construct();
            
        $this->load->model('company/material_model', 'material_model');
        $this->load->model('helper_model', 'helper_model');
        
    }
	
    public function index(){
        // $data['title'] = 'Помощник';
        // $data['view']  = 'admin/helper/index';
        // $this->load->view('layout', $data);
        var_dump ($this->helper_model->get_all_questions());
        die();
    }
    
    public function view() {
        $data['title'] = 'Помощник';
        $data['view']  = 'admin/helper/view';
        
        
//        $questions[] = [
//                "id"       => 1,
//                "text"     => "Выберите функциональное назначение",
//                "variants" => [
//                    ["id" => "1", "value" => "Дизайн"], 
//                    ["id" => "2", "value" => "Прототип"]
//                ]
//            ];
//        
//        $questions[] = [
//                "id"       => 2,
//                "text"     => "Будет ли использоваться в медицинских целях",
//                "variants" => [
//                    ["id" => "3", "value" => "Да" ], 
//                    ["id" => "4", "value" => "Нет"]
//                ]
//            ];
            
        $data["questions"] = $this->helper_model->get_all_questions();
        $data["materials"] = $this->material_model->get_materials();
        
        $this->load->view('layout', $data);
    }
    
    public function add_variant() {
        $post = json_decode(file_get_contents("php://input"));
        if (!$post) {
            return;
        }
        
        $questionID = $post->questionID;
        $text       = $post->variant;
        
        // Сохранить вариант
        $variantID = $this->helper_model->save_variant($questionID, $text);
       
        $data["questionID"] = $questionID;
        $data["variants"]   = $this->helper_model->get_variants($questionID);
        $data["materials"]  = $this->material_model->get_materials();

        $this->load->view('admin/helper/add_variant', $data);
    }
}

?>	