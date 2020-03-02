<?php defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_controller
{

    function __construct()
	{
		parent::__construct();
        $this->load->model('model_kelas');
        $this->load->model('model_induk');
    }
    
    public function index()
	{
		$data['title'] = 'Karyawan';
		$data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['karyawan'] = $this->db->get('karyawan')->result_array();
        
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');		
        // $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        // $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

    if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('buku/index', $data);
        $this->load->view('templates/footer');
    } else {
        # code...
        $data = [
            'idkaryawan' => $this->input->post('idkaryawan'),
            'status' => $this->input->post('status'),
            'nama' => $this->input->post('nama'),
            'lahir' => $this->input->post('lahir'),
            'idjabatan' => $this->input->post('idjabatan'),
            'gender' => $this->input->post('gender'),
            'idagama' => $this->input->post('idagama'),
            'alamat' => $this->input->post('alamat')
        ];
        $this->db->insert('karyawan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Karyawan Ditambahkan!</div>');
        redirect('buku/index');
    }
}


public function hapus($id)
{
    $this->db->where('idkaryawan', $id);
    $this->db->delete('karyawan');
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('buku/index');
}

public function lihat($id)
{
    $data['title'] = 'Lihat Detail Karyawan';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['karyawan'] = $this->db->get('karyawan', ['idkaryawan' =>$id])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('buku/lihatkaryawan', $data);
    $this->load->view('templates/footer');

}

// public function cetak($id)
// {
//     $data['inventariss'] = $this->model_inventaris->getInventarisId($id);
//     $this->load->view('inventaris/cetakinv', $data);
// }


public function ubah ($id)
{
    $data['title'] = 'Edit Karyawan';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['karyawan'] = $this->model_induk->getKaryawanId($id);
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('buku/ubahkaryawan', $data);
        $this->load->view('templates/footer');
}

public function actioneditKaryawan()
{
$data['title'] = 'Edit Karyawan';
$data['user'] = $this->db->get_where('user', ['email' =>
$this->session->userdata('email')])->row_array();    
    
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('buku/ubahkaryawan', $data);
    $this->load->view('templates/footer');
    
    $idkaryawan = $this->input->post('idkaryawan');
    $data = [
        'status' => $this->input->post('status'),
        'nama' => $this->input->post('nama'),
        'lahir' => $this->input->post('lahir'),
        'jabatan' => $this->input->post('jabatan'),
        'gender' => $this->input->post('gender'),
        'idagama' =>$this->input->post('idagama'),
        'alamat' => $this->input->post('alamat')
    ];

    $this->db->where('idkaryawan', $idkaryawan);
    $this->db->update('karyawan', $data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Karyawan Diubah!</div>');
    redirect('buku/index');
}


public function siswa()
	{
		$data['title'] = 'Siswa';
		$data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['siswa'] = $this->db->get('siswa')->result_array();
        
        $this->form_validation->set_rules('nis', 'Nis', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');		
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

    if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('buku/siswa', $data);
        $this->load->view('templates/footer');
    } else {
        # code...
        $data = [
            
            'nis' => $this->input->post('nis'),
            'nama' => $this->input->post('nama'),
            'gender' => $this->input->post('gender'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),            
            'idagama' => $this->input->post('idagama'),
            'alamat' => $this->input->post('alamat'),
            'idkelas' =>$this->input->post('idkelas')
        ];
        $this->db->insert('siswa', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Siswa Ditambahkan!</div>');
        redirect('buku/siswa');
    }
}


public function hapussiswa($id)
{
    $this->db->where('idsiswa', $id);
    $this->db->delete('siswa');
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('buku/siswa');
}

public function lihatsiswa($id)
{
    $data['title'] = 'Lihat Detail Siswa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['siswa'] = $this->db->get('siswa', ['idsiswa' =>$id])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('buku/lihatsiswa', $data);
    $this->load->view('templates/footer');

}

// public function cetak($id)
// {
//     $data['inventariss'] = $this->model_inventaris->getInventarisId($id);
//     $this->load->view('inventaris/cetakinv', $data);
// }


public function ubahsiswa ($id)
{
    $data['title'] = 'Edit Karyawan';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['siswa'] = $this->model_induk->getSiswaId($id);
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('buku/ubahsiswa', $data);
        $this->load->view('templates/footer');
}

public function actioneditSiswa()
{
$data['title'] = 'Edit Siswa';
$data['user'] = $this->db->get_where('user', ['email' =>
$this->session->userdata('email')])->row_array();    
    
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('buku/ubahsiswa', $data);
    $this->load->view('templates/footer');
    
    $idsiswa = $this->input->post('idsiswa');
    $data = [
        'nis' => $this->input->post('nis'),
        'nama' => $this->input->post('nama'),
        'gender' => $this->input->post('gender'),
        'tgl_lahir' => $this->input->post('tgl_lahir'),
        'tempat_lahir' => $this->input->post('tempat_lahir'),
        'agama' => $this->input->post('agama'),
        'alamat' => $this->input->post('alamat'),
        'idkelas' => $this->input->post('idkelas')
    ];

    $this->db->where('idsiswa', $idsiswa);
    $this->db->update('siswa', $data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Siswa Diubah!</div>');
    redirect('buku/siswa');
}


function laporan(){

    $data['title'] = 'Report Data';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array(); 
    $data['report']=$this->model_induk->get_data_tempat();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('buku/grafik', $data);
    $this->load->view('templates/footer');
}
}
