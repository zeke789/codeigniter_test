<?php


class ServiceController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('service');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['allServices'] = $this->service->getAll();
        if (empty($data['allServices']))  show_404();
        $data['title'] = "All Services";
        $this->load->view('templates/header', $data);
        $this->load->view('pages/main_page', $data);
        $this->load->view('templates/footer', $data);

    }

    public function view($id)
    {
        $data['getService'] = $this->service->getById($id);
        if (empty($data['getService']))
            show_error(
                "Servicio inexistente. <br> <a href='/codeigniter'>Go Index </a>",
                "",
                $heading = 'Error...'
            );
        $data['title'] = "Service "  . $data['getService']['name'];
        $this->load->view('templates/header', $data);
        $this->load->view('pages/main_page', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add()
    {
        //$name,$description,$staff,$contributors
        var_dump("... add service ...");
        var_dump($_POST);
        die;
    }

}