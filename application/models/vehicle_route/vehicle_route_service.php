<?php

class Vehicle_route_service extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_my_vehicles($driver_id) {
        
        $this->db->select('va_vehicles.*');
        $this->db->from('va_vehicles');
        $this->db->where('driver_id', $driver_id);
        $this->db->where('is_deleted', '0');
        $this->db->order_by('added_date', "desc");
        $query = $this->db->get();
        return $query->result();
    }

}
