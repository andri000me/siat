<?php
defined('BASEPATH') or exit('No direct script access allowed'); 

class Model_snilai extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}


	public function addNilai()
	{
		// print_r($_POST);
		foreach ( $this->input->post('nilai') as $k => $v ) {
			$tanggal = date("Y-m-d");
			if ( false === $this->isExist($tanggal, $k)) {
				$data =[
					"idnilai" =>$this->input->post('idnilai', true),
					"idmapel" =>$this->input->post('idmapel', true),
					"tanggal" =>$tanggal,
					"nis" =>$k,
					"nilai" =>$v,
					"keterangan" =>$this->input->post('keterangan', true),
				];
				$this->db->insert('nilai', $data);
			}	
				
		}
	}


	//tomy
	public function tambah(){
		$fkidratanilai = $this->input->post('fkidratanilai');
	    // $idjadwal = $this->input->post('idjadwal');
	    $data = [
            'nilai' => $this->input->post('nilai'),
            'fkidratanilai' => $fkidratanilai
        ];
        $this->db->insert('banyaknilai', $data);

        //hitung rata rata
        $this->db->select('AVG(nilai) avg_nilai');
        $this->db->where("fkidratanilai", $fkidratanilai);
        $result=$this->db->get('banyaknilai')->row();
        $hasilrata=$result->avg_nilai;
 
		$updateData=array("rata"=>$hasilrata);
		$this->db->where("idratanilai", $fkidratanilai);
		$this->db->update("ratanilai", $updateData);
	}

	//29 februari 2020
	public function tambahuts(){
		$fkidratanilai = $this->input->post('fkidratanilai');
		$nilaiuts = $this->input->post('nilaiuts');

		$updateuts=array("uts"=>$nilaiuts);
		$this->db->where("idratanilai", $fkidratanilai);
		$this->db->update("ratanilai", $updateuts);

        //hitung nilai akhir
        $query = $this->db->query("select rata from ratanilai where idratanilai = '{$fkidratanilai}' ");
        $row = $query->row_array();
        $resultrata = $row['rata'];

        $query = $this->db->query("select uts from ratanilai where idratanilai = '{$fkidratanilai}' ");
        $row = $query->row_array();
        $resultuts = $row['uts'];

        $query = $this->db->query("select uas from ratanilai where idratanilai = '{$fkidratanilai}' ");
        $row = $query->row_array();
        $resultuas = $row['uas'];

        $tugas = $resultrata * 0.5;
        $uts = $resultuts * 0.25;
        $uas = $resultuas * 0.25;

        $nilaiakhir = $tugas+$uts+$uas;

        if ($nilaiakhir==100) {
        	$keterangan = "Tuntas Paripurna";
        } elseif($nilaiakhir >= 60) {
        	$keterangan = "Tuntas";
        } elseif ($nilaiakhir == 65 ) {
        	$keterangan = "KKM (Krikteria Ketuntasan Minimal)";
        } else {
        	$keterangan = "Gagal";
        }
        
        $data = [
        	'nilaiakhir' => $nilaiakhir,
        	'keterangan' => $keterangan
        ];
        $this->db->where('idratanilai', $fkidratanilai);
        $this->db->update('ratanilai', $data);
	}

	public function tambahuas(){
		$fkidratanilai = $this->input->post('fkidratanilai');
		$nilaiuas = $this->input->post('nilaiuas');

		$updateuas=array("uas"=>$nilaiuas);
		$this->db->where("idratanilai", $fkidratanilai);
		$this->db->update("ratanilai", $updateuas);

        //hitung nilai akhir
        $query = $this->db->query("select rata from ratanilai where idratanilai = '{$fkidratanilai}' ");
        $row = $query->row_array();
        $resultrata = $row['rata'];

        $query = $this->db->query("select uts from ratanilai where idratanilai = '{$fkidratanilai}' ");
        $row = $query->row_array();
        $resultuts = $row['uts'];

        $query = $this->db->query("select uas from ratanilai where idratanilai = '{$fkidratanilai}' ");
        $row = $query->row_array();
        $resultuas = $row['uas'];

        $tugas = $resultrata * 0.5;
        $uts = $resultuts * 0.25;
        $uas = $resultuas * 0.25;

        $nilaiakhir = $tugas+$uts+$uas;

        if ($nilaiakhir==100) {
        	$keterangan = "Tuntas Paripurna";
        } elseif($nilaiakhir >= 60) {
        	$keterangan = "Tuntas";
        } elseif ($nilaiakhir == 65 ) {
        	$keterangan = "KKM (Krikteria Ketuntasan Minimal)";
        } else {
        	$keterangan = "Gagal";
        }
        
        $data = [
        	'nilaiakhir' => $nilaiakhir,
        	'keterangan' => $keterangan
        ];
        $this->db->where('idratanilai', $fkidratanilai);
        $this->db->update('ratanilai', $data);
	}
	//29 februari 2020

	public function tambahujian(){
		$id_nilaiujian = $this->input->post('id_nilaiujian');
		$rata = $this->input->post('rata');
		$uts = $this->input->post('uts');
		$uas = $this->input->post('uas');

		$ratahasil = ($rata+$uts+$uas)/3;

		if($ratahasil == 100){
			$nilai="Tuntas Paripurna";
			}elseif($ratahasil >= 60){
			$nilai="Tuntas ";
			}elseif($ratahasil == 65){
			$nilai="KKM (Krikteria Ketuntasan Minimal)";
			}else{
			 $nilai="Gagal";
			}

        $data = [
            'uts' => $this->input->post('uts'),
            'uas' => $this->input->post('uas'),
			'nilairapot' => $ratahasil,
			'keterangan' => $nilai
        ];

		$this->db->where('id_nilaiujian', $id_nilaiujian);
        $this->db->update('nilaiujian', $data);
	}


	// SELECT * FROM 
	// banyaknilai 
	// LEFT join ratanilai on ratanilai.idratanilai = banyaknilai.idbanyaknilai 
	// LEFT JOIN siswa on siswa.idsiswa = ratanilai.fkidsiswa 
	// WHERE banyaknilai.fkidratanilai = '{$fkidratanilai}'

	public function lihatrapot($id)
	{
		$query = "	SELECT *  
					FROM `nilaiujian`
					LEFT JOIN siswa on nilaiujian.fkidsiswa = siswa.idsiswa
					LEFT JOIN mapel on nilaiujian.fkidmapel = mapel.idmapel
					LEFT JOIN kelas on siswa.idkelas = kelas.idkelas
					WHERE siswa.idsiswa = '{$id}'
		";
		$rapot =  $this->db->query($query)->result_array();

		return $rapot;
	}
	
	//tomy
	

	public function listDaftar()
	{
		$query = "	SELECT *
					FROM `daftar`
		";
		$daftar =  $this->db->query($query)->result_array();

		return $daftar;
	}

	public function getNilai($nis)
	{
		$query = "	SELECT *
					FROM `nilai`
					WHERE `nis` = '{$nis}'
		";
		$nilai =  $this->db->query($query)->result_array();

		return $nilai;
	}

	public function isExist($date, $nis) {
		$query = "	SELECT `tanggal`
					FROM `nilai`
					WHERE `tanggal` = '{$date}' AND `nis` = '{$nis}'
		";
		$nilai =  $this->db->query($query)->result_array();

		if ( count($nilai) > 0 ) {
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

    public function tambahDataNilai()
    {
        # code...
        $data =[
			'nilai' => $this->input->post('nilai', true),
            'tingkat' => $this->input->post('tingkat', true),
            'idjurusan' => $this->input->post('idjurusan', true),
            'idkelas' => $this->input->post('idkelas', true),
            'idmapel' => $this->input->post('idmapel', true),
            'idguru' => $this->input->post('idguru', true),            
            'jam' => $this->input->post('jam', true),
            'idruangan' => $this->input->post('idruangan', true),
            'hari' =>$this->input->post('hari', true)
        ];
        $this->db->insert('daftar', $data);
}

}