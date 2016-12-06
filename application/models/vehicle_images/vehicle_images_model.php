<?php

class Vehicle_images_model extends CI_Model {

    var $id;
    var $vehicle_id;
    var $caption;
    var $image_path;
    var $is_deleted;
    var $added_date;
    var $added_by;
    var $updated_date;
    var $updated_by;

    function __construct() {
        parent::__construct();
    }

    function get_id() {
        return $this->id;
    }

    function get_vehicle_id() {
        return $this->vehicle_id;
    }

    function get_caption() {
        return $this->caption;
    }

    function get_image_path() {
        return $this->image_path;
    }

    function get_is_deleted() {
        return $this->is_deleted;
    }

    function get_added_date() {
        return $this->added_date;
    }

    function get_added_by() {
        return $this->added_by;
    }

    function get_updated_date() {
        return $this->updated_date;
    }

    function get_updated_by() {
        return $this->updated_by;
    }

    function set_id($id) {
        $this->id = $id;
    }

    function set_vehicle_id($vehicle_id) {
        $this->vehicle_id = $vehicle_id;
    }

    function set_caption($caption) {
        $this->caption = $caption;
    }

    function set_image_path($image_path) {
        $this->image_path = $image_path;
    }

    function set_is_deleted($is_deleted) {
        $this->is_deleted = $is_deleted;
    }

    function set_added_date($added_date) {
        $this->added_date = $added_date;
    }

    function set_added_by($added_by) {
        $this->added_by = $added_by;
    }

    function set_updated_date($updated_date) {
        $this->updated_date = $updated_date;
    }

    function set_updated_by($updated_by) {
        $this->updated_by = $updated_by;
    }

}
