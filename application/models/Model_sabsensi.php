<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_sabsensi extends CI_Model
{
	public function addAbsen()
	{
		// print_r($_POST);
		foreach ( $this->input->post('status') as $k => $v ) {
			$tanggal = date("Y-m-d");
			if ( false === $this->isExist($tanggal, $k)) { 
				$data =[
					"idmapel" =>$this->input->post('idmapel', true),
					"idkelas" =>$this->input->post('idkelas', true),
					"tanggal" =>$tanggal,
					"nis" =>$k,
					"status" =>$v,
					"keterangan" =>$this->input->post('keterangan', true),
				];
				$this->db->insert('absensi', $data);
			}	
				
		}
	}

	public function listJadwal()
	{
		$query = "	SELECT *
					FROM `jadwal` join user WHERE jadwal.idguru = user.id
		";
		$jadwal =  $this->db->query($query)->result_array();

		return $jadwal;
	}

	public function getAbsen($nis)
	{
		$query = "	SELECT *
					FROM `absensi`
					WHERE `nis` = '{$nis}'
		";
		$absen =  $this->db->query($query)->result_array();

		return $absen;
	}

	public function isExist($date, $nis) {
		$query = "	SELECT `tanggal`
					FROM `absensi`
					WHERE `tanggal` = '{$date}' AND `nis` = '{$nis}'
		";
		$absen =  $this->db->query($query)->result_array();

		if ( count($absen) > 0 ) {
			return true;
		} else {
			return false;
		}

	}

	
	public function kelasDropdown()
	{

		$kat=$this->db->get('kelas');
		$k=$kat->result_array();

		$select = "<select name='idkelas' class='addr-select form-control' data-section='kelas'>
		<option value='' >pilih kelas</option>
		<option value=''>-------</option>
		";
		foreach ($k as $key => $value) {
			$select .= "<option value='{$value['idkelas']}' >{$value['kelas']}</option>";
		}
		$select .= "</select>";

		return $select;
	}

	public function kelasDropdownmapel()
	{

		$kat=$this->db->get('mapel');
		$k=$kat->result_array();

		$select = "<select name='idmapel' class='addr-select form-control' data-section='mapel'>
		<option value='' >pilih mata pelajaran</option>
		<option value=''>-------</option>
		";
		foreach ($k as $key => $value) {
			$select .= "<option value='{$value['idmapel']}' >{$value['mapel']}</option>";
		}
		$select .= "</select>";

		return $select;
	}

	public function kelasDropdownjurusan()
	{

		$kat=$this->db->get('jurusan');
		$k=$kat->result_array();

		$select = "<select name='idjurusan' class='addr-select form-control' data-section='jurusan'>
		<option value='' >pilih jurusan</option>
		<option value=''>-------</option>
		";
		foreach ($k as $key => $value) {
			$select .= "<option value='{$value['idjurusan']}' >{$value['jurusan']}</option>";
		}
		$select .= "</select>";

		return $select;
	}

	public function kelasDropdownguru()
	{

		$kat=$this->db->get('karyawan');
		$k=$kat->result_array();

		$select = "<select name='idkaryawan' class='addr-select form-control' data-section='nama'>
		<option value='' >pilih guru</option>
		<option value=''>-------</option>
		";
		foreach ($k as $key => $value) {
			$select .= "<option value='{$value['idkaryawan']}' >{$value['nama']}</option>";
		}
		$select .= "</select>";

		return $select;
	}

    public function tambahDataAbsensi()
    {
        # code...
        $data =[
			'idjadwal' => $this->input->post('idjadwal', true),
            'tingkat' => $this->input->post('tingkat', true),
            'idjurusan' => $this->input->post('idjurusan', true),
            'idkelas' => $this->input->post('idkelas', true),
            'idmapel' => $this->input->post('idmapel', true),
            'idguru' => $this->input->post('idguru', true),            
            'jam' => $this->input->post('jam', true),
            'idruangan' => $this->input->post('idruangan', true),
            'hari' =>$this->input->post('hari', true)
        ];
        $this->db->insert('jadwal', $data);
}
}