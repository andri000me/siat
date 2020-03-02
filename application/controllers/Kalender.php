<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kalender extends CI_Controller {

  public function index($tahun = NULL, $bulan = NULL)
  {

    $data['title'] = 'Akademik';
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
        $this->load->view('kalender/index', $data);
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
}