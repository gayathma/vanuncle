<?php

class Vehicle_route_service extends CI_Model {

    function __construct() {
        parent::__construct();
    }

     function add_new_route($vehicle_route_model) {
        return $this->db->insert('va_vehicle_routes', $vehicle_route_model);
    }


    public function search_vehicles($service_type, $pickup_location, $dropoff_location, $limit, $start, $type) {

        $this->db->select('va_vehicles.*,va_vehicle_images.image_path,'
                . ' va_model.name as model_name,'
                . ' va_make.name as make_name,'
                . ' va_drivers.profile_pic,'
                .'va_drivers.name as driver_name');
        $this->db->from('va_vehicle_routes');
        $this->db->join('va_drivers', 'va_drivers.id = va_vehicle_routes.driver_id');
        $this->db->join('va_vehicles', 'va_vehicles.id = va_vehicle_routes.vehicle_id');
        $this->db->join('va_model', 'va_model.id = va_vehicles.model');
        $this->db->join('va_make', 'va_make.id = va_vehicles.make');
        $this->db->join('va_vehicle_images', 'va_vehicle_images.vehicle_id = va_vehicles.id', 'left');
        $this->db->where('va_vehicles.is_deleted', '0');
        $this->db->where('va_drivers.is_deleted', '0');
        

        if ((!empty($service_type)) && (!is_null($service_type))) {
            $this->db->where('va_vehicle_routes.service_type', $service_type);
        }
        
        if ((!empty($pickup_location) && !is_null($pickup_location)) && (empty($dropoff_location) || is_null($dropoff_location))) {
            $this->db->like('va_vehicle_routes.route', $pickup_location);
        }elseif ((!empty($dropoff_location) && !is_null($dropoff_location)) && (empty($pickup_location) || is_null($pickup_location))) {
            $this->db->like('va_vehicle_routes.route', $dropoff_location);
        }elseif(!empty($pickup_location) && !is_null($pickup_location) && !empty($dropoff_location) && !is_null($dropoff_location) ){
            $this->db->where('(va_vehicle_routes.route like "%'.$pickup_location.'%" OR va_vehicle_routes.route like "%'.$dropoff_location.'%")');
        }

        $this->db->order_by("va_vehicles.added_date", "desc");
        if ($type == 'half') {
            $this->db->limit($limit, $start);
        }
        $this->db->group_by('va_vehicles.id');
        
        $query = $this->db->get();
        return $query->result();
    }
    
    function get_routes_for_vehicle($driver_id,$vehicle_id,$service_type) {

        $query = $this->db->get_where('va_vehicle_routes', array('driver_id' => $driver_id,
            'vehicle_id' => $vehicle_id, 'service_type' => $service_type));
        return $query->result();
    }
    
    function get_routes_vehicle($driver_id,$vehicle_id) {

        $query = $this->db->get_where('va_vehicle_routes', array('driver_id' => $driver_id,
            'vehicle_id' => $vehicle_id));
        return $query->result();
    }
    
    function delete_vehicle_routes($vehicle_id) {
        $this->db->where('vehicle_id', $vehicle_id);
        return $this->db->delete('va_vehicle_routes');
    }

}
