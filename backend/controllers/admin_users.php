<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_users extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('admin_users/users_model');
        $this->load->model('admin_users/users_model_service');
        
        $this->load->model('privilege_master/Privilege_master_model');
        $this->load->model('privilege_master/Privilege_master_model_service');
        
        $this->load->model('privilege/Privilege_model');
        $this->load->model('privilege/Privilege_model_service');
        
        $this->load->model('user_privileges/User_privilege_model');
        $this->load->model('user_privileges/User_privilege_model_service');
        
    }
    
    public function index(){
        
    }
    
    
    public function manage_users(){
        
        if($this->session->userdata('Logged_In')){
            
            $user_privilege_model_service = new User_privilege_model_service();
            
            if ($user_privilege_model_service->getUserPrivilege('MANAGE_ADMIN_USERS')) {
            
            $users_model = new Users_model();
            $users_model_service = new Users_model_service();
            
            $data['admin_users'] = $users_model_service->getAllAdminUsers();
            $data['title_menu_main'] = "Administration";
            
            $partials = array('content' => 'admin_users/add_manage_admin_users');
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
    
    
    public function change_admn_user_password($admn_user_id)
    {
        if($this->session->userdata('Logged_In')){
            $user_privilege_model_service = new User_privilege_model_service();
            
            if ($user_privilege_model_service->getUserPrivilege('CHANGE_ADMIN_USER_PASSWORD')) {
                
                $users_model = new Users_model();
            $users_model_service = new Users_model_service();
            
            $data['title_menu_main'] = "Change password";
            $data['admn_user_details'] = $users_model_service->getUserDeatils($admn_user_id);
            
            $partials = array('content' => 'admin_users/user_change_pw');
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

    
    public function admn_user_change_password()
    {
        if($this->session->userdata('Logged_In')){
            $user_privilege_model_service = new User_privilege_model_service();
            
            if ($user_privilege_model_service->getUserPrivilege('CHANGE_ADMIN_USER_PASSWORD')) {
                
                $users_model = new Users_model();
            $users_model_service = new Users_model_service();
            
            $users_model->setId($this->input->post('admn_usr_id', TRUE));
            $users_model->setPassword(md5($this->input->post('usr_pw', TRUE)));
            $users_model->setUpdatedBy($this->session->userdata('User_Id'));
            $users_model->setUpdatedDate(date("Y-m-d H:i:s"));
            
            echo $users_model_service->Change_user_password($users_model);
                
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

    
    public function get_available_privilege(){
        
        if($this->session->userdata('Logged_In')){
            
            $user_privilege_model_service = new User_privilege_model_service();
            
            if ($user_privilege_model_service->getUserPrivilege('MANAGE_PRIVILEGES')) {
            
            $privilege_master_model = new Privilege_master_model();
            $privilege_master_model_service = new Privilege_master_model_service();
            
            $privilege_model = new Privilege_model();
            $privilege_model_service = new Privilege_model_service();
            
            $master_privileges = $privilege_master_model_service->getAllMasterPrivileges();
            
            
            
            echo "<ol class=\"main_pre_list\">";
            
            foreach ($master_privileges as $row)
            {
                echo '<li>';
                
                echo "<h5>" . $row->Master_Privilege_Description . '</h5>';
                
                $menu_functions = $privilege_model_service->get_menu_function($row->Privilege_Master_Code);
                
                $user_id = $this->input->post('user_id', TRUE);
                echo "<ul class=\"pre_list\">";
                foreach ($menu_functions as $sub_menu)
                {
                    
                    $user_privilege_model = new User_privilege_model();
                    $user_privilege_model_service = new User_privilege_model_service();
            
                    $user_privilege_model->setUserCode($user_id);
                    $user_privilege_model->setPrivilegeCode($sub_menu->Privilege_Code);
                    
                    echo '<li><label for="' . $sub_menu->Privilege_Code . '">';
                    
                    if($user_privilege_model_service->check_user_privilege($user_privilege_model) == 1)
                {
                    echo '<span id="alertspan_' . $sub_menu->Privilege_Code . '"></span><input type="checkbox" id="' . $sub_menu->Privilege_Code . '" class="change_user_privilege" value="' . $sub_menu->Privilege_Code . '" checked="checked" /> ' . $sub_menu->Privilege_Description . '<br/>';
                }
                else
                {
                    echo '<span id="alertspan_' . $sub_menu->Privilege_Code . '"></span><input type="checkbox" id="' . $sub_menu->Privilege_Code . '" class="change_user_privilege" value="' . $sub_menu->Privilege_Code . '" /> ' . $sub_menu->Privilege_Description . '<br/>';
                }

                echo '</label></li>';
                    
                }
                echo "</ul>";
                echo '</li>';
                
            }
            
            echo '</ol>';
            
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
    
    
    public function change_privilege_save(){
        
        $user_privilege_model_service = new User_privilege_model_service();
            
            if ($user_privilege_model_service->getUserPrivilege('MANAGE_PRIVILEGES')) {
        
        $user_privilege_model = new User_privilege_model();
        $user_privilege_model_service = new User_privilege_model_service();
        
        $user_privilege_model->setUserCode($this->input->post('user_id', TRUE));
        $user_privilege_model->setPrivilegeCode($this->input->post('privilege_id'));
        
        
        if($this->input->post('grant_privilege') == 'true')
        {
            if($user_privilege_model_service->grant_privilege($user_privilege_model) == 1)
            {
                echo "true ########## 1";
            }
            else
            {
                echo "0";
            }
        }
        else
        {
            if($user_privilege_model_service->revoke_privilege($user_privilege_model) == 1)
            {
                echo "false ########## 1";
            }
            else
            {
                echo "0";
            }
        }
        
            }
            
            else {
            $data['title_menu_main'] = "Access Denied";
            $partials = array('content' => 'access_denied');
            $this->template->load('backend_template/primio_template', $partials, $data);
        }
        
    }

    

    public function saveUser(){
        
        if($this->session->userdata('Logged_In')){
            
            $user_privilege_model_service = new User_privilege_model_service();
            
            if ($user_privilege_model_service->getUserPrivilege('ADD_ADMIN_USERS')) {
            
            $users_model = new Users_model();
            $users_model_service = new Users_model_service();
            
            $users_model->setName($this->input->post('usr_act_name', TRUE));
            $users_model->setUsername($this->input->post('usr_name', TRUE));
            $users_model->setPassword(md5($this->input->post('paswrd', TRUE)));
            $users_model->setEmail($this->input->post('usr_email', TRUE));
            $users_model->setCreatedBy($this->session->userdata('User_Id'));
            $users_model->setCreatedDate(date("Y-m-d H:i:s"));
            $users_model->setDeletedIndex('0');
            
            echo $users_model_service->saveUser($users_model);
            
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
    
    
    public function edit_admin_user($id){
        
        
        if($this->session->userdata('Logged_In')){
            
            $user_privilege_model_service = new User_privilege_model_service();
            
            if ($user_privilege_model_service->getUserPrivilege('EDIT_ADMIN_USERS')) {
            
            $users_model_service = new Users_model_service();
            
            $data['userDetails'] = $users_model_service->getUserDeatils($id);
            $data['title_menu_main'] = "Administration";
            
            $partials = array('content' => 'admin_users/edit_admin_user');
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
            
            if ($user_privilege_model_service->getUserPrivilege('EDIT_ADMIN_USERS')) {
            
            $users_model = new Users_model();
            $users_model_service = new Users_model_service();
            
            $users_model->setId($this->input->post('usr_id', TRUE));
            $users_model->setName($this->input->post('usr_act_name', TRUE));
            //$users_model->setUsername($this->input->post('usr_name', TRUE));
            $users_model->setEmail($this->input->post('usr_email', TRUE));
            $users_model->setUpdatedBy($this->session->userdata('User_Id'));
            $users_model->setUpdatedDate(date("Y-m-d H:i:s"));
            $users_model->setDeletedIndex('0');
            
            echo $users_model_service->updateUser($users_model);
            
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
    
    
    public function deleteUser(){
        
        if($this->session->userdata('Logged_In')){
            
            $user_privilege_model_service = new User_privilege_model_service();
            
            if ($user_privilege_model_service->getUserPrivilege('DELETE_ADMIN_USERS')) {
            
            $users_model = new Users_model();
            $users_model_service = new Users_model_service();
            
            $users_model->setId($this->input->post('user_id', TRUE));
            $users_model->setUpdatedBy($this->session->userdata('User_Id'));
            $users_model->setUpdatedDate(date("Y-m-d H:i:s"));
            $users_model->setDeletedIndex('1');
            echo $users_model_service->deleteUser($users_model);
            
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
    
    
    
    
  function load_change_password(){
  	
  	

  	if($this->session->userdata('Logged_In')){

  	
  	//$data['userDetails'] = $users_model_service->getUserDeatils($id);
  	$data['title_menu_main'] = "Administration";
  	
  	$partials = array('content' => 'admin_users/change_password');
  	$this->template->load('backend_template/primio_template', $partials, $data);

  	
  	}
  	
  	else
  	{
  		$this->load->view('login');
  	}
  	
  	
  	
  }  
    
    
  function check_old_password(){
  	

  	if($this->session->userdata('Logged_In')){
  	

  		$users_model = new Users_model();
  		$users_model_service = new Users_model_service();
  		
  		$users_model->setPassword(md5($this->input->post('old_password', TRUE)));
  		$users_model->setId($this->session->userdata('User_Id'));

  		echo $users_model_service->check_old_password($users_model);
  		 
  	}
  	 
  	else
  	{
  		$this->load->view('login');
  	}
  	 
  	
  	
  	
  	
  }  

  
  
  function change_admin_pw(){
  	
  	if($this->session->userdata('Logged_In')){
  		 
  	
  		$users_model = new Users_model();
  		$users_model_service = new Users_model_service();
  	
  		$users_model->setPassword(md5($this->input->post('new_password', TRUE)));
  		$users_model->setId($this->session->userdata('User_Id'));
  	
  		echo $users_model_service->change_admin_pw($users_model);
  			
  	}
  	
  	else
  	{
  		$this->load->view('login');
  	}
  		
  	
  	
  }
  
  
  
  
  
    
    
    
}

?>