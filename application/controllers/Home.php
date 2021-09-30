<?php

class Home extends CI_Controller
{
    
    public function index()
    {   
        $this->load->view('templates/header1');
        $this->load->view('home/index');
        $this->load->view('templates/footer');
    }

    public function index_member()
    {  
        $this->load->view('templates/header-member');
        $this->load->view('home/v_beranda-member');
        $this->load->view('templates/footer-user');
    }

    public function index_admin()
    {  
        $this->load->view('templates/header-admin');
        $this->load->view('home/v_beranda-admin');
        $this->load->view('templates/footer-user');
    }

}
