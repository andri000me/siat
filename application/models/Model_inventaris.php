<?php
  class Model_inventaris extends CI_Model {

    function __construct()
	{
		parent::__construct();
    }

    //INVENTARIS

    public function getInventarisId($id)
    {
      $hsl=$this->db->query("SELECT * FROM inventaris WHERE idinventaris='$id'");
      if($hsl->num_rows()>0){
          foreach ($hsl->result() as $data) {
          $hsl=array(
          'idinventaris' =>$data->idinventaris,
          'no_inventaris' =>$data->no_inventaris,
          'nama' => $data->nama,
          'uraian' => $data->uraian,
          'kwantitas' => $data->kwantitas,
          'tgl_perolehan' => $data->tgl_perolehan,
          'asal_barang' => $data->asal_barang,
          'keadaan' => $data->keadaan,
          'harga' => $data->harga,
          'keterangan' => $data->keterangan);
          }
      }
      return $hsl;
    }

    public function getInventarisIdd($id)
    {
    $query = $this->db->get_where('inventaris',['idinventaris' => id]);
    return $query->result_array();
    }

    public function updatedata($data, $idinventaris)
    {
        $this->db->where('idinventaris', $idinventaris);
        $this->db->update("inventaris", $data);
    }

    public function ubahDataInventaris($id)
    {
      $data = [
        'no_inventaris' => $this->input->post('no_inventaris', true),
        'nama' => $this->input->post('nama', true),
        'uraian' => $this->input->post('uraian', true),
        'kwantitas' => $this->input->post('kwantitas', true),
        'tgl_perolehan' => $this->input->post('tgl_perolehan', true),
        'asal_barang' => $this->input->post('asal_barang', true),
        'keadaan' => $this->input->post('keadaan', true),
        'harga' => $this->input->post('harga', true),
        'keterangan' => $this->input->post('keterangan', true)
    ];

    $this->db->where('idinventaris',$id);
    $this->db->update('inventaris', $data);
    }

    //PEMBELIAN
  
  public function getPembelianId($id)
  {
    $hsl=$this->db->query("SELECT * FROM pembelian WHERE idpembelian='$id'");
    if($hsl->num_rows()>0){
        foreach ($hsl->result() as $data) {
        $hasil=array(
        'idpembelian' =>$data->idpembelian,
        'tgl_beli' =>$data->tgl_beli,
        'nama' => $data->nama,
        'uraian' => $data->uraian,
        'kwantitas' => $data->kwantitas,
        'harga' => $data->harga,
        'cara_bayar' => $data->cara_bayar,
        'tgl_terima' => $data->tgl_terima,
        'keterangan' => $data->keterangan);
        }
    }
    return $hasil;
  }

  public function updatedatapembelian($data, $idpembelian)
  {
      $this->db->where('idpembelian', $idpembelian);
      $this->db->update("pembelian", $data);
  }

  public function ubahDataPembelian($id)
  {
    $data = [
      'tgl_beli' => $this->input->post('tgl_beli', true),
      'nama' => $this->input->post('nama', true),
      'uraian' => $this->input->post('uraian', true),
      'kwantitas' => $this->input->post('kwantitas', true),
      'harga' => $this->input->post('harga', true),
      'cara_bayar' => $this->input->post('cara_bayar', true),
      'tgl_terima' => $this->input->post('tgl_terima', true),
      'keterangan' => $this->input->post('keterangan', true)
  ];

  $this->db->where('idpembelian',$id);
  $this->db->update('pembelian', $data);
  }

  //PENGADAAN

  public function getPengadaanId($id)
  {
    $hsl=$this->db->query("SELECT * FROM pengadaan WHERE idpengadaan='$id'");
    if($hsl->num_rows()>0){
        foreach ($hsl->result() as $data) {
        $hasil=array(
        'idpengadaan' =>$data->idpengadaan,
        'nama' =>$data->nama,
        'jabatan' => $data->jabatan,
        'jns_barang' => $data->jns_barang,
        'barang' => $data->barang,
        'jumlah' => $data->jumlah,
        'harga' => $data->harga,
        'tgl_pengajuan' => $data->tgl_pengajuan,
        'menyetujui' => $data->menyetujui);
        }
    }
    return $hasil;
  }

  public function updatedataPengadaan($data, $idpengadaan)
  {
      $this->db->where('idpengadaan', $idpengadaan);
      $this->db->update("pengadaan", $data);
  }

  public function ubahDataPengadaan($id)
  {
    $data = [
      'nama' => $this->input->post('nama', true),
      'jabatan' => $this->input->post('jabatan', true),
      'jns_barang' => $this->input->post('jns_barang', true),
      'barang' => $this->input->post('barang', true),
      'jumlah' => $this->input->post('jumlah', true),
      'harga' => $this->input->post('harga', true),
      'tgl_pengajuan' => $this->input->post('tgl_pengajuan', true),
      'menyetujui' => $this->input->post('menyetujui', true)
  ];

  $this->db->where('idpengadaan',$id);
  $this->db->update('pengadaan', $data);
  }

  //PEMINJAMAN

  public function getPeminjamanId($id)
  {
    $hsl=$this->db->query("SELECT * FROM peminjaman WHERE idpeminjaman='$id'");
    if($hsl->num_rows()>0){
        foreach ($hsl->result() as $data) {
        $hasil=array(
        'idpeminjaman' =>$data->idpeminjaman,
        'nama_barang' =>$data->nama_barang,
        'jumlah' => $data->jumlah,
        'keperluan' => $data->keperluan,
        'tgl_pinjam' => $data->tgl_pinjam,
        'tgl_kembali' => $data->tgl_kembali,
        'peminjam' => $data->peminjam,
        'petugas' => $data->petugas);
        }
    }
    return $hasil;
  }

  public function updatedataPeminjaman($data, $idpeminjaman)
  {
      $this->db->where('idpeminjaman', $idpeminjaman);
      $this->db->update("peminjaman", $data);
  }

  public function ubahDataPeminjaman($id)
  {
    $data = [
      'nama_barang' => $this->input->post('nama_barang', true),
      'jumlah' => $this->input->post('jumlah', true),
      'keperluan' => $this->input->post('keperluan', true),
      'tgl_pinjam' => $this->input->post('tgl_pinjam', true),
      'tgl_kembali' => $this->input->post('tgl_kembali', true),
      'peminjam' => $this->input->post('peminjam', true),
      'petugas' => $this->input->post('petugas', true)
  ];

  $this->db->where('idpeminjaman',$id);
  $this->db->update('peminjaman', $data);
  }

  //PENYUSUTAN

  public function getPenyusutanId($id)
  {
    $hsl=$this->db->query("SELECT * FROM penyusutan WHERE idpenyusutan='$id'");
    if($hsl->num_rows()>0){
        foreach ($hsl->result() as $data) {
        $hasil=array(
        'idpenyusutan' =>$data->idpenyusutan,
        'tgl_perolehan' =>$data->tgl_perolehan,
        'no_inventaris' => $data->no_inventaris,
        'nama_barang' => $data->nama_barang,
        'uraian' => $data->uraian,
        'kondisi' => $data->kondisi,
        'minggu_penyusutan' => $data->minggu_penyusutan);
        }
    }
    return $hasil;
  }

  public function updatedataPenyusutan($data, $idpenyusutan)
  {
      $this->db->where('idpenyusutan', $idpenyusutan);
      $this->db->update("penyusutan", $data);
  }

  public function ubahDataPenyusutan($id)
  {
    $data = [
      'tgl_perolehan' => $this->input->post('tgl_perolehan', true),
      'no_inventaris' => $this->input->post('no_inventaris', true),
      'nama_barang' => $this->input->post('nama_barang', true),
      'uraian' => $this->input->post('uraian', true),
      'kondisi' => $this->input->post('kondisi', true),
      'minggu_penyusutan' => $this->input->post('minggu_penyusutan', true)
  ];

  $this->db->where('idpenyusutan',$id);
  $this->db->update('penyusutan', $data);
  }


  //PENGHAPUSAN

  public function getPenghapusanId($id)
  {
    $hsl=$this->db->query("SELECT * FROM penghapusan WHERE idpenghapusan='$id'");
    if($hsl->num_rows()>0){
        foreach ($hsl->result() as $data) {
        $hasil=array(
          'idpenghapusan' =>$data->idpenghapusan,
        'tanggal_perolehan' =>$data->tanggal_perolehan,
        'no_inventaris' =>$data->no_inventaris,
        'nama_barang' => $data->nama_barang,
        'uraian' => $data->uraian,
        'kondisi' => $data->kondisi,
        'dihapus' => $data->dihapus,
        'keterangan' => $data->keterangan);
        }
    }
    return $hasil;
  }

  public function updatedataPenghapusan($data, $idpenghapusan)
  {
      $this->db->where('idpenghapusan', $idpenghapusan);
      $this->db->update("penghapusan", $data);
  }

  public function ubahDataPenghapusan($id)
  {
    $data = [
      'tanggal_perolehan' => $this->input->post('tanggal_perolehan', true),
      'no_inventaris' => $this->input->post('no_inventaris', true),
      'nama_barang' => $this->input->post('nama_barang', true),
      'uraian' => $this->input->post('uraian', true),
      'kondisi' => $this->input->post('kondisi', true),
      'dihapus' => $this->input->post('dihapus', true),
      'keterangan' => $this->input->post('keterangan', true)
  ];

  $this->db->where('idpenghapusan',$id);
  $this->db->update('penghapusan', $data);
  }

  public function view_by_date($date){
    $this->db->where('DATE(tgl_perolehan)', $date); // Tambahkan where tanggal nya
    
return $this->db->get('inventaris')->result();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
}

public function view_by_month($month, $year){
    $this->db->where('MONTH(tgl_perolehan)', $month); // Tambahkan where bulan
    $this->db->where('YEAR(tgl_perolehan)', $year); // Tambahkan where tahun
    
return $this->db->get('inventaris')->result(); // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
}

public function view_by_year($year){
    $this->db->where('YEAR(tgl_perolehan)', $year); // Tambahkan where tahun
    
return $this->db->get('inventaris')->result(); // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
}

public function view_all(){
return $this->db->get('inventaris')->result(); // Tampilkan semua data transaksi
}


public function option_tahun(){
  $this->db->select('YEAR(tgl_perolehan) AS tahun'); // Ambil Tahun dari field tgl_perolehan
  $this->db->from('inventaris'); // select ke tabel transaksi
  $this->db->order_by('YEAR(tgl_perolehan)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
  $this->db->group_by('YEAR(tgl_perolehan)'); // Group berdasarkan tahun pada field tgl
  
  return $this->db->get()->result(); // Ambil data pada tabel transaksi sesuai kondisi diatas
}
}