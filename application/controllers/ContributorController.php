<?php


class ContributorController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('contributor');
        $this->load->helper('url_helper');
        // NOT WORKING:  # $this->load->library('../controllers/StaffController');
    }
    public  function getAll()
    {
        $data['allContributors'] = $this->contributor->getAll();
        if (!empty($data['allContributors'])) return $data['allContributors'];
        return [];
    }

}