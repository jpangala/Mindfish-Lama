<?php

class Dashboard_admin extends CI_Controller{
    public function index()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar_akun');
        $this->load->view('admin/dashboard');
        $this->load->view('templates_admin/footer');
    }
}