<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
			  <div class="card-header">
			    Form Ubah Data Karyawan
			  </div>
			  <div class="card-body">
			  	<form action="" method="post">
			  		<input type="hidden" name="idkar" value="<?= $karyawan['idkar'] ?>">
					<div class="form-group">
				    	<label for="idkar">id Karyawan</label>
				    	<input type="text" name="idkar" class="form-control" id="idkar" value="<?= $karyawan['idkar']  ?>">
				    	<small class="form-text text-danger"><?= form_error('idkar'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="nama">Nama</label>
				    	<input type="text" name="nama" class="form-control" id="nama" value="<?= $karyawan['nama']  ?>">
				    	<small class="form-text text-danger"><?= form_error('nama'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="jabatan">jabatan</label>
				    	<input type="text" name="jabatan" class="form-control" id="jabatan" value="<?= $karyawan['jabatan']  ?>">
				    	<small class="form-text text-danger"><?= form_error('jabatan'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="gender">Jenis Kelamin</label>
				    	<input type="text" name="gender" class="form-control" id="gender" value="<?= $karyawan['gender']  ?>">
				    	<small class="form-text text-danger"><?= form_error('gender'); ?></small>
				  	</div>
				  	<div class="form-group">
					    <label for="agama">Agama</label>
					    <select class="form-control" id="agama" name="agama">
					    	<?php foreach ($agama as $g ) : ?>
					    		<?php if ($g == $karyawan ['agama'] ) : ?>
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