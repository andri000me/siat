<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Ruangan extends CI_Controller {

  public function __construct()
  {
    # code...
    parent::__construct();

    // Memanggil model kelas
    $this->load->model('Model_ruangan');
    $this->load->library('form_validation');
  }

  public function index()
  { 
    // Mengambil data alumni dari fungsi getAlumni pada model_alumni
    $data['pageTitle'] = 'Daftar Ruangan';
    $data['ruangan'] = $this->Model_ruangan->getRuangan();
    if ( $this->input->post('kunci')) {
      # code...
      $data['ruangan'] = $this->Model_ruangan->cariDataRuangan();
    }
 	  $this->load->view('templates/header', $data);
    $this->load->view('ruangan/index', $data);
    $this->load->view('templates/footer');
  }
  public function tambah()
  {
    # code...
    $data['pageTitle'] = 'Tambah data Ruangan';

    $this->form_validation->set_rules('idroom','idroom','required');
    $this->form_validation->set_rules('namaroom','namaroom','required');

    if ($this->form_validation->run() == FALSE){
        $this->load->view('templates/header', $data);
        $this->load->view('ruangan/tambah');
        $this->load->view('templates/footer');
    } else {
        $this->Model_ruangan->tambahDataRuangan();
        $this->session->set_flashdata('flash', 'ditambahkan');
        redirect('ruangan');
    } 
  }

  public function ubah($idroom)
  {
    # code...
    $data['pageTitle'] = 'Ubah data Ruangan';
    $data['ruangan'] = $this->Model_ruangan->getRuanganId($idroom);

    $this->form_validation->set_rules('idroom','idroom','required');
    $this->form_validation->set_rules('namaroom','Namaroom','required');

   if ($this->form_validation->run() == FALSE){
        $this->load->view('templates/header', $data);
        $this->load->view('ruangan/ubah', $data);
        $this->load->view('templates/footer');
    } else {
        $this->Model_ruangan->ubahDataRuangan();
        $this->session->set_flashdata('flash', 'diubah');
        redirect('ruangan');
    } 
  }

  public function hapus($idroom)
  {
    # code...
    $this->Model_ruangan->hapusDataRuangan($idroom);
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('ruangan');
  }

  public function lihat($idroom)
  {
    # code...
    $data['pageTitle'] = 'Lihat data Ruangan';
    $data['ruangan'] = $this->Model_ruangan->getRuanganId($idroom);
    $this->load->view('templates/header', $data);
    $this->load->view('ruangan/lihat', $data);
    $this->load->view('templates/footer');
  }
}