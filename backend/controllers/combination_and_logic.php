<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of combination_and_logic
 *
 * @author rifkhan
 */
class Combination_and_logic extends CI_Controller{
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('Logged_In')) {
         $this->load->model('combinations_and_logic/Combination_and_logic_model');
         $this->load->model('combinations_and_logic/Combination_and_logic_model_service');
         $this->load->model('attributes/Attributes_model_service');
         $this->load->model('Disciplines/Disciplines_model_service');
        }else{
             redirect('login');
        }
    }
    function manage_combination_and_logic(){
       // if ($user_privilege_model_service->getUserPrivilege('MANAGE_COMBINATION_LOGIC')) {
            $data['title_menu_main'] = "Master Records";
            $data['title'] = "Manage Combination Logic";
            $Attributes_model_service = new Attributes_model_service();
            $Disciplines_model_service = new Disciplines_model_service();
            $data['allAttributes'] =$Attributes_model_service->getAllAttributes();
            $data['allDisciplines']= $Disciplines_model_service->getAllDisciplines();
            $Combination_and_logic_model_service = new Combination_and_logic_model_service();
            $data['attributeDisciplineMapID'] = $Combination_and_logic_model_service->getAllAttributeDisciplineMap();
            $partials = array('content' => 'combinations_and_logic/manage_combination_and_logic'); //load the view		              
            $this->template->load('backend_template/primio_template', $partials, $data); //load teh template
//        }else {
//            $data['title_menu_main'] = "Access Denied";
//            $partials = array('content' => 'access_denied');
//            $this->template->load('backend_template/primio_template', $partials, $data);
//        }
    }
    function saveAttributeDisciplineMap(){
            $discipline_id = $this->input->post('discipline_id',TRUE);
            $idArr = $this->input->post('attribute_id',TRUE);
            
            $Combination_and_logic_model = new Combination_and_logic_model();
            $Combination_and_logic_model->setDiscipline_id($discipline_id);
            $Combination_and_logic_model->setAttribute_id_1($idArr[0]);
            $Combination_and_logic_model->setAttribute_id_2($idArr[1]);
            $Combination_and_logic_model->setAttribute_id_3($idArr[2]);
            
            $Combination_and_logic_model_service = new Combination_and_logic_model_service();
            
            if($Combination_and_logic_model_service->checkAvailableMap($Combination_and_logic_model)==0){
               //echo $idArr[0];die;
                //echo $discipline_id;die;
                
                 $Combination_and_logic_model->setDiscipline_id($discipline_id);
                $Combination_and_logic_model->setAttribute_id_1($idArr[0]);
                $Combination_and_logic_model->setAttribute_id_2($idArr[1]);
                $Combination_and_logic_model->setAttribute_id_3($idArr[2]);
                $Combination_and_logic_model->setPublished_status('1');
               
              echo  $Combination_and_logic_model_service->saveAttributeDisciplineMap($Combination_and_logic_model);
            }else{
                $res =2;
                echo $res;
            } 
    }
    function editAttributeDisciplineMap($id){
            $data['title_menu_main'] = "Master Records";
            $data['title'] = "Edit Combination Logic";
            $Attributes_model_service = new Attributes_model_service();
            $Disciplines_model_service = new Disciplines_model_service();
            $data['allAttributes'] =$Attributes_model_service->getAllAttributes();
            $data['allDisciplines']= $Disciplines_model_service->getAllDisciplines();
            $Combination_and_logic_model_service = new Combination_and_logic_model_service();
            $Combination_and_logic_model = new Combination_and_logic_model();
            $Combination_and_logic_model->setMap_id($id);
            $data['selectedInfo'] = $Combination_and_logic_model_service->getAttributeDisciplineMapId($Combination_and_logic_model);
            $partials = array('content' => 'combinations_and_logic/edit_combination_and_logic'); //load the view		              
            $this->template->load('backend_template/primio_template', $partials, $data);
    }
    function updateAttributeDisciplineMap(){
            $map_id =$this->input->post('map_id',TRUE);
            $discipline_id = $this->input->post('discipline_id',TRUE);
            $idArr = $this->input->post('attribute_id',TRUE);
           $published_status =$this->input->post('published_status',TRUE);
            $Combination_and_logic_model = new Combination_and_logic_model();
            
            $Combination_and_logic_model->setDiscipline_id($discipline_id);
            $Combination_and_logic_model->setAttribute_id_1($idArr[0]);
            $Combination_and_logic_model->setAttribute_id_2($idArr[1]);
            $Combination_and_logic_model->setAttribute_id_3($idArr[2]);
            
            $Combination_and_logic_model_service = new Combination_and_logic_model_service();
             
            if($Combination_and_logic_model_service->checkAvailableMap($Combination_and_logic_model)==0){
               //echo $idArr[0];die;
                //echo $discipline_id;die;
                
                $Combination_and_logic_model->setDiscipline_id($discipline_id);
                $Combination_and_logic_model->setAttribute_id_1($idArr[0]);
                $Combination_and_logic_model->setAttribute_id_2($idArr[1]);
                $Combination_and_logic_model->setAttribute_id_3($idArr[2]);
                $Combination_and_logic_model->setPublished_status($published_status);
                $Combination_and_logic_model->setMap_id($map_id);
               
              echo  $Combination_and_logic_model_service->updateAttributeDisciplineMap($Combination_and_logic_model);
            }else{
                $res =2;
                echo $res;
            }
    }
    function unpublishAttributeDisciplineMap(){
        
            $Combination_and_logic_model = new Combination_and_logic_model();
            $Combination_and_logic_model->setMap_id($this->input->post('map_id'));
            $Combination_and_logic_model->setPublished_status('0');
            
            $Combination_and_logic_model_service = new Combination_and_logic_model_service();
           echo $Combination_and_logic_model_service->updateAttributeDisciplineMap($Combination_and_logic_model);
    }
}
?>