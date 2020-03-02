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
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

                    <!-- ini tombol tambah di busek -->

	<!-- <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newsnilaiModal">Tambah Nilai</a> -->
        
	<p></p>
    <div class="card-body">
              <div class="table-responsive">
		<table class="table table-bordered" id="dataTable16" width="100%" cellspacing="0">
			<thead>
            <tr>
				<th>Nis</th>
				<th>Nama</th>
                <th>Tempat Tanggal Lahir </th>
                <th>Alamat</th>
                <th>Aksi</th>

            </tr>
			</thead>
			<tbody>
				<?php if (count($daftar) > 0) { 
				foreach ($daftar as $key => $value) {
					?>
				<tr>
					<td> <?=$value['nis'];?> </td>
					<td> <?=$value['nama'];?> </td>
                    <td> <?=$value['tempat_lahir'];?> , <?=$value['tgl_lahir'];?> </td>
                    <td> <?=$value['alamat'];?> </td>
                    <td> <a href="<?php echo base_url(); ?>srapot/lihatlah/<?=$value['idsiswa'];?>" class="badge badge-success">Cetak</a> </td>

				</tr>
				<?php }
				} ?>
			</tbody>
		</table>
	</div>
    </div>
    </div>

  <!-- Modal -->
        </div>
        </div>

</div>
