<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Content_controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect(site_url() . '/login_controller');
        } else {

            $this->load->model('contents/Content_model');
            $this->load->model('contents/Content_service');
        }
    }

    function index() {
        $this->load->view('welcome_message');
    }

    function loadStaticContentbyhcode($hcode) {


        $content_model = new Content_model();
        $content_service = new Content_service();

        $content_model->setContent_hcode($hcode);
        $content_data = $content_service->getContentbyhcode($content_model);

        $data['inner_title'] = $content_data->content_title;
        $data['main_menu_title'] = "Manage Pages";



        $data['content_data'] = $content_data;

        $partials = array('content' => 'contents/manage_contents');
        $this->template->load('template/primo_template', $partials, $data);
    }

    function updatecontentbyid() {

        $content_model = new Content_model();
        $content_service = new Content_service();


        $content_model->setContent($this->input->post('content_text'));
        $content_model->setContent_id($this->input->post('content_id'));


        echo $content_service->updateContentsbyid($content_model);
    }

}