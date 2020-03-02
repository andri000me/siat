<?php
  class Model_mapel extends CI_Model {
 
    public function getMapel()
    {
    	// echo "ok";
        return $this->db->get('mapel')->result_array();   
    }

    public function tambahDataMapel()
    {
    	# code...
    	$data =[
    		"idmapel" =>$this->input->post('idmapel', true),
    		"nmapel" =>$this->input->post('nmapel', true),
    	];
    	$this->db->insert('mapel', $data);
    }
    public function hapusDataMapel($idmapel)
    {
        # code...
        $this->db->where('idmapel', $idmapel);
        $this->db->delete('mapel');
    }
    public function getMapelId($idmapel)
    {
		# code...
		$mapel = $this->db->get_where('mapel',['idmapel' => $idmapel])->row_array();
        return $mapel['mapel'];
    }

    public function ubahDataMapel()
    {
        # code...
        $data =[
            "idmapel" =>$this->input->post('idmapel', true),
            "nmapel" =>$this->input->post('nmapel', true),
        ];

        $this->db->where('idmapel', $this->input->post('idmapel'));
        $this->db->update('mapel', $data);
    }

    public function cariDataMapel()
    {
        # code...
        $kunci = $this->input->post('kunci', true);
        $this->db->like('nmapel', $kunci);
        $this->db->or_like('idmapel', $kunci);
        return $this->db->get('mapel')->result_array();
    }

 
  }
