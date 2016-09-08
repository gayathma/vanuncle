<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

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

        $this->load->model('sliders/Sliders_model');
        $this->load->model('sliders/Sliders_service');


        $this->load->model('content/content_model');
        $this->load->model('content/content_service');
    }

    public function index() {


        $sliders_model   = new Sliders_model();
        $sliders_service = new Sliders_service();

        $content_service = new Content_service();

        $sliders_model->setSlider_id('1');
        $data['slider_featured'] = $sliders_service->getSlideritemsbysliderid($sliders_model);


        $sliders_model->setSlider_id('2');
        $data['slider_main'] = $sliders_service->getSlideritemsbysliderid($sliders_model);


        $sliders_model->setSlider_id('3');
        $data['slider_airways'] = $sliders_service->getSlideritemsbysliderid($sliders_model);


        $data['right_side_snippet'] = $content_service->getContentbyhcode('RIGHTSIDESNIPPET');

        $data['welcome_note'] = $content_service->getContentbyhcode('WELCOMEHOMEPAGE');

        $data['footer_right'] = $content_service->getContentbyhcode('FOOTERROGHT');

        $partials = array('content' => 'home/main');
        $this->template->load('template/template', $partials, $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */