<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kurikulum extends CI_controller
{
	public function __construct()
    {   
        parent::__construct();
        $this->load->library('Pdf');
        $this->load->model('model_kurikulum');
    }

    public function index()
	{
		$data['title'] = 'Prestasi';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['prestasi'] = $this->db->get('prestasi')->result_array();
		
		$this->form_validation->set_rules('nis', 'Nis', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('kelas', 'Kelas', 'required');
		// $this->form_validation->set_rules('kegiatan', 'Kegiatan', 'required');
			
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('kurikulum/index', $data);
			$this->load->view('templates/footer');
		} else {
			# code...
			$data = [
				// 'idprestasi' => $this->input->post('idprestasi'),
				'nis' => $this->input->post('nis'),
				'nama' => $this->input->post('nama'),
				'kelas' => $this->input->post('kelas'),
				'kegiatan' => $this->input->post('kegiatan'),
				'penghargaan' => $this->input->post('penghargaan'),
				'keterangan' => $this->input->post('keterangan')
			];
			$this->db->insert('prestasi', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Prestasi Ditambahkan!</div>');
			redirect('kurikulum/index');
		}
	}
	
    public function hapus($id)
    {
        $this->db->where('idprestasi', $id);
		$this->db->delete('prestasi');
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('kurikulum/index');
    }

    // public function lihat($id)
    // {
    //     $data['title'] = 'Lihat Detail Inventaris';
    //     $data['user'] = $this->db->get_where('user', ['email' =>
    //     $this->session->userdata('email')])->row_array();
    //     $data['inventaris'] = $this->db->get('inventaris', ['idinventaris' =>$id])->row_array();
    
    //     $this->load->view('templates/header', $data);
	// 	$this->load->view('templates/sidebar', $data);
	// 	$this->load->view('templates/topbar', $data);
	// 	$this->load->view('inventaris/lihatinv', $data);
    //     $this->load->view('templates/footer');
    // }

    // public function cetak($id)
    // {
    //     $data['inventariss'] = $this->model_inventaris->getInventarisId($id);
    //     $this->load->view('inventaris/cetakinv', $data);
    // }

    
    public function ubah ($id)
    {
        $data['title'] = 'Edit Prestasi';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
    
            $data['prestasi'] = $this->model_kurikulum->getPrestasiId($id);
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kurikulum/ubahprestasi', $data);
            $this->load->view('templates/footer');
}

public function actioneditPrestasi()
{
    $data['title'] = 'Edit Prestasi';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();    
        
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kurikulum/ubahprestasi', $data);
        $this->load->view('templates/footer');
        
        $idprestasi = $this->input->post('idprestasi');
        $data = [
            'nis' => $this->input->post('nis'),
            'nama' => $this->input->post('nama'),
            'kelas' => $this->input->post('kelas'),
            'kegiatan' => $this->input->post('kegiatan'),
            'penghargaan' => $this->input->post('penghargaan'),
            'keterangan' => $this->input->post('keterangan')
        ];

        $this->db->where('idprestasi', $idprestasi);
        $this->db->update('prestasi', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Prestasi Diubah!</div>');
        redirect('kurikulum/index');
}


	public function mapel()
	{
		$data['title'] = 'Mapel';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['mapel'] = $this->db->get('mapel')->result_array();

		$this->form_validation->set_rules('kd_mapel', 'Kode', 'required');
		$this->form_validation->set_rules('mapel', 'Mapel', 'required');
			
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('kurikulum/mapel', $data);
			$this->load->view('templates/footer');
		} else {
			# code...
			$data = [
				'idmapel' => $this->input->post('idmapel'),
				'kd_mapel' => $this->input->post('kd_mapel'),
				'mapel' => $this->input->post('mapel')
			];
			$this->db->insert('mapel', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Mata Pelajaran Ditambahkan!</div>');
			redirect('kurikulum/mapel');
		}
	}

	public function ekstra()
	{
		$data['title'] = 'Ekstrakurikuler';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['ekstra'] = $this->db->get('ekstra')->result_array();

		$this->form_validation->set_rules('kd_ekstra', 'Kode', 'required');
		$this->form_validation->set_rules('ekstra', 'Ekstrakurikuler', 'required');
			
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('kurikulum/ekstra', $data);
			$this->load->view('templates/footer');
		} else {
			# code...
			$data = [
				'idekstra' => $this->input->post('idekstra'),
				'kd_ekstra' => $this->input->post('kd_ekstra'),
				'ekstra' => $this->input->post('ekstra')
			];
			$this->db->insert('ekstra', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Ekstrakurikuler Ditambahkan!</div>');
			redirect('kurikulum/ekstra');
		}
	}


	public function kelas()
	{
		$data['title'] = 'Kelas';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['kelas'] = $this->db->get('kelas')->result_array();

		$this->form_validation->set_rules('kelas', 'Kelas', 'required');
			
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('kurikulum/kelas', $data);
			$this->load->view('templates/footer');
		} else {
			# code...
			$data = [
				'idkelas' => $this->input->post('idkelas'),
				'kelas' => $this->input->post('kelas')
			];
			$this->db->insert('kelas', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kelas Ditambahkan!</div>');
			redirect('kurikulum/kelas');
		}
	}


	public function jadwal()
	{
		$this->load->model('jadwal_model');
		$this->load->model('model_guru');
		$data['title'] = 'Jadwal';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['jadwal'] = $this->db->get('jadwal')->result_array();
		
		$this->form_validation->set_rules('hari', 'Hari', 'required');
			
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('kurikulum/jadwal', $data);
			$this->load->view('templates/footer');
		} else {
			# code...
			$data = [
				'idjadwal' => $this->input->post('idjadwal'),
				'hari' => $this->input->post('hari'),
				'jam' => $this->input->post('jam'),
				'tingkat' => $this->input->post('tingkat'),
				'idjurusan' => $this->input->post('idjurusan'),
				'idkelas' => $this->input->post('idkelas'),
				'idmapel' => $this->input->post('idmapel'),
				'idguru' => $this->input->post('idguru'),
				'idruangan' => $this->input->post('idruangan')
			];
			$this->db->insert('jadwal', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Jadwal Ditambahkan!</div>');
			redirect('kurikulum/jadwal');
		}
	}
}
