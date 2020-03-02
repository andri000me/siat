<?php defined('BASEPATH') or exit('No direct script access allowed');

class Bendahara extends CI_controller
{
    public function __construct()
    {   
        parent::__construct();
        $this->load->library('Pdf');
        $this->load->model('model_bendahara');
    }

    public function index()
	{
		$data['title'] = 'SPP';
		$data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['spp'] = $this->db->get('spp')->result_array();
        
        $this->form_validation->set_rules('nis', 'Nis', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        
    if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('bendahara/index', $data);
        $this->load->view('templates/footer');
    } else {
        # code...
        $data = [
            'idspp' => $this->input->post('idspp'),
            'nis' => $this->input->post('nis'),
            'nama' => $this->input->post('nama'),
            'kelas' => $this->input->post('kelas'),
            'keterangan' => $this->input->post('keterangan'),
            'tanggal' => $this->input->post('tanggal'),
            'jumlah' => $this->input->post('jumlah')
        ];
        $this->db->insert('spp', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data SPP Ditambahkan!</div>');
        redirect('bendahara/index');
    }
}


public function hapus($id)
{
    $this->db->where('idspp', $id);
    $this->db->delete('spp');
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('bendahara/index');
}

// public function lihat($id)
// {
//     $data['title'] = 'Lihat Detail Inventaris';
//     $data['user'] = $this->db->get_where('user', ['email' =>
//     $this->session->userdata('email')])->row_array();
//     $data['inventaris'] = $this->db->get('inventaris', ['idinventaris' =>$id])->row_array();

//     $this->load->view('templates/header', $data);
//     $this->load->view('templates/sidebar', $data);
//     $this->load->view('templates/topbar', $data);
//     $this->load->view('inventaris/lihatinv', $data);
//     $this->load->view('templates/footer');
// }

// public function cetak($id)
// {
//     $data['inventariss'] = $this->model_inventaris->getInventarisId($id);
//     $this->load->view('inventaris/cetakinv', $data);
// }


public function ubah ($id)
{
    $data['title'] = 'Edit SPP';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

        $data['spp'] = $this->model_bendahara->getSppId($id);
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('bendahara/ubahspp', $data);
        $this->load->view('templates/footer');
}

public function actioneditSpp()
{
$data['title'] = 'Edit Spp';
$data['user'] = $this->db->get_where('user', ['email' =>
$this->session->userdata('email')])->row_array();    
    
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('inventaris/ubahspp', $data);
    $this->load->view('templates/footer');
    
    $idspp = $this->input->post('idspp');
    $data = [
        'nis' => $this->input->post('nis'),
        'nama' => $this->input->post('nama'),
        'kelas' => $this->input->post('kelas'),
        'keterangan' => $this->input->post('keterangan'),
        'tanggal' => $this->input->post('tanggal'),
        'jumlah' => $this->input->post('jumlah')
    ];

    $this->db->where('idspp', $idspp);
    $this->db->update('spp', $data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pembayaran Spp Diubah!</div>');
    redirect('bendahara/index');
}

}