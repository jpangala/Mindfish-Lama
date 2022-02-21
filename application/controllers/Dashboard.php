<?php

class Dashboard extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
    $this->load->library('session');
        $this->load->model('login');


    }

    public function index()
    {
        $data['pesanan'] = $this->model_pesanan->tampil_data()->result();
        $where = array('id' =>$_SESSION["id_user"]);
        $data['user'] = $this->model_pesanan->detail_pesanan($where, 'user_account')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }
    public function masuk()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('login');
        $this->load->view('templates_admin/footer');

    }

    public function detail($id)
    {
        $where = array('id' =>$id);
        $data['pesanan'] = $this->model_pesanan->detail_pesanan($where, 'pesanan')->result();
        $data['ambil'] = $this->model_pesanan->detail_pesanan($where, 'tampilan_pesanan')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('detail', $data);
        $this->load->view('templates/footer');
    }

    public function ambil(){
        $pesanan_id   =$this->input->post('id');
        $ikan_id      =$this->input->post('ikan_id');
        $status       =$this->input->post('status');
        $jumlah       =$this->input->post('jumlah');
        $user_id      =$_SESSION['id_user'];


            $data = array(
                'pesanan_id' => $pesanan_id,
                'ikan_id' => $ikan_id,
                'status_task' => $status,
                'jumlah' => $jumlah,
                'user_account_id' => $user_id,
            );

        $query = $this->db->query("SELECT request FROM pesanan WHERE id = $pesanan_id;");

            $data1 = array(
                'user_account_id' => $user_id,
                'pesanan_id' => $pesanan_id,
                'hasil' => $jumlah,
                'status' => "test"
            );

        $this->model_pesanan->tambah_barang($data, 'task');
        $this->model_pesanan->pengurangan($pesanan_id, $jumlah);
        redirect('dashboard/index');
    }

    public function logout() {
      session_destroy();
      redirect('landing_page/index');
    }


    public function login()
    {

      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $where = array('username'=>$username);
      $data['user'] = $this->login->get_user($where, 'user_account')->result();
      foreach ($data['user'] as $key => $value):
						$username_cek = $value->username;
            $password_cek = $value->password;
            $id = $value->id;
            $tipe_user = $value->tipe_user;
      endforeach;
      if(!empty($username_cek)) {


      if($username_cek == $username && password_verify($password, $password_cek))
      {
        if($tipe_user == "user") {
          $_SESSION["id_user"] = $id;
          $_SESSION["username"] = $username;
          redirect('Dashboard/index');
        }
        else {
          redirect('admin/dashboard_admin');
        }

      }
    }
    		else {
          $this->session->set_flashdata('category_error', 'Invalid Username or Password');
          redirect('Dashboard/masuk');
              }
    }

    public function task() {

        $where = array(
            'user_account_id' =>$_SESSION['id_user'],
            'status_task' =>"diambil"
        );
        $data['task'] = $this->model_pesanan->tampil_data_task($where, 'tampilan_task')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('task', $data);
        $this->load->view('templates/footer');
      }

    public function ready($task_id){
            $data = array(
                    'status_task' => "ready"
                );
            $where = array(
                'id' => $task_id
            );
        $this->model_pesanan->update_data($where,$data, 'task');
        $data['task'] = $this->model_pesanan->tampil_data_task($where, 'task')->result();
        foreach ($data['task'] as $key => $value):
  						$pesanan_id = $value->pesanan_id;
              $jumlah = $value->jumlah;
        endforeach;
        $this->model_pesanan->transfer($pesanan_id, $jumlah);
        
        redirect('dashboard/index');
    }
}
