<?php

class Service extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function getAll()
    {
        /*  join staff on staff.id = services.staff_id

         SELECT services.id as serviceId,contributors.name as contributorName
           FROM `services`
           JOIN contributors on services.contributors_id  LIKE CONCAT('%,', contributors.id  ,',%')
        */
        $query = $this->db->get('services');
        return $query->result_array();
    }

    public function getById($id)
    {
        $query = $this->db->get_where('services', array('id' => $id));
        return $query->row_array();
    }

}