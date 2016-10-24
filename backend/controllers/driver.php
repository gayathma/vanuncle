<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Driver extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('USER_LOGGED_IN')) {
            redirect(site_url() . '/login/load_login');
        } else {
            $this->load->model('driver/driver_model');
            $this->load->model('driver/driver_service');

            $this->load->model('access_controll/access_controll_service');
        }
    }

    function manage_drivers() {
        $driver_service = new Driver_service();

        $data['heading'] = "Manage Registered Drivers";
        $data['results'] = $driver_service->get_drivers();        

        $parials = array('content' => 'driver/manage_driver_view');
        $this->template->load('template/main_template', $parials, $data);
    }


    /*
     * Function to delete driver
     */

    function delete_driver() {
        $driver_service = new Driver_service();
        echo $driver_service->delete(trim($this->input->post('driver_', TRUE)));
    }

}
