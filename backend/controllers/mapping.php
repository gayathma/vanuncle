<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mapping extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('Logged_In')) {

            $this->load->model('Disciplines/Disciplines_model');
            $this->load->model('Disciplines/Disciplines_model_service');

            $this->load->model('sub_disciplines/Sub_disciplines_model');
            $this->load->model('sub_disciplines/Sub_disciplines_model_service');

            $this->load->model('institutes/Institutes_model');
            $this->load->model('institutes/Institutes_model_service');

            $this->load->model('map_dis_occupations/Disciplines_occupations_model');
            $this->load->model('map_dis_occupations/Disciplines_occupations_model_service');
        } else {
            $this->load->view('login');
        }
    }

    public function index() {
        
    }

    public function mapped_dis_institutes() {

        $user_privilege_model_service = new User_privilege_model_service();

        if ($user_privilege_model_service->getUserPrivilege('MAP_OCCU_INSTITUTES')) {


            $disciplines_occupations_model_service = new Disciplines_occupations_model_service();
            $disciplines_model_service = new Disciplines_model_service();

            $institute_model_service = new Institutes_model_service();

            $data['title_menu_main'] = "Master Records";
            $data['major_disciplines'] = $disciplines_model_service->getAllDisciplines();
            $data['institutes'] = $institute_model_service->getAllInstitutes();

            $data['mappings'] = $disciplines_occupations_model_service->getAllMappings();

            $partials = array('content' => 'occu_institutes_mapping/manage_mappings');
            $this->template->load('backend_template/primio_template', $partials, $data);
        } else {
            $data['title_menu_main'] = "Access Denied";
            $partials = array('content' => 'access_denied');
            $this->template->load('backend_template/primio_template', $partials, $data);
        }
    }

    public function saveMap() {

        $user_privilege_model_service = new User_privilege_model_service();

        if ($user_privilege_model_service->getUserPrivilege('ADD_MAP_OCCU_INSTITUTES')) {

            $disciplines_occupations_model = new Disciplines_occupations_model();
            $disciplines_occupations_model_service = new Disciplines_occupations_model_service();

            $disciplines_occupations_model->setOccupationId($this->input->post('occupatn', TRUE));
            $disciplines_occupations_model->setEngStatus($this->input->post('eng_status'));
            $disciplines_occupations_model->setSinStatus($this->input->post('sin_status'));
            $disciplines_occupations_model->setTamStatus($this->input->post('tam_status'));
            $disciplines_occupations_model->setPublishedStatus($this->input->post('pub_status'));

            $disciplines_occupations_model->setAddedDate(date("Y-m-d H:i:s"));
            $disciplines_occupations_model->setAddedBy($this->session->userdata('User_Id'));
            $disciplines_occupations_model->setDeletedIndex('0');

            $selected_institutes = $this->input->post('institute_check', TRUE);
            $num = 0;

            if (!empty($selected_institutes)) {
                for ($i = 0; $i < count($selected_institutes); $i++) {
                    $disciplines_occupations_model->setInstituteId($selected_institutes[$i]);
                    $disciplines_occupations_model->setInstituteUrl($this->input->post('url_' . $selected_institutes[$i]));
                    if ($disciplines_occupations_model_service->saveMapping($disciplines_occupations_model)) {
                        $num++;
                    }
                }

                if ($num == count($selected_institutes)) {
                    echo 'Institute(s) & Occupation Successfully Mapped. ########## success canhide';
                } else {
                    echo 'Error. Try again ! ########## warning';
                }
                //echo $this->session->userdata('Custom_Msg');
            } else {
                echo "Select Institutes ########## info canhide";
            }
        } else {
            $data['title_menu_main'] = "Access Denied";
            $partials = array('content' => 'access_denied');
            $this->template->load('backend_template/primio_template', $partials, $data);
        }
    }

    public function loadSubDisciplines() {

        $discipline_model = new Disciplines_model();
        $disciplines_model_service = new Disciplines_model_service();

        $discipline_model->setDisciplineId($this->input->post('dis_id', TRUE));

        $result = $disciplines_model_service->getSubDisOnDisId($discipline_model);

        echo $result;
    }

    public function loadOccupations() {

        $sub_discipline_model = new Sub_disciplines_model();
        $sub_discipline_model_service = new Sub_disciplines_model_service();

        $sub_discipline_model->setCategory_id($this->input->post('sub_dis_id', TRUE));

        $result = $sub_discipline_model_service->loadOccupationOnSubDisId($sub_discipline_model);

        echo $result;
    }

    public function edit_mapping($id) {

        
         $user_privilege_model_service = new User_privilege_model_service();

        if ($user_privilege_model_service->getUserPrivilege('EDIT_MAP_OCCU_INSTITUTES')) {


            $disciplines_occupations_model_service = new Disciplines_occupations_model_service();
            $disciplines_model_service = new Disciplines_model_service();

            $institute_model_service = new Institutes_model_service();

            $data['title_menu_main'] = "Master Records";
            $data['major_disciplines'] = $disciplines_model_service->getAllDisciplines();
            $data['institutes'] = $institute_model_service->getAllInstitutes();

            $data['mapped'] = $disciplines_occupations_model_service->getMapped($id);
            //print_r($data['mapped']); die;
            //$data['mappings'] = $disciplines_occupations_model_service->getAllMappings();

            $partials = array('content' => 'occu_institutes_mapping/edit_mappings');
            $this->template->load('backend_template/primio_template', $partials, $data);
       } else {
            $data['title_menu_main'] = "Access Denied";
            $partials = array('content' => 'access_denied');
            $this->template->load('backend_template/primio_template', $partials, $data);
        }
    }

    public function updateMap() {

        if ($this->session->userdata('Logged_In')) {

            $disciplines_occupations_model = new Disciplines_occupations_model();
            $disciplines_occupations_model_service = new Disciplines_occupations_model_service();

            $disciplines_occupations_model->setMapId($this->input->post('map_id', TRUE));
            $disciplines_occupations_model->setOccupationId($this->input->post('occupatn', TRUE));
            $disciplines_occupations_model->setInstituteUrl($this->input->post('url_english', TRUE));
            $disciplines_occupations_model->setUpdatedDate(date("Y-m-d H:i:s"));
            $disciplines_occupations_model->setUpdatedBy($this->session->userdata('User_Id'));
            $disciplines_occupations_model->setEngStatus($this->input->post('eng_status'));
            $disciplines_occupations_model->setSinStatus($this->input->post('sin_status'));
            $disciplines_occupations_model->setTamStatus($this->input->post('tam_status'));
            $disciplines_occupations_model->setPublishedStatus($this->input->post('pub_status'));

            if ($disciplines_occupations_model_service->updateMapped($disciplines_occupations_model)) {
                echo "Successfully Updated. ########## success canhide";
            } else {
                echo "Error while updating details. Try again ! ########## warning";
            }
        } else {
            $this->load->view('login');
        }
    }

    public function deleteMap() {
        
         $user_privilege_model_service = new User_privilege_model_service();

        if ($user_privilege_model_service->getUserPrivilege('DELETE_MAP_OCCU_INSTITUTES')) {

            $disciplines_occupations_model = new Disciplines_occupations_model();
            $disciplines_occupations_model_service = new Disciplines_occupations_model_service();

            $disciplines_occupations_model->setMapId($this->input->post('map_id', TRUE));
            $disciplines_occupations_model->setDeletedIndex('1');
            $disciplines_occupations_model->setUpdatedDate(date("Y-m-d H:i:s"));
            $disciplines_occupations_model->setUpdatedBy($this->session->userdata('User_Id'));

            if ($disciplines_occupations_model_service->deleteMapped($disciplines_occupations_model)) {
                echo "Successfully deleted. ########## success canhide";
            } else {
                echo "Error while deleting. Try again ! ########## warning";
            }
         } else {
            $data['title_menu_main'] = "Access Denied";
            $partials = array('content' => 'access_denied');
            $this->template->load('backend_template/primio_template', $partials, $data);
        }
    }

}

?>