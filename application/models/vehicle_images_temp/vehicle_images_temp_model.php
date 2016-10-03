<?php

class Vehicle_images_temp_model extends CI_Model {

    var $id;
    var $image_path;
    var $is_published;
    var $added_date;
    var $added_by;

    function __construct() {
        parent::__construct();
    }

    public function get_id() {
        return $this->id;
    }

    public function set_id($id) {
        $this->id = $id;
    }

    public function get_image_path() {
        return $this->image_path;
    }

    public function set_image_path($image_path) {
        $this->image_path = $image_path;
    }

    public function get_is_published() {
        return $this->is_published;
    }

    public function set_is_published($is_published) {
        $this->is_published = $is_published;
    }


    public function get_added_date() {
        return $this->added_date;
    }

    public function set_added_date($added_date) {
        $this->added_date = $added_date;
    }

    public function get_added_by() {
        return $this->added_by;
    }

    public function set_added_by($added_by) {
        $this->added_by = $added_by;
    }


}
