<?php

class Account extends CI_Controller {

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

         if (!$this->session->userdata('USER_LOGGED_IN')) {
            redirect(site_url() . '/login/index');
        } else {
            $this->load->model('driver/driver_model');
            $this->load->model('driver/driver_service');

            $this->load->model('vehicles/vehicles_model');
            $this->load->model('vehicles/vehicles_service');
        }
    }

    public function index() {
        if ($this->session->userdata('USER_LOGGED_IN')) {
            
            $vehicles_service = new Vehicles_service();
            $driver_service = new Driver_service();
            
            $data['my_vehicles'] = $vehicles_service->get_my_vehicles($this->session->userdata('USER_ID'));
            $data['driver'] = $driver_service->get_driver_by_id($this->session->userdata('USER_ID'));
                        
            $parials = array('content' => 'pages/account');
            $this->template->load('template/template', $parials, $data);
        } else {
            $partials = array('content' => 'pages/login');
            $this->template->load('template/template', $partials);
        }
    }

     function upload_driver_profile_pic() {
        $uploaddir = './uploads/drivers/';
        $unique_tag = 'dri_';
        $filename = $unique_tag . time() . '-' . basename($_FILES['uploadfile']['name']); //this is the file name
        $file = $uploaddir . $filename; // this is the full path of the uploaded file
        if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) {
            echo $filename;
        } else {
            echo "error";
        }
    }

}
