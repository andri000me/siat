<?php
  class Model_wali extends CI_Model {
 
    public function getWali()
    {
        // echo "ok";
        return $this->db->get('walisiswa')->result_array();   
    }

    public function tambahDataWali()
    {
        # code...
        $data =[
            "idwali" =>$this->input->post('idwali', true),
            "nama" =>$this->input->post('nama', true),
            "alamat" =>$this->input->post('alamat', true),
            "telepon" =>$this->input->post('telepon', true),
            "agama" =>$this->input->post('agama', true),
            
        ];
        $this->db->insert('walisiswa', $data);
    }
    public function hapusDataWali($idwali)
    {
        # code...
        $this->db->where('idwali', $idwali);
        $this->db->delete('walisiswa');
    }
    public function getWaliId($idwali)
    {
        # code...
        return $this->db->get_where('walisiswa',['idwali' => $idwali])->row_array();
    }

    public function ubahDataWali()
    {
        # code...
        $data =[
            "idwali" =>$this->input->post('idwali', true),
            "nama" =>$this->input->post('nama', true),
            "alamat" =>$this->input->post('alamat', true),
            "telepon" =>$this->input->post('telepon', true),
            "agama" =>$this->input->post('agama', true),
            
        ];

        $this->db->where('idwali', $this->input->post('idwali'));
        $this->db->update('walisiswa', $data);
    }

    public function cariDataWali()
    {
        # code...
        $kunci = $this->input->post('kunci', true);
        $this->db->like('idwali', $kunci);
        $this->db->or_like('nama', $kunci);
        $this->db->or_like('agama', $kunci);
        $this->db->or_like('alamat', $kunci);
        return $this->db->get('walisiswa')->result_array();
    }

 
  }
