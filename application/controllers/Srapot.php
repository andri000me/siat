<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Srapot extends CI_Controller {

  public function __construct()
  {
    # code...
    parent::__construct();

    $this->load->model('model_sabsensi');
    $this->load->model('Model_srapot');
    $this->load->model('Model_guru');
    $this->load->model('Model_siswa');
    $this->load->model('Model_kelas');
    $this->load->model('Model_mapel');
    $this->load->model('Jadwal_model');
    $this->load->library('form_validation');
  }

  //ayo
  public function index()
  { 
   
    $data['title'] = 'Rapot';

    $data['user'] = $this->db->get_where('user', ['email' => 
   $this->session->userdata('email')])->row_array();
    
   $this->load->view('templates/header', $data);
   $this->load->view('templates/sidebar', $data);
   $this->load->view('templates/topbar', $data);
    $this->load->view('srapot/index', $data);
    $this->load->view('templates/footer');
  }

  public function pilihfilter()
  {
    $data['title'] = 'Pilih Rapot Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $idkelas = $this->input->post('kelas');
    $semester = $this->input->post('semester');

    $data['daftar'] = $this->Model_srapot->getfilterkelassemester($idkelas, $semester);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);  
    $this->load->view('templates/topbar', $data);
    $this->load->view('srapot/pilihsiswa', $data);
    $this->load->view('templates/footer');

  }

  public function lihatlah($id)
  {
    # code...
    $data['title'] = 'Cetak Raport Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['rapot'] = $this->Model_srapot->cetakrapot($id);
    
    $data['jumlah'] = $this->Model_srapot->jumlahmapel($id);

    $data['datadiri'] = $this->Model_srapot->lihatdata($id);

    $this->load->view('srapot/raport', $data);
    // $this->load->view('templates/footer');
  }

}