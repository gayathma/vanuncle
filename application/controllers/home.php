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

        $this->load->model('vehicles/vehicles_model');
        $this->load->model('vehicles/vehicles_service');

        $this->load->model('vehicle_route/vehicle_route_model');
        $this->load->model('vehicle_route/vehicle_route_service');

        $this->load->library('pagination');

    }

    public function index() {
        $data['data'] = '';
        $partials = array('content' => 'home/main');
        $this->template->load('template/template', $partials, $data);
    }

    public function search($start = 0){
        $vehicle_route_service = new Vehicle_route_service();

        $config = array();
        $config["base_url"] = site_url() . "/home/search/";
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config["num_links"] = 4;

        $service_type = $this->input->post('service_type', TRUE);
        $pickup_location = $this->input->post('pick_up_loc', TRUE);
        $dropoff_location = $this->input->post('drop_off_loc', TRUE);

         $data['results'] = $vehicle_route_service->search_vehicles($service_type, $pickup_location, $dropoff_location, $config["per_page"], $start, 'half');

        $config["total_rows"] = count($vehicle_route_service->search_vehicles($service_type, $pickup_location, $dropoff_location, $config["per_page"], 0, 'all'));


        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        $parials = array('content' => 'pages/search_results');
        $this->template->load('template/template', $parials, $data);

    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */