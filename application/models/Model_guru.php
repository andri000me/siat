<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_guru extends CI_Model
{

	public function getGuru($idguru)
	{
		$guru =  $this->db->get_where('user',['id' => $idguru, 'role_id' => '4'])->row_array();
		if ( count($guru) ) {
			return $guru['name'];
		} else {
			return "";
		}
		
	}

	public function guruDropdown()
	{

		$kat=$this->db->get_where('user', ['role_id' => '4']);
		$k=$kat->result_array();

		$select = "<select name='idguru' class='addr-select form-control' data-section='guru'>
		<option value='' >pilih Guru</option>
		<option value=''>-------</option>
		";
		foreach ($k as $key => $value) {
			$select .= "<option value='{$value['id']}' >{$value['name']}</option>";
		}
		$select .= "</select>";

		return $select;
	}
}
