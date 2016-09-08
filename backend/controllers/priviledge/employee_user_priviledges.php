<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee_user_priviledges extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('TBL_EMPLOYEE_LOGGED_IN'))
        {
            redirect(site_url() . '/login_controller');
        }
        else
        {
            $this->load->model('Employee_user_priviledges/Employeeuserpriviledgesmodel');
            $this->load->model('Employee_user_priviledges/Employeeuserpriviledgesservice');
			
			
        }
    }




    function manage_priviledges(){
		
			$data['title'] = "Manage Priviledges";
				
			$data['priviledges'] = Priviledgesservice :: getAllpriviledges();
			
			$data['master_priviledges'] = Master_priviledgesservice :: getAllmasterproviledges();		
			
			$partials = array('content' => 'Priviledges/manage_priviledges');
            $this->template->load('template/main_template',$partials,$data);
		}
	
	
	
	function addnewpriviledge(){
		
		
		$priviledgesmodel = new Priviledgesmodel();
		
		$priviledgesmodel->setPrivilege_Master_Code($this->input->post('Privilege_Master_Code', TRUE));
		$priviledgesmodel->setPrivilege($this->input->post('Privilege', TRUE));
		$priviledgesmodel->setPrivilege_Description($this->input->post('Privilege_Description', TRUE));
		$priviledgesmodel->setPriviledge_Code_HF($this->input->post('Priviledge_Code_HF', TRUE));
		
		
		
		echo Priviledgesservice :: addnewpriviledge($priviledgesmodel);		
		
		}
		
		
		
function deletepriviledge(){
	
	Priviledgesmodel :: setPrivilege_Code(trim($this->input->post('id', TRUE)));
	
	echo Priviledgesservice :: deletepriviledge();
	
	}
	
	
	
	
function edit_priviledges_view($id){
	
		$data['title'] = "Edit Priviledge";
				
		Priviledgesmodel :: setPrivilege_Code($id);
				
				
		$data['priviledgebyid'] = Priviledgesservice :: getPriviledgebyid();
		$data['master_priviledges'] = Master_priviledgesservice :: getAllmasterproviledges();	
		 
			$partials = array('content' => 'Priviledges/edit_priviledges');
            $this->template->load('template/main_template',$partials,$data);
	
	
	
	}	
	
	function editpriviledge(){
		
		
		
		$priviledgesmodel = new Priviledgesmodel();
		
		$priviledgesmodel->setPrivilege_Master_Code($this->input->post('Privilege_Master_Code', TRUE));
		$priviledgesmodel->setPrivilege($this->input->post('Privilege', TRUE));
		$priviledgesmodel->setPrivilege_Description($this->input->post('Privilege_Description', TRUE));
		$priviledgesmodel->setPriviledge_Code_HF($this->input->post('Priviledge_Code_HF', TRUE));
		
		$priviledgesmodel->setPrivilege_Code($this->input->post('Privilege_Code', TRUE));
		
		
		echo Priviledgesservice :: updatepriviledge($priviledgesmodel);	
		
		
		
		
		
		}
	
	
	
	
	
	
}