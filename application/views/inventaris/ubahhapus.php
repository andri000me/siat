 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
			  <div class="card-body">
			  	<form action="<?= base_url('inventaris/actioneditPenghapusan'); ?>" method="post">
			  	<input type="hidden" name="idpenghapusan" value="<?= $penghapusan['idpenghapusan'];?>">
				  	<div class="form-group">
				    	<label for="tanggal_perolehan">Tanggal Perolehan</label>
				    	<input type="date" name="tanggal_perolehan" class="form-control" id="tanggal_perolehan" value="<?= $penghapusan['tanggal_perolehan']  ?>">
				    	<small class="form-text text-danger"><?= form_error('nama'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="no_inventaris">Nomor Inventaris</label>
				    	<input type="text" name="no_inventaris" class="form-control" id="no_inventaris" value="<?= $penghapusan['no_inventaris']  ?>">
				    	<small class="form-text text-danger"><?= form_error('nomor inventaris'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="nama_barang">Nama Barang</label>
				    	<input type="text" name="nama_barang" class="form-control" id="nama_barang" value="<?= $penghapusan['nama_barang']  ?>">
				    	<small class="form-text text-danger"><?= form_error('nama barang'); ?></small>
				  	</div>	
                    <div class="form-group">
				    	<label for="uraian">Uraian</label>
				    	<input type="text" name="uraian" class="form-control" id="uraian" value="<?= $penghapusan['uraian']  ?>">
				    	<small class="form-text text-danger"><?= form_error('uraian'); ?></small>
				  	</div>
                    <div class="form-group">
				    	<label for="kondisi">Kondisi Barang</label>
				    	<input type="text" name="kondisi" class="form-control" id="kondisi" value="<?= $penghapusan['kondisi']  ?>">
				    	<small class="form-text text-danger"><?= form_error('kondisi barang'); ?></small>
				  	</div>
                    <div class="form-group">
				    	<label for="dihapus">Dihapus</label>
				    	<input type="text" name="dihapus" class="form-control" id="dihapus" value="<?= $penghapusan['dihapus']  ?>">
				    	<small class="form-text text-danger"><?= form_error('dihapus'); ?></small>
				  	</div>
                    <div class="form-group">
				    	<label for="keterangan">Keterangan</label>
				    	<input type="text" name="keterangan" class="form-control" id="keterangan" value="<?= $penghapusan['keterangan']  ?>">
				  	</div>									  
				  	<button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
				</form>
			  </div>
			</div>
		</div>
	</div>
</div>