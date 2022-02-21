<?php

class Model_katalog extends CI_Model{

    public function tampil_data_katalog(){
        $this->db->select('ikan.id,ikan.harga,jenis.nama_jenis,ikan.nama_ikan,ikan.deskripsi,SUM(stok.status) AS stok');
        $this->db->from('ikan');
        $this->db->join('stok', 'ikan.id = stok.id_ikan', 'left');
        $this->db->join('jenis', 'jenis.id = ikan.id_jenis', 'left');
        $this->db->group_by('stok.id_ikan');
        return $this->db->get();
    }
    public function tampil_data_stok(){
        $this->db->select('stok.id,ikan.nama_ikan,stok.id_ikan,stok.status,stok.keterangan,stok.nama_pembudidaya,stok.tanggal');
        $this->db->from('stok');
        $this->db->join('ikan', 'ikan.id = stok.id_ikan', 'left');
        return $this->db->get();
    }
    public function tampil_data_ikan(){
        return $this->db->get('ikan');
    }
    public function tambah_katalog($data,$table){
        $this->db->insert($table,$data);
    }
    public function tambah_katalog1($data1,$table){
        $this->db->insert($table,$data1);
    }
    public function selectmax(){
        $this->db->select_max('id');
        $query = $this->db->get('ikan');
        return $query->result_array();  
    }
    public function persen(){
        $total = '(select count(*) from task)';
        $query = $this->db->select('concat(round((100*count(*))/'.$total.',0),"%") as data_percentage')
                      ->from('task')
                      ->group_by('browser')
                      ->get();      
        return $query->result_array();  
    }
    public function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    public function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

}
