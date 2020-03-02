<?php defined('BASEPATH') or exit('No direct script access allowed');

class Penyuratan extends CI_controller
{
    public function index()
	{
		$data['title'] = 'Penyuratan';
		$data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['penyuratan'] = $this->db->get('penyuratan')->result_array();
        
		$this->form_validation->set_rules('nomor', 'Nomor', 'required');
		$this->form_validation->set_rules('pengirim', 'Pengirim', 'required');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required');
        
    if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('surat/index', $data);
        $this->load->view('templates/footer');
    } else {
        # code...
        $data = [
            'idsurat' => $this->input->post('idsurat'),
            'nomor' => $this->input->post('nomor'),
            'tanggal' => $this->input->post('tanggal'),
            'pengirim' => $this->input->post('pengirim'),
            'tujuan' => $this->input->post('tujuan'),
            'kepentingan' => $this->input->post('kepentingan'),
            'tipe' => $this->input->post('tipe')
        ];
        $this->db->insert('penyuratan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Penyuratan Ditambahkan!</div>');
        redirect('penyuratan/index');
    }
}
}