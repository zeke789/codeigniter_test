<?php

class Service extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function getCount()
    {
        return $this->db->count_all("services");
    }

    public function getAll($page)
    {
        if($page == 1) $start = 0; else $start = ($page-1)*5;
        $this->db
            ->select('srvcs.id, srvcs.name, srvcs.staff_id, srvcs.description, srvcs.contributors_id ,stf.name as staffName' )
            ->from('services as srvcs')
            ->join('staff as stf', 'stf.id = srvcs.staff_id')
            ->limit(5,$start);
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

    public function addNew()
    {
        $this->load->helper('url');
        $slug = url_title($this->input->post('sName'), 'dash', TRUE);
        $data = array(
            'name' => $this->input->post('sName'),
            'description' =>$this->input->post('sDescription'),
            'staff_id' => $this->input->post('staff'),
            'contributors_id' => $this->input->post('staff')
        );
        return $this->db->insert('services', $data);
    }

}