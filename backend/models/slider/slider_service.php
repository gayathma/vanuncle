<?php

/*
 * Author : Viran
 */

class Slider_service extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getSliderimagesbySliderno($slider_model) {


        $this->db->select('*');
        $this->db->from('va_sliders');
        $this->db->where('slider_no', $slider_model->getSlider_no());
        $this->db->order_by('slider_order asc, added_date desc');
        $query = $this->db->get();
        return $query->result();
    }

    function addsliderimage($slider_model) {


//            print_r($slider_model);die();
//		
//		$data = array(
//				'slider_image' => $slider_model->getSlider_image(),
//				'slider_no' => $slider_model->getSlider_no(),
//				'slider_order' => $slider_model->getSlider_order(),
//				'added_by' => $slider_model->getAdded_by(),
//                    		'added_by' => $slider_model->getAdded_by(),
//                    
//				
//				
//				
//		);
//		
        //$this->db->where('content_id', $content_model->getContent_id());
        return $this->db->insert('va_sliders', $slider_model);
    }

    function savesliderorder($slider_model) {



        $data = array(
            'slider_order' => $slider_model->getSlider_order()
        );

        $this->db->where('slider_id', $slider_model->getSlider_id());
        return $this->db->update('va_sliders', $data);
    }

    function deletesliderimage($slider_model) {
        return $this->db->delete('va_sliders', array(
                    'slider_id' => $slider_model->getSlider_id()
        ));
    }

    // put your code here
}

?>
