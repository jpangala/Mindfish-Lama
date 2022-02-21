<?php

class Model_penjualan extends CI_Model{
    
    public function tampil_data_detail($where){
        $this->db->select('detail_penjualan.id,detail_penjualan.jumlah,ikan.nama_ikan,ikan.deskripsi,ikan.harga,detail_penjualan.harga_jual,detail_penjualan.subtotal_harga');
        $this->db->from('detail_penjualan');
        $this->db->join('penjualan', 'penjualan.id = detail_penjualan.id_penjualan', 'left');
        $this->db->join('ikan', 'ikan.id = detail_penjualan.id_ikan', 'left');
        $this->db->where('detail_penjualan.id_penjualan', $where);
        return $this->db->get();
    }
    public function select_where($table,$where){
        return $this->db->get_where($table,array('id' => $where));
    }
    public function selectmax($table = null, $field = null){
        $this->db->select_max($field);
        return $this->db->get($table)->row_array()[$field];
    }
    public function tambah_penjualan($data,$table){
        $this->db->insert($table,$data);
    }
    public function tampil_data_penjualan(){
        return $this->db->get('penjualan');
    }
    public function tampil_data_katalog(){
        $this->db->select('detail_penjualan.id,detail_penjualan.jumlah,ikan.nama_ikan,ikan.id,ikan.harga,ikan.deskripsi,detail_penjualan.harga_jual,detail_penjualan.subtotal_harga');
        $this->db->from('detail_penjualan');
        $this->db->join('penjualan', 'penjualan.id = detail_penjualan.id_penjualan', 'left');
        $this->db->join('ikan', 'ikan.id = detail_penjualan.id_ikan', 'left');
        return $this->db->get();
    }
    public function tampil_data_ikan(){
        return $this->db->get('ikan');
    }
    public function selectmax_id($table){
        $this->db->select_max('id');
        return $this->db->get($table);
    }
    public function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function update_data($data,$table,$where){
        $this->db->where('id',$where);
        $this->db->update($table,$data);
        
    }

}
