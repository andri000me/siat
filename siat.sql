-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2020 at 04:45 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siat`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `idabsensi` int(11) NOT NULL,
  `idkelas` int(11) NOT NULL,
  `idmapel` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nis` int(11) NOT NULL,
  `status` enum('m','i','a','s') NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`idabsensi`, `idkelas`, `idmapel`, `tanggal`, `nis`, `status`, `keterangan`) VALUES
(7, 1, 1, '2019-07-11', 36471146, 'm', ''),
(8, 1, 1, '2019-07-11', 28355850, 'i', ''),
(9, 3, 1, '2019-07-11', 20121151, 'm', ''),
(10, 1, 1, '2019-07-12', 36471146, 'm', ''),
(11, 1, 1, '2019-07-12', 28355850, 'a', ''),
(12, 1, 1, '2019-07-12', 132132123, 'i', ''),
(13, 1, 1, '2019-09-02', 36471146, 'i', 'dd'),
(14, 1, 1, '2019-09-02', 28355850, 'i', 'dd');

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `idagama` int(11) NOT NULL,
  `agama` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`idagama`, `agama`) VALUES
(1, 'islam'),
(2, 'kristen'),
(3, 'katolik'),
(4, 'hindu'),
(5, 'budha'),
(6, 'kong hu chu');

-- --------------------------------------------------------

--
-- Table structure for table `banyaknilai`
--

