<?php
  class Model_karyawan extends CI_Model {
 
    public function getKaryawan()
    {
    	// echo "ok";
        return $this->db->get('karyawan')->result_array();   
    }

    public function tambahDataKaryawan()
    {
    	# code...
    	$data =[
    		"idkar" =>$this->input->post('idkar', true),
    		"nama" =>$this->input->post('nama', true),
    		"jabatan" =>$this->input->post('jabatan', true),
    		"gender" =>$this->input->post('gender', true),
    		"agama" =>$this->input->post('agama', true),
    	];
    	$this->db->insert('karyawan', $data);
    }
    public function hapusDataKaryawan($idkar)
    {
        # code...
        $this->db->where('idkar', $idkar);
        $this->db->delete('karyawan');
    }
    public function getKaryawanId($idkar)
    {
        # code...
        return $this->db->get_where('karyawan',['idkar' => $idkar])->row_array();
    }

    public function ubahDataKaryawan()
    {
        # code...
        $data =[
            "idkar" =>$this->input->post('idkar', true),
            "nama" =>$this->input->post('nama', true),
            "jabatan" =>$this->input->post('jabatan', true),
            "gender" =>$this->input->post('gender', true),
            "agama" =>$this->input->post('agama', true),
        ];

        $this->db->where('idkar', $this->input->post('idkar'));
        $this->db->update('karyawan', $data);
    }

    public function cariDataKaryawan()
    {
        # code...
        $kunci = $this->input->post('kunci', true);
        $this->db->like('nama', $kunci);
        $this->db->or_like('agama', $kunci);
        $this->db->or_like('jabatan', $kunci);
        $this->db->or_like('idkar', $kunci);
        $this->db->or_like('gender', $kunci);
        return $this->db->get('karyawan')->result_array();
    }

 
  }
