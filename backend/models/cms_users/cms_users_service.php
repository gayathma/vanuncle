<?php

/*
 * Author : Viran
 */

class Cms_users_service extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function authenticateuser($cms_users_model) {

        $query = $this->db->get_where('va_cms_users', array(
            'cms_user_email' => $cms_users_model->getCms_user_email(),
            'cms_user_password' => $cms_users_model->getCms_user_password(),
            'cms_user_status' => $cms_users_model->getCms_user_status()
        ));
        return $query->row();
    }

}

?>
