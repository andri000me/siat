 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
			  <div class="card-body">
			  	<form action="<?= base_url('kurikulum/actioneditPrestasi'); ?>" method="post">
			  	<input type="hidden" name="idprestasi" value="<?= $prestasi['idprestasi'];?>">
				  	<div class="form-group">
				    	<label for="nis">nis</label>
				    	<input type="text" name="nis" class="form-control" id="nis" value="<?= $prestasi['nis']  ?>">
				    	<small class="form-text text-danger"><?= form_error('nis'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="nama">nama</label>
				    	<input type="text" name="nama" class="form-control" id="nama" value="<?= $prestasi['nama']  ?>">
				    	<small class="form-text text-danger"><?= form_error('nama'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="kelas">kelas</label>
				    	<input type="text" name="kelas" class="form-control" id="kelas" value="<?= $prestasi['kelas']  ?>">
				    	<small class="form-text text-danger"><?= form_error('kelas'); ?></small>
				  	</div>	
                    <div class="form-group">
				    	<label for="kegiatan">kegiatan</label>
				    	<input type="text" name="kegiatan" class="form-control" id="kegiatan" value="<?= $prestasi['kegiatan']  ?>">
				    	<small class="form-text text-danger"><?= form_error('kegiatan'); ?></small>
				  	</div>
                    <div class="form-group">
				    	<label for="penghargaan">penghargaan</label>
				    	<input type="text" name="penghargaan" class="form-control" id="penghargaan" value="<?= $prestasi['penghargaan']  ?>">
				    	<small class="form-text text-danger"><?= form_error('penghargaan'); ?></small>
				  	</div>
                    <div class="form-group">
				    	<label for="keterangan">Keterangan</label>
				    	<input type="text" name="keterangan" class="form-control" id="keterangan" value="<?= $prestasi['keterangan']  ?>">
				  	</div>									  
				  	<button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
				</form>
			  </div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>