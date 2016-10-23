<?php

class Make_service extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    /**
     * service function to get all manufacure
     */
    public function get_all_makes() {

        $this->db->select('va_make.*');
        $this->db->from('va_make');
        $this->db->where('va_make.is_deleted', '0');
        $this->db->where('va_make.is_published', '1');
        $this->db->order_by("va_make.name", "asc");
        $query = $this->db->get();
        return $query->result();
    }


    function get_make_by_id($make_model) {
        $query = $this->db->get_where('va_make', array('id' => $make_model->get_id(), 'is_deleted' => '0'));
        return $query->row();
    }


}
