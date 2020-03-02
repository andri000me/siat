 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
			  <div class="card-body">
			  	<form action="<?= base_url('inventaris/actioneditPeminjaman'); ?>" method="post">
			  	<input type="hidden" name="idpeminjaman" value="<?= $peminjaman['idpeminjaman'];?>">
				  	<div class="form-group">
				    	<label for="nama_barang">Nama Barang</label>
				    	<input type="text" name="nama_barang" class="form-control" id="nama_barang" value="<?= $peminjaman['nama_barang']  ?>">
				    	<small class="form-text text-danger"><?= form_error('nama barang'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="jumlah">Jumlah</label>
				    	<input type="text" name="jumlah" class="form-control" id="jumlah" value="<?= $peminjaman['jumlah']  ?>">
				    	<small class="form-text text-danger"><?= form_error('jumlah'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="keperluan">Keperluan</label>
				    	<input type="text" name="keperluan" class="form-control" id="keperluan" value="<?= $peminjaman['keperluan']  ?>">
				    	<small class="form-text text-danger"><?= form_error('keperluan'); ?></small>
				  	</div>	
                    <div class="form-group">
				    	<label for="tgl_pinjam">Tanggal Pinjam</label>
				    	<input type="date" name="tgl_pinjam" class="form-control" id="tgl_pinjam" value="<?= $peminjaman['tgl_pinjam']  ?>">
				    	<small class="form-text text-danger"><?= form_error('tanggal pinjam'); ?></small>
				  	</div>
                    <div class="form-group">
				    	<label for="tgl_kembali">Tanggal Kembali</label>
				    	<input type="date" name="tgl_kembali" class="form-control" id="tgl_kembali" value="<?= $peminjaman['tgl_kembali']  ?>">
				    	<small class="form-text text-danger"><?= form_error('tanggal kembali'); ?></small>
				  	</div>
                    <div class="form-group">
				    	<label for="peminjam">Peminjam</label>
				    	<input type="text" name="peminjam" class="form-control" id="peminjam" value="<?= $peminjaman['peminjam']  ?>">
				    	<small class="form-text text-danger"><?= form_error('peminjam'); ?></small>
				  	</div>
                    <div class="form-group">
				    	<label for="petugas">Petugas</label>
				    	<input type="text" name="petugas" class="form-control" id="petugas" value="<?= $peminjaman['petugas']  ?>">
				    	<small class="form-text text-danger"><?= form_error('petugas'); ?></small>
				  	</div>									  
				  	<button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
				</form>
			  </div>
			</div>
		</div>
	</div>
</div>