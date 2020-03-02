<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Mapel extends CI_Controller {

  public function __construct()
  {
    # code...
    parent::__construct();

    // Memanggil model siswa
    $this->load->model('Model_mapel');
    $this->load->library('form_validation');
  }

  public function index()
  { 
    // Mengambil data alumni dari fungsi getAlumni pada model_alumni
    $data['pageTitle'] = 'Daftar Mata Pelajaran';
    $data['mapel'] = $this->Model_mapel->getMapel();
    if ( $this->input->post('kunci')) {
      # code...
    $data['mapel'] = $this->Model_mapel->cariDataMapel();
    }
    $this->load->view('templates/header', $data);
    $this->load->view('mapel/index', $data);
    $this->load->view('templates/footer');
  }

  public function tambah()
  {
    # code...
    $data['pageTitle'] = 'Tambah data Mapel';

    $this->form_validation->set_rules('idmapel','Idmapel','required');
    $this->form_validation->set_rules('nmapel','Nmapel','required');
    
    if ($this->form_validation->run() == FALSE){
        $this->load->view('templates/header', $data);
        $this->load->view('mapel/tambah');
        $this->load->view('templates/footer');
    } else {
        $this->Model_mapel->tambahDataMapel();
        $this->session->set_flashdata('flash', 'ditambahkan');
        redirect('mapel');
    } 
  }

  public function ubah($idmapel)
  {
    # code...
    $data['pageTitle'] = 'Ubah data Mata Pelajaran';
    $data['mapel'] = $this->Model_mapel->getMapelId($idmapel);

    $this->form_validation->set_rules('idmapel','Idmapel','required');
    $this->form_validation->set_rules('nmapel','Nmapel','required');

   if ($this->form_validation->run() == FALSE){
        $this->load->view('templates/header', $data);
        $this->load->view('mapel/ubah', $data);
        $this->load->view('templates/footer');
    } else {
        $this->Model_mapel->ubahDataMapel();
        $this->session->set_flashdata('flash', 'diubah');
        redirect('mapel');
    } 
  }

  public function hapus($idmapel)
  {
    # code...
    $this->Model_mapel->hapusDataMapel($idmapel);
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('mapel');
  }

  public function lihat($idmapel)
  {
    # code...
    $data['pageTitle'] = 'Lihat data Mata Pelajaran';
    $data['mapel'] = $this->Model_mapel->getMapelId($idmapel);
    $this->load->view('templates/header', $data);
    $this->load->view('mapel/lihat', $data);
    $this->load->view('templates/footer');
  }
}