<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Absensi extends CI_Controller {

  public function __construct()
  {
    # code...
    parent::__construct();

    // Memanggil model nilai
    $this->load->model('model_nilai');
    $this->load->model('Model_guru');
    $this->load->model('Model_siswa');
    $this->load->model('Model_kelas');
    $this->load->model('Model_mapel');
    $this->load->model('Jadwal_model');
    $this->load->library('form_validation');
  }

  public function index()
  { 
    
    $data['title'] = 'Nilai';
    $data['jadwal'] = $this->model_absensi->listNilai();
    $data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
    $this->load->view('nilai/index', $data);
    $this->load->view('templates/footer');
	}

  public function tambah()
  {
    # code...
    $data['title'] = 'Tambah data Siswa';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('nis','Nis','required');
    $this->form_validation->set_rules('nama','Nama','required');
    $this->form_validation->set_rules('gender','kelamin','required');
    $this->form_validation->set_rules('alamat','Alamat','required');

    if ($this->form_validation->run() == FALSE){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
        $this->load->view('absensi/tambah');
        $this->load->view('templates/footer');
    } else {
        $this->Model_siswa->tambahDataSiswa();
        $this->session->set_flashdata('flash', 'ditambahkan');
        redirect('siswa');
    } 
  }

  public function ubah($nis)
  {
    # code...
    $data['title'] = 'Ubah data Siswa';
    $data['siswa'] = $this->Model_siswa->getSiswaId($nis);
    $data['agama'] = ['islam', 'katolik', 'protestan', 'hindu', 'budha', 'kong hu cu', 'lain-lain'];
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('nis','Nis','required');
    $this->form_validation->set_rules('nama','Nama','required');
    $this->form_validation->set_rules('gender','kelamin','required');
    $this->form_validation->set_rules('alamat','Alamat','required');

   if ($this->form_validation->run() == FALSE){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
        $this->load->view('absensi/ubah', $data);
        $this->load->view('templates/footer');
    } else {
        $this->Model_siswa->ubahDataSiswa();
        $this->session->set_flashdata('flash', 'diubah');
        redirect('siswa');
    } 
  }

  public function hapus($nis)
  {
    # code...
    $this->Model_siswa->hapusDataSiswa($nis);
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('siswa');
  }

  public function lihat($id)
  {
    # code...
    $data['title'] = 'Lihat Detail Absen';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['jadwal'] = $this->Jadwal_model->getJadwal($id);
		$data['siswakelas'] = $this->Model_kelas->listSiswaKelas($data['jadwal']['idkelas']);

		if( null !== $this->input->post('absenBaru')  ) {
			
			$this->model_absensi->addAbsen();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
    $this->load->view('absensi/lihat', $data);
    $this->load->view('templates/footer');
  }
}
