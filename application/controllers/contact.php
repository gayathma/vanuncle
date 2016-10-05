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

            $this->load->library('email');

            $this->email->from($this->input->post('email'), $this->input->post('name'));
            $this->email->to('info@vanuncle.lk');
            $this->email->cc('gayathma3@gmail.com');

            $this->email->subject('Inquiry From vanUncle.lk Contact Page');


            $msg = 'Message : ' . $this->input->post('message');
            $msg .= '<br/>Name : ' . $this->input->post('name');
            $msg .= '<br/>Email : ' . $this->input->post('email');


            $this->email->message($msg);

            $this->email->send();

            echo '<spanv style="color:green;"><b>Thank you - We have now received your mail and will get back to you as soon as possible.</b></span>';
       
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */