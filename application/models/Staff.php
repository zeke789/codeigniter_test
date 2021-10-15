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
        $this->db
            ->select('ifnull(srvcs.id,"--") as service_id, ifnull(srvcs.name,"--") as serviceName,stf.id, stf.name ')
            ->from('staff as stf')
            ->join('services as srvcs', 'srvcs.staff_id = stf.id','left')
            ->where('stf.id',$id);
           return $this->db->get()->result_array();

       # $query = $this->db->get_where('staff', array('id' => $id));
       # return $query->row_array();
    }

}