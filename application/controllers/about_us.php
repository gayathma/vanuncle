<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class About_us extends CI_Controller {

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
      

        $this->load->model('content/content_model');
        $this->load->model('content/content_service');

    }

    public function index() {
        
        $content_service = new Content_service();

        $data['about_content'] = $content_service->getContentbyhcode("ABOUTUS");

        $partials = array('content' => 'pages/about_us');
        $this->template->load('template/template', $partials, $data);
    }
}