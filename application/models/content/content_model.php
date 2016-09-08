<?php

class Content_model extends CI_Model {

    var $content_id;
    var $content_title;
    var $content;
    var $content_hcode;
    var $delete_status;
    var $added_by;
    var $added_date;
    var $updated_by;
    var $updated_date;

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getContent_id() {
        return $this->content_id;
    }

    function getContent_title() {
        return $this->content_title;
    }

    function getContent() {
        return $this->content;
    }

    function getContent_hcode() {
        return $this->content_hcode;
    }

    function getDelete_status() {
        return $this->delete_status;
    }

    function getAdded_by() {
        return $this->added_by;
    }

    function getAdded_date() {
        return $this->added_date;
    }

    function getUpdated_by() {
        return $this->updated_by;
    }

    function getUpdated_date() {
        return $this->updated_date;
    }

    function setContent_id($content_id) {
        $this->content_id = $content_id;
    }

    function setContent_title($content_title) {
        $this->content_title = $content_title;
    }

    function setContent($content) {
        $this->content = $content;
    }

    function setContent_hcode($content_hcode) {
        $this->content_hcode = $content_hcode;
    }

    function setDelete_status($delete_status) {
        $this->delete_status = $delete_status;
    }

    function setAdded_by($added_by) {
        $this->added_by = $added_by;
    }

    function setAdded_date($added_date) {
        $this->added_date = $added_date;
    }

    function setUpdated_by($updated_by) {
        $this->updated_by = $updated_by;
    }

    function setUpdated_date($updated_date) {
        $this->updated_date = $updated_date;
    }

}
?>