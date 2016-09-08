<?php

/*
 * Author : Viran
 */

class Cms_users_model extends CI_Model {

    var $cms_user_id;
    var $cms_user_email;
    var $cms_user_password;
    var $cms_user_name;
    var $cms_user_added_date;
    var $cms_user_status;

    function __construct() {
        parent::__construct();
    }

    function getCms_user_id() {
        return $this->cms_user_id;
    }

    function getCms_user_email() {
        return $this->cms_user_email;
    }

    function getCms_user_password() {
        return $this->cms_user_password;
    }

    function getCms_user_name() {
        return $this->cms_user_name;
    }

    function getCms_user_added_date() {
        return $this->cms_user_added_date;
    }

    function getCms_user_status() {
        return $this->cms_user_status;
    }

    function setCms_user_id($x) {
        $this->cms_user_id = $x;
    }

    function setCms_user_email($x) {
        $this->cms_user_email = $x;
    }

    function setCms_user_password($x) {
        $this->cms_user_password = $x;
    }

    function setCms_user_name($x) {
        $this->cms_user_name = $x;
    }

    function setCms_user_added_date($x) {
        $this->cms_user_added_date = $x;
    }

    function setCms_user_status($x) {
        $this->cms_user_status = $x;
    }

}

?>
