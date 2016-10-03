<?php

class Model_service extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    public function get_all_active_models() {

        $this->db->select('model.*');
        $this->db->from('model');
        $this->db->where('model.is_published', '1');
        $this->db->where('model.is_deleted', '0');
        $this->db->order_by("model.name", "asc");
        $query = $this->db->get();
        return $query->result();
    }


    function get_model_by_id($model_model) {

        $query = $this->db->get_where('model', array('id' => $model_model->get_id(), 'is_deleted' => '0'));
        return $query->row();
    }


    function get_model_by_make($make_id) {

        $query = $this->db->get_where('model', array('make_id' => $make_id, 'is_deleted' => '0', 'is_published' => '1'));
        return $query->result();
    }

}
