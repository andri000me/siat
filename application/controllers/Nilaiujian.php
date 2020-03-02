<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Nilaiujian extends CI_Controller {

  public function __construct()
  {
    # code...
    parent::__construct();

    $this->load->model('model_sabsensi');
    $this->load->model('model_snilai');
    $this->load->model('Model_guru');
    $this->load->model('Model_siswa');
    $this->load->model('Model_kelas');
    $this->load->model('Model_mapel');
    $this->load->model('Jadwal_model');
    $this->load->library('form_validation');
  }

  public function index()
  { 

    $data['title'] = 'Nilai Ujian Siswa';

    $data['user'] = $this->db->get_where('user', ['email' => 
     $this->session->userdata('email')])->row_array();
    
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('snilai/index', $data);
    $this->load->view('templates/footer');
  }

  public function pilihfilter()
  {
    $data['title'] = 'Lihat Nilai Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $idkelas = $this->input->post('kelas');
    $semester = $this->input->post('semester');

    $data['daftar'] = $this->Model_kelas->getfilterkelassemester($idkelas, $semester);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);  
    $this->load->view('templates/topbar', $data);
    $this->load->view('snilai/pilihmatkul', $data);
    $this->load->view('templates/footer');

  }
    
    
  //tom
  public function lihatujian($id) 
  {
    if( null !== $this->input->post('uas')  ) {

        $this->model_snilai->tambahujian();

       }

    # code...
    $data['title'] = 'Lihat Detail Nilai Ujian';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['jadwal'] = $this->Jadwal_model->getJadwal($id);
    $data['siswakelas'] = $this->Model_kelas->listSiswaKelas2($data['jadwal']['idkelas']);



    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);  
    $this->load->view('templates/topbar', $data);
    $this->load->view('snilaiujian/lihatujian', $data);
    $this->load->view('templates/footer');
  }

  public function lihattugas($id)
  {
    $data['title'] = 'Lihat Nilai Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['banyaknilai'] = $this->Jadwal_model->getbanyaknilai($id);
    $data['joinbanyaknilai'] = $this->Model_kelas->listbanyaknilai($data['banyaknilai']['fkidratanilai']);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);  
    $this->load->view('templates/topbar', $data);
    $this->load->view('snilai/jumlahtugas', $data);
    $this->load->view('templates/footer');

  }

  public function tambahujian($id_nilaiujian)
    {
        $data['title'] = 'Tambah Nilai Ujian';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
    
            $data['nilaiujian'] = $this->Jadwal_model->getNilaiUjianId($id_nilaiujian);
            
            if( null !== $this->input->post('id_nilaiujian')  ) {

                $this->model_snilai->tambahujian();
           
               }

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('snilaiujian/tambahnilai', $data);
            $this->load->view('templates/footer');
}

// public function actioneditUjian()
// {
//     $data['title'] = 'Tambah Ujian Nilai';
//     $data['user'] = $this->db->get_where('user', ['email' =>
//     $this->session->userdata('email')])->row_array();    
        
//         $this->load->view('templates/header', $data);
// 		$this->load->view('templates/sidebar', $data);
// 		$this->load->view('templates/topbar', $data);
// 		$this->load->view('snilaiujian/tambahnilai', $data);
//         $this->load->view('templates/footer');
        
//         $id_nilaiujian = $this->input->post('id_nilaiujian');
//         $data = [
//             'uts' => $this->input->post('uts'),
//             'uas' => $this->input->post('uas'),
//             'nilairapot' => $this->input->post('nilairapot')
//         ];
// $idjadwal = 1;
//         $this->db->where('id_nilaiujian', $id_nilaiujian);
//         $this->db->update('nilaiujian', $data);
//         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Nilai Ditambahkan!</div>');
//         redirect('nilaiujian/lihatujian/', 'refresh');
// }

public function raport($id)
{
    $data['rapot'] = $this->model_snilai->lihatrapot($id);

    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->view('raport/raport', $data);
    
}
}