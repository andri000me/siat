<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
			  <div class="card-header">
			    Form Ubah Data Wali Siswa
			  </div>
			  <div class="card-body">
			  	<form action="" method="post">
			  		<input type="hidden" name="idwali" value="<?= $walisiswa['idwali'] ?>">
					<div class="form-group">
				    	<label for="idwali"></label>
				    	<input type="text" name="idwali" class="form-control" id="idwali" value="<?= $walisiswa['idwali']  ?>">
				    	<small class="form-text text-danger"><?= form_error('idwali'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="nama">Nama</label>
				    	<input type="text" name="nama" class="form-control" id="nama" value="<?= $walisiswa['nama']  ?>">
				    	<small class="form-text text-danger"><?= form_error('nama'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="alamat">Alamat</label>
				    	<input type="text" name="alamat" class="form-control" id="alamat" value="<?= $walisiswa['alamat']  ?>">
				    	<small class="form-text text-danger"><?= form_error('alamat'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="telepon">Nomor Telepon</label>
				    	<input type="text" name="telepon" class="form-control" id="telepon" value="<?= $walisiswa['telepon']  ?>">
				    	<small class="form-text text-danger"><?= form_error('telepon'); ?></small>
				  	</div>
				  	<div class="form-group">
					    <label for="agama">Agama</label>
					    <select class="form-control" id="agama" name="agama">
					    	<?php foreach ($agama as $g ) : ?>
					    		<?php if ($g == $walisiswa ['agama'] ) : ?>
					      	<option value="<?= $g; ?>" ><?= $g; ?></option>
					      	<?php else : ?>
					      		<option value="<?= $g; ?>"><?= $g; ?></option>
					      	<?php endif; ?>
					  		<?php endforeach; ?>
					    </select>
					  </div>
					  
				  	<button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
				</form>
			  </div>
			</div>
		</div>
	</div>
</div>