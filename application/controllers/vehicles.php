<?php

class Vehicles extends CI_Controller {

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

        $this->load->model('driver/driver_model');
        $this->load->model('driver/driver_service');
        
        $this->load->model('vehicles/vehicles_model');
        $this->load->model('vehicles/vehicles_service');

        $this->load->model('make/make_model');
        $this->load->model('make/make_service');
    }

    public function index() {
        if ($this->session->userdata('USER_LOGGED_IN')) {
            
            $make_service =  new Make_service();
            $data['makes'] = $make_service->get_all_makes();

                        
            $parials = array('content' => 'pages/add_vehicle');
            $this->template->load('template/template', $parials,$data);
        } else {
            $partials = array('content' => 'pages/login');
            $this->template->load('template/template', $partials);
        }
    }

}
