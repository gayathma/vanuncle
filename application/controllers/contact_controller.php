<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contact_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function sendMail() {

        $this->load->library('email');
        $this->load->library('Securimage');

        
        $this->session->set_userdata(array(
            'sender_name'=>$_POST['sender_name'],
            'contact_no'=>$_POST['contact_no'],
            'email'=>$_POST['email'],
            'vehicle_model'=>$_POST['vehicle_model'],
            'vehicle_year'=>$_POST['vehicle_year'],
            'product'=>$_POST['product'],
            'nearest_branch'=>$_POST['nearest_branch'],
            'message'=>$_POST['message']
            
        ));
        
        $bot_check=$_POST['antispam'];
        if(!empty($bot_check)){
            
            $partials=array('content'=>'pages/contact');
            $this->template->load('template/content_template',$partials);
            
        }
        else{
            
            $config = array(
               array(
                     'field'   => 'sender_name',
                     'label'   => 'Name',
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'contact_no',
                     'label'   => 'Contact No',
                     'rules'   => 'required|numeric'
                  ),
               array(
                     'field'   => 'email',
                     'label'   => 'Email',
                     'rules'   => 'required|valid_email'
                  ),   
               array(
                     'field'   => 'vehicle_model',
                     'label'   => 'Vehicle Model',
                     'rules'   => 'required'
                  ),
             array(
                     'field'   => 'vehicle_year',
                     'label'   => 'Vehicle Year',
                     'rules'   => 'required|numeric'
                  ),
             array(
                     'field'   => 'message',
                     'label'   => 'Enquire',
                     'rules'   => 'required'
                  )
            );

        
        $this->form_validation->set_rules($config);
        
        
        
        
        if($this->form_validation->run()==FALSE){
            $partials=array('content'=>'pages/contact');
            $this->template->load('template/content_template',$partials);
            
        }
        else{
            $securimage = new Securimage();
            if($securimage->check($_POST['captcha_code']) == FALSE){
                $data['captcha_error'] = 'Wrong Captcha code, Please try again !';
                $partials=array('content'=>'pages/contact');
            $this->template->load('template/content_template',$partials,$data);
            }
            else{
        $name = $_POST['sender_name'];
        $contact_no = $_POST['contact_no'];
        $email = $_POST['email'];
        $vehicle_model = $_POST['vehicle_model'];
        $vehicle_year = $_POST['vehicle_year'];
        $product = $_POST['product'];
        $nearest_branch = $_POST['nearest_branch'];
        $message = $_POST['message'];

        $body ="Name:$name\n";
        $body.="Contact No:$contact_no\n";
        $body.="Email:$email\n";
        $body.="Vehicle Model:$vehicle_model\n";
        $body.="Vehicle Year:$vehicle_year\n";
        $body.="Product:$product\n";
        $body.="Nearest Branch:$nearest_branch\n";
        $body.="Message:$message\n";


        $this->email->from("$email", "$name");
        $this->email->to('randika@lankacom.net');
        //$this->email->cc('another@another-example.com');
        //$this->email->bcc('them@their-example.com');

        $this->email->subject('Sunlanka Contact Message');
        $this->email->message("$body");

        $this->email->send();

        $session_data=array(
            'sender_name'=>'',
            'contact_no'=>'',
            'email'=>'',
            'vehicle_model'=>'',
            'vehicle_year'=>'',
            'product'=>'',
            'nearest_branch'=>'',
            'message'=>''
            );
        
        $this->session->unset_userdata($session_data);

        $data['success_message'] = 'Thank you for the message. We will get back to you shortly.';

        $partials = array('content' => 'pages/contact');
        $this->template->load('template/content_template', $partials, $data);
            }  
        }
            
            
            
            
        }
        
      
    }
    
    public function resetForm(){
         $session_data=array(
            'sender_name'=>'',
            'contact_no'=>'',
            'email'=>'',
            'vehicle_model'=>'',
            'vehicle_year'=>'',
            'product'=>'',
            'nearest_branch'=>'',
            'message'=>''
            );
        
        $this->session->unset_userdata($session_data);
        $partials = array('content' => 'pages/contact');
        $this->template->load('template/content_template', $partials);
    }

    public function contactForProduct(){
        
        $p_model=$_POST['product_model'];
        
        $this->session->set_userdata(array('prod_model'=>$p_model));
        
    }
    
    
}

?>
