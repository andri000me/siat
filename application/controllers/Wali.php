<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Wali extends CI_Controller {

  public function __construct()
  {
    # code...
    parent::__construct();

    // Memanggil model wali
    $this->load->model('Model_wali');
    $this->load->library('form_validation');
  }

  public function index()
  { 
    // Mengambil data alumni dari fungsi getWali pada Model_Wali
    $data['pageTitle'] = 'Daftar Wali Siswa';
    $data['walisiswa'] = $this->Model_wali->getWali();
    if ( $this->input->post('kunci')) {
      # code...
      $data['walisiswa'] = $this->Model_wali->cariDataWali();
    }
    $this->load->view('templates/header', $data);
    $this->load->view('wali/index', $data);
    $this->load->view('templates/footer');
  }
  public function tambah()
  {
    # code...
    $data['pageTitle'] = 'Tambah data Wali Siswa';

    $this->form_validation->set_rules('idwali','Idwali','required');
    $this->form_validation->set_rules('nama','Nama','required');
    $this->form_validation->set_rules('agama','Agama','required');
    $this->form_validation->set_rules('alamat','Alamat','required');

    if ($this->form_validation->run() == FALSE){
        $this->load->view('templates/header', $data);
        $this->load->view('wali/tambah');
        $this->load->view('templates/footer');
    } else {
        $this->Model_wali->tambahDataWali();
        $this->session->set_flashdata('flash', 'ditambahkan');
        redirect('walisiswa');
    } 
  }

  public function ubah($idwali)
  {
    # code...
    $data['pageTitle'] = 'Ubah data Wali Siswa';
    $data['walisiswa'] = $this->Model_wali->getWaliId($idwali);
    $data['agama'] = ['islam', 'katolik', 'protestan', 'hindu', 'budha', 'kong hu cu', 'lain-lain'];

    $this->form_validation->set_rules('nis','Nis','required');
    $this->form_validation->set_rules('nama','Nama','required');
    $this->form_validation->set_rules('agama','Agama','required');
    $this->form_validation->set_rules('alamat','Alamat','required');

   if ($this->form_validation->run() == FALSE){
        $this->load->view('templates/header', $data);
        $this->load->view('wali/ubah', $data);
        $this->load->view('templates/footer');
    } else {
        $this->Model_wali->ubahDataWali();
        $this->session->set_flashdata('flash', 'diubah');
        redirect('walisiswa');
    } 
  }

  public function hapus($idwali)
  {
    # code...
    $this->Model_wali->hapusDataWali($idwali);
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('walisiswa');
  }

  public function lihat($idwali)
  {
    # code...
    $data['pageTitle'] = 'Lihat data Wali Siswa';
    $data['walisiswa'] = $this->Model_wali->getWaliId($idwali);
    $this->load->view('templates/header', $data);
    $this->load->view('wali/lihat', $data);
    $this->load->view('templates/footer');
  }
}