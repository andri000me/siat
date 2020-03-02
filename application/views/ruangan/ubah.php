<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
			  <div class="card-header">
			    Form Ubah Data Ruangan
			  </div>
			  <div class="card-body">
			  	<form action="" method="post">
			  		<input type="hidden" name="idroom" value="<?= $runagan['idroom'] ?>">
					<div class="form-group">
				    	<label for="idroom">id Ruangan</label>
				    	<input type="text" name="idroom" class="form-control" id="idroom" value="<?= $ruangan['idroom']  ?>">
				    	<small class="form-text text-danger"><?= form_error('idroom'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="namaroom">Nama Ruangan</label>
				    	<input type="text" name="namaroom" class="form-control" id="namaroom" value="<?= $ruangan['namaroom']  ?>">
				    	<small class="form-text text-danger"><?= form_error('namaroom'); ?></small>
				  	</div>
				  	<button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
				</form>
			  </div>
			</div>
		</div>
	</div>
</div>