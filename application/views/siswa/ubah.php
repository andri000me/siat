<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
			  <div class="card-header">
			    Form Ubah Data Siswa
			  </div>
			  <div class="card-body">
			  	<form action="" method="post">
			  		<input type="hidden" name="nis" value="<?= $siswa['nis'] ?>">
					<div class="form-group">
				    	<label for="nis"></label>
				    	<input type="text" name="nis" class="form-control" id="nis" value="<?= $siswa['nis']  ?>">
				    	<small class="form-text text-danger"><?= form_error('nis'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="nama">Nama</label>
				    	<input type="text" name="nama" class="form-control" id="nama" value="<?= $siswa['nama']  ?>">
				    	<small class="form-text text-danger"><?= form_error('nama'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="gender">gender</label>
				    	<input type="text" name="gender" class="form-control" id="gender" value="<?= $siswa['gender']  ?>">
				    	<small class="form-text text-danger"><?= form_error('gender'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="tglahir">Tanggal Lahir</label>
				    	<input type="date" name="tglahir" class="form-control" id="tglahir" value="<?= $siswa['tgl_lahir']  ?>">
				    	<small class="form-text text-danger"><?= form_error('tglahir'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="tlahir">Tempat Lahir</label>
				    	<input type="text" name="tlahir" class="form-control" id="tlahir" value="<?= $siswa['tempat_lahir']  ?>">
				    	<small class="form-text text-danger"><?= form_error('tlahir'); ?></small>
				  	</div>
				  	<div class="form-group">
					    <label for="agama">Agama</label>
					    <select class="form-control" id="agama" name="agama">
					    	<?php foreach ($agama as $g ) : ?>
					    		<?php if ($g == $siswa ['agama'] ) : ?>
					      	<option value="<?= $g; ?>" ><?= $g; ?></option>
					      	<?php else : ?>
					      		<option value="<?= $g; ?>"><?= $g; ?></option>
					      	<?php endif; ?>
					  		<?php endforeach; ?>
					    </select>
					  </div>
					  <div class="form-group">
				    	<label for="alamat">Alamat</label>
				    	<textarea type="text" name="alamat" class="form-control" id="alamat"><?= $siswa['alamat']  ?></textarea>
				    	<small class="form-text text-danger"><?= form_error('alamat'); ?></small>
				  	</div>
				  	<button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
				</form>
			  </div>
			</div>
		</div>
	</div>
</div>
