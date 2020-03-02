<?php defined('BASEPATH') or exit('No direct script access allowed');

class Inventaris extends CI_controller
{
    public function __construct()
    {   
        parent::__construct();
        $this->load->library('Pdf');
        $this->load->model('model_inventaris');
    }

    // INVENTARIS

    public function index()
	{

		$data['title'] = 'Inventaris';
		$data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['inventaris'] = $this->db->get('inventaris')->result_array();

        
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Data inventaris Tanggal '.date('d-m-y', strtotime($tgl));
                $url_cetak = 'transaksi/cetak?filter=1&tanggal='.$tgl;
                $transaksi = $this->model_inventaris->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'transaksi/cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi = $this->model_inventaris->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Transaksi Tahun '.$tahun;
                $url_cetak = 'transaksi/cetak?filter=3&tahun='.$tahun;
                $transaksi = $this->model_inventaris->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $url_cetak = 'transaksi/cetak';
            $transaksi = $this->model_inventaris->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

		$data['ket'] = $ket;
		$data['url_cetak'] = base_url('index.php/'.$url_cetak);
		$data['transaksi'] = $transaksi;
        $data['option_tahun'] = $this->model_inventaris->option_tahun();


        
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('uraian', 'Uraian', 'required');
        $this->form_validation->set_rules('kwantitas', 'Kwantitas', 'required');
        $this->form_validation->set_rules('keadaan', 'Keadaan', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

    if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('inventaris/index', $data);
        $this->load->view('templates/footer');
    } else {
        # code...
        $data = [
            'no_inventaris' => $this->input->post('no_inventaris'),
            'nama' => $this->input->post('nama'),
            'uraian' => $this->input->post('uraian'),
            'kwantitas' => $this->input->post('kwantitas'),
            'tgl_perolehan' => $this->input->post('tgl_perolehan'),
            'asal_barang' => $this->input->post('asal_barang'),
            'keadaan' => $this->input->post('keadaan'),
            'harga' => $this->input->post('harga'),
            'keterangan' => $this->input->post('keterangan')
        ];
        $this->db->insert('inventaris', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New inventaris added!</div>');
        redirect('inventaris/index');
    }
}

    public function hapus($id)
    {
        $this->db->where('idinventaris', $id);
		$this->db->delete('inventaris');
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('inventaris/index');
    }

    public function lihat($id)
    {
        $data['title'] = 'Lihat Detail Inventaris';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['inventaris'] = $this->db->get('inventaris', ['idinventaris' =>$id])->row_array();
    
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('inventaris/lihatinv', $data);
        $this->load->view('templates/footer');

    }

    public function cetak($id)
    {
        $data['inventaris'] = $this->model_inventaris->getInventarisIdd($id);
        $this->load->view('inventaris/cetakinv', $data);
    }

    
    public function ubah ($id)
    {
        $data['title'] = 'Edit Inventaris';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
    
            $data['inventaris'] = $this->model_inventaris->getInventarisId($id);
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('inventaris/ubahinv', $data);
            $this->load->view('templates/footer');
}

public function actioneditInventaris()
{
    $data['title'] = 'Edit Inventaris';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();    
        
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('inventaris/ubahinv', $data);
        $this->load->view('templates/footer');
        
        $idinventaris = $this->input->post('idinventaris');
        $data = [
            'no_inventaris' => $this->input->post('no_inventaris'),
            'nama' => $this->input->post('nama'),
            'uraian' => $this->input->post('uraian'),
            'kwantitas' => $this->input->post('kwantitas'),
            'tgl_perolehan' => $this->input->post('tgl_perolehan'),
            'asal_barang' => $this->input->post('asal_barang'),
            'keadaan' => $this->input->post('keadaan'),
            'harga' => $this->input->post('harga'),
            'keterangan' => $this->input->post('keterangan')
        ];

        $this->db->where('idinventaris', $idinventaris);
        $this->db->update('inventaris', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New inventaris Updated!</div>');
        redirect('inventaris/index');
}

    // PEMBELIAN

    public function pembelian()
	{
		$data['title'] = 'Pembelian';
		$data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['pembelian'] = $this->db->get('pembelian')->result_array();
        
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('uraian', 'Uraian', 'required');
        $this->form_validation->set_rules('kwantitas', 'Kwantitas', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

    if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('inventaris/pembelian', $data);
        $this->load->view('templates/footer');
    } else {
        # code...
        $data = [
            'tgl_beli' => $this->input->post('tgl_beli'),
            'nama' => $this->input->post('nama'),
            'uraian' => $this->input->post('uraian'),
            'kwantitas' => $this->input->post('kwantitas'),
            'harga' => $this->input->post('harga'),
            'cara_bayar' => $this->input->post('cara_bayar'),
            'tgl_terima' => $this->input->post('tgl_terima'),
            'keterangan' => $this->input->post('keterangan')
        ];
        $this->db->insert('pembelian', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pembelian Inventaris Telah Ditambahkan!</div>');
        redirect('inventaris/pembelian');
    }
}

public function hapusbeli($id)
{
    $this->db->where('idpembelian', $id);
    $this->db->delete('pembelian');
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('inventaris/pembelian');
}

public function lihatbeli($id)
{
    $data['title'] = 'Lihat Detail Pembelian';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['pembelian'] = $this->db->get('pembelian', ['idpembelian' =>$id])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('inventaris/lihatbeli', $data);
    $this->load->view('templates/footer');
}
public function ubahbeli ($id)
    {
        $data['title'] = 'Edit Inventaris';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
    
        $data['pembelian'] = $this->model_inventaris->getPembelianId($id);
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('inventaris/ubahbeli', $data);
            $this->load->view('templates/footer');
}

public function actioneditPembelian()
{
    $data['title'] = 'Edit Pembelian';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();    
        
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('inventaris/ubahbeli', $data);
        $this->load->view('templates/footer');
        
        $idpembelian = $this->input->post('idpembelian');
        $data = [
            'tgl_beli' => $this->input->post('tgl_beli'),
            'nama' => $this->input->post('nama'),
            'uraian' => $this->input->post('uraian'),
            'kwantitas' => $this->input->post('kwantitas'),
            'harga' => $this->input->post('harga'),
            'cara_bayar' => $this->input->post('cara_bayar'),
            'tgl_terima' => $this->input->post('tgl_terima'),
            'keterangan' => $this->input->post('keterangan')
        ];

        $this->db->where('idpembelian', $idpembelian);
        $this->db->update('pembelian', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pembelian Diubah 8!</div>');
        redirect('inventaris/pembelian');
}

    // PENGADAAN

    public function pengadaan()
	{
		$data['title'] = 'Pengadaan';
		$data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['pengadaan'] = $this->db->get('pengadaan')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('barang', 'barang', 'required');

    if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('inventaris/pengadaan', $data);
        $this->load->view('templates/footer');
    } else {
        # code...
        $data = [
            'idpengadaan' => $this->input->post('idpengadaan'),
            'nama' => $this->input->post('nama'),
            'jabatan' => $this->input->post('jabatan'),
            'jns_barang' => $this->input->post('jns_barang'),
            'barang' => $this->input->post('barang'),
            'jumlah' => $this->input->post('jumlah'),
            'harga' => $this->input->post('harga'),
            'tgl_pengajuan' => $this->input->post('tgl_pengajuan'),
            'menyetujui' => $this->input->post('menyetujui'),
        ];
        $this->db->insert('pengadaan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pengadaan Inventaris Ditambahkan!</div>');
        redirect('inventaris/pengadaan');
    }
}


public function hapusada($id)
{
    $this->db->where('idpengadaan', $id);
    $this->db->delete('pengadaan');
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('inventaris/pengadaan');
}

public function lihatada($id)
{
    $data['title'] = 'Lihat Detail Pengadaan';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['pengadaan'] = $this->db->get('pengadaan', ['idpengadaan' =>$id])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('inventaris/lihatada', $data);
    $this->load->view('templates/footer');
}
public function ubahada ($id)
    {
        $data['title'] = 'Edit Pengadaan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
    
        $data['pengadaan'] = $this->model_inventaris->getPengadaanId($id);
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('inventaris/ubahada', $data);
            $this->load->view('templates/footer');
}

public function actioneditPengadaan()
{
    $data['title'] = 'Edit Pengadaan';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();    
        
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('inventaris/ubahada', $data);
        $this->load->view('templates/footer');
        
        $idpengadaan = $this->input->post('idpengadaan');
        $data = [
            'nama' => $this->input->post('nama'),
            'jabatan' => $this->input->post('jabatan'),
            'jns_barang' => $this->input->post('jns_barang'),
            'barang' => $this->input->post('barang'),
            'jumlah' => $this->input->post('jumlah'),
            'harga' => $this->input->post('harga'),
            'tgl_pengajuan' => $this->input->post('tgl_pengajuan'),
            'menyetujui' => $this->input->post('menyetujui')
        ];

        $this->db->where('idpengadaan', $idpengadaan);
        $this->db->update('pengadaan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pengadaan Diubah !</div>');
        redirect('inventaris/pengadaan');
}

    // PEMINJAMAN

    public function peminjaman()
	{
		$data['title'] = 'Peminjaman';
		$data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['peminjaman'] = $this->db->get('peminjaman')->result_array();
        
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('peminjam', 'Peminjam', 'required');
        $this->form_validation->set_rules('petugas', 'Petugas', 'required');

    if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('inventaris/peminjaman', $data);
        $this->load->view('templates/footer');
    } else {
        # code...
        $data = [
            'nama_barang' => $this->input->post('nama_barang'),
            'jumlah' => $this->input->post('jumlah'),
            'keperluan' => $this->input->post('keperluan'),
            'tgl_pinjam' => $this->input->post('tgl_pinjam'),
            'tgl_kembali' => $this->input->post('tgl_kembali'),
            'peminjam' => $this->input->post('peminjam'),
            'petugas' => $this->input->post('petugas')
        ];
        $this->db->insert('peminjaman', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Peminjaman Ditambahkan!</div>');
        redirect('inventaris/peminjaman');
    }
    }
    
public function hapuspinjam($id)
{
    $this->db->where('idpeminjaman', $id);
    $this->db->delete('peminjaman');
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('inventaris/peminjaman');
}

public function lihatpinjam($id)
{
    $data['title'] = 'Lihat Detail Peminjaman';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['peminjaman'] = $this->db->get('peminjaman', ['idpeminjaman' =>$id])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('inventaris/lihatpinjam', $data);
    $this->load->view('templates/footer');
}
public function ubahpinjam ($id)
    {
        $data['title'] = 'Edit Peminjaman';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
    
        $data['peminjaman'] = $this->model_inventaris->getPeminjamanId($id);
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('inventaris/ubahpinjam', $data);
            $this->load->view('templates/footer');
}

public function actioneditPeminjaman()
{
    $data['title'] = 'Edit Peminjaman';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();    
        
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('inventaris/ubahpinjam', $data);
        $this->load->view('templates/footer');
        
        $idpeminjaman = $this->input->post('idpeminjaman');
        $data = [
            'nama_barang' => $this->input->post('nama_barang'),
            'jumlah' => $this->input->post('jumlah'),
            'keperluan' => $this->input->post('keperluan'),
            'tgl_pinjam' => $this->input->post('tgl_pinjam'),
            'tgl_kembali' => $this->input->post('tgl_kembali'),
            'peminjam' => $this->input->post('peminjam'),
            'petugas' => $this->input->post('petugas')
        ];

        $this->db->where('idpeminjaman', $idpeminjaman);
        $this->db->update('peminjaman', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Peminjaman Diubah !</div>');
        redirect('inventaris/peminjaman');
}

    //PENGHAPUSAN

public function penghapusan()
	{
		$data['title'] = 'Penghapusan';
		$data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['penghapusan'] = $this->db->get('penghapusan')->result_array();
        
        $this->form_validation->set_rules('nama_barang', 'Nama', 'required');
        $this->form_validation->set_rules('kondisi', 'Kondisi', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

    if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('inventaris/penghapusan', $data);
        $this->load->view('templates/footer');
    } else {
        # code...
        $data = [
            'idpenghapusan' => $this->input->post('idpenghapusan'),
            'tanggal_perolehan' => $this->input->post('tanggal_perolehan'),
            'no_inventaris' => $this->input->post('no_inventaris'),
            'nama_barang' => $this->input->post('nama_barang'),
            'uraian' => $this->input->post('uraian'),
            'kondisi' => $this->input->post('kondisi'),
            'dihapus' => $this->input->post('dihapus'),
            'keterangan' => $this->input->post('keterangan')
        ];
        $this->db->insert('penghapusan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Penghapusan Ditambahkan!</div>');
        redirect('inventaris/penghapusan');
    }
}

  
public function hapuspenghapusan($id)
{
    $this->db->where('idpenghapusan', $id);
    $this->db->delete('penghapusan');
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('inventaris/penghapusan');
}

public function lihathapus($id)
{
    $data['title'] = 'Lihat Detail Penghapusan';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['penghapusan'] = $this->db->get('penghapusan', ['idpenghapusan' =>$id])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('inventaris/lihathapus', $data);
    $this->load->view('templates/footer');
}

public function ubahhapus ($id)
    {
        $data['title'] = 'Edit Penghapusan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
    
        $data['penghapusan'] = $this->model_inventaris->getPenghapusanId($id);
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('inventaris/ubahhapus', $data);
            $this->load->view('templates/footer');
}

public function actioneditPenghapusan()
{
    $data['title'] = 'Edit Penghapusan';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();    
        
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('inventaris/ubahhapus', $data);
        $this->load->view('templates/footer');
        
        $idpenghapusan = $this->input->post('idpenghapusan');
        $data = [
            'tanggal_perolehan' => $this->input->post('tanggal_perolehan'),
            'no_inventaris' => $this->input->post('no_inventaris'),
            'nama_barang' => $this->input->post('nama_barang'),
            'uraian' => $this->input->post('uraian'),
            'kondisi' => $this->input->post('kondisi'),
            'dihapus' => $this->input->post('dihapus'),
            'keterangan' => $this->input->post('keterangan')
        ];

        $this->db->where('idpenghapusan', $idpenghapusan);
        $this->db->update('penghapusan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Penghapusan Diubah !</div>');
        redirect('inventaris/penghapusan');
}

    //PENYUSUTAN

public function penyusutan()
	{
		$data['title'] = 'Penyusutan';
		$data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['penyusutan'] = $this->db->get('penyusutan')->result_array();

        $this->form_validation->set_rules('uraian', 'uraian', 'required');
        $this->form_validation->set_rules('kondisi', 'kondisi', 'required');


    if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('inventaris/penyusutan', $data);
        $this->load->view('templates/footer');
    } else {
        # code...
        $data = [
            'idpenyusutan' => $this->input->post('idpenyusutan'),
            'tgl_perolehan' => $this->input->post('tgl_perolehan'),
            'no_inventaris' => $this->input->post('no_inventaris'),
            'nama_barang' => $this->input->post('nama_barang'),
            'uraian' => $this->input->post('uraian'),
            'kondisi' => $this->input->post('kondisi'),
            'minggu_penyusutan' => $this->input->post('minggu_penyusutan')
        ];
        $this->db->insert('penyusutan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Penyusutan Telah Ditambah!</div>');
        redirect('inventaris/penyusutan');
    }   
}

    
public function hapussusut($id)
{
    $this->db->where('idpenyusu', $id);
    $this->db->delete('penyusutan');
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('inventaris/penyusutan');
}

public function lihatsusut($id)
{
    $data['title'] = 'Lihat Detail Penyusutan';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['penyusutan'] = $this->db->get('penyusutan', ['idpenyusutan' =>$id])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('inventaris/lihatsusut', $data);
    $this->load->view('templates/footer');
}
public function ubahsusut ($id)
    {
        $data['title'] = 'Edit Penyusutan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
    
        $data['penyusutan'] = $this->model_inventaris->getPenyusutanId($id);
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('inventaris/ubahsusut', $data);
            $this->load->view('templates/footer');
}

public function actioneditPenyusutan()
{
    $data['title'] = 'Edit Penyusutan';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();    
        
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('inventaris/ubahsusut', $data);
        $this->load->view('templates/footer');
        
        $idpenyusutan = $this->input->post('idpenyusutan');
        $data = [
            'tgl_perolehan' => $this->input->post('tgl_perolehan'),
            'no_inventaris' => $this->input->post('no_inventaris'),
            'nama_barang' => $this->input->post('nama_barang'),
            'uraian' => $this->input->post('uraian'),
            'kondisi' => $this->input->post('kondisi'),
            'minggu_penyusutan' => $this->input->post('minggu_penyusutan')
        ];

        $this->db->where('idpenyusutan', $idpenyusutan);
        $this->db->update('penyusutan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Penyusutan Diubah !</div>');
        redirect('inventaris/penyusutan');
}
}
