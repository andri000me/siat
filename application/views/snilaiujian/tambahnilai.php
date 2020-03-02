 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
			  <div class="card-body">
			  	<form action="<?= base_url('nilaiujian/lihatujian/'.$nilaiujian['id_nilaiujian']); ?>" method="post">
			  	<input type="hidden" name="id_nilaiujian" value="<?= $nilaiujian['id_nilaiujian'];?>">
				  	<div class="form-group">
				    	<label for="uts">Nilai UTS</label>
				    	<input type="text" name="uts" class="form-control" id="uts">
				    	<small class="form-text text-danger"><?= form_error('uts'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="uas">Nilai UAS</label>
				    	<input type="text" name="uas" class="form-control" id="uas">
				    	<small class="form-text text-danger"><?= form_error('uas'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="rata">Nilai Akhir Tugas Harian</label>
				    	<input type="text" name="rata" class="form-control" id="rata" value="<?= $nilaiujian['rata'];?>" readonly>
				  	</div>				  
				  	<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
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