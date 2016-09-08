<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contact extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     * 
     */
    public function __construct() {
        parent::__construct();
        // Your own constructor code

        $this->load->model('content/content_model');
        $this->load->model('content/content_service');

    }

    public function index() {
        
        $content_service = new Content_service();

        $data['contact_content'] = $content_service->getContentbyhcode("CONTACTUS");

        $partials = array('content' => 'pages/contact_us');
        $this->template->load('template/template', $partials, $data);
    }

    function send_mail() {
//echo 2;die();
        $this->load->helper('captcha');
        $sliders_model = new Sliders_model();
        $sliders_service = new Sliders_service();

        $content_model = new Content_model();
        $content_service = new Content_service();

        $captcha_model = new Captcha_model();
        $captcha_service = new Captcha_service();

        //delete old captcha records

        $ex = time() - 7200;

        $captcha_service->deleteoldercaptchas($ex);


//check captcha exsistance

        $captcha_model->setCaptcha_time($ex);
        $captcha_model->setIp_address($this->input->ip_address());
        $captcha_model->setWord($this->input->post('captcha_code'));
        //$captcha_model->setWord('222');

        $row = $captcha_service->checkcaptchcode($captcha_model);
//print_r($row);
//echo 222;
        // echo '3330' . count($row);


        if (count($row) == 1) {

            $this->load->library('email');

            $this->email->from($this->input->post('email'), $this->input->post('name'));
            $this->email->to('chula@monarulanka.asia');
            $this->email->cc('suresh@monarulanka.asia');
            $this->email->bcc('olga@lankacom.net');

            $this->email->subject('Inquiry From Monaru Lanka Contact Page');


            $msg = 'Message : ' . $this->input->post('message');
            $msg .= '<br/>Name : ' . $this->input->post('name');
            $msg .= '<br/>Email : ' . $this->input->post('email');
            $msg .= '<br/>Conact No : ' . $this->input->post('number');


            $this->email->message($msg);

            $this->email->send();

            echo '<spanv style="color:green;"><b>Thank you - We have now received your mail and will get back to you as soon as possible.</b></span>';
        } else {
            echo '<spanv style="color:red;"><b>An error occured.</b></span>';
        }

        //echo $_POST['name'];die();
        // print_r($_POST);
        //die();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */