<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('reg_users/Reg_users_model');
        $this->load->model('reg_users/Reg_users_model_service');
        
        $this->load->model('district/District_model_service');
        
        $this->load->model('student_edu_levels/Student_education_model');
        $this->load->model('student_edu_levels/Student_education_model_service');
        
        $this->load->model('subjects_grades/Subjects_grades_model');
        $this->load->model('subjects_grades/Subjects_grades_model_service');
        
        $this->load->model('edulevel/Edulevel_model');
        $this->load->model('edulevel/Edulevel_model_service');
        
    }
    
    public function index(){
        
    }
    
    public function registeredUsers(){
        
        if($this->session->userdata('Logged_In'))
        {
            
            $user_privilege_model_service = new User_privilege_model_service();
            
            if ($user_privilege_model_service->getUserPrivilege('MANAGE_REG_STUDENTS')) {
            
            $reg_users_model_service = new Reg_users_model_service();
            
            $district_model_service = new District_model_service();
        
        $data['districts'] = $district_model_service->getAllDistricts();
        
        $data['registeredusers'] = $reg_users_model_service->getAllRegisteredUsers();
        
        $data['title_menu_main'] = "Students Management";
        
		    $partials = array('content' => 'reg_users/reg_users'); //load the view		              
            $this->template->load('backend_template/primio_template', $partials, $data);//load teh template
            
            }
            
            else {
            $data['title_menu_main'] = "Access Denied";
            $partials = array('content' => 'access_denied');
            $this->template->load('backend_template/primio_template', $partials, $data);
        }
            
        }
        
        else {
            $this->load->view('login');
        }
        
        
        
    }
    
    public function checkUserName(){
        $reg_users_model = new Reg_users_model();
            $reg_users_model_service = new Reg_users_model_service();
        
        $reg_users_model->setUserName($this->input->post('username', TRUE));
        $user_count = $reg_users_model_service->checkUserName($reg_users_model);
        //echo $user_count; die;
        if($user_count == 0){
            echo "available";
        } else {
            echo "notavailable";
        }
    }
    
    public function checkUserEmail(){
        $reg_users_model = new Reg_users_model();
            $reg_users_model_service = new Reg_users_model_service();
        
            if($this->input->post('email', TRUE) != "" && $this->input->post('email', TRUE) != NULL)
            {
        $reg_users_model->setEmail($this->input->post('email', TRUE));
        $email_count = $reg_users_model_service->checkUserEmail($reg_users_model);
        //echo $email_count; die;
        if($email_count == 0){
            echo "available";
        } else {
            echo "notavailable";
        }
            }
            else
            {
                echo "available";
            }
    }
    
    
    public function saveUser(){
        
        $user_privilege_model_service = new User_privilege_model_service();
            
            if ($user_privilege_model_service->getUserPrivilege('ADD_REG_STUDENTS')) {
        
       
        $reg_users_model = new Reg_users_model();
            $reg_users_model_service = new Reg_users_model_service();
        
        $reg_users_model->setFirstName($this->input->post('first_name', TRUE));
        $reg_users_model->setLastName($this->input->post('last_name', TRUE));
        $reg_users_model->setUserName($this->input->post('user_name', TRUE));
        $reg_users_model->setPassword(md5($this->input->post('password', TRUE)));
        $reg_users_model->setDOB($this->input->post('dob', TRUE));
        $reg_users_model->setNIC($this->input->post('nic', TRUE));
        $reg_users_model->setSchool($this->input->post('school', TRUE));
        $reg_users_model->setContact($this->input->post('contact', TRUE));
        $reg_users_model->setEmail($this->input->post('email', TRUE));
        $reg_users_model->setDistrict($this->input->post('district', TRUE));
        $reg_users_model->setCity($this->input->post('city', TRUE));
        $reg_users_model->setAddress($this->input->post('address', TRUE));
        $reg_users_model->setFatherName($this->input->post('father_name', TRUE));
        $reg_users_model->setFatherOccupation($this->input->post('father_occ', TRUE));
        $reg_users_model->setMotherName($this->input->post('mother_name', TRUE));
        $reg_users_model->setMotherOccupation($this->input->post('mother_occ', TRUE));
        $reg_users_model->setSiblingsNo($this->input->post('siblings_no', TRUE));
        $reg_users_model->setAddedDate(date("Y-m-d H:i:s"));
        $reg_users_model->setDeletedIndex('0');
        $reg_users_model->setPublishedStatus('1');
        
        if($reg_users_model_service->saveUser($reg_users_model)){
            echo "Successfully Registered ! ########## success canhide";
        } else {
            echo "Error adding user. Try again ! ########## warning";
        }
        
            }
            
            else {
            $data['title_menu_main'] = "Access Denied";
            $partials = array('content' => 'access_denied');
            $this->template->load('backend_template/primio_template', $partials, $data);
        }
        
    }

    

    public function edit_user($id){
        
        if($this->session->userdata('Logged_In')){
            
            $user_privilege_model_service = new User_privilege_model_service();
            
            if ($user_privilege_model_service->getUserPrivilege('EDIT_REG_STUDENTS')) {
            
            $reg_users_model = new Reg_users_model();
            $reg_users_model_service = new Reg_users_model_service();
            
            $district_model_service = new District_model_service();
        
        $data['districts'] = $district_model_service->getAllDistricts();
        
        $data['title_menu_main'] = "Students Management";
        
        $data['student_id'] = $id;
        $reg_users_model->setStudentId($id);
        
        $data['studentdetails'] = $reg_users_model_service->getStudentDetailsById($reg_users_model);
        
        $partials = array('content' => 'reg_users/edit_user');
        $this->template->load('backend_template/primio_template', $partials, $data);
        
            }
            
            else {
            $data['title_menu_main'] = "Access Denied";
            $partials = array('content' => 'access_denied');
            $this->template->load('backend_template/primio_template', $partials, $data);
        }
            
        }
        
        else
        {
            $this->load->view('login');
        }
        
    }

    
    public function updateUser(){
        if($this->session->userdata('Logged_In')){
            
            $user_privilege_model_service = new User_privilege_model_service();
            
            if ($user_privilege_model_service->getUserPrivilege('EDIT_REG_STUDENTS')) {
            
            $reg_users_model = new Reg_users_model();
            $reg_users_model_service = new Reg_users_model_service();
            
            $reg_users_model->setStudentId($this->input->post('student_id', TRUE));
        $reg_users_model->setFirstName($this->input->post('first_name', TRUE));
        $reg_users_model->setLastName($this->input->post('last_name', TRUE));
        $reg_users_model->setUserName($this->input->post('user_name', TRUE));
        //$student_model->setPassword($this->input->post('password', TRUE));
        $reg_users_model->setDOB($this->input->post('dob', TRUE));
        $reg_users_model->setNIC($this->input->post('nic', TRUE));
        $reg_users_model->setSchool($this->input->post('school', TRUE));
        $reg_users_model->setContact($this->input->post('contact', TRUE));
        $reg_users_model->setEmail($this->input->post('email_new', TRUE));
        $reg_users_model->setDistrict($this->input->post('district', TRUE));
        $reg_users_model->setCity($this->input->post('city', TRUE));
        $reg_users_model->setAddress(htmlspecialchars($this->input->post('address', TRUE)));
        //$student_model->setAddedDate(date("Y-m-d"));
        //$student_model->setDeletedIndex(0);
        //$student_model->setPublishedStatus(1);
        $reg_users_model->setFatherName($this->input->post('father_name', TRUE));
        $reg_users_model->setFatherOccupation($this->input->post('father_occ', TRUE));
        $reg_users_model->setMotherName($this->input->post('mother_name', TRUE));
        $reg_users_model->setMotherOccupation($this->input->post('mother_occ', TRUE));
        $reg_users_model->setSiblingsNo($this->input->post('siblings_no', TRUE));
        
        $reg_users_model->setUpdatedDate(date("Y-m-d H:i:s"));
        //$student_model->setUpdatedBy(2); // this should be session 
        
        if($reg_users_model_service->updateUser($reg_users_model)){
            echo "Student details successfully updated ! ########## success canhide";
        } else {
            echo "Error updating user details. Try again ! ########## warning";
        }
        
            }
            
            else {
            $data['title_menu_main'] = "Access Denied";
            $partials = array('content' => 'access_denied');
            $this->template->load('backend_template/primio_template', $partials, $data);
        }
            
        }
        else
        {
            $this->load->view('login');
        }
    }

    


    public function changeUserStatus(){
        
        if($this->session->userdata('Logged_In')){
            
            
            $user_privilege_model_service = new User_privilege_model_service();
            
            if ($user_privilege_model_service->getUserPrivilege('CHANGE_USER_STATUS')) {
            
            $reg_users_model = new Reg_users_model();
            $reg_users_model_service = new Reg_users_model_service();
            
            $reg_users_model->setStudentId($this->input->post('user_id', TRUE));
            $reg_users_model->setPublishedStatus($this->input->post('status', TRUE));
            
            if($reg_users_model_service->unpublishUser($reg_users_model)){
                
                echo "User status successfully changed. ########## success canhide";
                
            }
            else {
                echo "Error changing status. Try again ! ########## warning";
            }
            
        }
        
        else {
            $data['title_menu_main'] = "Access Denied";
            $partials = array('content' => 'access_denied');
            $this->template->load('backend_template/primio_template', $partials, $data);
        }
            
        }
        
        else {
            $this->load->view('login');
        }
        
    }
    
    
    public function change_user_password($user_id)
    {
        if($this->session->userdata('Logged_In')){
            $user_privilege_model_service = new User_privilege_model_service();
            
            if ($user_privilege_model_service->getUserPrivilege('CHANGE_USER_PASSWORD')) {
                
                $reg_users_model = new Reg_users_model();
                $reg_users_model_service = new Reg_users_model_service();
                
                $reg_users_model->setStudentId($user_id);
                
                $data['title_menu_main'] = "Change password";
                $data['stu_user_details'] = $reg_users_model_service->getStudentDetailsById($reg_users_model);
                $partials = array('content' => 'reg_users/user_change_pw');
                $this->template->load('backend_template/primio_template', $partials, $data);
                
            }
            else {
            $data['title_menu_main'] = "Access Denied";
            $partials = array('content' => 'access_denied');
            $this->template->load('backend_template/primio_template', $partials, $data);
        }
            
        }
        else {
            $this->load->view('login');
        }
    }
    
    
    public function user_change_password()
    {
        if($this->session->userdata('Logged_In')){
            $user_privilege_model_service = new User_privilege_model_service();
            
            if ($user_privilege_model_service->getUserPrivilege('CHANGE_USER_PASSWORD')) {
                
                $reg_users_model = new Reg_users_model();
                $reg_users_model_service = new Reg_users_model_service();
                
                $reg_users_model->setStudentId($this->input->post('stud_id', TRUE));
                $reg_users_model->setPassword(md5($this->input->post('usr_pw', TRUE)));
                $reg_users_model->setUpdatedDate(date("Y-m-d H:i:s"));
                
                echo $reg_users_model_service->Change_user_password($reg_users_model);
                
            }
            else {
            $data['title_menu_main'] = "Access Denied";
            $partials = array('content' => 'access_denied');
            $this->template->load('backend_template/primio_template', $partials, $data);
        }
            
        }
        else {
            $this->load->view('login');
        }
    }

    

    public function deleteUser(){
        
        if($this->session->userdata('Logged_In'))
        {
            
            $user_privilege_model_service = new User_privilege_model_service();
            
            if ($user_privilege_model_service->getUserPrivilege('DELETE_REG_STUDENTS')) {
            
            $reg_users_model = new Reg_users_model();
            $reg_users_model_service = new Reg_users_model_service();
            
            $reg_users_model->setDeletedIndex('1');
            $reg_users_model->setStudentId($this->input->post('user_id', TRUE));
            
            if($reg_users_model_service->deleteUser($reg_users_model)){
                
                echo "User successfully deleted. ########## success canhide";
                
            }
            else {
                echo "Error deleting user. Try again ! ########## warning";
            }
            
            }
            
            else {
            $data['title_menu_main'] = "Access Denied";
            $partials = array('content' => 'access_denied');
            $this->template->load('backend_template/primio_template', $partials, $data);
        }
            
        }
        
        else
        {
            $this->load->view('login');
        }
        
    }
    
    
    public function manage_edu_profile($id){
        if($this->session->userdata('Logged_In'))
        {
            
            $user_privilege_model_service = new User_privilege_model_service();
            
            if ($user_privilege_model_service->getUserPrivilege('EDIT_REG_STUDENTS')) {

            
            $student_edu_model = new Student_education_model();
            $student_edu_model_service = new Student_education_model_service();
            
            $data['edu_details'] = $student_edu_model_service->getStudentQualificationDetails($id);
            $data['title_menu_main'] = "Manage Education Profile";
            $data['stu_id'] = $id;
            $partials = array('content' => 'student_edu_details/manage_edu_levels');
            $this->template->load('backend_template/primio_template', $partials, $data);
            
            }
            
            else {
            $data['title_menu_main'] = "Access Denied";
            $partials = array('content' => 'access_denied');
            $this->template->load('backend_template/primio_template', $partials, $data);
        }
            
        }
        else
        {
            $this->load->view('login');
        }
    }
    
    
    public function add_edu_level($id){
        if($this->session->userdata('Logged_In'))
        {
            $user_privilege_model_service = new User_privilege_model_service();
            
            if ($user_privilege_model_service->getUserPrivilege('EDIT_REG_STUDENTS')) {
            
            $edulevel_model_service = new Edulevel_model_service();
            
            $data['edulevels'] = $edulevel_model_service->getAllEdulevels();
            $data['title_menu_main'] = "Add Education Detail";
            $data['student_id'] = $id;
            $partials = array('content' => 'student_edu_details/add_edu_levels');
            $this->template->load('backend_template/primio_template', $partials, $data);
            }
            else {
            $data['title_menu_main'] = "Access Denied";
            $partials = array('content' => 'access_denied');
            $this->template->load('backend_template/primio_template', $partials, $data);
        }
        }
        else
        {
            $this->load->view('login');
        }
    }
    
    
    public function saveUserEduLevel(){
        
        if($this->session->userdata('Logged_In'))
        {
            $user_privilege_model_service = new User_privilege_model_service();
            
            if ($user_privilege_model_service->getUserPrivilege('EDIT_REG_STUDENTS')) {
         
            $student_edu_model = new Student_education_model();
            $student_edu_model_service = new Student_education_model_service();
            
            $sub_grad_model = new Subjects_grades_model();
            $sub_grad_model_service = new Subjects_grades_model_service();
            
            //$dddd = new stu
            //print_r($this->input->post()); die;
            //$edulevel_model = new Edu_level_model();
            //$edulevel_model_service = new Edu_level_model_service();
            //$edu_level_service = new Student_education_model_service();
            
            $count = $this->input->post('No_of_subjects');
            //echo $count; die;
            //$a = $this->input->post('edu_subjects');
            //echo $a[0]; die;
            $subjects_count = count($this->input->post('edu_subjects'));
            $subjects = $this->input->post('edu_subjects');
            $grades_count = count($this->input->post('edu_grades'));
            $grades = $this->input->post('edu_grades');
            //echo $count.$subjects.$grades; die;
//            if($count != $subjects_count || $count != $grades_count){
//                echo "2";
//            }
            
            //else
            //{
                
                $student_edu_model->setStudentId($this->input->post('stud_id'));
                $student_edu_model->setEduLevelId($this->input->post('edu_level'));
                $student_edu_model->setClass($this->input->post('edu_class'));
                $student_edu_model->setYear($this->input->post('edu_year'));
                $student_edu_model->setAddedDate(date("Y-m-d H:i:s"));
                $student_edu_model->setAddedBy($this->session->userdata('User_Id'));
                $student_edu_model->setDeletedIndex('0');
                $student_edu_model->setPublishedStatus('1');
                //print_r($student_edu_model); die;
                $last_insert_id = $student_edu_model_service->saveEduDetail($student_edu_model);
                //echo $last_insert_id; die;
                if($last_insert_id){
                     
                    
                    for($i = 0; $i < $count; $i++){
                        if(isset($subjects[$i]) && !empty($subjects[$i]) && isset($grades[$i]) && !empty($grades[$i])){
                        $sub_grad_model->setQualificationId($last_insert_id);
                        $sub_grad_model->setSubjectId($subjects[$i]);
                        $sub_grad_model->setGrade($grades[$i]);
                        $sub_grad_model->setDeletedIndex('0');
                        $sub_grad_model->setPublishedStatus('1');
                        
                        $sub_grad_model_service->saveSubGrades($sub_grad_model);
                        }
                        
                    }
                    //$i = $i+1;
                    //echo $i; die;
                    //if($count == $i){
                    echo "1";
                    //}
                    //else {
                     //   echo "0";
                    //}
                    
                }
                
                else{
                    echo "0";
                }
                
            }
            
            else {
            $data['title_menu_main'] = "Access Denied";
            $partials = array('content' => 'access_denied');
            $this->template->load('backend_template/primio_template', $partials, $data);
        }
            
        }
        
        else
        {
            $this->load->view('login');
        }
        
        
    }
    
    
    
    public function edit_edu_level($stud_id,$quali_id){
        
        if($this->session->userdata('Logged_In')){
            
            $user_privilege_model_service = new User_privilege_model_service();
            
            if ($user_privilege_model_service->getUserPrivilege('EDIT_REG_STUDENTS')) {
            
            $edulevel_model_service = new Edulevel_model_service();
            
            $student_edu_model = new Student_education_model();
            $student_edu_model_service = new Student_education_model_service();
            
            $sub_grad_model = new Subjects_grades_model();
            $sub_grad_model_service = new Subjects_grades_model_service();
            
            $student_edu_model->setQualificationId($quali_id);
            $sub_grad_model->setQualificationId($quali_id);
            
            $data['edulevels'] = $edulevel_model_service->getAllEdulevels();
            $data['eduDetails'] = $student_edu_model_service->getQualificationDetails($student_edu_model);
            $data['sub_grades'] = $sub_grad_model_service->getAllQualiSubGradeDetails($sub_grad_model);
            $data['student_id'] = $stud_id;
            $data['title_menu_main'] = "Edit Education Detail";
            
            $partials = array('content' => 'student_edu_details/edit_quali_details');
            $this->template->load('backend_template/primio_template', $partials, $data);
            
            }
            
            else {
            $data['title_menu_main'] = "Access Denied";
            $partials = array('content' => 'access_denied');
            $this->template->load('backend_template/primio_template', $partials, $data);
        }
            
        }
        
        else
        {
            $this->load->view('login');
        }
        
    }
    
    
    public function updateUserEduLevel(){
        
        if($this->session->userdata('Logged_In')){
            
            $user_privilege_model_service = new User_privilege_model_service();
            
            if ($user_privilege_model_service->getUserPrivilege('EDIT_REG_STUDENTS')) {
            
            $student_edu_model = new Student_education_model();
            $student_edu_model_service = new Student_education_model_service();
            
            $sub_grad_model = new Subjects_grades_model();
            $sub_grad_model_service = new Subjects_grades_model_service();
            
            $count = $this->input->post('No_of_subjects');
            //echo $count; die;
            //$a = $this->input->post('edu_subjects');
            //echo $a[0]; die;
            $subjects_count = count($this->input->post('edu_subjects'));
            $subjects = $this->input->post('edu_subjects');
            $grades_count = count($this->input->post('edu_grades'));
            $grades = $this->input->post('edu_grades');
            
            $student_edu_model->setQualificationId($this->input->post('quali_id'));
            //$student_edu_model->setStudentId($this->session->userdata('User_Id'));
                $student_edu_model->setEduLevelId($this->input->post('edu_level'));
                $student_edu_model->setClass($this->input->post('edu_class'));
                $student_edu_model->setYear($this->input->post('edu_year'));
                $student_edu_model->setUpdatedDate(date("Y-m-d H:i:s"));
                $student_edu_model->setUpdatedBy($this->session->userdata('User_Id'));
                //$student_edu_model->setDeletedIndex('0');
                //$student_edu_model->setPublishedStatus('1');
                //print_r($student_edu_model); die;
                
                //echo $last_insert_id; die;
                if($student_edu_model_service->updateEduDetail($student_edu_model)){
                     
                    $sub_grad_model->setQualificationId($this->input->post('quali_id'));
                    
                    if($sub_grad_model_service->deleteAllSubGradesFOrQuali($sub_grad_model)){
                    
                    for($i = 0; $i < $count; $i++){
                        if(isset($subjects[$i]) && !empty($subjects[$i]) && isset($grades[$i]) && !empty($grades[$i])){
                        $sub_grad_model->setQualificationId($this->input->post('quali_id'));
                        $sub_grad_model->setSubjectId($subjects[$i]);
                        $sub_grad_model->setGrade($grades[$i]);
                        $sub_grad_model->setDeletedIndex('0');
                        $sub_grad_model->setPublishedStatus('1');
                        
                        $sub_grad_model_service->saveSubGrades($sub_grad_model);
                        }
                        
                    }
                    //$i = $i+1;
                    //echo $i; die;
                    //if($count == $i){
                    echo "1";
                    
                    }
                    
                    else {
                        echo "0";
                    }
                    
                }
                
                else{
                    echo "0";
                }
            
            }
            
            else {
            $data['title_menu_main'] = "Access Denied";
            $partials = array('content' => 'access_denied');
            $this->template->load('backend_template/primio_template', $partials, $data);
        }
            
        }
        
        else
        {
            $this->load->view('login');
        }
        
    }
    
    
    public function deleteStudentEduQualification(){
        
        if($this->session->userdata('Logged_In'))
        {
            
            $user_privilege_model_service = new User_privilege_model_service();
            
            if ($user_privilege_model_service->getUserPrivilege('EDIT_REG_STUDENTS')) {
            
             $student_edu_model = new Student_education_model();
            $student_edu_model_service = new Student_education_model_service();
            
            $sub_grad_model = new Subjects_grades_model();
            $sub_grad_model_service = new Subjects_grades_model_service();
            
            $student_edu_model->setQualificationId($this->input->post('qualification_id'));
            
            if($student_edu_model_service->deleteQualification($student_edu_model))
            {
                
                $sub_grad_model->setQualificationId($this->input->post('qualification_id'));
                
                if($sub_grad_model_service->deleteSubGradesFOrQuali($sub_grad_model))
                {
                    echo "1";
                }
                else
                {
                    echo "0";
                }
                
                
            }
            else
            {
                echo "0";
            }
            
            }
            
            else {
            $data['title_menu_main'] = "Access Denied";
            $partials = array('content' => 'access_denied');
            $this->template->load('backend_template/primio_template', $partials, $data);
        }
            
        }
        
        else
        {
            $this->load->view('login');
        }
        
    }
    
    
}

?>