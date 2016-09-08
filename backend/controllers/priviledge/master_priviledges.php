<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_priviledges extends CI_Controller
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
            $this->load->model('Master_priviledges/Master_priviledgesmodel');
            $this->load->model('Master_priviledges/Master_priviledgesservice');
			
			$this->load->model('Systems/Systemsservice');
        }
    }




    function manage_master_priviledges(){
		
			$data['title'] = "Manage Master Priviledges";
				
			$data['master_priviledges'] = Master_priviledgesservice :: getAllmasterproviledges();
			$data['systems'] = Systemsservice :: getAllsystems();		
			
			$partials = array('content' => 'Master_priviledges/manage_master_priviledges');
            $this->template->load('template/main_template',$partials,$data);
		}
	
	
	
	function addnewmasterpriviledge(){
		
		
		$masterpriviledgesmodel = new Master_priviledgesmodel();
		
		$masterpriviledgesmodel->setMain_System_Code($this->input->post('Main_System_Code', TRUE));
		$masterpriviledgesmodel->setMaster_Privilege($this->input->post('Master_Privilege', TRUE));
		$masterpriviledgesmodel->setMaster_Privilege_Description($this->input->post('Master_Privilege_Description', TRUE));
		
		
		echo Master_priviledgesservice :: addnewmasterpriviledge($masterpriviledgesmodel);		
		
		}
		
		
		
function deletemasterpriviledge(){
	
	Master_priviledgesmodel :: setPrivilege_Master_Code(trim($this->input->post('id', TRUE)));
	
	echo Master_priviledgesservice :: deletemasterpriviledge();
	
	}
	
	
	
	
function edit_master_priviledges_view($id){
	
		$data['title'] = "Edit Master Priviledge";
				
		Master_priviledgesmodel :: setPrivilege_Master_Code($id);
				
				
		$data['masterpriviledgebyid'] = Master_priviledgesservice :: getmasterPriviledgebyid();
		$data['systems'] = Systemsservice :: getAllsystems();	
		 
			$partials = array('content' => 'Master_priviledges/edit_master_priviledges');
            $this->template->load('template/main_template',$partials,$data);
	
	
	
	}	
	
	function editmasterpriviledge(){
		
		
		
		$masterpriviledgesmodel = new Master_priviledgesmodel();
		
		$masterpriviledgesmodel->setMain_System_Code($this->input->post('Main_System_Code', TRUE));
		$masterpriviledgesmodel->setMaster_Privilege($this->input->post('Master_Privilege', TRUE));
		$masterpriviledgesmodel->setMaster_Privilege_Description($this->input->post('Master_Privilege_Description', TRUE));
		$masterpriviledgesmodel->setPrivilege_Master_Code($this->input->post('Privilege_Master_Code', TRUE));
		
		echo Master_priviledgesservice :: updatemasterpriviledge($masterpriviledgesmodel);	
		
		
		
		
		
		}
	
	
	
	
	
	
}