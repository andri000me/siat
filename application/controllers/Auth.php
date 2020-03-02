<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Auth extends CI_controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		# code...

		if ($this->session->userdata('email')) {
			# code...
			redirect('user');
		}
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$data['pageTitle'] = 'Halaman Login SIAT Muhi';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			// jika validasi sukses
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		//jika user ada
		if ($user) {
			//jika user aktif
			if ($user['is_active'] == 1) {
				//cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('admin');
					} else {
						redirect('user');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password yang anda masukkan salah!</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum di aktifkan!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar!</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda baru saja keluar</div>');
		redirect('auth');
	}

	public function block()
	{
		# code...
		$this->load->view('auth/blocked');
	}
}