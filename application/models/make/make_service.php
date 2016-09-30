<?php

class Make_service extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    /**
     * service function to get all manufacure
     */
    public function get_all_makes() {

        $this->db->select('make.*');
        $this->db->from('make');
        $this->db->where('make.is_deleted', '0');
        $this->db->where('make.is_published', '1');
        $this->db->order_by("make.name", "asc");
        $query = $this->db->get();
        return $query->result();
    }


    function get_make_by_id($make_model) {
        $query = $this->db->get_where('make', array('id' => $make_model->get_id(), 'is_deleted' => '0'));
        return $query->row();
    }


}
