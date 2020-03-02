<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
  				<div class="card-header">
    			DetaiL data karyawan
  				</div>
  					<div class="card-body">
    				<h5 class="card-title"><?= $karyawan['nama'] ?></h5>
    				<h6 class="card-subtitle mb-2 text-muted"><?= $karyawan['jabatan'] ?></h6>
				    <p class="card-text"><?= $karyawan['gender']; ?></p>
				    <p class="card-text"><?= $karyawan['agama']; ?></p>
				    <a href="<?= base_url();  ?>karyawan" class="btn btn-primary">Kembali</a>
  				</div>
			</div>
		</div>
	</div>
</div>
