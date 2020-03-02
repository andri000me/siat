<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
  				<div class="card-header">
    			DetaiL data Siswa
  				</div>
  					<div class="card-body">
    				<h5 class="card-title"><?= $siswa['nama'] ?></h5>
    				<h6 class="card-subtitle mb-2 text-muted"><?= $siswa['tempat_lahir'] ?></h6>
				    <p class="card-text"><?= $siswa['nis']; ?></p>
				    <p class="card-text"><?= $siswa['gender']; ?></p>
				    <p class="card-text"><?= date("d F Y",strtotime($siswa['tgl_lahir'])); ?></p>
				    <p class="card-text"><?= $this->jadwal_model->getKelas('idkelas'); ?></p>
				    <p class="card-text"><?= $siswa['agama']; ?></p>
				    <p class="card-text"><?= $siswa['alamat']; ?></p>
				    <a href="<?= base_url();  ?>siswa" class="btn btn-primary">Kembali</a>
  				</div>
			</div>
		</div>
	</div>
</div>
