<?php

class Driver_model extends CI_Model {

    var $id;
    var $name;
    var $nic;
    var $mobile;
    var $land_phone;
    var $email;
    var $password;
    var $profile_pic;
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

    function get_name() {
        return $this->name;
    }

    function get_nic() {
        return $this->nic;
    }

    function get_mobile() {
        return $this->mobile;
    }

    function get_land_phone() {
        return $this->land_phone;
    }

    function get_email() {
        return $this->email;
    }

    function get_password() {
        return $this->password;
    }

    function get_profile_pic() {
        return $this->profile_pic;
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

    function set_name($name) {
        $this->name = $name;
    }

    function set_nic($nic) {
        $this->nic = $nic;
    }

    function set_mobile($mobile) {
        $this->mobile = $mobile;
    }

    function set_land_phone($land_phone) {
        $this->land_phone = $land_phone;
    }

    function set_email($email) {
        $this->email = $email;
    }

    function set_password($password) {
        $this->password = $password;
    }

    function set_profile_pic($profile_pic) {
        $this->profile_pic = $profile_pic;
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

?>