<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
			  <div class="card-header">
			    Form Ubah Data Mata pelajaran
			  </div>

			  <div class="card-body">
			  	<form action="" method="post">
			  		<input type="hidden" name="idmapel" value="<?= $mapel['idmapel'] ?>">

				  	<div class="form-group">
				    	<label for="idmapel">Kode Mata Pelajaran</label>
				    	<input type="text" name="idmapel" class="form-control" id="idmapel" value="<?= $mapel['idmapel']  ?>">
				    	<small class="form-text text-danger"><?= form_error('idmapel'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="nmapel">Nama Mata Pelajaran</label>
				    	<input type="text" name="nmapel" class="form-control" id="nmapel" value="<?= $mapel['nmapel']  ?>">
				    	<small class="form-text text-danger"><?= form_error('nmapel'); ?></small>
				  	</div>
				  	
				  	<button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
				</form>
			  </div>
			</div>
		</div>
	</div>
</div>