<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contents extends CI_Controller {

    // define class
    public function __construct() {
        parent::__construct();
        // class constructor
        if ($this->session->userdata('Logged_In')) {
            $this->load->model('contents/Content_model');
            $this->load->model('contents/Content_service');
        } else {
            redirect('login');
        }
    }

    function manage_contents($h_code) {
        // $this->load->view('view_add_attributes');
        // $data=$this->Skill_attributes_model_services->general();

        $user_privilege_model_service = new User_privilege_model_service();

        if ($user_privilege_model_service->getUserPrivilege('MANAGE_CONTENTS')) {

            $content_model = new Content_model();
            $content_service = new Content_service();

            $content_model->setH_code($h_code);
            $page_content = $content_service->getPageContentbyhcode($content_model);

            $data ['page_content'] = $page_content;
            $data['title_menu_main'] = "Manage Page Contents";


            $data ['title'] = "Manage " . $page_content->content_title_eng;

            $partials = array(
                'content' => 'contents/manage_contents'
            );
            $this->template->load('backend_template/primio_template', $partials, $data); // load the template
        } else {
            $data['title_menu_main'] = "Access Denied";
            $partials = array('content' => 'access_denied');
            $this->template->load('backend_template/primio_template', $partials, $data);
        }
    }

    function updatecontentpage() {

        //print_r($_POST);die();


        $content_model = new Content_model();
        $content_service = new Content_service();

        $content_model->setContent_title_eng($this->input->post('title_eng'));
        $content_model->setContent_title_sin($this->input->post('title_sin'));
        $content_model->setContent_title_tam($this->input->post('title_tam'));
        $content_model->setContent_description_eng($this->input->post('des_eng'));
        $content_model->setContent_description_sin($this->input->post('des_sin'));
        $content_model->setContent_description_tam($this->input->post('des_tam'));
        $content_model->setEnglish_status($this->input->post('eng_status'));
        $content_model->setSinhala_status($this->input->post('sin_status'));
        $content_model->setTamil_status($this->input->post('tam_status'));
        $content_model->setPublished_status($this->input->post('pub_status'));
        $content_model->setContent_id($this->input->post('content_id'));

        echo $content_service->updatecontentpage($content_model);
    }

}

?>
