<?php
  class Model_jurusan extends CI_Model {
 
    public function getJurusan()
    {
    	// echo "ok";
        return $this->db->get('jurusan')->result_array();   
    }

    public function tambahDataJurusan()
    {
    	# code...
    	$data =[
    		"idjur" =>$this->input->post('idjur', true),
    		"nama" =>$this->input->post('nama', true),
    	];
    	$this->db->insert('jurusan', $data);
    }
    public function hapusDataJurusan($idjur)
    {
        # code...
        $this->db->where('idjur', $idjur);
        $this->db->delete('jurusan');
    }
    public function getJurusanId($idjur)
    {
        # code...
        return $this->db->get_where('jurusan',['idjur' => $idjur])->row_array();
    }

    public function ubahDataJurusan()
    {
        # code...
        $data =[
            "idjur" =>$this->input->post('idjur', true),
            "nama" =>$this->input->post('nama', true),
        ];

        $this->db->where('idjur', $this->input->post('idjur'));
        $this->db->update('jurusan', $data);
    }

    public function cariDataJurusan()
    {
        # code...
        $kunci = $this->input->post('kunci', true);
        $this->db->like('idjur', $kunci);
        $this->db->or_like('nama', $kunci);
        return $this->db->get('jurusan')->result_array();
    }

 
  }
