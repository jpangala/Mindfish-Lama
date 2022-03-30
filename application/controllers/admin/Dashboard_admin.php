<?php

class Dashboard_admin extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_dashboard');
    }
    public function index()
    {
        $data['grafik1'] = $this->model_dashboard->test1();
        $data['grafik2'] = $this->model_dashboard->test2();
        $data['grafik3'] = $this->model_dashboard->test3();
        $data['grafik4'] = $this->model_dashboard->test4();
        $data['proses'] = $this->model_dashboard->tampil_data_penjualan()->result();
        $this->load->view('admin/dashboard', $data);
    }
    public function test()
    {
        $data['grafik1'] = $this->model_dashboard->test1();
        $data['grafik2'] = $this->model_dashboard->test2();
        $data['grafik3'] = $this->model_dashboard->test3();
        $data['grafik4'] = $this->model_dashboard->test4();
        $data['proses'] = $this->model_dashboard->tampil_data_penjualan()->result();
        $this->load->view('admin/test', $data);
    }
}