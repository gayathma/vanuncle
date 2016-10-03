<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Privilege_master extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('USER_LOGGED_IN')) {
            redirect(site_url() . '/login/load_login');
        } else {
            $this->load->model('privilege_master/privilege_master_model');
            $this->load->model('privilege_master/privilege_master_service');
            
            $this->load->model('access_controll/access_controll_service');

        }
    }

    function manage_privilege_masters() {

        $perm = Access_controll_service::check_access('VIEW_MASTER_PRIVILEGES');
        if ($perm) {

            $privilege_master_service = new Privilege_master_service();


        $data['heading'] = "Manage Master Privileges";

        $data['privilege_masters'] = $privilege_master_service->get_all_master_privileges();


        $partials = array('content' => 'privilege_master/manage_privilege_master_view');
        $this->template->load('template/main_template', $partials, $data);
        } else {
            $this->template->load('template/access_denied_page');
        }
    }

    function add_new_privilege_master() {

//        $perm = Access_controllerservice :: checkAccess('ADD_MASTER_PRIVILEGES');
//        if ($perm) {

        $privilege_master_model = new Privilege_master_model();
        $privilege_master_service = new Privilege_master_service();

        $privilege_master_model->set_master_privilege($this->input->post('master_privilege', TRUE));
        $privilege_master_model->set_master_privilege_description($this->input->post('master_privilege_desc', TRUE));
        $privilege_master_model->set_system_code($this->input->post('system_code', TRUE));


        echo $privilege_master_service->add_new_master_privilege($privilege_master_model);
//        } else {
//            $this->template->load('template/access_denied_page');
//        }
    }

    function delete_privilege_master() {

//        $perm = Access_controllerservice :: checkAccess('DELETE_MASTER_PRIVILEGES');
//        if ($perm) {
        $privilege_master_service = new Privilege_master_service();

        echo $privilege_master_service->delete_master_privilege(trim($this->input->post('id', TRUE)));
//        } else {
//            $this->template->load('template/access_denied_page');
//        }
    }

    function load_edit_privilege_master_content() {

//        $perm = Access_controllerservice :: checkAccess('EDIT_MASTER_PRIVILEGES');
//        if ($perm) {

        $privilege_master_service = new Privilege_master_service();

        $data['heading'] = "Edit Master Privilege";

        $data['privilege_master'] = $privilege_master_service->get_master_privilege_by_id(trim($this->input->post('master_privilege_id', TRUE)));


        echo $this->load->view('privilege_master/edit_privilege_master_view',$data);

//        } else {
//            $this->template->load('template/access_denied_page');
//        }
    }

    function edit_master_privilege() {

//        $perm = Access_controllerservice :: checkAccess('EDIT_MASTER_PRIVILEGES');
//        if ($perm) {

        $privilege_master_model = new Privilege_master_model();
        $privilege_master_service = new Privilege_master_service();

        $privilege_master_model->set_master_privilege($this->input->post('master_privilege', TRUE));
        $privilege_master_model->set_master_privilege_description($this->input->post('master_privilege_desc', TRUE));
        $privilege_master_model->set_privilege_master_code($this->input->post('privilege_master_code', TRUE));
        $privilege_master_model->set_system_code($this->input->post('system_code', TRUE));

        echo $privilege_master_service->update_master_privilege($privilege_master_model);
//        } else {
//            $this->template->load('template/access_denied_page');
//        }
    }

}
