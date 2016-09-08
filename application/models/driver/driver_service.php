<?php

class Driver_service extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function add_new_driver($driver_model) {
        return $this->db->insert('va_drivers', $driver_model);
    }

}

?>