CREATE TABLE `banyaknilai` (
  `idbanyaknilai` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `fkidratanilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banyaknilai`
--

INSERT INTO `banyaknilai` (`idbanyaknilai`, `nilai`, `fkidratanilai`) VALUES
(1, 90, 1),
(2, 90, 2),
(3, 90, 3),
(4, 90, 4),
(44, 100, 3),
(45, 100, 1),
(46, 100, 1),
(47, 100, 2),
(48, 90, 1),
(49, 100, 1),
(50, 100, 2),
(51, 100, 2),
(52, 100, 2),
(53, 100, 4),
(54, 100, 4),
(55, 98, 1),
(56, 80, 1),
(57, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `daftar`
--

CREATE TABLE `daftar` (
  `id` int(11) NOT NULL,
  `tingkat` int(11) NOT NULL,
  `idjurusan` int(11) NOT NULL,
  `idkelas` int(11) NOT NULL,
  `idmapel` int(11) NOT NULL,
  `idguru` int(11) NOT NULL,
  `jam` varchar(128) NOT NULL,
  `tanggal` date NOT NULL,
  `idruangan` varchar(128) NOT NULL,
  `hari` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar`
--

INSERT INTO `daftar` (`id`, `tingkat`, `idjurusan`, `idkelas`, `idmapel`, `idguru`, `jam`, `tanggal`, `idruangan`, `hari`) VALUES
(1, 1, 1, 1, 1, 1, '08:00', '0000-00-00', '1', 'senin');

-- --------------------------------------------------------

--
-- Table structure for table `ekstra`
--

CREATE TABLE `ekstra` (
  `idekstra` int(11) NOT NULL,
  `kd_ekstra` varchar(128) NOT NULL,
  `ekstra` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ekstra`
--

INSERT INTO `ekstra` (`idekstra`, `kd_ekstra`, `ekstra`) VALUES
(1, 'PMR', 'Palang Merah Remaja'),
(2, 'PMK', 'Pramuka'),
(3, 'TBS', 'Tata Busana'),
(4, 'TBG', 'Tata Boga'),
(5, 'TS', 'Tapak Suci'),
(6, 'HW', 'Hisbul Wathan'),
(7, 'IPM', 'Ikatan Pelajar Muhammadiyah');

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `idinventaris` int(11) NOT NULL,
  `no_inventaris` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `uraian` varchar(128) NOT NULL,
  `kwantitas` int(11) NOT NULL,
  `tgl_perolehan` date NOT NULL,
  `asal_barang` varchar(128) NOT NULL,
  `keadaan` varchar(128) NOT NULL,
  `harga` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`idinventaris`, `no_inventaris`, `nama`, `uraian`, `kwantitas`, `tgl_perolehan`, `asal_barang`, `keadaan`, `harga`, `keterangan`) VALUES
(4, 112, 'net batminton', 'perangkat mengajar', 3, '2019-06-28', 'toko olahraga', 'baik', 'Rp. 200.000', 'baik'),
(5, 1234, 'sepeda', 'alat transportasi', 200, '2019-08-06', 'toko olahraga', 'hiu', '14000000', 'Juara 2');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `idjabatan` int(11) NOT NULL,
  `jabatan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`idjabatan`, `jabatan`) VALUES
(1, 'Kepala Sekolah'),
(2, 'Wakil Kepala Sekolah'),
(3, 'Guru Umum'),
(4, 'Guru Kejuruan'),
(5, 'Koperasi'),
(6, 'Perpustakaan'),
(7, 'Teknisi'),
(8, 'Tata Usaha');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `idjadwal` int(11) NOT NULL,
  `tingkat` int(11) NOT NULL,
  `idjurusan` int(11) NOT NULL,
  `idkelas` int(11) NOT NULL,
  `idmapel` int(11) NOT NULL,
  `idguru` int(11) NOT NULL,
  `jam` varchar(128) NOT NULL,
  `idruangan` varchar(128) NOT NULL,
  `hari` varchar(128) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`idjadwal`, `tingkat`, `idjurusan`, `idkelas`, `idmapel`, `idguru`, `jam`, `idruangan`, `hari`, `semester`) VALUES
(1, 1, 1, 1, 1, 3, '07:00', '1', 'senin', 1),
(2, 1, 1, 2, 2, 3, '09.00', '1', 'selasa', 1),
(3, 1, 1, 3, 1, 3, '11.00', '1', 'selasa', 2),
(4, 1, 1, 1, 2, 3, '08:00', '1', 'senin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jam`
--

CREATE TABLE `jam` (
  `id` int(11) NOT NULL,
  `jam` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jam`
--

INSERT INTO `jam` (`id`, `jam`) VALUES
(1, '07:00'),
(2, '07:40'),
(3, '08:20'),
(4, '09:00'),
(5, '09:20'),
(6, '10:00'),
(7, '10:40'),
(8, '11:20');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `idjurusan` int(11) NOT NULL,
  `kd_jurusan` varchar(128) NOT NULL,
  `jurusan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`idjurusan`, `kd_jurusan`, `jurusan`) VALUES
(1, 'AK', 'AKUNTANSI'),
(2, 'TKJ', 'TEKNIK KOMPUTER dan JARINGAN'),
(3, 'APk', 'ADMINISTRASI PERKANTORAN');

-- --------------------------------------------------------

--
-- Table structure for table `kalender`
--

CREATE TABLE `kalender` (
  `id` int(11) NOT NULL,
  `mulai` date NOT NULL,
  `berakhir` date NOT NULL,
  `keterangan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kalender`
--

INSERT INTO `kalender` (`id`, `mulai`, `berakhir`, `keterangan`) VALUES
(1, '2019-07-13', '2019-07-14', 'jalan santai');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `idkaryawan` int(11) NOT NULL,
  `status` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `lahir` date NOT NULL,
  `idjabatan` int(11) NOT NULL,
  `gender` varchar(128) NOT NULL,
  `idagama` int(11) NOT NULL,
  `alamat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`idkaryawan`, `status`, `nama`, `lahir`, `idjabatan`, `gender`, `idagama`, `alamat`) VALUES
(2, 'Pegawai Tetap', 'Didit Eko Priyantoro', '2000-02-19', 8, 'laki laki', 2, 'Curah Ketangi'),
(3, 'pegawai tetap', 'Dedy Ariyanto', '2020-02-12', 7, 'laki laki', 1, 'pandansari');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `idkelas` int(11) NOT NULL,
  `kelas` varchar(128) NOT NULL,
  `fk_idjurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`idkelas`, `kelas`, `fk_idjurusan`) VALUES
(1, 'X AK 1', 1),
(2, 'X AK 2', 1),
(3, 'X APK 1', 2),
(4, 'X APK 2', 2),
(5, 'X TKJ 1', 3),
(6, 'X TKJ 2', 3),
(7, 'X MM', 0),
(8, 'X PJ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `idmapel` int(11) NOT NULL,
  `kd_mapel` varchar(128) NOT NULL,
  `mapel` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`idmapel`, `kd_mapel`, `mapel`) VALUES
(1, 'MAT1', 'Matematika 1'),
(2, 'BI', 'Bahasa Indonesia'),
(3, 'BiG', 'Bahasa Inggris');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `idnilai` int(11) NOT NULL,
  `idkelas` int(11) NOT NULL,
  `idmapel` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nis` int(20) NOT NULL,
  `nilai` int(100) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`idnilai`, `idkelas`, `idmapel`, `tanggal`, `nis`, `nilai`, `keterangan`) VALUES
(6, 1, 1, '2019-09-02', 36471146, 100, ''),
(7, 1, 1, '2019-09-02', 28355850, 70, '');

-- --------------------------------------------------------

--
-- Table structure for table `nilaiujian`
--

CREATE TABLE `nilaiujian` (
  `idnilaiujian` int(20) NOT NULL,
  `nilaiakhir` int(20) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `fkidratanilai` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilaiujian`
--

INSERT INTO `nilaiujian` (`idnilaiujian`, `nilaiakhir`, `keterangan`, `fkidratanilai`) VALUES
(1, 0, '', 1),
(2, 0, '', 2),
(3, 0, '', 3),
(4, 0, '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `idpembelian` int(11) NOT NULL,
  `tgl_beli` date NOT NULL,
  `nama` varchar(128) NOT NULL,
  `uraian` varchar(128) NOT NULL,
  `kwantitas` int(11) NOT NULL,
  `harga` varchar(128) NOT NULL,
  `cara_bayar` varchar(128) NOT NULL,
  `tgl_terima` date NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`idpembelian`, `tgl_beli`, `nama`, `uraian`, `kwantitas`, `harga`, `cara_bayar`, `tgl_terima`, `keterangan`) VALUES
(2, '2019-06-27', 'perabot', 'perabotan kelas', 200, 'Rp. 12.000.000', 'bayar tunai', '2019-06-28', 'menunggu penyelesaian pengiriman'),
(3, '2019-06-20', 'net batminton', 'perangkat mengajar', 3, '200000', 'bayar tunai', '2019-06-20', 'menunggu penyelesaian pesanan');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `idpeminjaman` int(11) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keperluan` varchar(128) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `peminjam` varchar(128) NOT NULL,
  `petugas` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`idpeminjaman`, `nama_barang`, `jumlah`, `keperluan`, `tgl_pinjam`, `tgl_kembali`, `peminjam`, `petugas`) VALUES
(1, 'mobil avansa', 1, 'penyebaran brosur', '2019-06-28', '2019-06-28', 'Darmaji', 'Misrok A.md');

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan`
--

CREATE TABLE `pengadaan` (
  `idpengadaan` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `jns_barang` varchar(128) NOT NULL,
  `barang` varchar(128) NOT NULL,
  `jumlah` varchar(128) NOT NULL,
  `harga` varchar(128) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `menyetujui` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengadaan`
--

INSERT INTO `pengadaan` (`idpengadaan`, `nama`, `jabatan`, `jns_barang`, `barang`, `jumlah`, `harga`, `tgl_pengajuan`, `menyetujui`) VALUES
(111, 'Eksan S.pd', 'Karyawan', 'alat tulis', 'whiteboard', '5', 'Rp. 1.000.000', '2019-06-28', 'Taslim S.Ag');

-- --------------------------------------------------------

--
-- Table structure for table `penghapusan`
--

CREATE TABLE `penghapusan` (
  `idpenghapusan` int(11) NOT NULL,
  `tanggal_perolehan` date NOT NULL,
  `no_inventaris` int(11) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `uraian` varchar(128) NOT NULL,
  `kondisi` varchar(128) NOT NULL,
  `dihapus` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penghapusan`
--

INSERT INTO `penghapusan` (`idpenghapusan`, `tanggal_perolehan`, `no_inventaris`, `nama_barang`, `uraian`, `kondisi`, `dihapus`, `keterangan`) VALUES
(1, '2010-06-28', 1, 'mobil avansa', 'alat transportasi', 'buruk', 'tidak layak pakai', 'akan di jual');

-- --------------------------------------------------------

--
-- Table structure for table `penyuratan`
--

CREATE TABLE `penyuratan` (
  `idsurat` int(11) NOT NULL,
  `nomor` varchar(128) NOT NULL,
  `tanggal` date NOT NULL,
  `pengirim` varchar(128) NOT NULL,
  `tujuan` varchar(128) NOT NULL,
  `kepentingan` varchar(128) NOT NULL,
  `tipe` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyuratan`
--

INSERT INTO `penyuratan` (`idsurat`, `nomor`, `tanggal`, `pengirim`, `tujuan`, `kepentingan`, `tipe`) VALUES
(1, '123', '2019-06-28', 'dedy ariyanto', 'janu santoso', 'rapat staff', 'penting');

-- --------------------------------------------------------

--
-- Table structure for table `penyusutan`
--

CREATE TABLE `penyusutan` (
  `idpenyusutan` int(11) NOT NULL,
  `tgl_perolehan` date NOT NULL,
  `no_inventaris` int(11) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `uraian` varchar(128) NOT NULL,
  `kondisi` varchar(128) NOT NULL,
  `minggu_penyusutan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyusutan`
--

INSERT INTO `penyusutan` (`idpenyusutan`, `tgl_perolehan`, `no_inventaris`, `nama_barang`, `uraian`, `kondisi`, `minggu_penyusutan`) VALUES
(1, '2019-06-28', 1, 'mobil avansa', 'alat transportasi', 'Butuh di perbaiki', 'minggu ke-256');

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `idprestasi` int(11) NOT NULL,
  `nis` int(20) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `kelas` varchar(128) NOT NULL,
  `kegiatan` varchar(128) NOT NULL,
  `penghargaan` varchar(128) NOT NULL,
  `keterangan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`idprestasi`, `nis`, `nama`, `kelas`, `kegiatan`, `penghargaan`, `keterangan`) VALUES
(1, 20121151, 'Ajeng Marsela Setiawan', 'XI MM', 'Lomba SKS tingkat Kabupaten', 'Piagam penghargaan juara 2', 'Juara 2');

-- --------------------------------------------------------

--
-- Table structure for table `ratanilai`
--

CREATE TABLE `ratanilai` (
  `idratanilai` int(11) NOT NULL,
  `rata` int(11) NOT NULL,
  `uts` int(20) NOT NULL,
  `uas` int(20) NOT NULL,
  `nilaiakhir` int(20) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `fkidsiswa` int(11) NOT NULL,
  `fkidmapel` int(11) NOT NULL,
  `fkidkelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratanilai`
--

INSERT INTO `ratanilai` (`idratanilai`, `rata`, `uts`, `uas`, `nilaiakhir`, `keterangan`, `fkidsiswa`, `fkidmapel`, `fkidkelas`) VALUES
(1, 84, 10, 90, 67, 'Tuntas', 1, 1, 1),
(2, 98, 20, 0, 0, '', 2, 1, 1),
(3, 95, 20, 0, 0, '', 3, 2, 3),
(4, 97, 20, 0, 0, '', 4, 2, 2),
(5, 0, 0, 0, 0, '', 1, 2, 1),
(6, 0, 0, 0, 0, '', 2, 2, 1),
(7, 0, 0, 0, 0, '', 3, 1, 3),
(8, 0, 0, 0, 0, '', 4, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `registrasi_ekstra`
--

CREATE TABLE `registrasi_ekstra` (
  `idregister` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `ekstra` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrasi_ekstra`
--

INSERT INTO `registrasi_ekstra` (`idregister`, `nis`, `nama`, `ekstra`) VALUES
(1, 2147483647, 'Dedy Ariyanto', 'Hisbul Wathan'),
(2, 2147483647, 'Dedy Ariyanto', 'Hisbul Wathan'),
(3, 2147483647, 'Dedy Ariyanto', 'Hisbul Wathan'),
(4, 2147483647, 'Dedy Ariyanto', 'Ikatan Pelajar Muhammadiyah'),
(5, 2147483647, 'wirid aksara jiwa', 'Pramuka'),
(6, 2147483647, 'wirid aksara jiwa', 'Tapak Suci');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `idruangan` int(11) NOT NULL,
  `kd_ruangan` varchar(128) NOT NULL,
  `nama_ruangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`idruangan`, `kd_ruangan`, `nama_ruangan`) VALUES
(1, 'X001', 'Kelas 1A');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `idsiswa` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `gender` varchar(64) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(128) NOT NULL,
  `agama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `idkelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`idsiswa`, `nis`, `nama`, `gender`, `tgl_lahir`, `tempat_lahir`, `agama`, `alamat`, `idkelas`) VALUES
(1, 36471146, 'Adinda Nasvisha Rani', 'Perempuan', '2003-03-15', 'banyuwangi', 'islam', 'krajan', 1),
(2, 28355850, 'Agus Andika Putra', 'Laki-laki', '2002-08-07', 'Banyuwangi', 'islam', 'Temurejo', 1),
(3, 20121151, 'Ajeng Marsela Setiawan', 'Perempuan', '2002-08-13', 'Banyuwangi', 'islam', 'Panjen', 3),
(4, 36471198, 'm tomy is', 'laki laki', '2019-10-15', 'banyuwangi', 'islam', 'wringinpitu', 2);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `idspp` int(11) NOT NULL,
  `nis` int(20) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `kelas` varchar(256) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`idspp`, `nis`, `nama`, `kelas`, `keterangan`, `tanggal`, `jumlah`) VALUES
(1, 2147483647, 'Bella Oktaviatuz Zahra\r\n', 'X TKJ 1', 'Pembayaran SPP bulan Juli', '2019-07-31', 'Rp. 200.000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_create` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_create`) VALUES
(1, 'dedy', 'dedy@gmail.com', 'default2.jpg', '$2y$10$EMEiHhRpkeDDy5/OLNydB.KVi7sDCo1HyarKjkvXVbO5n6wKTGuDe', 1, 1, 1557602484),
(2, 'Agus Andika Putra', 'Andika@gmail.com', 'default1.jpg', '$2y$10$J2UZKP1iaNqnlE5PBIITM.qT4b32iQh65dZuwMrt9TpR8CdTZePtC', 2, 1, 1557602815),
(3, 'Janu Santoso S.T', 'santoso@gmail.com', 'default.jpg', '$2y$10$baonli3fsBYea.Sg6UF/ROuLNEcaT.LIu5Yp67K2o9m0eWc.N1eVe', 4, 1, 1557628793),
(4, 'bendahara', 'bendahara@gmail.com', 'default.jpg', '$2y$10$ieCDskEtK60Ku.5ZdIlf/e7IsxK6iorC.stIADtml8xgoG7na1op2', 3, 1, 1561857881),
(5, 'kurikulum', 'kurikulum@gmail.com', 'default.jpg', '$2y$10$64eSAi5szkxyrtdtUUcf/el0ecZuP9q64RU3CrESdoKVBRYCpUv.6', 5, 1, 1561867024),
(6, 'guru', 'guru@gmail.com', 'default.jpg', '$2y$10$AI6QrVubkmrWuUBKYADPquIVNX4FNvX2Fw/6d6WRQlOFM88aT82f.', 6, 1, 1562845553);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(5, 1, 4),
(6, 1, 5),
(8, 1, 7),
(9, 1, 8),
(10, 3, 2),
(11, 3, 7),
(12, 4, 2),
(13, 4, 5),
(14, 4, 8),
(15, 5, 2),
(16, 5, 4),
(19, 0, 2),
(20, 2, 6),
(21, 6, 2),
(22, 6, 9),
(23, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Kurikulum'),
(5, 'Inventaris'),
(6, 'Siswa'),
(7, 'Bendahara'),
(8, 'Karyawan'),
(9, 'Guru');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'Bendahara'),
(4, 'Karyawan'),
(5, 'Kaur'),
(6, 'Guru'),
(7, 'baru');

-- --------------------------------------------------------

--
-- Table structure for table `user_submenu`
--

CREATE TABLE `user_submenu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_submenu`
--

INSERT INTO `user_submenu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Informasi', 'user', 'fas fa-fw fa-cog', 1),
(3, 2, 'Edit Profil', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 4, 'Prestasi', 'kurikulum', 'fab fa-fw fa-youtube', 1),
(7, 1, 'role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(9, 5, 'Inventaris', 'inventaris', 'fas fa-fw fa-pallet', 1),
(10, 6, 'Lihat Absensi', 'tampil', 'fas fa-fw fa-list', 1),
(11, 6, 'Lihat Nilai', 'tampil/nilai', 'fab fa-fw fa-youtube', 1),
(12, 6, 'Kalender', 'tampil/kalender', 'fab fa-fw fa-youtube', 1),
(13, 6, 'Jadwal Pelajaran', 'tampil/jadwal', 'fab fa-fw fa-youtube', 1),
(14, 4, 'Jadwal', 'kurikulum/jadwal', 'fab fa-fw fa-youtube', 1),
(15, 7, 'SPP', 'bendahara', 'fab fa-fw fa-youtube', 1),
(16, 8, 'Penyuratan', 'penyuratan', 'fab fa-fw fa-youtube', 0),
(17, 8, 'Karyawan', 'buku', 'fab fa-fw fa-youtube', 1),
(18, 5, 'Pembelian', 'inventaris/pembelian', 'fab fa-fw fa-youtube', 1),
(19, 5, 'Pengadaan', 'inventaris/pengadaan', 'fas fa-fw fa-list', 1),
(20, 5, 'Peminjaman', 'inventaris/peminjaman', 'fas fa-fw fa-pallet', 1),
(21, 5, 'Penyusutan', 'inventaris/penyusutan', 'fas fa-fw fa-list', 1),
(22, 5, 'Penghapusan', 'inventaris/penghapusan', 'fas fa-fw fa-pallet', 1),
(23, 8, 'Siswa', 'siswa/index', 'fab fa-fw fa-youtube', 1),
(24, 4, 'Mapel', 'kurikulum/mapel', 'fab fa-fw fa-youtube', 1),
(25, 4, 'Ekstrakurikuler', 'kurikulum/ekstra', 'fab fa-fw fa-youtube', 1),
(26, 4, 'Akademik', 'kalender', 'fab fa-fw fa-youtube', 1),
(27, 9, 'Absensi Siswa', 'Sabsensi', 'fab fa-fw fa-youtube', 1),
(28, 9, 'Nilai Siswa', 'Snilai', 'fab fa-fw fa-youtube', 1),
(29, 1, 'Register', 'admin/registration', 'fab fa-fw fa-youtube', 1),
(30, 6, 'Ekstra', 'tampil/ekstra', 'fab fa-fw fa-youtube', 1),
(31, 9, 'Raport', 'Srapot', 'fab fa-fw fa-youtube', 1),
(32, 9, 'Nilai Ujian', 'Snilaiujian', 'fab fa-fw fa-youtube', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`idabsensi`);

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`idagama`);

--
-- Indexes for table `banyaknilai`
--
ALTER TABLE `banyaknilai`
  ADD PRIMARY KEY (`idbanyaknilai`);

--
-- Indexes for table `daftar`
--
ALTER TABLE `daftar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ekstra`
--
ALTER TABLE `ekstra`
  ADD PRIMARY KEY (`idekstra`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`idinventaris`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`idjabatan`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`idjadwal`);

--
-- Indexes for table `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`idjurusan`);

--
-- Indexes for table `kalender`
--
ALTER TABLE `kalender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`idkaryawan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`idkelas`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`idmapel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`idnilai`);

--
-- Indexes for table `nilaiujian`
--
ALTER TABLE `nilaiujian`
  ADD PRIMARY KEY (`idnilaiujian`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`idpembelian`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`idpeminjaman`);

--
-- Indexes for table `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD PRIMARY KEY (`idpengadaan`);

--
-- Indexes for table `penghapusan`
--
ALTER TABLE `penghapusan`
  ADD PRIMARY KEY (`idpenghapusan`);

--
-- Indexes for table `penyuratan`
--
ALTER TABLE `penyuratan`
  ADD PRIMARY KEY (`idsurat`);

--
-- Indexes for table `penyusutan`
--
ALTER TABLE `penyusutan`
  ADD PRIMARY KEY (`idpenyusutan`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`idprestasi`);

--
-- Indexes for table `ratanilai`
--
ALTER TABLE `ratanilai`
  ADD PRIMARY KEY (`idratanilai`);

--
-- Indexes for table `registrasi_ekstra`
--
ALTER TABLE `registrasi_ekstra`
  ADD PRIMARY KEY (`idregister`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`idruangan`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`idsiswa`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`idspp`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_submenu`
--
ALTER TABLE `user_submenu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `idabsensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `idagama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `banyaknilai`
--
ALTER TABLE `banyaknilai`
  MODIFY `idbanyaknilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `daftar`
--
ALTER TABLE `daftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ekstra`
--
ALTER TABLE `ekstra`
  MODIFY `idekstra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `idinventaris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `idjabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `idjadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jam`
--
ALTER TABLE `jam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `idjurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kalender`
--
ALTER TABLE `kalender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `idkaryawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `idkelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `idmapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `idnilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `nilaiujian`
--
ALTER TABLE `nilaiujian`
  MODIFY `idnilaiujian` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `idpembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `idpeminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pengadaan`
--
ALTER TABLE `pengadaan`
  MODIFY `idpengadaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `penghapusan`
--
ALTER TABLE `penghapusan`
  MODIFY `idpenghapusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `penyuratan`
--
ALTER TABLE `penyuratan`
  MODIFY `idsurat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `penyusutan`
--
ALTER TABLE `penyusutan`
  MODIFY `idpenyusutan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `idprestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ratanilai`
--
ALTER TABLE `ratanilai`
  MODIFY `idratanilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `registrasi_ekstra`
--
ALTER TABLE `registrasi_ekstra`
  MODIFY `idregister` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `idruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `idsiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `idspp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_submenu`
--
ALTER TABLE `user_submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
