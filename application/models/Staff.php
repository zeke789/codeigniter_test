<?php

class Staff extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function getAll()
    {
        // join services on staff.id = services.staff_id
        $query = $this->db->get('staff');
        return $query->result_array();
    }

    public function getStaffMember($id)
    {
        /*
            join services on staff.id = services.staff_id and cou
                or
          get all services where staff_id = id
        */
        $query = $this->db->get_where('staff', array('id' => $id));
        return $query->row_array();
    }

}