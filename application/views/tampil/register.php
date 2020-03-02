 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

<?= $this->session->flashdata('message'); ?>

<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
			  <div class="card-body">
			  	<form action="<?= base_url('tampil/ekstra'); ?>" method="post">
					<div class="form-group">
				    	<label for="nis">Nis</label>
				    	<input type="text" name="nis" class="form-control" id="nis">
				    	<small class="form-text text-danger"><?= form_error('nis'); ?></small>
				  	</div>
                      <div class="form-group">
				    	<label for="nama">Nama</label>
				    	<input type="text" name="nama" class="form-control" id="nama">
				    	<small class="form-text text-danger"><?= form_error('nama'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="ekstra">Ekstrakurikuler</label>
				    	<input type="text" name="ekstra" class="form-control" id="ekstra">
				    	<small class="form-text text-danger"><?= form_error('ekstra'); ?></small>
				  	</div>	
                     
				  	<button type="submit" name="ubah" class="btn btn-primary float-right">Daftar</button>
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