<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vehicle_Model extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('USER_LOGGED_IN')) {
            redirect(site_url() . '/login/load_login');
        } else {
            $this->load->model('vehicle_model/vehicle_model_model');
            $this->load->model('vehicle_model/vehicle_model_service');

            $this->load->model('manufacture/manufacture_model');
            $this->load->model('manufacture/manufacture_service');

            $this->load->model('access_controll/access_controll_service');
        }
    }

    /*
     * This will display all the vehicle models
     */

    function manage_models() {

        $vehicle_model_service = new Vehicle_model_service();
        $manufacture_service = new Manufacture_service();

        $data['heading'] = "Manage Vehicle Models";
        $data['results'] = $vehicle_model_service->get_all_vehicle_models();
        $data['manufacturer_results'] = $manufacture_service->get_all_manufactures();

        $parials = array('content' => 'vehicle_model/manage_vehicle_model_view');
        $this->template->load('template/main_template', $parials, $data);
    }

    /*
     * This function is to add a new vehicle model using the method add_new_vehicle_model 
     * in vehicle model service
     */

    function add_new_vehicle_model() {

        $vehicle_model_model = new Vehicle_model_model();
        $vehicle_model_service = new Vehicle_model_service();

        $vehicle_model_model->set_manufacturer_id(trim($this->input->post('manufacturer', TRUE)));
        $vehicle_model_model->set_name($this->input->post('name', TRUE));
        $vehicle_model_model->set_is_published('1');
        $vehicle_model_model->set_is_deleted('0');
        $vehicle_model_model->set_added_date(date("Y-m-d H:i:s"));
        $vehicle_model_model->set_added_by($this->session->userdata('USER_ID'));

        echo $vehicle_model_service->add_new_vehicle_model($vehicle_model_model);
    }

    /*
     * This is to delete a vehicle model     
     */

    function delete_vehicle_model() {

        $vehicle_model_service = new Vehicle_model_service();

        echo $vehicle_model_service->delete_vehicle_model(trim($this->input->post('id', TRUE)));
    }

    /*
     * This function is to change publish status of a vehicle model using 
     * publish_vehicle_model function in vehicle_model_service
     */

    function change_publish_status() {
        $vehicle_model_model = new Vehicle_model_model();
        $vehicle_model_service = new Vehicle_model_service();

        $vehicle_model_model->set_id(trim($this->input->post('id', TRUE)));
        $vehicle_model_model->set_is_published(trim($this->input->post('value', TRUE)));

        echo $vehicle_model_service->publish_vehicle_model($vehicle_model_model);
    }

    /*
     * edit_vehicle_model function using the update_vehicle_model function in the 
     * Vehicle_model_service
     */

    function edit_vehicle_model() {

        $vehicle_model_model = new Vehicle_model_model();
        $vehicle_model_service = new Vehicle_model_service();

        $vehicle_model_model->set_id($this->input->post('vehicle_model_id', TRUE));
        $vehicle_model_model->set_manufacturer_id(trim($this->input->post('manufacturer', TRUE)));
        $vehicle_model_model->set_name($this->input->post('name', TRUE));
        $vehicle_model_model->set_updated_date(date("Y-m-d H:i:s"));
        $vehicle_model_model->set_updated_by($this->session->userdata('USER_ID'));

        echo $vehicle_model_service->update_vehicle_model($vehicle_model_model);
    }

    function load_edit_vehicle_model_content() {

        $vehicle_model_model = new Vehicle_model_model();
        $vehicle_model_service = new Vehicle_model_service();

        $manufacure_model = new Manufacture_model();
        $manufacture_service = new Manufacture_service();

        $vehicle_model_model->set_id(trim($this->input->post('vehicle_model_id', TRUE)));
        $vehicle_model = $vehicle_model_service->get_vehicle_model_by_id($vehicle_model_model);
        $data['vehicle_model'] = $vehicle_model;

        $manufacure_model->set_id($vehicle_model->manufacturer_id);
        $manufacturer = $manufacture_service->get_manufacure_by_id($manufacure_model);
        $data['manufacturer'] = $manufacturer;

        $data['manufacturer_results'] = $manufacture_service->get_all_manufactures();

        echo $this->load->view('vehicle_model/vehicle_model_edit_pop_up', $data, TRUE);
    }

}
