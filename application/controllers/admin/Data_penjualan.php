<?php

class data_penjualan extends CI_Controller{
    public function __construct()
    {   
        parent::__construct();
        $this->load->library('session');
        $this->load->model('model_katalog');
        $this->load->model('model_penjualan');
    }
    public function index()
    {   
        $data['penjualan']      = $this->model_penjualan->tampil_data_penjualan()->result();
        $data['katalog_asli']   = $this->model_penjualan->tampil_data_katalog()->result();
        $data['ikan']           = $this->model_katalog->tampil_data_katalog()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar_akun');
        $this->load->view('admin/data_penjualan', $data);
        $this->load->view('templates_admin/footer');
        
    }
    public function detail($id)
    {   
        $table = 'penjualan';
        $field = 'id';
        $where = $this->model_penjualan->selectmax($table, $field);
        $data['detail']         = $this->model_penjualan->tampil_data_detail($id)->result();
        $data['penjualan']      = $this->model_penjualan->select_where($table, $id)->result();
        $data['ikan']           = $this->model_penjualan->tampil_data_ikan()->result();
        $data['id'] = $id;
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar_akun');
        $this->load->view('admin/data_detail_penjualan', $data);
        $this->load->view('templates_admin/footer');
     }
    public function tambah_penjualan()
    {   
        $id =  $this->uri->segment(4);
        $table        = "penjualan";
        $field        = "id";
        $jumlah       = $this->input->post('jumlah');
        $id_ikan      = $this->input->post('nama_ikan');
        $id_penjualan = $this->model_penjualan->selectmax($table, $field);
        $data['katalog1'] = $this->db->get_where('ikan', array('id =' => $id_ikan))->result_array();

        

        
        for( $x=0;$x< count($data['katalog1']);$x++) {
           
            $data['katalog1'][$x]['jumlah'] = $jumlah;
            $data['katalog1'][$x]['sub_total'] = $jumlah*$data['katalog1'][$x]['harga'];
            $data['katalog2'] = array(
                'id_ikan'      => $this->input->post('nama_ikan'),
                'id_penjualan' => $id,
                'jumlah'       => $jumlah,
                'harga_jual'        => $data['katalog1'][$x]['harga'],
                'subtotal_harga'    => $data['katalog1'][$x]['sub_total'],

            );
            $this->model_penjualan->tambah_penjualan($data['katalog2'], 'detail_penjualan');
            redirect('admin/data_penjualan/detail/'.$id);
        }
    }
    public function no_penjualan()//untuk generate no_penjulan dan input nama_pembeli
    {   
        $table = "penjualan";
        $field = "no_penjualan";
        $ambil = $this->model_penjualan->selectmax($table, $field);
        
        //untuk ambil 4 digit terakhir no_penjualan dan diubah ke int
        $empat = (int) substr($ambil, -4 , 4);
        $empat++;
        //untuk mengubah int sebelumnya jadi str dan ditambah IKN
        $str = 'IKN';
        $ubah = sprintf('%04s',$empat);
        
        //untuk ambil tanggal
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date("md");

        //gabung
        $no_penjualan         = $str.''.$tanggal.''.$ubah;
        $nama_pembeli         =$this->input->post('nama_pembeli');
        $tanggal_dibuat       =$this->input->post('tanggal_dibuat');

            $data = array(
                'nama_pembeli' => $nama_pembeli,
                'no_penjualan' => $no_penjualan,
                'tanggal_dibuat' => $tanggal_dibuat,
                'status'       => 'Proses'
            );
            $this->model_penjualan->tambah_penjualan($data, 'penjualan');
            $field = 'id';
            $id_penjualan = $this->model_penjualan->selectmax($table, $field);
            redirect('admin/data_penjualan/detail/'.$id_penjualan);
    }
    public function hapus_ikan()
    {
        $id_detail  = $this->input->post('id_detail');
        $id         = $this->uri->segment(4);


            $where = array(
                'id' => $id_detail
            );
            $this->model_penjualan->hapus_data($where, 'detail_penjualan');
            redirect('admin/data_penjualan/detail/'.$id);
    }
    public function save()
    {
        $id = $this->uri->segment(4);
        $total = $_SESSION["total"];
        var_dump($total);

            $data = array(
                'total_harga' => $total
            );
            $this->model_penjualan->update_data($data, 'penjualan', $id);
            redirect('admin/data_penjualan/');
    }
    


}
