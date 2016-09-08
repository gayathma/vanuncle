<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Attributes extends CI_Controller {

    // define class
    public function __construct() {
        parent::__construct();
        // class constructor
        if ($this->session->userdata('Logged_In')) {

            $this->load->model('attributes/attributes_model');
            $this->load->model('attributes/Attributes_model_service');
        } else {
            redirect('login');
        }
    }

    function save() {
        $user_privilege_model_service = new User_privilege_model_service();

        if ($user_privilege_model_service->getUserPrivilege('ADD_ATTRIBUTES')) {

            $data ['title'] = "Define Attributes";

            $partials = array(
                'content' => 'attributes/view_add_attributes'
            ); // load the view
            $this->template->load('backend_template/primio_template', $partials, $data); // load teh template
        } else {
            $data['title_menu_main'] = "Access Denied";
            $partials = array('content' => 'access_denied');
            $this->template->load('backend_template/primio_template', $partials, $data);
        }
    }

    function attinput() {


        $Attributes_model = new Attributes_model ();
        $Attributes_model_service = new Attributes_model_service ();

        // $skill_attributes_model->setAttribute_id($this->input->post('attribute_id', TRUE));
        $Attributes_model->setAttribute_ref($this->input->post('attribute_ref', TRUE));
        $Attributes_model->setAttribute_eng($this->input->post('attribute_eng', TRUE));
        $Attributes_model->setAttribute_sin($this->input->post('attribute_sin', TRUE));
        $Attributes_model->setAttribute_tam($this->input->post('attribute_tam', TRUE));
        $Attributes_model->setAdded_date(date("Y-m-d H:i:s"));
        $Attributes_model->setAdded_by($this->session->userdata('User_Id'));
        //	$Attributes_model->setUpdated_date ();
        //	$Attributes_model->setUpdated_by ( $this->input->post ( 'updated_by', TRUE ) );
        $Attributes_model->setDelete_index('0');
        $Attributes_model->setEnglish_status('1');
        $Attributes_model->setSinhala_status('1');
        $Attributes_model->setTamil_status('1');
        $Attributes_model->setPublished_status('1');
        echo $Attributes_model_service->saveAttribute($Attributes_model);
    }

    function manage_attributes() {

        $user_privilege_model_service = new User_privilege_model_service();

        if ($user_privilege_model_service->getUserPrivilege('MANAGE_ATTRIBUTES')) {

            $data['title_menu_main'] = "Master Records";




            $data ['query'] = $this->Attributes_model_service->getAllAttributes();

            $partials = array(
                'content' => 'attributes/view_all_attributes'
            ); // load the view
            $this->template->load('backend_template/primio_template', $partials, $data);
        } else {
            $data['title_menu_main'] = "Access Denied";
            $partials = array('content' => 'access_denied');
            $this->template->load('backend_template/primio_template', $partials, $data);
        }
    }

    function change($id) {

        $user_privilege_model_service = new User_privilege_model_service();

        if ($user_privilege_model_service->getUserPrivilege('EDIT_ATTRIBUTES')) {


            $data['title_menu_main'] = "Master Records";
            $Attributes_model = new Attributes_model ();
            $Attributes_model_service = new Attributes_model_service ();
            $id = $this->uri->segment(3);

            $data ['attribute_id'] = $id;
            $Attributes_model->setAttribute_id($id);
            $data ['attributedetails'] = $Attributes_model_service->getAttById($id);

            // $this->load->view('attributes/view_change_attributes', $data);

            $partials = array(
                'content' => 'attributes/view_change_attributes'
            ); // load the view
            $this->template->load('backend_template/primio_template', $partials, $data); // load teh template
        } else {
            $data['title_menu_main'] = "Access Denied";
            $partials = array('content' => 'access_denied');
            $this->template->load('backend_template/primio_template', $partials, $data);
        }
    }

    function update() {
        $Attributes_model = new Attributes_model ();
        $Attributes_model_service = new Attributes_model_service ();

        // //loads library,helper and model
        $data ['title'] = "Change Attributes";
        // $data=$this->Attributes_model_services->general();
        // //sets geenral attributes
        $Attributes_model->setAttribute_id($this->input->post('attribute_id'));
        $Attributes_model->setAttribute_ref($this->input->post('attribute_ref', TRUE));
        $Attributes_model->setAttribute_eng($this->input->post('attribute_eng', TRUE));
        $Attributes_model->setAttribute_sin($this->input->post('attribute_sin', TRUE));
        $Attributes_model->setAttribute_tam($this->input->post('attribute_tam', TRUE));
        // $student_model->setPassword($this->input->post('password', TRUE));
        $Attributes_model->setUpdated_date(date('Y-m-d'));
        $Attributes_model->setUpdated_by($this->session->userdata('User_Id'));
        $Attributes_model->setEnglish_status($this->input->post('english_status', TRUE));
        $Attributes_model->setSinhala_status($this->input->post('sinhala_status', TRUE));
        $Attributes_model->setTamil_status($this->input->post('tamil_status', TRUE));
        $Attributes_model->setPublished_status($this->input->post('published_status', TRUE));
        // $student_model->setUpdatedBy(2); // this should be session
        echo $Attributes_model_service->updateAttribute($Attributes_model);
    }

    // this is to delete the attributes by id
    // added by viran
    function deleteAttribute() {
        $user_privilege_model_service = new User_privilege_model_service();

        if ($user_privilege_model_service->getUserPrivilege('DELETE_ATTRIBUTES')) {
            // print_r($_POST);die();
            $attributes_model = new Attributes_model ();
            $attributes_model_service = new Attributes_model_service ();

            $attributes_model->setAttribute_id($this->input->post('attribute_id', TRUE));
            $attributes_model->setDelete_index('1');
            echo $attributes_model_service->deleteAttribute($attributes_model);
        } else {
            $data['title_menu_main'] = "Access Denied";
            $partials = array('content' => 'access_denied');
            $this->template->load('backend_template/primio_template', $partials, $data);
        }
    }

    public function delete($id) {
        $user_privilege_model_service = new User_privilege_model_service();

        if ($user_privilege_model_service->getUserPrivilege('DELETE_ATTRIBUTES')) {

            $Attributes_model = new Attributes_model ();
            $Attributes_model_service = new Attributes_model_service ();
            $id = $this->uri->segment(3);
            // $district_model_service = new District_model_service();
            // $data['districts'] = $district_model_service->getAllDistricts();
            if ((int) $id > 0) {
                $query = $this->$Attributes_model_service->deleteAttribute($Attributes_model);
                // //calls delete function in the model for the selected row
            }

            $data ['query'] = $this->$Attributes_model_service->getAllAttributes();
        } else {
            $data['title_menu_main'] = "Access Denied";
            $partials = array('content' => 'access_denied');
            $this->template->load('backend_template/primio_template', $partials, $data);
        }
        // $this->load->view('attributes_main',$data);
        // loads general settings and view
        // $partials = array('content' => 'skill_attributes/view_delete_attributes'); //load the view
        // $this->template->load('backend_template/primio_template', $partials, $data);//load teh template
    }

    public function unpublishUser($id) {
        $attributes_model = new Attributes_model ();
        $attributes_model_service = new Attributes_model_service ();
        $id = $this->uri->segment(3);

        if ((int) $id > 0) {
            $query = $this->$attributes_model_service->unpublishUser($attributes_model);
            // //calls delete function in the model for the selected row
        }
    }

}

?>
