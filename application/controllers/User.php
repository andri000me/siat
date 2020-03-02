<?php defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_controller
{
	public function __construct()
	{
		parent::__construct();
		cek_log_in();
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Informasi';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}

	public function edit()
	{
		# code...
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Edit Profil';

		$this->form_validation->set_rules('name', 'full name', 'trim|required');


		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/edit', $data);
			$this->load->view('templates/footer');
		} else {
			# code...
			$name = $this->input->post('name');
			$email = $this->input->post('email');

			//cek apabila upload gambar
			$upload_image = $_FILES['image'];
			if ($upload_image) {
				# code...
				$config['upload_path'] = './assets/img/profil';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2048';
				$config['max_width'] = '1920';
				$config['max_height'] = '1080';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					# code...
					$old_image = $data['user']['image'];
					if ($old_image != 'default.jpg') {
						# code...
						unlink(FCPATH . 'assets/img/profil/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					# code...
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('name', $name);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil anda sudah diganti</div>');
			redirect('user');
		}
	}
	public function changepassword()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Change Password';

		$this->form_validation->set_rules('current_password', 'Current Password', 'trim|required');
		$this->form_validation->set_rules('newpassword1', 'New Password', 'trim|required|min_length[3]|matches[newpassword2]');
		$this->form_validation->set_rules('newpassword2', 'Confirm New Password', 'trim|required|min_length[3]|matches[newpassword1]');

		if ($this->form_validation->run() == false) {
			# code...
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/changepassword', $data);
			$this->load->view('templates/footer');
		} else {
			# code...
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('newpassword1');
			if (!password_verify($current_password, $data['user']['password'])) {
				# code...
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wronge Password</div>');
				redirect('user/changepassword');
			} else {
				# code...
				if ($current_password == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New Password Cannot be the same as current pasword</div>');
					redirect('user/changepassword');
				} else {
					# code...
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Passwod Changed</div>');
					redirect('user/changepassword');
				}
			}
		}
	}
}