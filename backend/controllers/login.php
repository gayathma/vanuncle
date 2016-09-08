<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('admin_users/Users_model');
        $this->load->model('admin_users/Users_model_service');
        
        $this->load->model('reg_users/Reg_users_model');
        $this->load->model('reg_users/Reg_users_model_service');
        
    }
    
    
    public function index(){
        
        if($this->session->userdata('Logged_In')){
            
            $redirect_url = trim($this->session->userdata('Redirect_URL'));
            $this->session->set_userdata('Redirect_URL', '');

            if(empty($redirect_url))
            {
                $Reg_users_model = new Reg_users_model();
                $Reg_users_model_service = new Reg_users_model_service();

                $data['user_count'] = count($Reg_users_model_service->getAllPublishedRegisteredUsers());
                $data['title_menu_main'] = ""; //aisgn the title

                $partials = array('content' => 'dashbaord/dashbaord'); //load the view		              
                $this->template->load('backend_template/primio_template', $partials, $data);
                
            }
            
            else
            {
                redirect($redirect_url);
            }
            
        }
        
        else {
            $this->load->view('login');
        }
        
    }
    
    
    public function authenticateUser(){
        
        $users_model = new Users_model();
        $users_model_service = new Users_model_service();
        
        $users_model->setUsername($this->input->post('username', TRUE));
        $users_model->setPassword(md5($this->input->post('password', TRUE)));
        
        $users = $users_model_service->authenticateUser($users_model);
        
        
        
        if(count($users) == 1){
            
            $userdata = array(
                'User_Id' => $users->id,
                'Name' => $users->name,
                'Username' => $users->username,
               // 'Email' => $users->email,
                'Logged_In' => TRUE,
                'Custom_Msg' => 'Welcome to the system ########## success canhide'
            );
            
            $this->session->set_userdata($userdata);
            
            session_start();
            $_SESSION['Logged_In'] = TRUE;

            echo 'Welcome to the system ########## success canhide';
            
        }
        
        else
        {
            echo 'Invalid Login Details. ########## warning';
        }
        
        
    }
    
    function userLogout()
    {
        $user_data = array(
            'User_Id' => NULL,
            'Name' => NULL,
            'Username' => NULL,
            'Email' => NULL,
            'Logged_In' => FALSE,
            'Custom_Msg' => 'Log Out Success ########## success'
        );

        $this->session->unset_userdata($user_data);
        
        session_start();
        $_SESSION['Logged_In'] = FALSE;

        redirect(base_url().'backend.php');
    }
    
    
}




?>