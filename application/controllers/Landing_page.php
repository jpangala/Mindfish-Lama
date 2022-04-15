<?php
class Landing_page extends CI_Controller{

public function __construct()
    {
        parent::__construct();
        $this->load->model('model_katalog');
    }
public function index()
    {
        $this->load->view('templates_landing/header');
        $this->load->view('landing_page');
        $this->load->view('templates_landing/footer');
    }
    

public function product()
    {
        $data['product'] = $this->model_katalog->tampil_data_katalog()->result();
        $this->load->view('product', $data);
    }
    

public function detail()
    {
        $data['product'] = $this->model_katalog->tampil_data_katalog()->result();
        $this->load->view('detail_product', $data);
    }
    
}