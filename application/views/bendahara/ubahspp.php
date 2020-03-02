 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
			  <div class="card-body">
			  	<form action="<?= base_url('bendahara/actioneditSpp'); ?>" method="post">
			  	<input type="hidden" name="idspp" value="<?= $spp['idspp'];?>">
				  	<div class="form-group">
				    	<label for="nis">NIS</label>
				    	<input type="text" name="nis" class="form-control" id="nis" value="<?= $spp['nis']  ?>">
				    	<small class="form-text text-danger"><?= form_error('nis'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="nama">Nama Siswa</label>
				    	<input type="text" name="nama" class="form-control" id="nama" value="<?= $spp['nama']  ?>">
				    	<small class="form-text text-danger"><?= form_error('nama'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="kelas">Kelas</label>
				    	<input type="text" name="kelas" class="form-control" id="kelas" value="<?= $spp['kelas']  ?>">
				    	<small class="form-text text-danger"><?= form_error('kelas'); ?></small>
				  	</div>	
                    <div class="form-group">
				    	<label for="keterangan">Keterangan</label>
				    	<input type="text" name="keterangan" class="form-control" id="keterangan" value="<?= $spp['keterangan']  ?>">
				    	<small class="form-text text-danger"><?= form_error('keterangan'); ?></small>
				  	</div>
                    <div class="form-group">
				    	<label for="tanggal">Tanggal Bayar</label>
				    	<input type="date" name="tanggal" class="form-control" id="tanggal" value="<?= $spp['tanggal']  ?>">
				    	<small class="form-text text-danger"><?= form_error('tanggal'); ?></small>
				  	</div>
                    <div class="form-group">
				    	<label for="jumlah">Jumlah</label>
				    	<input type="text" name="jumlah" class="form-control" id="jumlah" value="<?= $spp['jumlah']  ?>">
				    	<small class="form-text text-danger"><?= form_error('jumlah'); ?></small>
				  	</div>					  
				  	<button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
				</form>
			  </div>
			</div>
		</div>
	</div>
</div>