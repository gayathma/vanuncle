<?php

class Vehicle_images_service extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Insert data into temp images table
     * @param object $vehicle_images_model Input model
     * @return boolean
     */
    function add_new_images($vehicle_images_model) {
        return $this->db->insert('va_vehicle_images', $vehicle_images_model);
    }

    /**
     * get all images for one advertisement
     * @param integer $advertisement_id Input advertisement id
     * @return object
     */
    function get_images_for_vehicle($vehicle_id) {
        $this->db->select('*');
        $this->db->from('va_vehicle_images');
        $this->db->where("vehicle_id", $vehicle_id);
        $this->db->where("is_deleted", "0");
        $query = $this->db->get();

        return $query->result();
    }

    /**
     * get one images for one advertisement advertisement id
     * @param integer $advertisement_id Inout 
     * @return object
     */
    function get_images_for_vehicle_one($vehicle_id) {
        $this->db->select('*');
        $this->db->from('va_vehicle_images');
        $this->db->where("vehicle_id", $vehicle_id);
        $this->db->where("is_deleted", "0");
        $this->db->limit("1");
        $query = $this->db->get();

        return $query->row();
    }

}
