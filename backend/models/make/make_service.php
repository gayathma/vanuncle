<?php

class Make_service extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /*
     * Service function to add a new make
     */

    function add_new_make($make_model) {
        return $this->db->insert('va_make', $make_model);
    }

    /*
     * service function to get all make
     */

    public function get_all_makes() {

        $this->db->select('va_make.*,va_cms_users.cms_user_name as added_by_user');
        $this->db->from('va_make');
        $this->db->join('va_cms_users', 'va_cms_users.cms_user_id = va_make.added_by');
        $this->db->where('va_make.is_deleted', '0');
        $this->db->order_by("va_make.added_date", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    /*
     * service function to deleter make
     */

    public function delete_make($make_id) {
        $data = array('is_deleted' => '1');
        $this->db->where('id', $make_id);
        return $this->db->update('va_make', $data);
    }

    /*
     * service function to update publish status of a make
     */

    public function publish_make($make_model) {
        $data = array('is_published' => $make_model->get_is_published());
        $this->db->update('va_make', $data, array('id' => $make_model->get_id()));
        return $this->db->affected_rows();
    }

    /*
     * update the make
     */

    function update_make($make_model) {
        $data = array('name' => $make_model->get_name(),
            'updated_date' => $make_model->get_updated_date(),
            'updated_by' => $make_model->get_updated_by()
        );

        $this->db->where('id', $make_model->get_id());
        return $this->db->update('va_make', $data);
    }

    /*
     * get the make details by pasing the make id as a parameter
     */

    function get_make_by_id($make_model) {
        $query = $this->db->get_where('va_make', array('id' => $make_model->get_id(), 'is_deleted' => '0'));
        return $query->row();
    }

    

}
