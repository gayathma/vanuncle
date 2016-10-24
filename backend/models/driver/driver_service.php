<?php

class Driver_service extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_drivers(){
        
        $this->db->select('*');
        $this->db->from('va_drivers');
        $this->db->where('user_type', 1);
        $this->db->where('is_deleted', '0');
        $this->db->order_by("added_date", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function delete($driver_id) {
        $data = array('is_deleted' => '1');
        $this->db->where('id', $driver_id);
        return $this->db->update('va_drivers', $data);
    }

}
