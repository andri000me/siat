<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
			  <div class="card-header">
			    Form Tambah Data Karyawan
			  </div>
			  <div class="card-body">
			  	<form action="" method="post">
					<div class="form-group">
				    	<label for="idroom">id Ruangan</label>
				    	<input type="text" name="idroom" class="form-control" id="idroom">
				    	<small class="form-text text-danger"><?= form_error('idroom'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="namaroom">Nama Ruangan</label>
				    	<input type="text" name="namaroom" class="form-control" id="namaroom">
				    	<small class="form-text text-danger"><?= form_error('namaroom'); ?></small>
				  	</div>
				  	<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
				</form>
			  </div>
			</div>
		</div>
	</div>
</div>