<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Siswa extends CI_Controller {

  public function __construct()
  {
    # code...
    parent::__construct();

    $this->load->model('Model_guru');
    $this->load->model('Jadwal_model');
    $this->load->model('Model_siswa');
    $this->load->model('model_kelas');
    $this->load->model('jadwal_model');
    $this->load->library('form_validation');
  }

  //hehe

  public function index()
  {
    $data['title'] = 'Siswa';

    $data['user'] = $this->db->get_where('user', ['email' => 
     $this->session->userdata('email')])->row_array();
    
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('siswa/pilihkelas', $data);
    $this->load->view('templates/footer');
  }

  public function pilihfilter()
  {
    $data['title'] = 'Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $idkelas = $this->input->post('kelas');
    $jurusan = $this->input->post('jurusan');

    $data['siswa'] = $this->Model_siswa->getfilterkelasjurusan($idkelas, $jurusan);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);  
    $this->load->view('templates/topbar', $data);
    $this->load->view('siswa/hasilpilih', $data);
    $this->load->view('templates/footer');

  }

  //hehe


  // public function index()
  // { 
  //   $data['title'] = 'Siswa';
		// $data['user'] = $this->db->get_where('user', ['email' =>
		// $this->session->userdata('email')])->row_array();

		// $data['siswa'] = $this->db->get('siswa')->result_array();
		
		// $this->form_validation->set_rules('nis', 'Nis', 'required');
		// $this->form_validation->set_rules('nama', 'Nama', 'required');		
		// $this->form_validation->set_rules('gender', 'Gender', 'required');
		// $this->form_validation->set_rules('agama', 'Agama', 'required');
		// $this->form_validation->set_rules('alamat', 'Alamat', 'required');

  //   if ($this->form_validation->run() == false) {
		// $this->load->view('templates/header', $data);
		// $this->load->view('templates/sidebar', $data);
		// $this->load->view('templates/topbar', $data);
		// $this->load->view('siswa/index', $data);
  //       $this->load->view('templates/footer');
  //   } else {
  //       # code...
  //       $data = [
  //           'idsiswa' => $this->input->post('idsiswa'),
  //           'nis' => $this->input->post('nis'),
  //           'nama' => $this->input->post('nama'),
  //           'gender' => $this->input->post('gender'),
  //           'tgl_lahir' => $this->input->post('tgl_lahir'),
  //           'tempat_lahir' => $this->input->post('tempat_lahir'),            
  //           'agama' => $this->input->post('agama'),
  //           'alamat' => $this->input->post('alamat'),
  //           'idkelas' =>$this->input->post('idkelas')
  //       ];
  //       $this->db->insert('siswa', $data);
  //       $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Karyawan Ditambahkan!</div>');
  //       redirect('siswa');
  //   }
  // }


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
        $this->load->view('siswa/tambah');
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
        $this->load->view('siswa/ubah', $data);
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

  public function lihat($nis)
  {
    # code...
    $data['title'] = 'Lihat data Siswa';
		$data['siswa'] = $this->Model_siswa->getSiswaId($nis);
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
    $this->load->view('siswa/lihat', $data);
    $this->load->view('templates/footer');
  }


  public function jadwal()
  {
    # code...
    $data['title'] = 'Jadwal Pelajaran';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

    $data['jadwal'] = $this->db->get('jadwal')->result_array();
    
    $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
    $this->load->view('siswa/jadwal', $data);
    $this->load->view('templates/footer');
  }

  public function kalender($tahun = NULL, $bulan = NULL)
  {
    $data['title'] = 'Kalender';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

    $data['kalender'] = $this->db->get('kalender')->result_array();
    
    $kalender = array(
      'start_day' => 'sunday',
      'show_next_prev' => TRUE,
      'next_prev_url' => base_url()."kalender/index",
      'day_type'  => 'short'
    );
    $this->load->library('calendar', $kalender);

    $data['calendar'] =  $this->calendar->generate($tahun, $bulan);

    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

    if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/kalender', $data);
        $this->load->view('templates/footer');
      } else {
        # code...
        $data = [
            'id' => $this->input->post('id'),
            'mulai' => $this->input->post('mulai'),
            'berakhir' => $this->input->post('berakhir'),
            'keterangan' => $this->input->post('keterangan')
        ];
        redirect('kalender/index');
      }
  }
}
