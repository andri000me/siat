<?php
  class Model_siswa extends CI_Model {
 
    public function getSiswa()
    {
        // echo "ok";
        return $this->db->get('siswa')->result_array();   
    }

    public function tambahDataSiswa()
    {
        # code...
        $data =[
            "nis" =>$this->input->post('nis', true),
            "nama" =>$this->input->post('nama', true),
            "gender" =>$this->input->post('gender', true),
            "tglahir" =>$this->input->post('tglahir', true),
            "tlahir" =>$this->input->post('tlahir', true),
            "agama" =>$this->input->post('agama', true),
            "alamat" =>$this->input->post('alamat', true),
        ];
        $this->db->insert('siswa', $data);
    }
    public function hapusDataSiswa($nis)
    {
        # code...
        $this->db->where('nis', $nis);
        $this->db->delete('siswa');
    }
    public function getSiswaId($nis)
    {
        # code...
        return $this->db->get_where('siswa',['nis' => $nis])->row_array();
    }

    public function ubahDataSiswa()
    {
        # code...
        $data =[
            "nis" =>$this->input->post('nis', true),
            "nama" =>$this->input->post('nama', true),
            "gender" =>$this->input->post('gender', true),
            "tglahir" =>$this->input->post('tglahir', true),
            "tlahir" =>$this->input->post('tlahir', true),
            "agama" =>$this->input->post('agama', true),
            "alamat" =>$this->input->post('alamat', true),
        ];

        $this->db->where('nis', $this->input->post('nis'));
        $this->db->update('siswa', $data);
    }

    public function cariDataSiswa()
    {
        # code...
        $kunci = $this->input->post('kunci', true);
        $this->db->like('nis', $kunci);
        $this->db->or_like('nama', $kunci);
        $this->db->or_like('gender', $kunci);
        $this->db->or_like('tlahir', $kunci);
        $this->db->or_like('alamat', $kunci);
        return $this->db->get('siswa')->result_array();
    }

    //hehe

    public function getfilterkelasjurusan($idkelas, $jurusan)
    {
        # code...

        $sql = " SELECT * FROM `siswa` LEFT JOIN kelas on siswa.idkelas = kelas.idkelas LEFT JOIN jurusan on kelas.fk_idjurusan = jurusan.idjurusan WHERE siswa.idkelas = '{$idkelas}' AND kelas.fk_idjurusan = '{$jurusan}' ";
        $filter = $this->db->query($sql)->result_array();
        return $filter;
    }

    //hehe


 
  }
