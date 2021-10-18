<?php
require_once(APPPATH.'controllers/StaffController.php');
require_once(APPPATH.'controllers/ContributorController.php');

class ServiceController extends CI_Controller{

   public static $c;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('service');
        $this->load->helper('url_helper');
        // NOT WORKING:  # $this->load->library('../controllers/StaffController');
    }

    public function viewAddService()
    {
        $data['title'] = 'Create a news item';
        $data['title']="Add New Service";

        $staffC = new StaffController();
        $staff = $staffC->getAll();
        $data['staff'] = $staff;

        $c2 =  new ContributorController();
        $c2 = $c2->getAll();
        $data['contributors'] = $c2;

        $this->load->view('templates/header', $data);
        $this->load->view('pages/manage/add_service', $data);
        $this->load->view('templates/footer', $data);
    }

    public function getAll($page=1)
    {
        $data['allServices'] = $this->service->getAll($page);
        if (empty($data['allServices']))  show_404();

        $this->load->library('pagination');

        $config['base_url'] = 'http://127.0.0.1/codeigniter/services/';
        $config['total_rows'] = $this->service->getCount();
        $config['per_page'] = 5;
        $config['use_page_numbers'] = true;
        $config['cur_tag_open']     = '<span class="page-link-active">';
        $config['cur_tag_close']    = '</span>';
        $config['attributes'] = array('class' => 'btnPages');
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();

      //  $data["links"] = $this->pagination->create_links();

        $data['title'] = "All Services";
        $this->load->view('templates/header', $data);
        $this->load->view('pages/main_page', $data);
        $this->load->view('templates/footer', $data);
    }


    public function getAllWithJavascript($page=1)
    {
        $data['allServices'] = $this->service->getAll($page);
        if (empty($data['allServices']))  show_404();

        $this->load->library('pagination');

        $config['base_url'] = 'http://127.0.0.1/codeigniter/services/';
        $config['total_rows'] = $this->service->getCount();
        $config['per_page'] = 5;
        $config['use_page_numbers'] = true;
        $this->pagination->initialize($config);

        $data['links'] = $this->pagination->create_links();
        echo json_encode($data);

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
        $c =  new StaffController();
        $staff = $c->getAll();
        $data['staff'] = $staff;

        $c2 =  new ContributorController();
        $c2 = $c2->getAll();
        $data['contributors'] = $c2;

        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->service->form_validation->set_rules('sName', 'Service Name', 'required');
        $this->service->form_validation->set_rules('sDescription', 'Service Description', 'required');

       // $slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data['title']="Add New Service";
        if ($this->service->form_validation->run() === FALSE){
             $this->load->view('templates/header', $data);
             $this->load->view('pages/manage/add_service');
             $this->load->view('templates/footer');
        }else{
            $this->service->addNew();
            $data['success'] =1;
            $this->load->view('templates/header', $data);
            $this->load->view('pages/manage/add_service');
            $this->load->view('templates/footer');
        }
    }

}