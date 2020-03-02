<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_controller
{
	public function __construct()
	{
		parent::__construct();
		cek_log_in();
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	public function role()
	{
		$data['title'] = 'Role';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get('user_role')->result_array();

		$this->form_validation->set_rules('role', 'Role', 'required');

	if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role', $data);
		$this->load->view('templates/footer');
	} else {
		# code...
		$data = [
			'role' => $this->input->post('role'),
		];
		$this->db->insert('user_role', ['role' => $this->input->post('role')]);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New role access added!</div>');
		redirect('admin/role');
	}
	}

	public function roleaccess($role_id)
	{
		$data['title'] = 'Role Access';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get_where(
			'user_role',
			['id' => $role_id]
		)->row_array();

		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('templates/footer');
	}

	public function changeaccess()
	{
		# code...
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if ($result->num_rows() < 1) {
			# code...
			$this->db->insert('user_access_menu', $data);
		} else {
			# code...
			$this->db->delete('user_access_menu
			', $data);
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
	}

	
	public function registration()
	{

		$data['title'] = 'Register';
		if ($this->session->userdata('email')) {
			# code...
			redirect('user');
		}
		$this->form_validation->set_rules('name', 'Name', 'required|trim');

		$this->form_validation->set_rules(
			'email',
			'Email',
			'required|trim|valid_email|is_unique[user.email]',
			[
				'is_unique' => 'Email ini sudah terdaftar'
			]
		);
		$this->form_validation->set_rules('password1', 'password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'password tidak sama',
			'min_length' => 'password terlalu pendek'
		]);
		$this->form_validation->set_rules('password2', 'password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			# code...

			
			$this->load->view('templates/auth_header', $data);
			$this->load->view('admin/registration');
			$this->load->view('templates/auth_footer');
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_create' => time()
			];

			$this->db->insert('user', $data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun anda telah dibuat. Silakan masuk</div>');
			redirect('auth');
		}
	}

}