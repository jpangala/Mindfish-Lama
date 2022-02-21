<?php

class data_katalog extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_katalog');
    }
    public function index()
    {
        $data['ikan'] = $this->model_katalog->tampil_data_katalog()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar_akun');
        $this->load->view('admin/data_katalog', $data);
        $this->load->view('templates_admin/footer');
    }
    public function stok()
    {
        $data['ikan'] = $this->model_katalog->tampil_data_ikan()->result();
        $data['stok'] = $this->model_katalog->tampil_data_stok()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar_akun');
        $this->load->view('admin/data_stok', $data);
        $this->load->view('templates_admin/footer');
    }
    public function tambah_ikan()
    {
        $nama_ikan   =$this->input->post('nama_ikan');
        $stok        =$this->input->post('jumlahstok');
        $deskripsi   =$this->input->post('deskripsi');

            $data = array(
                'nama_ikan' => $nama_ikan,
                'deskripsi' => $deskripsi
            );
            $this->model_katalog->tambah_katalog($data, 'ikan');

        $id_ikan             =$this->model_katalog->selectmax();
        $nama_pembudidaya    =$this->input->post('nama_pembudidaya');
        $tanggal             =$this->input->post('tanggal');
            
            $data1 = array(
                    'id_ikan' => $id_ikan[0]['id'],
                    'nama_pembudidaya' => $nama_pembudidaya,
                    'keterangan' => 'penambahan stok',
                    'status' => $stok,
                    'tanggal' => $tanggal
            );
            
            $this->model_katalog->tambah_katalog1($data1, 'stok');
            redirect('admin/data_katalog/index');

    }
    public function tambah_stok()
    {

        $id_ikan           =$this->input->post('nama_ikan');
        $stok              =$this->input->post('stok');
        $keterangan        =$this->input->post('keterangan');
        $nama_pembudidaya  =$this->input->post('nama_pembudidaya');
        $tanggal           =$this->input->post('tanggal');


            $data = array(
                'id_ikan' => $id_ikan,
                'status' => $stok,
                'keterangan' => $keterangan,
                'nama_pembudidaya' => $nama_pembudidaya,
                'tanggal' => $tanggal
            );
            $this->model_katalog->tambah_katalog1($data, 'stok');
            redirect('admin/data_katalog/stok');

    }
    public function edit_stok()
    {

        $id_ikan           =$this->input->post('id_ikan');
        $id_stok           =$this->input->post('id_stok');
        $stok              =$this->input->post('stok');
        $keterangan        =$this->input->post('keterangan');
        $nama_pembudidaya  =$this->input->post('nama_pembudidaya');


            $data = array(
                'id_ikan' => $id_ikan,
                'status' => $stok,
                'keterangan' => $keterangan,
                'nama_pembudidaya' => $nama_pembudidaya,
            );
            $where = array(
                'id' => $id_stok
            );
            $this->model_katalog->update_data($where,$data, 'stok');
            redirect('admin/data_katalog/stok');
    }
    public function edit_ikan()
    {

        $nama_ikan      =$this->input->post('nama_ikan');
        $id_ikan        =$this->input->post('id_ikan');
        $deskripsi      =$this->input->post('deskripsi');


            $data = array(
                'nama_ikan' => $nama_ikan,
                'deskripsi' => $deskripsi
            );
            $where = array(
                'id' => $id_ikan
            );
            $this->model_katalog->update_data($where,$data, 'ikan');
            redirect('admin/data_katalog/');
    }
    public function hapus_ikan()
    {
        $id_ikan        =$this->input->post('id_ikan');

            $where = array(
                'id' => $id_ikan
            );
            $this->model_katalog->hapus_data($where, 'ikan');
            redirect('admin/data_katalog/');
    }
    public function hapus_stok()
    {
        $id_stok        =$this->input->post('id_stok');

            $where = array(
                'id' => $id_stok
            );
            $this->model_katalog->hapus_data($where, 'stok');
            redirect('admin/data_katalog/stok');
    }
    public function test()
    {
        $data['ikan'] = $this->model_katalog->tampil_data_katalog()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar_akun');
        $this->load->view('admin/test', $data);
        $this->load->view('templates_admin/footer');    }

}
