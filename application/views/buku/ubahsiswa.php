 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
			  <div class="card-body">
			  	<form action="<?= base_url('buku/actioneditSiswa'); ?>" method="post">
			  	<input type="hidden" name="idsiswa" value="<?= $siswa['idsiswa'];?>">	
                  				
				  	<div class="form-group">
				    	<label for="nis">nis siswa</label>
				    	<input type="text" name="nis" class="form-control" id="nis" value="<?= $siswa['nis']  ?>">
				    	<small class="form-text text-danger"><?= form_error('nis'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="nama">Nama siswa</label>
				    	<input type="text" name="nama" class="form-control" id="nama" value="<?= $siswa['nama']  ?>">
				    	<small class="form-text text-danger"><?= form_error('nama'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="gender">Jenis Kelamin</label>
				    	<input type="text" name="gender" class="form-control" id="gender" value="<?= $siswa['gender']  ?>">
				    	<small class="form-text text-danger"><?= form_error('jenis kelamin'); ?></small>
				  	</div>	
                    <div class="form-group">
				    	<label for="tgl_lahir">Tanggal Lahir</label>
				    	<input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" value="<?= $siswa['tgl_lahir']  ?>">
				    	<small class="form-text text-danger"><?= form_error('tanggal lahir'); ?></small>
				  	</div>
                    <div class="form-group">
				    	<label for="tempat_lahir">Tempat Lahir</label>
				    	<input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="<?= $siswa['tempat_lahir']  ?>">
				    	<small class="form-text text-danger"><?= form_error('tempat lahir'); ?></small>
				  	</div>
                    <div class="form-group">
				    	<label for="agama">Agama</label>
				    	<input type="text" name="agama" class="form-control" id="agama" value="<?= $siswa['agama']  ?>">
				    	<small class="form-text text-danger"><?= form_error('agama'); ?></small>
				  	</div>
                    <div class="form-group">
				    	<label for="alamat">Alamat</label>
				    	<input type="text" name="alamat" class="form-control" id="alamat" value="<?= $siswa['alamat']  ?>">
                        <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
				  	</div>
                      <div class="form-group">
				    	<label for="idkelas">Kelas</label>
				    	<input type="text" name="idkelas" class="form-control" id="idkelas" value="<?= $siswa['idkelas']  ?>">
                        <small class="form-text text-danger"><?= form_error('kelas'); ?></small>
				  	</div>									  
				  	<button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
				</form>
			  </div>
			</div>
		</div>
	</div>
</div>