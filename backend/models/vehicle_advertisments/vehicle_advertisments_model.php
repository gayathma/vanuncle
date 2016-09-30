<?php

class Vehicle_advertisments_model extends CI_Model {

    var $id;
    var $transmission_id;
    var $year;
    var $fuel_type_id;
    var $manufacture_id;
    var $model_id;
    var $body_type_id;
    var $doors;
    var $cilindrics;
    var $colour;
    var $description;
    var $chassis_no;
    var $price;
    var $kilometers;
    var $sale_type;
    var $latitude;
    var $longitude;
    var $location_id;
    var $is_published;
    var $is_deleted;
    var $added_date;
    var $added_by;
    var $updated_date;
    var $updated_by;
    var $is_featured;
    var $is_price_drop;

    function __construct() {
        parent::__construct();
    }
    
    public function get_id() {
        return $this->id;
    }

    public function set_id($id) {
        $this->id = $id;
    }

    public function get_transmission_id() {
        return $this->transmission_id;
    }

    public function set_transmission_id($transmission_id) {
        $this->transmission_id = $transmission_id;
    }

    public function get_year() {
        return $this->year;
    }

    public function set_year($year) {
        $this->year = $year;
    }

    public function get_fuel_type_id() {
        return $this->fuel_type_id;
    }

    public function set_fuel_type_id($fuel_type_id) {
        $this->fuel_type_id = $fuel_type_id;
    }

    public function get_manufacture_id() {
        return $this->manufacture_id;
    }

    public function set_manufacture_id($manufacture_id) {
        $this->manufacture_id = $manufacture_id;
    }

    public function get_model_id() {
        return $this->model_id;
    }

    public function set_model_id($model_id) {
        $this->model_id = $model_id;
    }

    public function get_body_type_id() {
        return $this->body_type_id;
    }

    public function set_body_type_id($body_type_id) {
        $this->body_type_id = $body_type_id;
    }

    public function get_doors() {
        return $this->doors;
    }

    public function set_doors($doors) {
        $this->doors = $doors;
    }

    public function get_cilindrics() {
        return $this->cilindrics;
    }

    public function set_cilindrics($cilindrics) {
        $this->cilindrics = $cilindrics;
    }

    public function get_colour() {
        return $this->colour;
    }

    public function set_colour($colour) {
        $this->colour = $colour;
    }

    public function get_description() {
        return $this->description;
    }

    public function set_description($description) {
        $this->description = $description;
    }

    public function get_chassis_no() {
        return $this->chassis_no;
    }

    public function set_chassis_no($chassis_no) {
        $this->chassis_no = $chassis_no;
    }

    public function get_price() {
        return $this->price;
    }

    public function set_price($price) {
        $this->price = $price;
    }

    public function get_kilometers() {
        return $this->kilometers;
    }

    public function set_kilometers($kilometers) {
        $this->kilometers = $kilometers;
    }

    public function get_sale_type() {
        return $this->sale_type;
    }

    public function set_sale_type($sale_type) {
        $this->sale_type = $sale_type;
    }

    public function get_latitude() {
        return $this->latitude;
    }

    public function set_latitude($latitude) {
        $this->latitude = $latitude;
    }

    public function get_longitude() {
        return $this->longitude;
    }

    public function set_longitude($longitude) {
        $this->longitude = $longitude;
    }

    public function get_location_id() {
        return $this->location_id;
    }

    public function set_location_id($location_id) {
        $this->location_id = $location_id;
    }

    public function get_is_published() {
        return $this->is_published;
    }

    public function set_is_published($is_published) {
        $this->is_published = $is_published;
    }

    public function get_is_deleted() {
        return $this->is_deleted;
    }

    public function set_is_deleted($is_deleted) {
        $this->is_deleted = $is_deleted;
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

    public function get_updated_date() {
        return $this->updated_date;
    }

    public function set_updated_date($updated_date) {
        $this->updated_date = $updated_date;
    }

    public function get_updated_by() {
        return $this->updated_by;
    }

    public function set_updated_by($updated_by) {
        $this->updated_by = $updated_by;
    }

    public function get_is_featured() {
        return $this->is_featured;
    }

    public function set_is_featured($is_featured) {
        $this->is_featured = $is_featured;
    }

    public function get_is_price_drop() {
        return $this->is_price_drop;
    }

    public function set_is_price_drop($is_price_drop) {
        $this->is_price_drop = $is_price_drop;
    }


    
}
