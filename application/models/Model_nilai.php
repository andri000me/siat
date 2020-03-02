<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_absensi extends CI_Model
{
	public function addNilai()
	{
		// print_r($_POST);
		foreach ( $this->input->post('status') as $k => $v ) {
			$tanggal = date("Y-m-d");
			if ( false === $this->isExist($tanggal, $k)) {
				$data =[
					"idnilai" =>$this->input->post('idnilai', true),
					"idmapel" =>$this->input->post('idmapel', true),
                    "nis" =>$k,
                    "nilai" =>$this->input->post('nilai', true),
					"status" =>$v,
					"keterangan" =>$this->input->post('keterangan', true),
				];
				$this->db->insert('nilai', $data);
			}	
				
		}
	}

	public function listJadwal()
	{
		$query = "	SELECT *
					FROM `jadwal`
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
}
