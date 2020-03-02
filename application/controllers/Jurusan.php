<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Jurusan extends CI_Controller
{
	
	public function __construct()
	{
		# code...
		parent::__construct();

    // Memanggil model jurusan
    	$this->load->model('Model_jurusan');
    	$this->load->library('form_validation');
	}

	public function index()
  	{ 
    // Mengambil data alumni dari fungsi getAlumni pada model_alumni
    $data['title'] = 'Daftar Jurusan';
    $data['jurusan'] = $this->Model_jurusan->getJurusan();
 	  $this->load->view('templates/header', $data);
 	  $this->load->view('templates/sidebar', $data);
    $this->load->view('jurusan/index', $data);
    $this->load->view('templates/footer');
		}
		
	public function tambah()
  {
    # code...
    $data['title'] = 'Tambah data jurusan';

    $this->form_validation->set_rules('idjur','Idjur','required');
    
    if ($this->form_validation->run() == FALSE){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
        $this->load->view('jurusan/tambah');
        $this->load->view('templates/footer');
    } else {
        $this->Model_jurusan->tambahDataJurusan();
        $this->session->set_flashdata('flash', 'ditambahkan');
        redirect('jurusan');
    } 
  }

  public function ubah($idjur)
  {
    # code...
    $data['title'] = 'Ubah data jurusan';
    $data['jurusan'] = $this->Model_jurusan->getJurusanId($idjur);

    $this->form_validation->set_rules('idjur','Idjur','required');

   if ($this->form_validation->run() == FALSE){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
        $this->load->view('jurusan/ubah', $data);
        $this->load->view('templates/footer');
    } else {
        $this->Model_jurusan->ubahDataJurusan();
        $this->session->set_flashdata('flash', 'diubah');
        redirect('jurusan');
    } 
  }

  public function hapus($idjur)
  {
    # code...
    $this->Model_jurusan->hapusDataJurusan($idjur);
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('jurusan');
  }

  public function lihat($idjur)
  {
    # code...
    $data['title'] = 'Lihat data jurusan';
    $data['jurusan'] = $this->Model_jurusan->getJurusanId($idjur);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
    $this->load->view('jurusan/lihat', $data);
    $this->load->view('templates/footer');
  }
}
?>
