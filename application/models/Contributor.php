<?php


class Contributor extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }



    public function getAll()
    {
        // join services on staff.id = services.staff_id
        $query = $this->db->get('contributors');
        return $query->result_array();
    }
}