<?php

class Vehicle_news_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('/vehicle_news/vehicle_news_model'); //load the getters and setters of the model
    }

    /*
     * service funtion to add a new vehicle news
     */

    function add_new_vehicle_news($vehicle_news_model) {
        return $this->db->insert('vehicle_news', $vehicle_news_model);
    }

    /*
     * service funtion to load all vehicle news
     */

    public function get_all_vehicle_news() {
        $this->db->select('*');
        $this->db->from('vehicle_news');
        $this->db->where('vehicle_news.is_deleted', '0');
        $this->db->order_by('vehicle_news.added_date', 'desc');
        $query = $this->db->get(); //get the results.same as "$query=mysql_query($sql") in pure php
        return $query->result();
    }

    public function delete_vehicle_news($vehicle_news_id) {
        $data = array('is_deleted' => '1');
        $this->db->where('id', $vehicle_news_id);
        return $this->db->update('vehicle_news', $data);
    }

    public function publish_vehicle_news($vehicle_news_model) {
        $data = array('is_published' => $vehicle_news_model->get_is_published());
        $this->db->update('vehicle_news', $data, array('id' => $vehicle_news_model->get_id()));
        return $this->db->affected_rows();
    }

    public function update_vehicle_news($vehicle_news_model) {
        $data = array('title' => $vehicle_news_model->get_title(),
            'content' => $vehicle_news_model->get_content(),
            'updated_date' => $vehicle_news_model->get_updated_date(),
            'updated_by' => $vehicle_news_model->get_updated_date()
        );
        
        $this->db->where('id',$vehicle_news_model->get_id());
        return $this->db->update('vehicle_news',$data);
    }
    
    public function get_vehicle_news_by_id($vehicle_news_model){
        $query=  $this->db->get_where('vehicle_news',array('id'=>$vehicle_news_model->get_id(),'is_deleted'=>'0'));
        return $query->row();
    }
    
    public function update_vehicle_image($vehicle_news_model) {
        $data = array('employee_avatar' => $employee_model->get_employee_avatar());
        $this->db->where('employee_code', $employee_model->get_employee_code());
        return $this->db->update('employee', $data);
    }

}
