<!DOCTYPE html>
<html>
<head>
	<title>Cetak Raport</title>
</head>

<link rel="stylesheet" href="<?= base_url('assets/css') ?>/bootstrap.min.css">
<body>
<div class="container">
<div class="row">
<center>
<h4><img src="<?= base_url('/assets/img/profil/default.jpg') ?>" class="img-responsive" style="width: 20px;height: 20px"><br>Laporan Penilaian Hasil Belajar Siswa SMK MUHAMMADIYAH 1 GENTENG <br />
 Nagari Kampung Melayu Silaping Ranah Batahan</<img></h4>
</center>
<hr />


<?php foreach ($datadiri as $key => $data) { ?>

<table style="height: 73px width: 384px">
<tbody>
<tr>
<td style="width: 184px;">Nama Peserta Didik</td>
<td style="width: 184px;">: <b><?=$data['nama']?></b>
</tr>
<tr>
<td style="width: 184px;">Nomor Induk</td>
<td style="width: 184px;">:<b><?= $data['nis'] ?></b></td>
</tr>
<tr>
<td style="width: 184px;">Kelas</td>
<td style="width: 184px;">:<b><?= $data['kelas'] ?></b></td>
</tr>
</tbody>
</table>

<?php } ?>

<p>&nbsp;</p>

<table class="table table-striped">
<tbody>
<tr>
<td><strong>No</strong></td>
<td><strong>Mata Pelajaran</strong></td>
<td><strong>Nilai</strong></td>
</tr>

<?php 
$sum=0;
$no=1;
foreach ($rapot as $key => $hasil) { ?>

<tr>
<td><?= $no ?></td>
<td><?= $hasil['mapel'] ?></td>
<td><?= $hasil['nilaiakhir'] ?></td>
</tr> 
<?php
 $sum += $hasil['nilaiakhir'];
 $no++; 
} 
 ?>
</tbody>
</table>

<table class="table table-striped">
<tbody>
<tr>
<td style="width: 126px;"><strong>JUMLAH&nbsp;&nbsp;</strong></td>
<td style="width: 126px;"><?= $sum ?></td>
<td style="width: 126px;">&nbsp;</td>
<td style="width: 127px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 126px;"><strong>RATA-RATA</strong></td>
<td style="width: 126px;"><?php

$sql = "SELECT * FROM `ratanilai` LEFT JOIN siswa ON siswa.idsiswa = ratanilai.fkidsiswa 
		LEFT JOIN kelas ON kelas.idkelas = siswa.idkelas
		LEFT JOIN mapel on mapel.idmapel = ratanilai.fkidmapel
		WHERE siswa.idsiswa ='{$hasil['idsiswa']}' ";
$query = $this->db->query($sql);
$jumleh = $query->num_rows();

// $jumlah
$hasil_rata=$sum/$jumleh;
echo $hasil_rata; ?></td>
<td style="width: 126px;">&nbsp;</td>
<td style="width: 127px;">&nbsp;</td>
</tr>
<tr>
 
</tr>
</tbody>
</table>


<p>&nbsp;</p>
<p>Wali Kelas .......</p>

</div>
</div>
</body>
</html>