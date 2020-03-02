<?php
function cek_log_in()
{
	# code...

	$CI = &get_instance();

	if (!$CI->session->userdata('email')) {
		# code...
		redirect('auth');
	} else {
		# code...
		$role_id = $CI->session->userdata('role_id');
		$menu = $CI->uri->segment(1);

		$queryMenu = $CI->db->get_where('user_menu', ['menu' => $menu])->row_array();
		$menu_id = $queryMenu['id'];

		$userAccess = $CI->db->get_where(
			'user_access_menu',
			[
				'role_id' => $role_id,
				'menu_id' => $menu_id
			]
		);
		if ($userAccess->num_rows() < 1) {
			# code...
			redirect('auth/block');
		}
	}
}

function cek_access($role_id, $menu_id)
{
	$ci = get_instance();

	$result =  $ci->db->get_where(
		'user_access_menu',
		[
			'role_id' => $role_id,
			'menu_id' => $menu_id
		]
	);

	if ($result->num_rows() > 0) {
		# code...
		return "checked='checked'";
	}
}