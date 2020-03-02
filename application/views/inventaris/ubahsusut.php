 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
			  <div class="card-body">
			  	<form action="<?= base_url('inventaris/actioneditPenyusutan'); ?>" method="post">
			  	<input type="hidden" name="idpenyusutan" value="<?= $penyusutan['idpenyusutan'];?>">
					<div class="form-group">
				    	<label for="tgl_perolehan">Tanggal Perolehan</label>
				    	<input type="date" name="tgl_perolehan" class="form-control" id="tgl_perolehan" value="<?= $penyusutan['tgl_perolehan']  ?>">
				    	<small class="form-text text-danger"><?= form_error('tanggal perolehan'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="no_inventaris">Nomor Inventaris</label>
				    	<input type="text" name="no_inventaris" class="form-control" id="no_inventaris" value="<?= $penyusutan['no_inventaris']  ?>">
				    	<small class="form-text text-danger"><?= form_error('nomor inventaris'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="nama_barang">Nama Barang</label>
				    	<input type="text" name="nama_barang" class="form-control" id="nama_barang" value="<?= $penyusutan['nama_barang']  ?>">
				    	<small class="form-text text-danger"><?= form_error('nama barang'); ?></small>
				  	</div>	
                    <div class="form-group">
				    	<label for="uraian">Uraian Barang</label>
				    	<input type="text" name="uraian" class="form-control" id="uraian" value="<?= $penyusutan['uraian']  ?>">
				    	<small class="form-text text-danger"><?= form_error('uraian'); ?></small>
				  	</div>
                    <div class="form-group">
				    	<label for="kondisi">Kondisi Barang</label>
				    	<input type="text" name="kondisi" class="form-control" id="kondisi" value="<?= $penyusutan['kondisi']  ?>">
				    	<small class="form-text text-danger"><?= form_error('kondisi'); ?></small>
				  	</div>
                    <div class="form-group">
				    	<label for="minggu_penyusutan">Minggu Penyusutan</label>
				    	<input type="text" name="minggu_penyusutan" class="form-control" id="minggu_penyusutan" value="<?= $penyusutan['minggu_penyusutan']  ?>">
				    	<small class="form-text text-danger"><?= form_error('minggu penyusutan'); ?></small>
				  	</div>					  
				  	<button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
				</form>
			  </div>
			</div>
		</div>
	</div>
</div>