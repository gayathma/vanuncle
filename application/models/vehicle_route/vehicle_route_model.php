<?php

class Vehicle_route_model extends CI_Model {

    var $id;
    var $driver_id;
    var $vehicle_id;
    var $service_type;
    var $route;
    var $added_date;

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_id() {
        return $this->id;
    }

    function get_driver_id() {
        return $this->driver_id;
    }

    function get_vehicle_id() {
        return $this->vehicle_id;
    }

    function get_service_type() {
        return $this->service_type;
    }

    function get_route() {
        return $this->route;
    }

    function get_added_date() {
        return $this->added_date;
    }

    function set_id($id) {
        $this->id = $id;
    }

    function set_driver_id($driver_id) {
        $this->driver_id = $driver_id;
    }

    function set_vehicle_id($vehicle_id) {
        $this->vehicle_id = $vehicle_id;
    }

    function set_service_type($service_type) {
        $this->service_type = $service_type;
    }

    function set_route($route) {
        $this->route = $route;
    }

    function set_added_date($added_date) {
        $this->added_date = $added_date;
    }



}
