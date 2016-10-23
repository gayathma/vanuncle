<?php

class Model_service extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /*
     * This is the service function to add a new vehicle model
     */

    function add_new_model($model_model) {
        return $this->db->insert('va_model', $model_model);
    }

    /*
     * This is the service function to get all vehicle models
     */

    public function get_all_models() {

        $this->db->select('va_model.*,va_cms_users.cms_user_name as added_by_user,va_make.name as manufacturer');
        $this->db->from('va_model');
        $this->db->join('va_cms_users', 'va_cms_users.cms_user_id = va_model.added_by');
        $this->db->join('va_make', 'va_make.id=va_model.make_id');
        $this->db->where('va_model.is_deleted', '0');
        $this->db->order_by("va_model.added_date", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    /*
     * This service function is to delete a vehicle model
     */

    function delete_model($id) {
        $data = array('is_deleted' => '1');
        $this->db->where('id', $id);
        return $this->db->update('va_model', $data);
    }

    /*
     * This service function is to update the published status
     */

    function publish_model($model_model) {
        $data = array('is_published' => $model_model->get_is_published());
        $this->db->update('va_model', $data, array('id' => $model_model->get_id()));
        return $this->db->affected_rows();
    }

    /*
     * This is the service function to get vehicle model by model id passing the 
     * id as a parameter
     */

    function get_model_by_id($model_model) {

        $query = $this->db->get_where('va_model', array('id' => $model_model->get_id(), 'is_deleted' => '0'));
        return $query->row();
    }

    /*
     * This is the service function to update vehicle models
     */

    function update_model($model_model) {

        $data = array('name' => $model_model->get_name(),
            'make_id' => $model_model->get_make_id(),
            'updated_date' => $model_model->get_updated_date(),
            'updated_by' => $model_model->get_updated_by()
        );

        $this->db->where('id', $model_model->get_id());
        return $this->db->update('va_model', $data); //table name,data
    }

}
