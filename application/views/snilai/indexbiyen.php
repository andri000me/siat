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
				<th>Kelas</th>
				<th>Mata Pelajaran</th>
				<th>Hari/Jam</th>
                <th>Guru</th>
            </tr>
			</thead>
			<tbody>
				<?php if (count($daftar) > 0) { 
				foreach ($daftar as $key => $value) {
					?>
				<tr>
					<td><a href="snilai/lihatlah/<?=$value['idjadwal'];?>"><?=$this->Model_kelas->getKelas($value['idkelas']);?></a></td>
					<td><?=$this->Model_mapel->getMapelId($value['idmapel']);?></td>
					<td><?=$value['hari'];?> ( <?=$value['jam'];?> )</td>
                    <td>
                        <?=$value['name'];?>
                    </td>
				</tr>
				<?php }
				} ?>
			</tbody>
		</table>
	</div>
    </div>
    </div>

  <!-- Modal -->
  <div class="modal fade" id="newsnilaiModal" tabindex="-1" role="dialog" aria-labelledby="newsnilaiModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="newsnilaiModalLabel">Tambah Data Nilai</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('snilai/siswa'); ?>" method="post">
                        <div class="modal-body">
                            
						<div class="form-group">
                                <input type="text" class="form-control" id="tingkat" name="tingkat"
                                    placeholder="Tingkat Belajar">
                            	</div>

								<div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jurusan<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <?php
                                        echo $this->model_snilai->kelasDropdownjurusan();
                                        ?>
                                    </div>
                                </div>

						<div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Kelas<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <?php
                                        echo $this->model_snilai->kelasDropdown();
                                        ?>
                                    </div>
                                </div>

								<div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Mapel<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <?php
                                        echo $this->model_snilai->kelasDropdownmapel();
                                        ?>
                                    </div>
                                </div>

								<div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Guru<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <?php
                                        echo $this->model_snilai->kelasDropdownguru();
                                        ?>
                                    </div>
                                </div>
								<div class="form-group">
                                <input type="text" class="form-control" id="jam" name="jam"
                                    placeholder="Jam Belajar">
                            	</div>
								<div class="form-group">
                                <input type="text" class="form-control" id="idruangan" name="idruangan"
                                    placeholder="Ruangan Belajar">
                            	</div>
								<div class="form-group">
                                <input type="text" class="form-control" id="hari" name="hari"
                                    placeholder="Hari Belajar">
                            	</div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        </div>

</div>
