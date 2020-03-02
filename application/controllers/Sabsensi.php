<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Sabsensi extends CI_Controller {

  public function __construct()
  {
    # code...
    parent::__construct();

    $this->load->model('model_sabsensi');
    $this->load->model('Model_guru');
    $this->load->model('Model_siswa');
    $this->load->model('Model_kelas');
    $this->load->model('Model_mapel');
    $this->load->model('Jadwal_model');
    $this->load->library('form_validation');
  }

  public function index()
  { 
   
    $data['title'] = 'Absensi Siswa';
    $data['jadwal'] = $this->model_sabsensi->listJadwal();
    $data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
    $this->load->view('sabsensi/index', $data);
    $this->load->view('templates/footer');
  }
  
  public function hapus($id)
    {
        $this->db->where('idabsensi', $id);
		    $this->db->delete('absensi');
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('sabsensi/index');
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
    $this->load->view('sabsensi/lihat', $data);
    $this->load->view('templates/footer');
  }

  public function siswa()
	{
		$data['title'] = 'Siswa';
		$data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['jadwal'] = $this->db->get('jadwal')->result_array();
     
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('sabsensi/index', $data);
    $this->load->view('templates/footer');
  
        $data = [
          'idjadwal' => $this->input->post('idjadwal'),
          'tingkat' => $this->input->post('tingkat'),
          'idjurusan' => $this->input->post('idjurusan'),
          'idkelas' => $this->input->post('idkelas'),
          'idmapel' => $this->input->post('idmapel'),
          'idguru' => $this->input->post('idkaryawan'),            
          'jam' => $this->input->post('jam'),
          'idruangan' => $this->input->post('idruangan'),
          'hari' =>$this->input->post('hari')
        ];
        $this->db->insert('jadwal', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Karyawan Ditambahkan!</div>');
        redirect('sabsensi/index');
}

}