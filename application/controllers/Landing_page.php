<?php
class Landing_page extends CI_Controller{


public function index()
    {
        $this->load->view('templates_landing/header');
        $this->load->view('landing_page');
        $this->load->view('templates_landing/footer');
    }
}