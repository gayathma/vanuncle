<?php

class Vehicles extends CI_Controller {

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
     * 
     */
    public function __construct() {
        parent::__construct();

        $this->load->model('driver/driver_model');
        $this->load->model('driver/driver_service');

        $this->load->model('vehicles/vehicles_model');
        $this->load->model('vehicles/vehicles_service');

        $this->load->model('vehicle_images/vehicle_images_model');
        $this->load->model('vehicle_images/vehicle_images_service');

        $this->load->model('vehicle_route/vehicle_route_model');
        $this->load->model('vehicle_route/vehicle_route_service');

        $this->load->model('make/make_model');
        $this->load->model('make/make_service');

        $this->load->model('model/model_model');
        $this->load->model('model/model_service');

        $this->load->model('vehicle_request/vehicle_request_model');
        $this->load->model('vehicle_request/vehicle_request_service');
    }

    public function index() {
        if ($this->session->userdata('USER_LOGGED_IN')) {

            $make_service  = new Make_service();
            $data['makes'] = $make_service->get_all_makes();


            $parials = array('content' => 'pages/add_vehicle');
            $this->template->load('template/template', $parials, $data);
        } else {
            $partials = array('content' => 'pages/login');
            $this->template->load('template/template', $partials);
        }
    }

    /**
     * get  models for make
     */
    public function get_models_for_make() {
        $model_service = new Model_service();

        $models = $model_service->get_model_by_make($this->input->post('make'));

        echo '<option value="">Select Model</option>';
        foreach ($models as $model) {

            echo '<option value="' . $model->id . '">' . $model->name . '</option>';
        }

        echo '</select>';
    }

    function upload_vehicle_images() {
        $uploaddir  = './uploads/vehicles/';
        $unique_tag = 'dri_';
        $filename   = $unique_tag . time() . '-' . basename($_FILES['file']['name']); //this is the file name
        $file       = $uploaddir . $filename; // this is the full path of the uploaded file
        if (move_uploaded_file($_FILES['file']['tmp_name'], $file)) {
            $success_message = array('success'  => 200,
                'filename' => $filename,
            );
            echo json_encode($success_message);
        } else {
            echo "error";
        }
    }

    public function add_new_vehicle() {
        $vehicles_service       = new Vehicles_service();
        $vehicles_model         = new Vehicles_model();
        $vehicle_images_model   = new Vehicle_images_model();
        $vehicle_images_service = new Vehicle_images_service();
        $vehicle_route_model    = new Vehicle_route_model();
        $vehicle_route_service  = new Vehicle_route_service();

        $vehicles_model->set_driver_id($this->session->userdata('USER_ID'));
        $vehicles_model->set_make($this->input->post('make', TRUE));
        $vehicles_model->set_model($this->input->post('model', TRUE));
        $vehicles_model->set_type($this->input->post('type', TRUE));
        $vehicles_model->set_vehicle_no($this->input->post('vehicle_no', TRUE));
        $vehicles_model->set_year($this->input->post('year', TRUE));
        $vehicles_model->set_seats($this->input->post('seats', TRUE));
        if (isset($_POST['is_ac'])) {
            $vehicles_model->set_isAc($this->input->post('is_ac', TRUE));
        }else{
            $vehicles_model->set_isAc('N');
        }
        $vehicles_model->set_description($this->input->post('description', TRUE));
        $vehicles_model->set_is_deleted('0');
        $vehicles_model->set_added_date(date("Y-m-d H:i:s"));

        $vehicle_id = $vehicles_service->add_new_vehicle($vehicles_model);
        $images     = $this->input->post('vehi_images', TRUE);
        $routes     = $this->input->post('vehi_routes', TRUE);
        $msg        = 1;

        if ((!empty($vehicle_id)) && (!empty($images))) {
            foreach ($images as $image) {
                $vehicle_images_model->set_image_path($image);
                $vehicle_images_model->set_vehicle_id($vehicle_id);
                $vehicle_images_model->set_is_deleted('0');
                $vehicle_images_model->set_added_date(date("Y-m-d H:i:s"));
                $vehicle_images_model->set_added_by($this->session->userdata('USER_ID'));

                $vehicle_images_service->add_new_images($vehicle_images_model);
            }
        }

        if (!empty($routes)) {
            foreach ($routes as $route) {
                $vehicle_route_model->set_driver_id($this->session->userdata('USER_ID'));
                $vehicle_route_model->set_vehicle_id($vehicle_id);
                $vehicle_route_model->set_service_type($this->input->post('service_type', TRUE));
                $vehicle_route_model->set_added_date(date("Y-m-d H:i:s"));
                $vehicle_route_model->set_route($route);

                $vehicle_route_service->add_new_route($vehicle_route_model);
            }
        }

        if ($msg == '1') {

//            $this->load->library('email');
//
//            $this->email->from($this->session->userdata('USER_EMAIL'));
//            $this->email->to('info@vanuncle.lk');
//            $this->email->cc('gayathma3@gmail.com');
//
//            $this->email->subject('VanUncle.lk New Advertisement');
//
//            $message = 'New Advertisement submitted!!';
//
//            $this->email->message($message);
//
//            $msg = $this->email->send();
        }

        echo $msg;
    }

    function delete_vehicle() {

        $vehicles_service       = new Vehicles_service();
        $vehicle_images_service = new Vehicle_images_service();
        $vehicle_route_service  = new Vehicle_route_service();

        $vehicle_id = trim($this->input->post('id', TRUE));
        $result     = $vehicles_service->delete_vehicle($vehicle_id);

        if ($result) {
            $vehicle_images_service->delete_vehicle_images($vehicle_id);
            $vehicle_route_service->delete_vehicle_routes($vehicle_id);
        }
        echo $result;
    }

    function edit_vehicle($vehicle_id) {
        if ($this->session->userdata('USER_LOGGED_IN')) {

            $make_service          = new Make_service();
            $vehicles_service      = new Vehicles_service();
            $vehicle_route_service = new Vehicle_route_service();
            $model_service         = new Model_service();

            $data['makes']   = $make_service->get_all_makes();
            $data['models']  = $model_service->get_all_active_models();
            $data['vehicle'] = $vehicles_service->get_vehicle_by_id($vehicle_id);
            $data['routes']  = $vehicle_route_service->get_routes_vehicle($this->session->userdata('USER_ID'), $vehicle_id);

            $parials = array('content' => 'pages/edit_vehicle');
            $this->template->load('template/template', $parials, $data);
        } else {
            $partials = array('content' => 'pages/login');
            $this->template->load('template/template', $partials);
        }
    }

    public function update_vehicle() {
        $vehicles_service       = new Vehicles_service();
        $vehicles_model         = new Vehicles_model();
        $vehicle_images_model   = new Vehicle_images_model();
        $vehicle_images_service = new Vehicle_images_service();
        $vehicle_route_model    = new Vehicle_route_model();
        $vehicle_route_service  = new Vehicle_route_service();

        $vehicles_model->set_make($this->input->post('make', TRUE));
        $vehicles_model->set_model($this->input->post('model', TRUE));
        $vehicles_model->set_type($this->input->post('type', TRUE));
        $vehicles_model->set_vehicle_no($this->input->post('vehicle_no', TRUE));
        $vehicles_model->set_year($this->input->post('year', TRUE));
        $vehicles_model->set_seats($this->input->post('seats', TRUE));
        $vehicles_model->set_isAc($this->input->post('is_ac', TRUE));
        $vehicles_model->set_description($this->input->post('description', TRUE));
        $vehicles_model->set_updated_date(date("Y-m-d H:i:s"));

        $vehicle_id = $vehicles_service->add_new_vehicle($vehicles_model);
        $images     = $this->input->post('vehi_images', TRUE);
        $routes     = $this->input->post('vehi_routes', TRUE);
        $msg        = 1;

        if ((!empty($vehicle_id)) && (!empty($images))) {
            foreach ($images as $image) {
                $vehicle_images_model->set_image_path($image);
                $vehicle_images_model->set_vehicle_id($vehicle_id);
                $vehicle_images_model->set_is_deleted('0');
                $vehicle_images_model->set_added_date(date("Y-m-d H:i:s"));
                $vehicle_images_model->set_added_by($this->session->userdata('USER_ID'));

                $vehicle_images_service->add_new_images($vehicle_images_model);
            }
        }

        if (!empty($routes)) {
            foreach ($routes as $route) {
                $vehicle_route_model->set_driver_id($this->session->userdata('USER_ID'));
                $vehicle_route_model->set_vehicle_id($vehicle_id);
                $vehicle_route_model->set_service_type($this->input->post('service_type', TRUE));
                $vehicle_route_model->set_added_date(date("Y-m-d H:i:s"));
                $vehicle_route_model->set_route($route);

                $vehicle_route_service->add_new_route($vehicle_route_model);
            }
        }

        if ($msg == '1') {

            $this->load->library('email');

            $this->email->from($this->session->userdata('USER_EMAIL'));
            $this->email->to('info@vanuncle.lk');
            $this->email->cc('gayathma3@gmail.com');

            $this->email->subject('VanUncle.lk New Advertisement');

            $message = 'New Advertisement submitted!!';

            $this->email->message($message);

            $msg = $this->email->send();
        }

        echo $msg;
    }

    function send_vehicle_request() {

        $vehicle_request_model   = new Vehicle_request_model();
        $vehicle_request_service = new Vehicle_request_service();
        $vehicles_service        = new Vehicles_service();

        $vehicle = $vehicles_service->get_vehicle_by_id($this->input->post('vehicle_id'));

        $vehicle_request_model->set_customer_name($this->input->post('username'));
        $vehicle_request_model->set_customer_email($this->input->post('email'));
        $vehicle_request_model->set_customer_contact($this->input->post('phone'));
        $vehicle_request_model->set_vehicle_id($this->input->post('vehicle_id'));
        $vehicle_request_model->set_status('0');
        $vehicle_request_model->set_added_date(date("Y-m-d H:i:s"));

        $result = $vehicle_request_service->add_vehicle_request($vehicle_request_model);

        if ($result) {

            $content = 'Client Name : ' . $this->input->post('username');
            $content .= '<br>Client Email : ' . $this->input->post('email');
            $content .= '<br>Client Contact Number : ' . $this->input->post('phone');
            $content .= '<br>Vehicle Number : ' . $vehicle->vehicle_no;
            $content .= '<br>Driver Name : ' . $vehicle->driver_name;
            $content .= '<br>Driver Mobile Number : ' . $vehicle->mobile;
            $content .= '<br>Driver Other Contact Number : ' . $vehicle->land_phone;

            $data['from']         = $this->input->post('name');
            $data['subject']      = 'Vehicle Request For Vehicle Number ' . $vehicle->vehicle_no;
            $data['title']        = 'Vehicle Request From';
            $data['content']      = $content;
            $data['sender']       = $this->input->post('username');
            $data['sender_email'] = '';

            $msg = $this->load->view('template/contact_mail', $data, TRUE);

            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: ' . $this->input->post('username') . ' <' . $this->input->post('email') . '>' . "\r\n";
            $headers .= 'Cc: gayathma3@gmail.com' . "\r\n";

            mail('vanuncle.lk@gmail.com', 'Vehicle Request For Vehicle Number ' . $vehicle->vehicle_no, $msg, $headers);
        }

        echo $result;
    }

}
