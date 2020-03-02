<?php
  class Model_kurikulum extends CI_Model {

    function __construct()
	{
		parent::__construct();
    }

//INVENTARIS

    public function getPrestasiId($id)
    {
      $hsl=$this->db->query("SELECT * FROM prestasi WHERE idprestasi='$id'");
      if($hsl->num_rows()>0){
          foreach ($hsl->result() as $data) {
          $hasil=array(
          'idprestasi' =>$data->idprestasi,
          'nis' =>$data->nis,
          'nama' => $data->nama,
          'kelas' => $data->kelas,
          'kegiatan' => $data->kegiatan,
          'penghargaan' => $data->penghargaan,
          'keterangan' => $data->keterangan);
          }
      }
      return $hasil;
    }

    public function updatedata($data, $idprestasi)
    {
        $this->db->where('idprestasi', $idprestasi);
        $this->db->update("prestasi", $data);
    }

    public function ubahDataPrestasi($id)
    {
      $data = [
        'nis' => $this->input->post('nis', true),
        'nama' => $this->input->post('nama', true),
        'kelas' => $this->input->post('kelas', true),
        'kegiatan' => $this->input->post('kegiatan', true),
        'penghargaan' => $this->input->post('penghargaan', true),
        'keterangan' => $this->input->post('keterangan', true)
    ];

    $this->db->where('idprestasi',$id);
    $this->db->update('prestasi', $data);
    }
  }