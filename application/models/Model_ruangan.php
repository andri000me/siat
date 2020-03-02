<?php
  class Model_ruangan extends CI_Model {
 
    public function getRuangan()
    {
    	// echo "ok";
        return $this->db->get('ruangan')->result_array();   
    }

    public function tambahDataRuangan()
    {
    	# code...
    	$data =[
    		"idroom" =>$this->input->post('idroom', true),
    		"namaroom" =>$this->input->post('namaroom', true),
    	];
    	$this->db->insert('ruangan', $data);
    }
    public function hapusDataRuangan($idroom)
    {
        # code...
        $this->db->where('idroom', $idroom);
        $this->db->delete('ruangan');
    }
    public function getRuanganId($idroom)
    {
        # code...
        return $this->db->get_where('ruangan',['idroom' => $idroom])->row_array();
    }

    public function ubahDataRuangan()
    {
        # code...
        $data =[
            "idroom" =>$this->input->post('idroom', true),
            "namaroom" =>$this->input->post('namaroom', true),
        ];

        $this->db->where('idroom', $this->input->post('idroom'));
        $this->db->update('ruangan', $data);
    }

    public function cariDataRuangan()
    {
        # code...
        $kunci = $this->input->post('kunci', true);
        $this->db->like('idroom', $kunci);
        $this->db->or_like('namaroom', $kunci);
        return $this->db->get('ruangan')->result_array();
    }

 
  }
