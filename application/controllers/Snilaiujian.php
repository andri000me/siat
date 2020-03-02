<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Snilaiujian extends CI_Controller {

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

  //ayo
  public function index()
  { 
   
    $data['title'] = 'Nilai Ujian Siswa';

    $data['user'] = $this->db->get_where('user', ['email' => 
   $this->session->userdata('email')])->row_array();
    
   $this->load->view('templates/header', $data);
   $this->load->view('templates/sidebar', $data);
   $this->load->view('templates/topbar', $data);
    $this->load->view('snilai/indexnilaiujian', $data);
    $this->load->view('templates/footer');
  }

    public function pilihfilter()
  {
    $data['title'] = 'Lihat Ujian Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $idkelas = $this->input->post('kelas');
    $semester = $this->input->post('semester');

    $data['daftar'] = $this->Model_kelas->getfilterkelassemester($idkelas, $semester);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);  
    $this->load->view('templates/topbar', $data);
    $this->load->view('snilai/pilihmatkulnilaiujian', $data);
    $this->load->view('templates/footer');

  }
  //ayo


  //tom
  public function lihatlah($id, $idmapel)
  {
    # code...
    $data['title'] = 'Lihat Detail Ujian';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    // $data['jadwal'] = $this->Jadwal_model->getJadwal($id);
    //ganti kelas

    $data['siswakelas'] = $this->Model_kelas->listSiswaKelas($id , $idmapel);

    if( null !== $this->input->post('nilaiuts')  ) {

    $this->model_snilai->tambahuts();
    // $this->load->view('snilai/lihatlah', 'refresh');

    }
    elseif (null !== $this->input->post('nilaiuas')) {

    $this->model_snilai->tambahuas();

      # code...
    }

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);  
    $this->load->view('templates/topbar', $data);
    $this->load->view('snilai/lihatlahnilaiujian', $data);
    $this->load->view('templates/footer');
  }

  public function lihattugas($id)
  {
    $data['title'] = 'Lihat Detail Nilai Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['nilai'] = $this->Model_kelas->listbanyaknilaiakhir($id);

    $data['banyaknilai'] = $this->Jadwal_model->getbanyaknilai($id);
    $data['joinbanyaknilai'] = $this->Model_kelas->listbanyaknilai($data['banyaknilai']['fkidratanilai']);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);  
    $this->load->view('templates/topbar', $data);
    $this->load->view('snilai/jumlahtugasnilaiujian', $data);
    $this->load->view('templates/footer');

  }


  //tom

  // public function lihat($id)
  // {
  //   # code...
  //   $data['title'] = 'Lihat Detail Nilai';
	// 	$data['user'] = $this->db->get_where('user', ['email' =>
	// 	$this->session->userdata('email')])->row_array();
	// 	$data['jadwal'] = $this->Jadwal_model->getJadwal($id);
	// 	$data['siswakelas'] = $this->Model_kelas->listSiswaKelas($data['jadwal']['idkelas']);

	// 	if( null !== $this->input->post('nilaiBaru')  ) {
			
	// 		$this->model_snilai->addNilai();
	// 	}
	// 	$this->load->view('templates/header', $data);
	// 	$this->load->view('templates/sidebar', $data);
	// 	$this->load->view('templates/topbar', $data);
  //       $this->load->view('snilai/lihat', $data);
  //       $this->load->view('templates/footer');
  // }

  public function siswa()
	{
		$data['title'] = 'Siswa';
		$data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['daftar'] = $this->db->get('daftar')->result_array();
     
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('snilai/index', $data);
        $this->load->view('templates/footer');
  
        $data = [
          'id' => $this->input->post('id'),
          'tingkat' => $this->input->post('tingkat'),
          'idjurusan' => $this->input->post('idjurusan'),
          'idkelas' => $this->input->post('idkelas'),
          'idmapel' => $this->input->post('idmapel'),
          'idguru' => $this->input->post('idkaryawan'),            
          'jam' => $this->input->post('jam'),
          'idruangan' => $this->input->post('idruangan'),
          'hari' =>$this->input->post('hari')
        ];
        $this->db->insert('daftar', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Nilai Ditambahkan!</div>');
        redirect('snilai/index');
}
}