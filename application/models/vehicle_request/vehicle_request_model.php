<?php

class Vehicle_request_model extends CI_Model {

    var $id;
    var $customer_name;
    var $customer_email;
    var $customer_contact;
    var $vehicle_id;
    var $status;
    var $added_date;

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_id() {
        return $this->id;
    }

    function get_customer_name() {
        return $this->customer_name;
    }

    function get_customer_email() {
        return $this->customer_email;
    }

    function get_customer_contact() {
        return $this->customer_contact;
    }

    function get_vehicle_id() {
        return $this->vehicle_id;
    }

    function get_status() {
        return $this->status;
    }

    function get_added_date() {
        return $this->added_date;
    }

    function set_id($id) {
        $this->id = $id;
    }

    function set_customer_name($customer_name) {
        $this->customer_name = $customer_name;
    }

    function set_customer_email($customer_email) {
        $this->customer_email = $customer_email;
    }

    function set_customer_contact($customer_contact) {
        $this->customer_contact = $customer_contact;
    }

    function set_vehicle_id($vehicle_id) {
        $this->vehicle_id = $vehicle_id;
    }

    function set_status($status) {
        $this->status = $status;
    }

    function set_added_date($added_date) {
        $this->added_date = $added_date;
    }

}
