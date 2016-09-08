<?php

/*
 * Author : Viran
 */
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Login_controller extends CI_Controller {
	function __construct() {
		parent::__construct ();
		
		$this->load->model ( 'cms_users/Cms_users_model' );
		$this->load->model ( 'cms_users/Cms_users_service' );
		
		/*
		 * if(!$this->session->userdata('LCS_EMPLOYEE_LOGGED_IN')) { //redirect(site_url() . '/login_controller'); }else{ }
		 */
	}
	function index() {
		$this->load->view ( 'login/login' );
		
		// $this->load->model('CCM/Transactions/Creditcardtransactionsmodel');
	}
	function authenticateuser() {
		
		// print_r($_POST);die();
		$cms_users_model = new Cms_users_model ();
		$cms_users_service = new Cms_users_service ();
		
		$cms_users_model->setCms_user_email ( $this->input->post ( 'username' ) );
		$cms_users_model->setCms_user_password ( md5 ( $this->input->post ( 'password' ) ) );
		$cms_users_model->setCms_user_status ( '1' );
		
		$user_data = $cms_users_service->authenticateuser ( $cms_users_model );
		
		if (count ( $user_data ) == 0) {
			echo 0;
		} else {
			
			$lg_dt = array (
					'user_id' => $user_data->cms_user_id,
					'user_email' => $user_data->cms_user_email,
					'user_name' => $user_data->cms_user_name,
					'logged_in' => TRUE 
			);
			
			$this->session->set_userdata ( $lg_dt );
			
			echo 1;
		}
		
		/*
		 * $data['content_data'] = $user_data; $partials = array('content' => 'contents/manage_contents'); $this->template->load('template/primo_template',$partials,$data);
		 */
	}
	
	
	
	function logout(){
		
		
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_email');
		$this->session->unset_userdata('user_name');
		$this->session->unset_userdata('logged_in');
		
		$this->index();
	}
	
	
	
	
}




/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */