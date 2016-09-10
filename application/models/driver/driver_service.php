<?php

class Driver_service extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function add_new_driver($driver_model) {
        return $this->db->insert('va_drivers', $driver_model);
    }

    function authenticate_user_with_password($driver_model) {
        $data = array('email' => $driver_model->get_email(), 'password' => $driver_model->get_password(), 'is_deleted' => '0');
        $this->db->select('va_drivers.*');
        $this->db->from('va_drivers');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->row();
    }

}

?>