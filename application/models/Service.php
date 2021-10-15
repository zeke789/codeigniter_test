<?php

class Service extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function getAll()
    {
        $this->db
            ->select('srvcs.id, srvcs.name, srvcs.staff_id, srvcs.description, srvcs.contributors_id ,stf.name as staffName' )
            ->from('services as srvcs')
            ->join('staff as stf', 'stf.id = srvcs.staff_id');
        return $this->db->get()->result_array();
    }

    public function getById($id)
    {
        $query = $this->db
                ->select("srvcs.id, srvcs.name, srvcs.staff_id, srvcs.description, srvcs.contributors_id ,stf.name as staffName")
                ->from('services as srvcs')
                ->join('staff as stf', 'stf.id = srvcs.staff_id')
                ->where('srvcs.id', $id);

        return $query->get()->row_array();
    }

}