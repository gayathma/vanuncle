<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vehicle_Model extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('USER_LOGGED_IN')) {
            redirect(site_url() . '/login/load_login');
        } else {
            $this->load->model('model/model_model');
            $this->load->model('model/model_service');

            $this->load->model('make/make_model');
            $this->load->model('make/make_service');
        }
    }

    /*
     * This will display all the models
     */

    function manage_models() {

        $model_service = new Model_service();
        $make_service = new Make_service();

        $data['heading'] = "Manage Models";
        $data['results'] = $model_service->get_all_models();
        $data['makes'] = $make_service->get_all_makes();

        $parials = array('content' => 'model/manage_model_view');
        $this->template->load('template/main_template', $parials, $data);
    }

    /*
     * This function is to add a new model using the method add_new_model 
     * in model service
     */

    function add_new_model() {

        $model_model = new Model_model();
        $model_service = new Model_service();

        $model_model->set_make_id(trim($this->input->post('make', TRUE)));
        $model_model->set_name($this->input->post('name', TRUE));
        $model_model->set_is_published('1');
        $model_model->set_is_deleted('0');
        $model_model->set_added_date(date("Y-m-d H:i:s"));
        $model_model->set_added_by($this->session->userdata('USER_ID'));

        echo $model_service->add_new_model($model_model);
    }

    /*
     * This is to delete a model     
     */

    function delete_model() {

        $model_service = new Model_service();

        echo $model_service->delete_model(trim($this->input->post('id', TRUE)));
    }

    /*
     * This function is to change publish status of a model using 
     * publish_model function in model_service
     */

    function change_publish_status() {
        $model_model = new Model_model();
        $model_service = new Model_service();

        $model_model->set_id(trim($this->input->post('id', TRUE)));
        $model_model->set_is_published(trim($this->input->post('value', TRUE)));

        echo $model_service->publish_model($model_model);
    }

    /*
     * edit_model function using the update_model function in the 
     * Model_service
     */

    function edit_model() {

        $model_model = new Model_model();
        $model_service = new Model_service();

        $model_model->set_id($this->input->post('model_id', TRUE));
        $model_model->set_make_id(trim($this->input->post('make', TRUE)));
        $model_model->set_name($this->input->post('name', TRUE));
        $model_model->set_updated_date(date("Y-m-d H:i:s"));
        $model_model->set_updated_by($this->session->userdata('USER_ID'));

        echo $model_service->update_model($model_model);
    }

    function load_edit_model_content() {

        $model_model = new Model_model();
        $model_service = new Model_service();

        $make_model = new Make_model();
        $make_service = new Make_service();

        $model_model->set_id(trim($this->input->post('model_id', TRUE)));
        $model = $model_service->get_model_by_id($model_model);
        $data['model'] = $model;

        $make_model->set_id($model->make_id);
        $make = $make_service->get_make_by_id($make_model);
        $data['make'] = $make;

        $data['makes'] = $make_service->get_all_makes();

        echo $this->load->view('model/model_edit_pop_up', $data, TRUE);
    }

}
