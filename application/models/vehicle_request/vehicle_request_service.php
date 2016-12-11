<?php

class Vehicle_request_service extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function add_vehicle_request($vehicle_request_model) {
        return $this->db->insert('va_vehicle_request', $vehicle_request_model);
    }

}
