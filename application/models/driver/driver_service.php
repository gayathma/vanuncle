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
        $data  = array('email' => $driver_model->get_email(), 'password' => $driver_model->get_password(), 'is_deleted' => '0');
        $this->db->select('va_drivers.*');
        $this->db->from('va_drivers');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->row();
    }

    function get_driver_by_id($driver_id) {

        $query = $this->db->get_where('va_drivers', array('id' => $driver_id, 'is_deleted' => '0'));
        return $query->row();
    }

    function check_username($username) {
        $this->db->from('va_drivers');
        $this->db->where('email', $username);
        $query = $this->db->get();
        $res   = $query->row();
        if (empty($res))
            return true;
        return false;
    }

    function update_driver_details($driver_model) {

        $data = array(
            'name'         => $driver_model->get_name(),
            'nic'          => $driver_model->get_nic(),
            'mobile'       => $driver_model->get_mobile(),
            'profile_pic'       => $driver_model->get_profile_pic(),
            'updated_date' => $driver_model->get_updated_date()
        );

        $this->db->where('id', $driver_model->get_id());
        return $this->db->update('va_drivers', $data);
    }

    function update_security_details($driver_model) {

        $data = array(
            'password'     => $driver_model->get_password(),
            'updated_date' => $driver_model->get_updated_date()
        );

        $this->db->where('id', $driver_model->get_id());
        return $this->db->update('va_drivers', $data);
    }

}
