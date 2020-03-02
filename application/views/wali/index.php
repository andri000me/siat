<div class="container">
	<?php if($this->session->flashdata('flash')): ?>
		<div class="row mt-3">
			<div class="col-md-6">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
	  				Data <strong>Berhasil!</strong> <?= $this->session->flashdata('flash')  ?>.
	  					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    				<span aria-hidden="true">&times;</span>
	  				</button>
				</div>
			</div>
		</div>
	<?php endif ?>
	<div class="row mt-3">
		<div class="col-md-6">
			<a href="<?= base_url (); ?>wali/tambah" class="btn btn-primary">Tambah</a>
		</div>
	</div>
	<div class="row mt-3">
		<div class="col-md-6">
			<form action="" method="post">
				<div class="input-group">
  				<input type="text" class="form-control" placeholder="Cari data wali siswa" name="kunci">
  					<div class="input-group-append">
    			<button class="btn btn-primary" type="submit">Cari</button>
  					</div>
				</div>
			</form>
			
		</div>
	</div>
	
	<div class="row mt-3">
		<div class="col-md-6">
			<h3>Daftar Wali Siswa</h3>
			<?php if (empty($walisiswa) ) : ?>
			<div class="alert alert-danger" role="alert">
  			Data yang anda masukkan tidak ada!!!</div>
			<?php endif; ?>
			<ul class="list-group">
				<?php foreach ($walisiswa as $ws): ?>
  				<li class="list-group-item"><?=$ws['nama']  ?>
  					<a href="<?= base_url();  ?>wali/hapus/<?= $ws['idwali']; 
  					?>" class="badge badge-danger float-right" onclick="return confirm('hapus data ?');">hapus</a>
  					<a href="<?= base_url();  ?>wali/ubah/<?= $ws['idwali']; 
  					?>" class="badge badge-success float-right">Ubah</a>
  					<a href="<?= base_url();  ?>wali/lihat/<?= $ws['idwali']; 
  					?>" class="badge badge-primary float-right">Lihat</a>
  				</li>
  			<?php endforeach; ?>
  			</ul>
		</div>
	</div>
</div>