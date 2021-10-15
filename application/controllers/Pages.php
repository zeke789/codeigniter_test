<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function mainViews($page = 'welcome_message', $sTypeID =null)
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php') )  show_404();
        if($sTypeID == null){
            $data['title'] = str_replace("_","",ucwords($page)) . " - Services"  ;
            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer', $data);
        }else{
            $serviceType = (int)$sTypeID;
            if( strlen($serviceType) > 11 || !is_numeric($sTypeID)  )
                show_error(
                       "Servicio inexistente <br> <a href='/codeigniter'>Go Index </a>",
                       "",
                        $heading = 'Error...'
                );
            $data['title'] = str_replace("_","",ucwords($page)) . " - Service " . $serviceType;
            $this->load->view('templates/header',$data);
            $this->load->view('pages/'.$page,$data );
            $this->load->view('templates/footer');
        }
    }

    public function secondViews($page)
    {
        if ( ! file_exists(APPPATH.'views/pages/manage/'.$page.'.php'))  show_404();

        $data['title'] = str_replace("_","",ucwords($page))   ;
        $this->load->view('templates/header', $data);
        $this->load->view('pages/manage/'.$page, $data);
        $this->load->view('templates/footer', $data);

    }



}