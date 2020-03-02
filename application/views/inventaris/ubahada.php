 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
			  <div class="card-body">
			  	<form action="<?= base_url('inventaris/actioneditPengadaan'); ?>" method="post">
			  	<input type="hidden" name="idpengadaan" value="<?= $pengadaan['idpengadaan'];?>">
				  	<div class="form-group">
				    	<label for="nama">Nama Pengada</label>
				    	<input type="text" name="nama" class="form-control" id="nama" value="<?= $pengadaan['nama']  ?>">
				    	<small class="form-text text-danger"><?= form_error('nama'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="jabatan">Jabatan Pengada</label>
				    	<input type="text" name="jabatan" class="form-control" id="jabatan" value="<?= $pengadaan['jabatan']  ?>">
				    	<small class="form-text text-danger"><?= form_error('jabatan'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="jns_barang">Jenis Barang</label>
				    	<input type="text" name="jns_barang" class="form-control" id="jns_barang" value="<?= $pengadaan['jns_barang']  ?>">
				    	<small class="form-text text-danger"><?= form_error('jns_barang'); ?></small>
				  	</div>	
                    <div class="form-group">
				    	<label for="barang">Nama Barang</label>
				    	<input type="text" name="barang" class="form-control" id="barang" value="<?= $pengadaan['barang']  ?>">
				    	<small class="form-text text-danger"><?= form_error('barang'); ?></small>
				  	</div>
                    <div class="form-group">
				    	<label for="jumlah">Jumlah Barang</label>
				    	<input type="text" name="jumlah" class="form-control" id="jumlah" value="<?= $pengadaan['jumlah']  ?>">
				    	<small class="form-text text-danger"><?= form_error('jumlah'); ?></small>
				  	</div>
                    <div class="form-group">
				    	<label for="harga">Harga Barang</label>
				    	<input type="text" name="harga" class="form-control" id="harga" value="<?= $pengadaan['harga']  ?>">
				    	<small class="form-text text-danger"><?= form_error('harga'); ?></small>
				  	</div>
                    <div class="form-group">
				    	<label for="tgl_pengajuan">Tanggal Pengadaan</label>
				    	<input type="date" name="tgl_pengajuan" class="form-control" id="tgl_pengajuan" value="<?= $pengadaan['tgl_pengajuan']  ?>">
				    	<small class="form-text text-danger"><?= form_error('tanggal pengajuan'); ?></small>
				  	</div>
                    <div class="form-group">
				    	<label for="menyetujui">Penanggung Jawab Pengadaan</label>
				    	<input type="text" name="menyetujui" class="form-control" id="menyetujui" value="<?= $pengadaan['menyetujui']  ?>">
				  	</div>									  
				  	<button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
				</form>
			  </div>
			</div>
		</div>
	</div>
</div>