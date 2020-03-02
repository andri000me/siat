<?php
  class Model_induk extends CI_Model {

    function __construct()
	{
		parent::__construct();
    }

    //KARYAWAN

    public function getKaryawanId($id)
    {
      $hsl=$this->db->query("SELECT * FROM karyawan WHERE idkaryawan='$id'");
      if($hsl->num_rows()>0){
          foreach ($hsl->result() as $data) {
          $hasil=array(
          'idkaryawan' =>$data->idkaryawan,
          'status' =>$data->status,
          'nama' => $data->nama,
          'lahir' => $data->lahir,
          'idjabatan' => $data->idjabatan,
          'gender' => $data->gender,
          'idagama' => $data->idagama,
          'alamat' => $data->alamat);
          }
      }
      return $hasil;
    }

    public function updatedata($data, $idkaryawan)
    {
        $this->db->where('idkaryawan', $idkaryawan);
        $this->db->update("karyawan", $data);
    }

    public function ubahDataKaryawan($id)
    {
      $data = [
        'status' => $this->input->post('status', true),
        'nama' => $this->input->post('nama', true),
        'lahir' => $this->input->post('lahir', true),
        'idjabatan' => $this->input->post('idjabatan', true),
        'gender' => $this->input->post('gender', true),
        'idagama' => $this->input->post('idagama', true),
        'alamat' => $this->input->post('alamat', true)
    ];

    $this->db->where('idkaryawan',$id);
    $this->db->update('karyawan', $data);
    }

    //SISWA

    public function getSiswaId($id)
    {
      $hsl=$this->db->query("SELECT * FROM siswa WHERE idsiswa='$id'");
      if($hsl->num_rows()>0){
          foreach ($hsl->result() as $data) {
          $hasil=array(
          'idsiswa' =>$data->idsiswa,
          'nis' =>$data->nis,
          'nama' => $data->nama,
          'gender' => $data->gender,
          'tgl_lahir' => $data->tgl_lahir,
          'tempat_lahir' => $data->tempat_lahir,
          'agama' => $data->agama,
          'alamat' => $data->alamat,
          'idkelas' => $data->idkelas);
          }
      }
      return $hasil;
    }

    public function updatedatasiswa($data, $idsiswa)
    {
        $this->db->where('idsiswa', $idkaryawan);
        $this->db->update("siswa", $data);
    }

    public function ubahDataSiswa($id)
    {
      $data = [
        'nis' => $this->input->post('nis', true),
        'nama' => $this->input->post('nama', true),
        'gender' => $this->input->post('gender', true),
        'tgl_lahir' => $this->input->post('tgl_lahir', true),
        'tempat_lahir' => $this->input->post('tempat_lahir', true),
        'agama' => $this->input->post('agama', true),
        'alamat' => $this->input->post('alamat', true),
        'idkelas' => $this->input->post('idkelas', true)
    ];

    $this->db->where('idsiswa',$id);
    $this->db->update('siswa', $data);
    }

    function get_data_tempat(){
      $query = $this->db->query("SELECT gender,SUM(gender) AS gender FROM siswa GROUP BY genders");
       
      if($query->num_rows() > 0){
          foreach($query->result() as $report){
              $hasil[] = $report;
          }
          return $hasil;
      }
  }

  public function getAgama($id)
	{
		# code...
		$query = "	SELECT `agama`
					FROM `agama`
					WHERE `idagama` =  '{$id}'
		";
		$agama = $this->db->query($query)->result_array();
		return $agama[0]['agama'];
  }
  
  public function agamaDropdown()
	{

		$kat=$this->db->get('agama');
		$k=$kat->result_array();

		$select = "<select name='idagama' class='addr-select form-control' data-section='agama'>
		<option value='' >pilih agama</option>
		<option value=''>-------</option>
		";
		foreach ($k as $key => $value) {
			$select .= "<option value='{$value['idagama']}' >{$value['agama']}</option>";
		}
		$select .= "</select>";

		return $select;
  }
  
  public function getJabatan($id)
	{
		# code...
		$query = "	SELECT `jabatan`
					FROM `jabatan`
					WHERE `idjabatan` =  '{$id}'
		";
		$jabatan = $this->db->query($query)->result_array();
		return $jabatan[0]['jabatan'];
  }
  
  public function jabatanDropdown()
	{

		$kat=$this->db->get('jabatan');
		$k=$kat->result_array();

		$select = "<select name='idjabatan' class='addr-select form-control' data-section='jabatan'>
		<option value='' >pilih jabatan</option>
		<option value=''>-------</option>
		";
		foreach ($k as $key => $value) {
			$select .= "<option value='{$value['idjabatan']}' >{$value['jabatan']}</option>";
		}
		$select .= "</select>";

		return $select;
	}
}