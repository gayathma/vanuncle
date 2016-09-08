<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sign_up extends CI_Controller {

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

        $this->load->model('driver/driver_model');
        $this->load->model('driver/driver_service');
    }

    public function index() {
        if ($this->session->userdata('USER_LOGGED_IN')) {
            redirect(site_url() . '/home/index');
        } else {
            $partials = array('content' => 'pages/sign_up');
            $this->template->load('template/template', $partials);
        }
    }

    function add_new_driver() {

        $driver_model   = new Driver_model();
        $driver_service = new Driver_service();

        $driver_model->set_name($this->input->post('name', TRUE));
        $driver_model->set_nic($this->input->post('nic', TRUE));
        $driver_model->set_mobile($this->input->post('mobile', TRUE));
        $driver_model->set_land_phone($this->input->post('land_phone', TRUE));
        $driver_model->set_email(trim($this->input->post('email', TRUE)));
        $driver_model->set_profile_pic('avatar.png');
        $driver_model->set_password(md5($this->input->post('password', TRUE)));
        $driver_model->set_is_deleted('0');
        $driver_model->set_added_date(date('Y-m-d'));

        echo $driver_service->add_new_driver($driver_model);

    }

    public function generate_random_string($length = 10) {
        $characters    = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random_string = '';
        for ($i = 0; $i < $length; $i++) {
            $random_string .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $random_string;
    }

}
