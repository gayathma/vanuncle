<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

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
    }

    public function index() {
        if ($this->session->userdata('USER_LOGGED_IN')) {
            redirect(site_url() . '/home/index');
        } else {
            $partials = array('content' => 'pages/login');
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

     function authenticate_driver() {
        $driver_model   = new Driver_model();
        $driver_service = new Driver_service();

        $driver_model->set_email($this->input->post('username', TRUE));
        $driver_model->set_password(md5($this->input->post('password', TRUE)));
        $result_user = $driver_service->authenticate_user_with_password($driver_model);
  
        if (count($result_user) != 0) {
            $this->session->set_userdata('USER_ID', $result_user->id);
            $this->session->set_userdata('USER_FULLNAME', $result_user->name);
            $this->session->set_userdata('USER_NAME', $result_user->email);
            $this->session->set_userdata('USER_EMAIL', $result_user->email);
            $this->session->set_userdata('USER_MOBILE', $result_user->mobile);
            $this->session->set_userdata('USER_PROFILE_PIC', $result_user->profile_pic);
            $this->session->set_userdata('USER_LOGGED_IN', 'TRUE');

            echo 1;
        } else {
            echo 0;
        }
    }

      function logout() {
        $driver_model   = new Driver_model();
        $driver_service = new Driver_service();
        
        $this->session->set_userdata('USER_LOGGED_IN', 'FALSE');
        $this->session->sess_destroy();
        redirect(site_url() . '/login/index');
    }

}
