 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
			  <div class="card-body">
			  	<form action="<?= base_url('inventaris/actioneditPembelian'); ?>" method="post">
			  	<input type="hidden" name="idpembelian" value="<?= $pembelian['idpembelian'];?>">
					<div class="form-group">
				    	<label for="tanggal beli"></label>
				    	<input type="date" name="tgl_beli" class="form-control" id="tgl_beli" value="<?= $pembelian['tgl_beli']  ?>">	
				  	</div>
				  	<div class="form-group">
				    	<label for="nama">Nama</label>
				    	<input type="text" name="nama" class="form-control" id="nama" value="<?= $pembelian['nama']  ?>">
				    	<small class="form-text text-danger"><?= form_error('nama'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="uraian">Uraian</label>
				    	<input type="text" name="uraian" class="form-control" id="uraian" value="<?= $pembelian['uraian']  ?>">
				    	<small class="form-text text-danger"><?= form_error('uraian'); ?></small>
				  	</div>
				  	<div class="form-group">
				    	<label for="kwantitas">Kwantitas</label>
				    	<input type="text" name="kwantitas" class="form-control" id="kwantitas" value="<?= $pembelian['kwantitas']  ?>">
				    	<small class="form-text text-danger"><?= form_error('kwantitas'); ?></small>
				  	</div>	
                    <div class="form-group">
				    	<label for="harga">Harga Barang</label>
				    	<input type="text" name="harga" class="form-control" id="harga" value="<?= $pembelian['harga']  ?>">
				    	<small class="form-text text-danger"><?= form_error('tanggal perolehan'); ?></small>
				  	</div>
                    <div class="form-group">
				    	<label for="cara_bayar">Cara Pembayaran</label>
				    	<input type="text" name="cara_bayar" class="form-control" id="cara_bayar" value="<?= $pembelian['cara_bayar']  ?>">
				    	<small class="form-text text-danger"><?= form_error('asal barang'); ?></small>
				  	</div>
                    <div class="form-group">
				    	<label for="tgl_terima">tanggal terima</label>
				    	<input type="date" name="tgl_terima" class="form-control" id="tgl_terima" value="<?= $pembelian['tgl_terima']  ?>">
				    	<small class="form-text text-danger"><?= form_error('keadaan'); ?></small>
				  	</div>
                    <div class="form-group">
				    	<label for="keterangan">Keterangan</label>
				    	<input type="text" name="keterangan" class="form-control" id="keterangan" value="<?= $pembelian['keterangan']  ?>">
				  	</div>									  
				  	<button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
				</form>
			  </div>
			</div>
		</div>
	</div>
</div>