<?php


class StaffController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('staff');
        $this->load->helper('url_helper');
    }

    public function getAll()
    {
        $data['allStaff'] = $this->staff->getAll();
        if (!empty($data['allStaff'])) return $data['allStaff'];
        return [];
    }

    public function viewAll()
    {
        $data['allStaff'] = $this->staff->getAll();
        if (empty($data['allStaff']))  show_404();
        $data['title'] = "All Staff";
        $this->load->view('templates/header', $data);
        $this->load->view('pages/manage/staff_list', $data);
        $this->load->view('templates/footer', $data);
    }

    public function viewById($id = null)
    {
        $data['staffMember'] = $this->staff->getStaffMember($id);
        if (empty($data['staffMember']))
                show_error(
                    "Miembro del staff inexistente. <br> <a href='/codeigniter'>Go Index </a>",
                    "",
                    $heading = 'Error...'
                );
        $data['title'] = "All Staff";
        $this->load->view('templates/header', $data);
        $this->load->view('pages/manage/staff_list', $data);
        $this->load->view('templates/footer', $data);
    }

}