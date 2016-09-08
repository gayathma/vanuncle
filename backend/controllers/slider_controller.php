<?php

/*
 * Author : Viran
 */


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Slider_controller extends CI_Controller {

    function __construct() {
        parent::__construct();




        if (!$this->session->userdata('logged_in')) {
            redirect(site_url() . '/login_controller');
        } else {

            $this->load->model('slider/Slider_model');
            $this->load->model('slider/Slider_service');
        }
    }

    function index() {
        $this->load->view('welcome_message');


        //$this->load->model('CCM/Transactions/Creditcardtransactionsmodel');
    }

    function manage_featured_attractions() {


        $slider_model = new Slider_model();
        $slider_service = new Slider_service();


        $slider_no = 1;


        $slider_model->setSlider_no($slider_no);
        $sliders = $slider_service->getSliderimagesbySliderno($slider_model);



        $data['slider_no'] = $slider_no;

        $data['inner_title'] = "Manage Featured Attractions";
        $data['main_menu_title'] = "Manage Sliders";



        $data['sliders'] = $sliders;

        $partials = array('content' => 'slider/manage_slider');
        $this->template->load('template/primo_template', $partials, $data);
    }

    function manage_main_slider() {


        $slider_model = new Slider_model();
        $slider_service = new Slider_service();


        $slider_no = 2;

        $slider_model->setSlider_no($slider_no);
        $sliders = $slider_service->getSliderimagesbySliderno($slider_model);

        $data['slider_no'] = $slider_no;

        $data['inner_title'] = "Manage Main Slider";
        $data['main_menu_title'] = "Manage Sliders";



        $data['sliders'] = $sliders;

        $partials = array('content' => 'slider/manage_slider_main');
        $this->template->load('template/primo_template', $partials, $data);
    }

    function manage_airways_slider() {


        $slider_model = new Slider_model();
        $slider_service = new Slider_service();


        $slider_no = 3;

        $slider_model->setSlider_no($slider_no);
        $sliders = $slider_service->getSliderimagesbySliderno($slider_model);

        $data['slider_no'] = $slider_no;

        $data['inner_title'] = "Manage Airways Slider";
        $data['main_menu_title'] = "Manage Sliders";



        $data['sliders'] = $sliders;

        $partials = array('content' => 'slider/manage_slider');
        $this->template->load('template/primo_template', $partials, $data);
    }

    function uploadsliderimage($id) {

        $uploaddir = './uploads/sliders/' . $id . '/';
        $unique_tag = 'ml_';

        $filename = $unique_tag . time() . '-' . basename($_FILES['uploadfile']['name']); //this is the file name
        $file = $uploaddir . $filename; // this is the full path of the uploaded file

        if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) {
            //echo "success";
            echo $filename; //return the file name
        } else {
            echo "error";
        }
    }

    function addsliderimage() {
//print_r($_POST);die();

        $slider_model = new Slider_model();
        $slider_service = new Slider_service();


        $slider_model->setSlider_image($this->input->post('picFileName'));
        $slider_model->setSlider_no($this->input->post('slider_no'));
        $slider_model->setSlider_order($this->input->post('slider_order'));
        $slider_model->setAdded_by('1');
        $slider_model->setSlider_title($this->input->post('slider_title'));
        $slider_model->setAdded_date(date('Y-m-d H:i:s'));
        $slider_model->setDelete_status('0');


        //slider_title

        echo $slider_service->addsliderimage($slider_model);
    }

    function savesliderorder() {


        $slider_model = new Slider_model();
        $slider_service = new Slider_service();



        $slider_model->setSlider_id($this->input->post('id'));
        $slider_model->setSlider_order($this->input->post('slider_ordr'));


        echo $slider_service->savesliderorder($slider_model);
    }

    function deletesliderimage() {

        $slider_model = new Slider_model();
        $slider_service = new Slider_service();


        $slider_model->setSlider_id($this->input->post('id'));

        echo $slider_service->deletesliderimage($slider_model);
    }

    function updatecontentbyid() {

        $content_model = new Content_model();
        $content_service = new Content_service();


        $content_model->setContent_body($this->input->post('content_text'));
        $content_model->setContent_id($this->input->post('content_id'));


        echo $content_service->updateContentsbyid($content_model);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */