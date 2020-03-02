<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Tampil extends CI_Controller {

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
   
    $data['title'] = 'Lihat Absensi';
    $data['jadwal'] = $this->model_sabsensi->listJadwal();
    $data['user'] = $this->db->get_where('user', ['email' =>
	$this->session->userdata('email')])->row_array();
		
	$this->load->view('templates/header', $data);
	$this->load->view('templates/sidebar', $data);
	$this->load->view('templates/topbar', $data);
    $this->load->view('tampil/index', $data);
    $this->load->view('templates/footer');
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
			
			$this->model_sabsensi->addAbsen();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
        $this->load->view('tampil/lihatabsen', $data);
        $this->load->view('templates/footer');
  }

  public function jadwal ()
  {
    $data['title'] = 'Jadwal Pelajaran';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['jadwal'] = $this->Jadwal_model->getJadwal($id);

    $data['jadwal'] = $this->db->get('jadwal')->result_array();

            $this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('tampil/jadwal', $data);
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
        $this->load->view('tampil/kalender', $data);
        $this->load->view('templates/footer');
      } else {
        # code...
        $data = [
            'id' => $this->input->post('id'),
            'mulai' => $this->input->post('mulai'),
            'berakhir' => $this->input->post('berakhir'),
            'keterangan' => $this->input->post('keterangan')
        ];
        $this->db->insert('kalender', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kegiatan Ditambahkan!</div>');
        redirect('kalender/index');
      }
  }
  
  public function ekstra()
  {
    $data['title'] = 'Ekstra';
		$data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['registrasi_ekstra'] = $this->db->get('registrasi_ekstra')->result_array();
        
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nis', 'Nis', 'required');

    if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('tampil/register', $data);
        $this->load->view('templates/footer');
    } else {
        # code...
        $data = [
            'nis' => $this->input->post('nis'),
            'nama' => $this->input->post('nama'),
            'ekstra' => $this->input->post('ekstra')
        ];
        $this->db->insert('registrasi_ekstra', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pendaftaran Ekstra Berhasi!</div>');
        redirect('tampil/ekstra');
  }
}

public function nilai()
  { 
   
    $data['title'] = 'Lihat Nilai';
    $data['jadwal'] = $this->model_snilai->listDaftar();
    $data['user'] = $this->db->get_where('user', ['email' =>
	$this->session->userdata('email')])->row_array();
		
	$this->load->view('templates/header', $data);
	$this->load->view('templates/sidebar', $data);
	$this->load->view('templates/topbar', $data);
    $this->load->view('tampil/nilai', $data);
    $this->load->view('templates/footer');
  }

  public function lihatnilai($id)
  {
    # code...
        $data['title'] = 'Lihat Detail Nilai';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['jadwal'] = $this->Jadwal_model->getJadwal($id);
		$data['siswakelas'] = $this->Model_kelas->listSiswaKelas($data['jadwal']['idkelas']);

		if( null !== $this->input->post('nilaiBaru')  ) {
			
			$this->model_sabsensi->addNilai();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
        $this->load->view('tampil/lihatnilai', $data);
        $this->load->view('templates/footer');
  }
}