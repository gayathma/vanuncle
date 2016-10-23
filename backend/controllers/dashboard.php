<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
     */
    function __construct() {

        parent::__construct();


        $this->load->model('driver/driver_model');
        $this->load->model('driver/driver_service');

        $this->load->model('vehicle_advertisments/vehicle_advertisments_model');
        $this->load->model('vehicle_advertisments/vehicle_advertisments_service');

        $this->load->model('comments/comments_model');
        $this->load->model('comments/comments_service');
    }

    function index() {

        $driver_service               = new Driver_service();
        $vehicle_advertisements_service = new Vehicle_advertisments_service();
        $comments_service               = new Comments_service();

        $data['heading']        = 'Dashboard';
        $data['drivers_count']  = count($driver_service->get_drivers());
        /*$data['approved_count'] = count($vehicle_advertisements_service->get_approved_advertisements());
        $data['pending_count']  = count($vehicle_advertisements_service->get_pending_advertisements());
        $data['reviews_count']  = count($comments_service->get_all_comments());*/


        $partials = array('content' => 'dashboard/dashboard_view');
        $this->template->load('template/main_template', $partials, $data);
    }

}