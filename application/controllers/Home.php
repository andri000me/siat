<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_controller
{

	public function index()
	{
		$data['title'] = 'Home';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('home/index', $data);
		$this->load->view('templates/footer');
	}
}