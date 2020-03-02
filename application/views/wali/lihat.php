<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
  				<div class="card-header">
    			DetaiL data Wali Siswa
  				</div>
  					<div class="card-body">
    				<h5 class="card-title"><?= $walisiswa['nama'] ?></h5>
				    <p class="card-text"><?= $walisiswa['idwali']; ?></p>
				    <p class="card-text"><?= $walisiswa['alamat']; ?></p>
				    <p class="card-text"><?= $walisiswa['telepon']; ?></p>
				    <p class="card-text"><?= $siswa['agama']; ?></p>
				    <a href="<?= base_url();  ?>siswa" class="btn btn-primary">Kembali</a>
  				</div>
			</div>
		</div>
	</div>
</div>
