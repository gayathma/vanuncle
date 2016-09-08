<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main_controller extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html 
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('reg_users/Reg_users_model');
        $this->load->model('reg_users/Reg_users_model_service');
    }

    public function index() {

        $Reg_users_model = new Reg_users_model();
        $Reg_users_model_service = new Reg_users_model_service();


        $data['user_count'] = count($Reg_users_model_service->getAllPublishedRegisteredUsers());

        $data['title_menu_main'] = ""; //aisgn the title




        $partials = array('content' => 'dashbaord/dashbaord'); //load the view		              
        $this->template->load('backend_template/primio_template', $partials, $data); //load teh template
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */