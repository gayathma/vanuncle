<?php

class Content_service extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getContentbyhcode($content_hcode) {

        $query = $this->db->get_where('va_contents', array('content_hcode' => $content_hcode));
        return $query->row();
    }

}
?>