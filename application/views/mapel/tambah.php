<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
			  <div class="card-header">
			    Form Tambah Data Mata pelajaran
			  </div>
			  <div class="card-body">
			  	<?php if (validation_errors()) : ?>
			  	<div class="alert alert-danger" role="alert">
				 <?= validation_errors(); ?>
				</div>
			<?php endif; ?>
			  	<form action="" method="post">

					<div class="form-group">
				    	<label for="idmapel">Kode Mata Pelajaran</label>
				    	<input type="text" name="idmapel" class="form-control" id="idmapel">
				  	</div>
				  	<div class="form-group">
				    	<label for="nmapel">Nama Mata pelajaran</label>
				    	<input type="text" name="nmapel" class="form-control" id="nmapel">
				  	</div>
				  	
				  	<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
				</form>
			  </div>
			</div>
		</div>
	</div>
</div>