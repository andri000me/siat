<?php

/**
 * 
 */
class Jadwal_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}


    //jurusan
	public function jurusanDropdown()
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

	public function getJurusan($id)
	{
		# code...
		$query = "	SELECT `jurusan`
					FROM `jurusan`
					WHERE `idjurusan` =  '{$id}'
		";
		$jurusan =  $this->db->query($query)->result_array();
		return $jurusan[0]['jurusan'];
	}


	//kelas
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

	public function getKelas($id)
	{
		# code...
		$query = "	SELECT `kelas`
					FROM `kelas`
					WHERE `idkelas` =  '{$id}'
		";
		$kelas =  $this->db->query($query)->result_array();
		if ( count($kelas) > 0 ) {
			$kelas = $kelas[0]['kelas'];
		} else {
			$kelas = "";
		}
		return $kelas;
	}


	//mapel
	public function mapelDropdown()
	{

		$kat=$this->db->get('mapel');
		$k=$kat->result_array();

		$select = "<select name='idmapel' class='addr-select form-control' data-section='mapel'>
		<option value='' >pilih mapel</option>
		<option value=''>-------</option>
		";
		foreach ($k as $key => $value) {
			$select .= "<option value='{$value['idmapel']}' >{$value['mapel']}</option>";
		}
		$select .= "</select>";

		return $select;
	}

	public function getMapel($id)
	{
		# code...
		$query = "	SELECT `mapel`
					FROM `mapel`
					WHERE `idmapel` =  '{$id}'
		";
		$mapel =  $this->db->query($query)->result_array();
		return $mapel[0]['mapel'];
	}


	//ruangan
	public function ruanganDropdown()
	{

		$kat=$this->db->get('ruangan');
		$k=$kat->result_array();

		$select = "<select name='idruangan' class='addr-select form-control' data-section='ruangan'>
		<option value='' >pilih ruangan</option>
		<option value=''>-------</option>
		";
		foreach ($k as $key => $value) {
			$select .= "<option value='{$value['idruangan']}' >{$value['nama_ruangan']}</option>";
		}
		$select .= "</select>";

		return $select;
	}

	public function getRuangan($id)
	{
		# code...
		$query = "	SELECT `nama_ruangan`
					FROM `ruangan`
					WHERE `idruangan` =  '{$id}'
		";
		$ruangan =  $this->db->query($query)->result_array();
		return $ruangan[0]['nama_ruangan'];
	}

	public function getJadwal($id)
	{
		# code...
		$query = "	SELECT *
					FROM `jadwal`
					WHERE `idjadwal` =  '{$id}'
		";
		$jadwal =  $this->db->query($query)->result_array();
		if ( count($jadwal) > 0 ) {
			return $jadwal[0];
		} else {
			return "";
		}
		
	}

	public function getbanyaknilai($id)
	{
		# code...
		$query = "	SELECT *
					FROM `banyaknilai`
					WHERE `fkidratanilai` =  '{$id}'
		";
		$banyaknilai =  $this->db->query($query)->result_array();
		if ( count($banyaknilai) > 0 ) {
			return $banyaknilai[0];
		} else {
			return "";
		}
		
	}

	public function getNilaiUjianId($id)
    {

		// SELECT *
		// FROM `siswa` join nilaiujian on siswa.idsiswa = nilaiujian.fkidsiswa
		// LEFT JOIN ratanilai on siswa.idsiswa = ratanilai.fkidsiswa 
		// WHERE siswa.idkelas =  '{$idkelas}'

      $hsl=$this->db->query("SELECT * FROM `siswa` join nilaiujian on siswa.idsiswa = nilaiujian.fkidsiswa
	  LEFT JOIN ratanilai on siswa.idsiswa = ratanilai.fkidsiswa 
	  WHERE id_nilaiujian='$id'");
      if($hsl->num_rows()>0){
          foreach ($hsl->result() as $data) {
          $hsl=array(
          'id_nilaiujian' =>$data->id_nilaiujian,
          'uts' =>$data->uts,
		  'uas' => $data->uas,
		  'rata' => $data->rata,
          'nilairapot' => $data->nilairapot);
          }
      }
      return $hsl;
	}
	
}
