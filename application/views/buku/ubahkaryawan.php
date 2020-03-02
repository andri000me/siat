 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
			  <div class="card-body">
			  	<form action="<?= base_url('buku/actioneditKaryawan'); ?>" method="post">
			  	<input type="hidden" name="idkaryawan" value="<?= $karyawan['idkaryawan'];?>">					
				  	<div class="form-group">
				    	<label for="status">Status Karyawan</label>
				    	<input type="text" name="status" class="form-control" id="status" value="<?= $karyawan['status']  ?>">
				    	<small class="form-text text-danger"><?= form_error('status'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="nama">Nama Karyawan</label>
				    	<input type="text" name="nama" class="form-control" id="nama" value="<?= $karyawan['nama']  ?>">
				    	<small class="form-text text-danger"><?= form_error('nama'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="lahir">Tanggal Lahir</label>
				    	<input type="date" name="lahir" class="form-control" id="lahir" value="<?= $karyawan['lahir']  ?>">
				    	<small class="form-text text-danger"><?= form_error('tanggal lahir'); ?></small>
				  	</div>	
                    <div class="form-group">
				    	<label for="jabatan">Jabatan</label>
				    	<input type="text" name="jabatan" class="form-control" id="jabatan" value="<?= $karyawan['jabatan']  ?>">
				    	<small class="form-text text-danger"><?= form_error('jabatan'); ?></small>
				  	</div>
                    <div class="form-group">
				    	<label for="gender">Jenis Kelamin</label>
				    	<input type="text" name="gender" class="form-control" id="gender" value="<?= $karyawan['gender']  ?>">
				    	<small class="form-text text-danger"><?= form_error('jenis kelamin'); ?></small>
				  	</div>
                    <div class="form-group">
				    	<label for="agama">Agama</label>
				    	<input type="text" name="agama" class="form-control" id="agama" value="<?= $karyawan['agama']  ?>">
				    	<small class="form-text text-danger"><?= form_error('agama'); ?></small>
				  	</div>
                    <div class="form-group">
				    	<label for="alamat">Alamat</label>
				    	<input type="text" name="alamat" class="form-control" id="alamat" value="<?= $karyawan['alamat']  ?>">
				  	</div>									  
				  	<button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
				</form>
			  </div>
			</div>
		</div>
	</div>
</div>