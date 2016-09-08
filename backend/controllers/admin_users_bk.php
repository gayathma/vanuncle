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
            
            $users_model = new Users_model();
            $users_model_service = new Users_model_service();
            
            $data['admin_users'] = $users_model_service->getAllAdminUsers();
            $data['title_menu_main'] = "Administration";
            
            $partials = array('content' => 'admin_users/add_manage_admin_users');
            $this->template->load('backend_template/primio_template', $partials, $data);
            
        }
        
        else
        {
            $this->load->view('login');
        }
        
    }
    
    
    public function get_available_privilege(){
        
        if($this->session->userdata('Logged_In')){
            
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
                    echo '<input type="checkbox" id="' . $sub_menu->Privilege_Code . '" class="change_user_privilege" value="' . $sub_menu->Privilege_Code . '" checked="checked" /> ' . $sub_menu->Privilege_Description . '<br/>';
                }
                else
                {
                    echo '<input type="checkbox" id="' . $sub_menu->Privilege_Code . '" class="change_user_privilege" value="' . $sub_menu->Privilege_Code . '" /> ' . $sub_menu->Privilege_Description . '<br/>';
                }

                echo '</label></li>';
                    
                }
                echo "</ul>";
                echo '</li>';
                
            }
            
            echo '</ol>';
            
        }
        
        else
        {
            $this->load->view('login');
        }
        
        
    }
    
    
    public function change_privilege_save(){
        
        $user_privilege_model = new User_privilege_model();
        $user_privilege_model_service = new User_privilege_model_service();
        
        $user_privilege_model->setUserCode($this->input->post('user_id', TRUE));
        $user_privilege_model->setPrivilegeCode($this->input->post('privilege_id'));
        
        
        if($this->input->post('grant_privilege') == 'true')
        {
            if($user_privilege_model_service->grant_privilege($user_privilege_model) == 1)
            {
                echo 'Privilege Granted Successfully ########## success canhide';
            }
            else
            {
                echo 'Error Granting Privilege ########## warning';
            }
        }
        else
        {
            if($user_privilege_model_service->revoke_privilege($user_privilege_model) == 1)
            {
                echo 'Privilege Revoked Successfully ########## success canhide';
            }
            else
            {
                echo 'Error Revoking Privilege ########## warning';
            }
        }
        
    }

    

    public function saveUser(){
        
        if($this->session->userdata('Logged_In')){
            
            $users_model = new Users_model();
            $users_model_service = new Users_model_service();
            
            $users_model->setName($this->input->post('usr_act_name', TRUE));
            $users_model->setUsername($this->input->post('usr_name', TRUE));
            $users_model->setPassword(md5($this->input->post('paswrd', TRUE)));
            $users_model->setEmail($this->input->post('usr_email', TRUE));
            $users_model->setCreatedBy($this->session->userdata('User_Id'));
            $users_model->setCreatedDate(date("Y-m-d H:i:s"));
            $users_model->setDeletedIndex('0');
            
            if($users_model_service->saveUser($users_model)){
                echo "User successfully added. ########## success canhide";
            }
            else
            {
                echo "Error adding user. Try again ! ########## warning";
            }
            
        }
        
        else
        {
            $this->load->view('login');
        }
        
        
    }
    
    
    public function edit_admin_user($id){
        
        
        if($this->session->userdata('Logged_In')){
            
            $users_model_service = new Users_model_service();
            
            $data['userDetails'] = $users_model_service->getUserDeatils($id);
            $data['title_menu_main'] = "Administration";
            
            $partials = array('content' => 'admin_users/edit_admin_user');
            $this->template->load('backend_template/primio_template', $partials, $data);
            
        }
        
        else
        {
            $this->load->view('login');
        }
        
    }
    
    
    public function updateUser(){
        
        if($this->session->userdata('Logged_In')){
            
            $users_model = new Users_model();
            $users_model_service = new Users_model_service();
            
            $users_model->setId($this->input->post('usr_id', TRUE));
            $users_model->setName($this->input->post('usr_act_name', TRUE));
            //$users_model->setUsername($this->input->post('usr_name', TRUE));
            $users_model->setEmail($this->input->post('usr_email', TRUE));
            $users_model->setUpdatedBy($this->session->userdata('User_Id'));
            $users_model->setUpdatedDate(date("Y-m-d H:i:s"));
            $users_model->setDeletedIndex('0');
            
            if($users_model_service->updateUser($users_model)){
                echo "User successfully updated. ########## success canhide";
            }
            else
            {
                echo "Error updating user. Try again ! ########## warning";
            }
            
        }
        
        else
        {
            $this->load->view('login');
        }
        
        
    }
    
    
    public function deleteUser(){
        
        if($this->session->userdata('Logged_In')){
            
            $users_model = new Users_model();
            $users_model_service = new Users_model_service();
            
            $users_model->setId($this->input->post('user_id', TRUE));
            $users_model->setUpdatedBy($this->session->userdata('User_Id'));
            $users_model->setUpdatedDate(date("Y-m-d H:i:s"));
            $users_model->setDeletedIndex('1');
            
            if($users_model_service->deleteUser($users_model)){
                echo "User successfully deleted. ########## success canhide";
            }
            else
            {
                echo "Error deleting user. Try again ! ########## warning";
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