<?php

class Vehicles_model extends CI_Model {

    var $id;
    var $driver_id;
    var $make;
    var $model;
    var $type;
    var $vehicle_no;
    var $year;
    var $seats;
    var $isAc;
    var $description;
    var $is_deleted;
    var $added_date;
    var $updated_date;

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

    function get_make() {
        return $this->make;
    }

    function get_model() {
        return $this->model;
    }

    function get_type() {
        return $this->type;
    }

    function get_vehicle_no() {
        return $this->vehicle_no;
    }

    function get_year() {
        return $this->year;
    }

    function get_seats() {
        return $this->seats;
    }

    function get_isAc() {
        return $this->isAc;
    }

    function get_description() {
        return $this->description;
    }

    function get_is_deleted() {
        return $this->is_deleted;
    }

    function get_added_date() {
        return $this->added_date;
    }

    function get_updated_date() {
        return $this->updated_date;
    }

    function set_id($id) {
        $this->id = $id;
    }

    function set_driver_id($driver_id) {
        $this->driver_id = $driver_id;
    }

    function set_make($make) {
        $this->make = $make;
    }

    function set_model($model) {
        $this->model = $model;
    }

    function set_type($type) {
        $this->type = $type;
    }

    function set_vehicle_no($vehicle_no) {
        $this->vehicle_no = $vehicle_no;
    }

    function set_year($year) {
        $this->year = $year;
    }

    function set_seats($seats) {
        $this->seats = $seats;
    }

    function set_isAc($isAc) {
        $this->isAc = $isAc;
    }

    function set_description($description) {
        $this->description = $description;
    }

    function set_is_deleted($is_deleted) {
        $this->is_deleted = $is_deleted;
    }

    function set_added_date($added_date) {
        $this->added_date = $added_date;
    }

    function set_updated_date($updated_date) {
        $this->updated_date = $updated_date;
    }


}
