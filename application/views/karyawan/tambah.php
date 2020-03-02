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
				    	<label for="idkar">id Karyawan</label>
				    	<input type="text" name="idkar" class="form-control" id="idkar">
				    	<small class="form-text text-danger"><?= form_error('idkar'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="nama">Nama</label>
				    	<input type="text" name="nama" class="form-control" id="nama">
				    	<small class="form-text text-danger"><?= form_error('nama'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="jabatan">jabatan</label>
				    	<input type="text" name="jabatan" class="form-control" id="jabatan">
				    	<small class="form-text text-danger"><?= form_error('jabatan'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="gender">Jenis Kelamin</label>
				    	<input type="text" name="gender" class="form-control" id="gender">
				    	<small class="form-text text-danger"><?= form_error('gender'); ?></small>
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
				  	<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
				</form>
			  </div>
			</div>
		</div>
	</div>
</div>