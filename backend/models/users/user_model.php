<?php

class User_model extends CI_Model {

    var $cms_user_id;
    var $cms_user_email;
    var $cms_user_password;
    var $cms_user_name;
    var $cms_user_added_date;
    var $cms_user_status;
    

    function __construct() {
        parent::__construct();
    }

    function get_cms_user_id() {
        return $this->cms_user_id;
    }

    function get_cms_user_email() {
        return $this->cms_user_email;
    }

    function get_cms_user_password() {
        return $this->cms_user_password;
    }

    function get_cms_user_name() {
        return $this->cms_user_name;
    }

    function get_cms_user_added_date() {
        return $this->cms_user_added_date;
    }

    function get_cms_user_status() {
        return $this->cms_user_status;
    }

    function set_cms_user_id($cms_user_id) {
        $this->cms_user_id = $cms_user_id;
    }

    function set_cms_user_email($cms_user_email) {
        $this->cms_user_email = $cms_user_email;
    }

    function set_cms_user_password($cms_user_password) {
        $this->cms_user_password = $cms_user_password;
    }

    function set_cms_user_name($cms_user_name) {
        $this->cms_user_name = $cms_user_name;
    }

    function set_cms_user_added_date($cms_user_added_date) {
        $this->cms_user_added_date = $cms_user_added_date;
    }

    function set_cms_user_status($cms_user_status) {
        $this->cms_user_status = $cms_user_status;
    }



}
