<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Make extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('USER_LOGGED_IN')) {
            redirect(site_url() . '/login/load_login');
        } else {
            $this->load->model('make/make_model');
            $this->load->model('make/make_service');
            
            $this->load->model('access_controll/access_controll_service');
        }
    }

    /* manage make functions
     * this will display all the make
     */

    function manage_makes() {

        $make_service = new Make_service();

        $data['heading'] = "Manage Makes";
        $data['results'] = $make_service->get_all_makes();

        $parials = array('content' => 'make/manage_make_view');
        $this->template->load('template/main_template', $parials, $data);
    }

    /*
     * adding a make
     */

    function add_make() {
        $make_model = new Make_model();
        $make_service = new Make_service();

        $make_model->set_name($this->input->post('name', TRUE));
        $make_model->set_added_by($this->session->userdata('USER_ID'));
        $make_model->set_added_date(date("Y-m-d H:i:s"));
        $make_model->set_updated_by(1);
        $make_model->set_is_published('1');
        $make_model->set_is_deleted('0');

        echo $make_service->add_new_make($make_model);
    }

    /*
     * Delete make
     */

    function delete_makes() {
        $make_service = new Make_service();
        echo $make_service->delete_make(trim($this->input->post('id', TRUE)));
    }

    /*
     * change the publish status of the make
     */

    function change_publish_status() {
        $make_model = new Make_model();
        $make_service = new Make_service();

        $make_model->set_id(trim($this->input->post('id', TRUE)));
        $make_model->set_is_published(trim($this->input->post('value', TRUE)));

        echo $make_service->publish_make($make_model);
    }

    /*
     * Edit make pop up content set up and then send
     */

    function load_edit_make_content() {
        $make_model = new Make_model();
        $make_service = new Make_service();

        $make_model->set_id(trim($this->input->post('make_id', TRUE)));
        $make = $make_service->get_make_by_id($make_model);
        $data['make'] = $make;

        echo $this->load->view('make/make_edit_pop_up', $data, TRUE);
    }

    /*
     * update the manufacute details
     */

    function edit_make() {
        $make_model = new Make_model();
        $make_service = new Make_service();

        $make_model->set_id($this->input->post('make_id', TRUE));
        $make_model->set_name($this->input->post('name', TRUE));
        $make_model->set_updated_by($this->session->userdata('USER_ID'));
        $make_model->set_updated_date(date("Y-m-d H:i:s"));
   
        echo $make_service->update_make($make_model);
    }


}
