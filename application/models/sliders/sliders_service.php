<?php

class Sliders_service extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getSlideritemsbysliderid($sliders_model) {

        $query = $this->db->get_where('va_sliders', array('slider_no' => $sliders_model->getSlider_id()));
        return $query->result();
    }

}
?>