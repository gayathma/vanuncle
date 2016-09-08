<?php

class Sliders_model extends CI_Model {

    var $slider_id;
    var $slider_no;
    var $slider_title;
    var $slider_image;
    var $delete_status;
    var $added_date;
    var $added_by;
    var $updated_by;
    var $updated_date;

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getSlider_id() {
        return $this->slider_id;
    }

    function getSlider_no() {
        return $this->slider_no;
    }

    function getSlider_title() {
        return $this->slider_title;
    }

    function getSlider_image() {
        return $this->slider_image;
    }

    function getDelete_status() {
        return $this->delete_status;
    }

    function getAdded_date() {
        return $this->added_date;
    }

    function getAdded_by() {
        return $this->added_by;
    }

    function getUpdated_by() {
        return $this->updated_by;
    }

    function getUpdated_date() {
        return $this->updated_date;
    }

    function setSlider_id($slider_id) {
        $this->slider_id = $slider_id;
    }

    function setSlider_no($slider_no) {
        $this->slider_no = $slider_no;
    }

    function setSlider_title($slider_title) {
        $this->slider_title = $slider_title;
    }

    function setSlider_image($slider_image) {
        $this->slider_image = $slider_image;
    }

    function setDelete_status($delete_status) {
        $this->delete_status = $delete_status;
    }

    function setAdded_date($added_date) {
        $this->added_date = $added_date;
    }

    function setAdded_by($added_by) {
        $this->added_by = $added_by;
    }

    function setUpdated_by($updated_by) {
        $this->updated_by = $updated_by;
    }

    function setUpdated_date($updated_date) {
        $this->updated_date = $updated_date;
    }

}

?>