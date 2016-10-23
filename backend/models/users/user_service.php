<?php

class User_service extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /*
     * Only admins and super admins can be authenticate using this function
     */

    function authenticate_user_with_password($user_model) {

        $data = array('cms_user_email' => $user_model->get_cms_user_name(), 'cms_user_password' => $user_model->get_cms_user_password(), 'cms_user_status' => '1');

        $this->db->select('va_cms_users.*');
        $this->db->from('va_cms_users');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->row();
    }

    

}
