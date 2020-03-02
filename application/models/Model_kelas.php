<?php

/**
 * 
 */
class Model_kelas extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
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

	public function kelasDropdownjam()
	{

		$kat=$this->db->get('jadwal');
		$k=$kat->result_array();

		$select = "<select name='idjadwal' class='addr-select form-control' data-section='jadwal'>
		<option value='' >pilih jam</option>
		<option value=''>-------</option>
		";
		foreach ($k as $key => $value) {
			$select .= "<option value='{$value['idjadwal']}' >{$value['jadwal']}</option>";
		}
		$select .= "</select>";

		return $select;
	}


	public function getKelas($id)
	{
		# code...
		$query = "	SELECT `kelas`
					FROM `kelas`
					WHERE `idkelas` =  '{$id}'
		";
		$kelas = $this->db->query($query)->result_array();
		return $kelas[0]['kelas'];
	}

	//tomy
	public function listSiswaKelas($idkelas,  $idmapel)
    {
		# code...
		$query = "	SELECT *
					FROM `siswa` join ratanilai on siswa.idsiswa = ratanilai.fkidsiswa
					join banyaknilai on ratanilai.idratanilai = banyaknilai.idbanyaknilai
					join mapel on mapel.idmapel = ratanilai.fkidmapel
					WHERE ratanilai.fkidkelas =  '{$idkelas}' AND ratanilai.fkidmapel = '{$idmapel}'
		";
		$siswa = $this->db->query($query)->result_array();
        return $siswa;
	}
	
	public function listSiswaKelas2($idkelas)
    {
		# code...
		$query = "	SELECT *
					FROM `siswa` join nilaiujian on siswa.idsiswa = nilaiujian.fkidsiswa
					LEFT JOIN ratanilai on siswa.idsiswa = ratanilai.fkidsiswa 
					WHERE siswa.idkelas =  '{$idkelas}'
		";
		$siswa = $this->db->query($query)->result_array();
        return $siswa;
    }

    public function listbanyaknilai($fkidratanilai)
    {

		# code...
		$query = "	SELECT * FROM 
					banyaknilai 
					LEFT join ratanilai on ratanilai.idratanilai = banyaknilai.idbanyaknilai 
					LEFT JOIN siswa on siswa.idsiswa = ratanilai.fkidsiswa 
					WHERE banyaknilai.fkidratanilai = '{$fkidratanilai}'
		";
		$siswa = $this->db->query($query)->result_array();
        return $siswa;
    }
	//tomy


    public function getJumlahtugas($idratanilai){
		$sql = "	SELECT count(idbanyaknilai)
                    FROM `banyaknilai`
                    WHERE fkidratanilai = $idratanilai
		";
		$query = $this->db->query($sql)->result_array();
		return $query[0];

		// $siswa = $this->db->query($query)->result_array();
        // return $query;
	}

	//ayo
	public function getfilterkelassemester($idkelas, $semester)
    {
		# code...

		$sql = " SELECT * FROM `jadwal` join user on jadwal.idguru = user.id WHERE `idkelas`=  '{$idkelas}' AND semester = '{$semester}'
		";
		$filter = $this->db->query($sql)->result_array();
        return $filter;
	}
	//ayo

	//29 february 2020
	public function listbanyaknilaiakhir($fkidratanilai)
    {
		# code...
		$query = "	SELECT * FROM 
					ratanilai 
					LEFT JOIN siswa on siswa.idsiswa = ratanilai.fkidsiswa 
					WHERE ratanilai.idratanilai = '{$fkidratanilai}'
		";
		$siswa = $this->db->query($query)->result_array();
        return $siswa;
    }
	//29 february 2020
}
