<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
			  <div class="card-header">
			    Form Tambah Data Siswa
			  </div>
			  <div class="card-body">
			  	<?php if (validation_errors()) : ?>
			  	<div class="alert alert-danger" role="alert">
				 <?= validation_errors(); ?>
				</div>
			<?php endif; ?>
			  	<form action="" method="post">
					<div class="form-group">
				    	<label for="nis">NIS</label>
				    	<input type="text" name="nis" class="form-control" id="nis">
				  	</div>
				  	<div class="form-group">
				    	<label for="nama">Nama</label>
				    	<input type="text" name="nama" class="form-control" id="nama">
				  	</div>
				  	<div class="form-group">
				    	<label for="Gender">Gender</label>
				    	<input type="text" name="gender" class="form-control" id="gender">
				  	</div>
				  	<div class="form-group">
				    	<label for="tglahir">tanggal lahir</label>
				    	<input type="text" name="tglahir" class="form-control" id="tglahir">
				  	</div>
				  	<div class="form-group">
				    	<label for="tlahir">tempat lahir</label>
				    	<input type="text" name="tlahir" class="form-control" id="tlahir">
				  	</div>
				  	<div class="form-group">
					    <label for="agama">Agama</label>
					    <select class="form-control" id="agama" name="agama">
					      <option value="Islam">Islam</option>
					      <option value="Katolik">Katolik</option>
					      <option value="Protestan">Protestan</option>
					      <option value="Hindu">Hindu</option>
					      <option value="Budha">Budha</option>
					      <option value="Kong Hu Cu">Kong Hu Cu</option>
					      <option value="Lain-lain">Lain-lain</option>
					    </select>
					  </div>
				  	<div class="form-group">
				    	<label for="alamat">alamat</label>
				    	<textarea name="alamat" class="form-control" id="alamat"></textarea>
				  	</div>
				  	<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
				</form>
			  </div>
			</div>
		</div>
	</div>
</div>
