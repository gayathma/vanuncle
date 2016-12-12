<?php

class Vehicles_service extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_my_vehicles($driver_id) {
        
        $this->db->select('va_vehicles.*,va_vehicle_images.image_path, va_model.name as model_name, va_make.name as make_name');
        $this->db->from('va_vehicles');
        $this->db->join('va_model', 'va_model.id = va_vehicles.model');
        $this->db->join('va_make', 'va_make.id = va_vehicles.make');
        $this->db->join('va_vehicle_images', 'va_vehicle_images.vehicle_id = va_vehicles.id', 'left');
        $this->db->where('driver_id', $driver_id);
        $this->db->where('va_vehicles.is_deleted', '0');
        $this->db->order_by('va_vehicles.added_date', "desc");
        $this->db->group_by('va_vehicles.id');
        $query = $this->db->get();
        return $query->result();
    }

    function add_new_vehicle($vehicle_model) {
        $this->db->insert('va_vehicles', $vehicle_model);
        return $this->db->insert_id();
    }
    
    function delete_vehicle($vehicle_id) {
        $data = array('is_deleted' => '1');
        $this->db->where('id', $vehicle_id);
        return $this->db->update('va_vehicles', $data);
    }
    
    function get_vehicle_by_id($vehicle_id) {

        $this->db->select('va_vehicles.*,va_drivers.name as driver_name, va_drivers.mobile, va_drivers.land_phone');
        $this->db->from('va_vehicles');
        $this->db->join('va_drivers', 'va_drivers.id = va_vehicles.driver_id');
        $this->db->where('va_vehicles.id', $vehicle_id);
        $query = $this->db->get();
        return $query->row();
    }

}
