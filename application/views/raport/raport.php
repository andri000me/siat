<!DOCTYPE html>
<html>
<head>
	<title><?= $judul ?></title>
</head>

<link rel="stylesheet" href="<?= base_url('assets/bootstrap') ?>/dist/css/bootstrap.min.css">
<body>
<div class="container">
<div class="row">
<center>
<h4><img src="<?= base_url('/assets/home/proc.png') ?>" class="img-responsive" style="width: 20px;height: 20px">Laporan Penilaian Hasil Belajar Siswa SMK MUHAMMADIYAH 1 GENTENG <br />
 Nagari Kampung Melayu Silaping Ranah Batahan</<img>

</h4>
</center>
<hr />

<table style="height: 73px;" width="384">
<tbody>
<?php 
$sum=0;



$hasil_rata='';
$no=1;foreach ($rapot as $hasil) : ?>

<?php
$id=$hasil['idsiswa'];

$sql = "    	SELECT *  
				FROM `nilaiujian`
				LEFT JOIN siswa on nilaiujian.fkidsiswa = siswa.idsiswa
				LEFT JOIN mapel on nilaiujian.fkidmapel = mapel.idmapel
				LEFT JOIN kelas on siswa.idkelas = kelas.idkelas
				WHERE siswa.idsiswa = '{$id}'
		";
$query = $this->db->query($sql);
$rata1 = $query->num_rows();
?>

<tr>
<td style="width: 184px;">Nama Peserta Didik</td>
<td style="width: 184px;">: <b><?=$hasil['nama']?></b></! -->
</tr>
<tr>
<td style="width: 184px;">Nomor Induk</td>
<td style="width: 184px;">:<b><?= $hasil['nis'] ?></b></td>
</tr>
<tr>
<td style="width: 184px;">Kelas</td>
<td style="width: 184px;">:<b><?= $hasil['kelas'] ?></b></td>
</tr>
<? endforeach; ?>
</tbody>
</table>
<p>&nbsp;</p>



<table class="table table-striped">
<tbody>
<tr>
<td><strong>No</strong></td>
<td><strong>Mata Pelajaran</strong></td>
<td><strong>Niliai</strong></td>
<td><strong>Hasil Studi</strong></td>
</tr>


<tr>
<td><?= $no ?></td>
<td><?= $hasil['mapel'] ?></td>
<td><?= $hasil['nilairapot'] ?></td>
<td><?= $hasil['keterangan'] ?></td>
</tr> 
<?php
 $sum += $hasil['nilairapot'];
 $no++; endforeach; ?>
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
$hasil_rata=$sum/$rata1;
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


Dicetak Pada Tanggal <?= tgl_indonesia(date('Y-m-d')) ?> Jam <?= date('h:i:s') ?>
</div>
</div>
</body>
</html>