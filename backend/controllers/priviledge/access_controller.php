<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Access_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('TBL_EMPLOYEE_LOGGED_IN'))
        {            
            redirect(site_url().'/login_controller');
        }
        else
        {
  		//load necessary Models , services		
        }
    }
	
}