<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	
	 
	 */
	 
	function __construct()
	{
		parent::__construct();

		if(!$this->session->userdata('logged_in'))
		{
			redirect(base_url() . 'index.php/login');
		}
/*
		$this->load->model('IMS/Employee/Employeemodel');
		$this->load->model('IMS/Employee/Employeeservice');
		$this->load->model('IMS/EmployeeDepartments/Employeedepartmentsmodel');
		$this->load->model('IMS/EmployeeDepartments/Employeedepartmentservice');
		
		$this->load->model('IMS/Department/departmentmodel');
        $this->load->model('IMS/Department/departmentservice');*/
	}
	 
	 
	 
        function index() {

        //	$data['login_title'] = $this->config->item('APPLICATION_MAIN_TITLE')."Login";						 
        //$partials = array('content' => 'item_main_category/manage_item_main_categories');



        $this->template->load('template/login');

    }
        
        
  //Login detaisl checking function 
   function authenticateUser() {
	
		
        $employeemodel = new Employeemodel();
        $employeeservice = new Employeeservice();
        $email = $this->input->post('login_username', TRUE);
        // set user name with @lankacom.net
         $username_arr = explode('@',$email);
          if(!isset($username_arr[1])){
                    $email = $username_arr[0].'@lankacom.net';
          } 
        $employeemodel->setEmail($email);
        $employeemodel->setPassword($this->input->post('login_password', TRUE)); // password md 5 change
        
        $mailServer = $employeeservice->getServerByEmail($employeemodel);
        
        //$logged_user_result = $this->authenticateUserEmail($employeemodel,$this->config->item('MAILBOX'));// chamge
        //echo $logged_user_details->server;die;
         /*
        if($mailServer == 1){
            $logged_user_result = $this->authenticateUserEmail($employeemodel,$this->config->item('MAILBOX'));
           
        }else if($mailServer == 2){
            $logged_user_result = $this->authenticateUserEmail($employeemodel,$this->config->item('MAILBOX2'));
           
        }else{
            $logged_user_result =  FALSE;         
        }
        Remove Imap authenticate error login with some machine */
       $logged_user_result =  true;
         if($logged_user_result){// chamge
         $logged_user_details = $employeeservice->authenticateUser($employeemodel);

		// get users employee departments
		Employeedepartmentsmodel :: setEmployee_Code($logged_user_details->Employee_Code);
		
		
		$employeedepartments = 	Employeedepartmentservice :: getEmployeedepartments();
		
		$asigned_departments = array();
			
		//loop 	 selected employees departments and aisgned department_id into an array
		foreach($employeedepartments as $rowemployeedepartments){				
		array_push($asigned_departments,$rowemployeedepartments->Department_Code);
		}
		
		
  

                if(count($logged_user_details)==0){

                         echo 0;

                }else{

                        //Setting sessions		
                       

                        $this->session->set_userdata('TBL_EMPLOYEE_LOGGED_IN', 'TRUE');



                        echo 1;

		}
	
        }else{
            echo 0;
        }// if($logged_user_result){
                
                
 }
  
  
  function logout() {

        $this->session->sess_destroy();
        redirect(site_url() . '/login_controller');
    }
  // chamge
  
  
        
        
}
        
        
        
        
        
        
	 
