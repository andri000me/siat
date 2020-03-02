 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
			  <div class="card-body">
			  	<form action="<?= base_url('inventaris/actioneditInventaris'); ?>" method="post">
			  	<input type="hidden" name="idinventaris" value="<?= $inventaris['idinventaris'];?>">
					<div class="form-group">
				    	<label for="no_inventaris"></label>
				    	<input type="text" name="no_inventaris" class="form-control" id="no_inventaris" value="<?= $inventaris['no_inventaris']  ?>">
				  	</div>
				  	<div class="form-group">
				    	<label for="nama">Nama</label>
				    	<input type="text" name="nama" class="form-control" id="nama" value="<?= $inventaris['nama']  ?>">
				    	<small class="form-text text-danger"><?= form_error('nama'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="uraian">Uraian</label>
				    	<input type="text" name="uraian" class="form-control" id="uraian" value="<?= $inventaris['uraian']  ?>">
				    	<small class="form-text text-danger"><?= form_error('uraian'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="kwantitas">Kwantitas</label>
				    	<input type="text" name="kwantitas" class="form-control" id="kwantitas" value="<?= $inventaris['kwantitas']  ?>">
				    	<small class="form-text text-danger"><?= form_error('kwantitas'); ?></small>
				  	</div>	
                    <div class="form-group">
				    	<label for="tgl_perolehan">Tanggal Perolehan</label>
				    	<input type="date" name="tgl_perolehan" class="form-control" id="tgl_perolehan" value="<?= $inventaris['tgl_perolehan']  ?>">
				    	<small class="form-text text-danger"><?= form_error('tanggal perolehan'); ?></small>
				  	</div>
                    <div class="form-group">
				    	<label for="asal_barang">Asal Barang</label>
				    	<input type="text" name="asal_barang" class="form-control" id="asal_barang" value="<?= $inventaris['asal_barang']  ?>">
				    	<small class="form-text text-danger"><?= form_error('asal barang'); ?></small>
				  	</div>
                    <div class="form-group">
				    	<label for="keadaan">Keadaan</label>
				    	<input type="text" name="keadaan" class="form-control" id="keadaan" value="<?= $inventaris['keadaan']  ?>">
				    	<small class="form-text text-danger"><?= form_error('keadaan'); ?></small>
				  	</div>
                    <div class="form-group">
				    	<label for="harga">Harga</label>
				    	<input type="text" name="harga" class="form-control" id="harga" value="<?= $inventaris['harga']  ?>">
				    	<small class="form-text text-danger"><?= form_error('harga'); ?></small>
				  	</div>
                    <div class="form-group">
				    	<label for="keterangan">Keterangan</label>
				    	<input type="text" name="keterangan" class="form-control" id="keterangan" value="<?= $inventaris['keterangan']  ?>">
				  	</div>									  
				  	<button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
				</form>
			  </div>
			</div>
		</div>
	</div>
</div>