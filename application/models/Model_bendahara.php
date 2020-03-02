<?php
  class Model_bendahara extends CI_Model {

    function __construct()
	{
		parent::__construct();
    }

    //INVENTARIS

    public function getSppId($id)
    {
      $hsl=$this->db->query("SELECT * FROM spp WHERE idspp='$id'");
      if($hsl->num_rows()>0){
          foreach ($hsl->result() as $data) {
          $hasil=array(
          'idspp' =>$data->idspp,
          'nis' =>$data->nis,
          'nama' => $data->nama,
          'kelas' => $data->kelas,
          'keterangan' => $data->keterangan,
          'tanggal' => $data->tanggal,
          'jumlah' => $data->jumlah);
          }
      }
      return $hasil;
    }

    public function updatedata($data, $idspp)
    {
        $this->db->where('idspp', $idspp);
        $this->db->update("spp", $data);
    }

    public function ubahDataSpp($id)
    {
      $data = [
        'nis' => $this->input->post('nis', true),
        'nama' => $this->input->post('nama', true),
        'kelas' => $this->input->post('kelas', true),
        'keterangan' => $this->input->post('keterangan', true),
        'tanggal' => $this->input->post('tanggal', true),
        'jumlah' => $this->input->post('jumlah', true)
    ];

    $this->db->where('idspp',$id);
    $this->db->update('spp', $data);
    }
  }