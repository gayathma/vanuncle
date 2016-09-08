<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of attribute_questions
 *
 * @author rifkhan
 */
class Attribute_questions extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        if($this->session->userdata('Logged_In'))
{
        $this->load->model('attribute_questions/Attribute_questions_model');
        $this->load->model('attribute_questions/Attribute_questions_model_service');
        $this->load->model('attributes/Attributes_model_service');
        $this->load->model('attributes/Attributes_model');
}else{
    redirect('login');
}
    }

    function manageAttributeQuestions() {
        $user_privilege_model_service = new User_privilege_model_service();

        if ($user_privilege_model_service->getUserPrivilege('MANAGE_ATTR_QUESTIONS')) {
        
        $data['title_menu_main'] = "Master Records";
        $data['title'] = "Manage Attribute Questions";
        $attribute_questions_model_service = new Attribute_questions_model_service();
        $attributes_model_services = new Attributes_model_service();
        $data['viewAllAttributeQuestions'] = $attribute_questions_model_service->getAllAttributeQuestions();
        $data['getAllAttributes'] = $attributes_model_services->getAllAttributes();

        $partials = array('content' => 'attribute_questions/manage_attribute_questions'); //load the view		              
        $this->template->load('backend_template/primio_template', $partials, $data); //load teh template
         } else {
            $data['title_menu_main'] = "Access Denied";
            $partials = array('content' => 'access_denied');
            $this->template->load('backend_template/primio_template', $partials, $data);
        }
    }

    function editAttributeQuestions($id) {
        

        $user_privilege_model_service = new User_privilege_model_service();

        if ($user_privilege_model_service->getUserPrivilege('EDIT_ATTR_QUESTIONS')) {
       

            $data['title_menu_main'] = "Master Records";
            $data['title'] = "Edit Attribute Questions";
            $attribute_questions_model_service = new Attribute_questions_model_service();
            $attribute_questions_model = new Attribute_questions_model();
            $attributes_model_services = new Attributes_model_service();
            $attribute_questions_model->setQuestion_id($id);
            $data['editAttributeQuestions'] = $attribute_questions_model_service->getAllAttributeQuestionsByID($attribute_questions_model);

            $data['getAllAttributes'] = $attributes_model_services->getAllAttributes();
            $partials = array('content' => 'attribute_questions/edit_attribute_questions');
            $this->template->load('backend_template/primio_template', $partials, $data);
         } else {
            $data['title_menu_main'] = "Access Denied";
            $partials = array('content' => 'access_denied');
            $this->template->load('backend_template/primio_template', $partials, $data);
        }
    }

    function updateAttributeQuestions() {
        
        if ($this->session->userdata('Logged_In')) {

            $attribute_questions_model_service = new Attribute_questions_model_service();
            $attribute_questions_model = new Attribute_questions_model();

            $attribute_questions_model->setQuestion_id($this->input->post('question_id'));
            $attribute_questions_model->setQuestion_eng($this->input->post('question_eng'));
            $attribute_questions_model->setQuestion_sin($this->input->post('question_sin'));
            $attribute_questions_model->setQuestion_tam($this->input->post('question_tam'));
            $attribute_questions_model->setUpdated_date(date("Y-m-d H:i:s"));
            $attribute_questions_model->setUpdated_by($this->session->userdata('User_Id'));
            $attribute_questions_model->setEnglish_status($this->input->post('english_status'));
            $attribute_questions_model->setSinhala_status($this->input->post('sinhala_status'));
            $attribute_questions_model->setTamil_status($this->input->post('tamil_status'));
            $attribute_questions_model->setPublished_status($this->input->post('published_status'));
            $attribute_questions_model->setAttribute_id($this->input->post('attribute_id'));
            echo $attribute_questions_model_service->updateAttributeQuestion($attribute_questions_model);
            
        } else {
            $this->load->view('login');
        }
    }

    function addAttributeQuestions() {

        if ($this->session->userdata('Logged_In')) {

            $attribute_questions_model_service = new Attribute_questions_model_service();
            $attribute_questions_model = new Attribute_questions_model();

            $attribute_questions_model->setQuestion_eng($this->input->post('question_eng'));
            $attribute_questions_model->setQuestion_sin($this->input->post('question_sin'));
            $attribute_questions_model->setQuestion_tam($this->input->post('question_tam'));
            $attribute_questions_model->setAdded_date(date("Y-m-d H:i:s"));
            $attribute_questions_model->setAdded_by($this->session->userdata('User_Id'));
            $attribute_questions_model->setDelete_index('0');
            $attribute_questions_model->setEnglish_status('1');
            $attribute_questions_model->setSinhala_status('1');
            $attribute_questions_model->setTamil_status('1');
            $attribute_questions_model->setPublished_status('1');
            $attribute_questions_model->setAttribute_id($this->input->post('attribute_id'));
           echo  $attribute_questions_model_service->addAttributeQuestion($attribute_questions_model);
            
        } else {
            $this->load->view('login');
        }
    }

    function removeAttributeQuestion() {
         $user_privilege_model_service = new User_privilege_model_service();

        if ($user_privilege_model_service->getUserPrivilege('DELETE_ATTR_QUESTIONS')) {
       
       

            $attribute_questions_model_service = new Attribute_questions_model_service();
            $attribute_questions_model = new Attribute_questions_model();
            
           $attribute_questions_model->setQuestion_id($this->input->post('question_id'));
           $attribute_questions_model->setUpdated_by($this->session->userdata('User_Id'));
           $attribute_questions_model->setUpdated_date(date("Y-m-d H:i:s"));
           $attribute_questions_model->setDelete_index('1');
           echo $attribute_questions_model_service->removeAttributeQuestion($attribute_questions_model);
           
       } else {
            $data['title_menu_main'] = "Access Denied";
            $partials = array('content' => 'access_denied');
            $this->template->load('backend_template/primio_template', $partials, $data);
        }
    }

}

?>