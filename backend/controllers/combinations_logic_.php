<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of combinations_logic
 *
 * @author rifkhan
 */
class Combinations_logic extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('Logged_In')) {
            $this->load->model('combinations_and_logic/Combinations_logic_model');
            $this->load->model('combinations_and_logic/Combinations_logic_model_services');
            $this->load->model('attributes/Attributes_model_service');
            $this->load->model('Disciplines/Disciplines_model_service');
        } else {
            redirect('login');
        }
    }

    function allDisciplineMap() {
        $user_privilege_model_service = new User_privilege_model_service();

        if ($user_privilege_model_service->getUserPrivilege('MANAGE_COMBINATION_LOGIC')) {

            $data['title_menu_main'] = "Master Records";
            $data['title'] = "Manage Combination Logic";
            $combinations_logic_services = new Combinations_logic_model_services();
            $attributes_model_service = new Attributes_model_service();
            $disciplines_model_service = new Disciplines_model_service();

            //  $data['viewAllAttributeDisciplineMap'] = $disciplines_model_service->getAllAttributeDisciplineMap();
            $data['allAttributes'] = $attributes_model_service->getAllAttributes();
            $data['allDisciplines'] = $disciplines_model_service->getAllDisciplines();
            $partials = array('content' => 'combinations_logic/manage_combination_logic'); //load the view		              
            $this->template->load('backend_template/primio_template', $partials, $data); //load teh template
        } else {
            $data['title_menu_main'] = "Access Denied";
            $partials = array('content' => 'access_denied');
            $this->template->load('backend_template/primio_template', $partials, $data);
        }
    }

    function addDisciplineMap() {
        $user_privilege_model_service = new User_privilege_model_service();
 
        if ($user_privilege_model_service->getUserPrivilege('ADD_COMBINATION_LOGIC')) {

            
            
            $discipline_id = $this->input->post('discipline_id');
            $idArr = $this->input->post('attribute_id');
           //echo $discipline_id;die;
            $combinations_logic_model_services = new Combinations_logic_model_services();
            $combinations_logic_model = new Combinations_logic_model();
            $combinations_logic_model->setDiscipline_id($discipline_id);
            $combinations_logic_model->setAttribute_id($idArr[0]);
            $combinations_logic_model->setAttribute_id1($idArr[1]);
            $combinations_logic_model->setAttribute_id2($idArr[2]);
            //echo $combinations_logic_model_services->checkDisciplineMapAvailable($combinations_logic_model);die;
           
           // echo $combinations_logic_model_services->checkDisciplineMapAvailable($combinations_logic_model);
           // die();
           // 
           
           // echo $combinations_logic_model_services->checkDisciplineMapAvailable($combinations_logic_model);
            //die();
            
            
            
            if ($combinations_logic_model_services->checkDisciplineMapAvailable($combinations_logic_model) != '3') {
              //echo 'doddne'; die;
                
                
                $get_id = $combinations_logic_model_services->getDisciplineMap();
                $combinations_logic_model2 = new Combinations_logic_model();
                $combinations_logic_model_services2 = new Combinations_logic_model_services();
                foreach ($get_id as $id) {
                    $common_id = $id->common_id + 1;
                }$attribute_id_ = "";
                for ($x = 0; $x < 3; $x++) {
                    $combinations_logic_model2->setCommon_id($common_id);
                    $combinations_logic_model2->setAttribute_id($idArr[$x]);
                    $combinations_logic_model2->setDiscipline_id($discipline_id);
                    $combinations_logic_model2->setPublished_status('1');
                    $res = $combinations_logic_model_services2->addDisciplineMap($combinations_logic_model2);
                }
                
                    echo $res;
            } else {
                $res = 2;
                echo $res;
            }
        } else {
            $data['title_menu_main'] = "Access Denied";
            $partials = array('content' => 'access_denied');
            $this->template->load('backend_template/primio_template', $partials, $data);
        }
    }

    function showManageDisicplineMap() {

        $combinations_logic_model = new Combinations_logic_model();
        $combinations_logic_model->setDiscipline_id($this->input->post('discipline_id', TRUE));

        $combinations_logic_services = new Combinations_logic_model_services();
        $results = $combinations_logic_services->getAllAttributeDisciplineMapByDId($combinations_logic_model);
        ?>

        <tr>
            <th width="18%"><h5>&nbsp;</h5></th>
        <th width="18%"><h5>&nbsp;</h5></th>
        <th width="18%"><h5>&nbsp;</h5></th>
        <th width="10%"><h5>&nbsp;</h5></th>
        </tr>
        <?php
        if (count($results) != 0) {
            foreach ($results as $row) {

                echo $row->common_id
                ?>
                <tr>
                    <td><?php echo $row->discipline_eng ?></td>

                    <td><?php
                $combinations_logic_model->setCommon_id($row->common_id);
                $results2 = $combinations_logic_services->getAllAttributeDisciplineMapByCommonId($combinations_logic_model);
                foreach ($results2 as $row2) {

                    echo '<a>' . $row2->attribute_eng . '</a><br>';
                }
                ?></td>
                    <td>
                        <?php if ($row->published_status == '1') { ?>
                            <img src="<?php echo base_url(); ?>backend_resources/images/tick_circle.png" title="Published" />
                        <?php } else if ($row->published_status == '0') { ?>
                            <img src="<?php echo base_url(); ?>backend_resources/images/cross_circle.png" title="Unpublished" />
                        <?php } ?>
                    </td>
                    <td class="controls">
                        <?php $id = $row->common_id; ?>
                        <a href="<?php echo base_url() . 'backend.php/combinations_logic/editDiscipline/' . $id; ?>" title="Edit" >
                            <?php
                            $user_privilege_model_service = new User_privilege_model_service();

                            if ($user_privilege_model_service->getUserPrivilege('EDIT_COMBINATION_LOGIC')) {
                                ?><img src="<?php echo base_url(); ?>backend_resources/images/pencil_gray.png" height="16px" width="16px" title="Edit" style=" cursor: pointer;" /></a><?php } ?>
                    </td>
                </tr>


                <?php
            }
        } else {
            
        }
        ?>

        <?php
    }

    function editDiscipline($id) {

        $user_privilege_model_service = new User_privilege_model_service();

        if ($user_privilege_model_service->getUserPrivilege('EDIT_COMBINATION_LOGIC')) {



            $data['title_menu_main'] = "Master Records";
            $data['title'] = "Edit Combination Logic";
            $combinations_logic_services = new Combinations_logic_model_services();
            $attributes_model_service = new Attributes_model_service();
            $disciplines_model_service = new Disciplines_model_service();
            $data['allAttributes'] = $attributes_model_service->getAllAttributes();
            $data['allDisciplines'] = $disciplines_model_service->getAllDisciplines();
            $combinations_logic_model = new Combinations_logic_model();
            $combinations_logic_model->setCommon_id($id);
            $data['selectedValues'] = $combinations_logic_services->getAllAttributeDisciplineMapByCommonId($combinations_logic_model);
            $data['selectedValues2'] = $combinations_logic_services->getAllAttributeDisciplineMapByCommonId($combinations_logic_model);
            $partials = array('content' => 'combinations_logic/edit_combination_logic'); //load the view		              
            $this->template->load('backend_template/primio_template', $partials, $data);
        } else {
            $data['title_menu_main'] = "Access Denied";
            $partials = array('content' => 'access_denied');
            $this->template->load('backend_template/primio_template', $partials, $data);
        }
    }
    
    
    
    
    function editDisciplineMap() {
        $user_privilege_model_service = new User_privilege_model_service();

        if ($user_privilege_model_service->getUserPrivilege('ADD_COMBINATION_LOGIC')) {

            echo  $this->input->post('map_id');die;
            $discipline_id = $this->input->post('discipline_id');
            $attribute_id_1 = $this->input->post('id1');
            $attribute_id_2 = $this->input->post('id2');
            $attribute_id_3 = $this->input->post('id3');
            $combinations_logic_model_services = new Combinations_logic_model_services();
            $combinations_logic_model = new Combinations_logic_model();
            $combinations_logic_model->setDiscipline_id($discipline_id);
            $combinations_logic_model->setAttribute_id($attribute_id_1);
            $combinations_logic_model->setAttribute_id1($attribute_id_2);
            $combinations_logic_model->setAttribute_id2($attribute_id_3);
            
            if ($combinations_logic_model_services->checkDisciplineMapAvailable($combinations_logic_model) == 0) {
                $get_id = $combinations_logic_model_services->getDisciplineMap();
                $combinations_logic_model2 = new Combinations_logic_model();
                $combinations_logic_model_services2 = new Combinations_logic_model_services();
                foreach ($get_id as $id) {
                    $common_id = $id->common_id + 1;
                }$attribute_id_ = "";
                for ($x = 1; $x < 4; $x++) {
                    $combinations_logic_model2->setCommon_id($common_id);
                    $combinations_logic_model2->setAttribute_id($this->input->post('id' . $x));
                    $combinations_logic_model2->setDiscipline_id($discipline_id);
                    $combinations_logic_model2->setPublished_status('1');
                    $res = $combinations_logic_model_services2->addDisciplineMap($combinations_logic_model2);
                }
                if ($res) {
                    echo "Combination logic is successfully Saved. ########## success canhide";
                } else {
                    echo "Saving Combination logic. Try again ! ########## warning";
                }
            } else {
                echo "Selected Combination logic is already Exist. Try again ! ########## warning";
            }
        } else {
            $data['title_menu_main'] = "Access Denied";
            $partials = array('content' => 'access_denied');
            $this->template->load('backend_template/primio_template', $partials, $data);
        }
    }

}
?>