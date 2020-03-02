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
        
        <form action="<?php echo base_url(); ?>snilaiujian/pilihfilter" method="post">
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-group row">

                        <label for="email" class="col-sm-2 col-form-label">Kelas</label>
                        <div class="col-sm-10">

                            <select name="kelas" id="email" class="form-control">
                                <option>--Pilih Kelas--</option>
                                <?php  $kt=$this->db->get('kelas');
                                foreach ($kt->result() as $k){?>
                                <option value="<?php echo $k->idkelas;?>"><?php echo $k->kelas;?></option>
                                <?php }?>
                            </select>

                            <!-- <input type="text" class="form-control" id="email" name="kelas"> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Semester</label>
                        <div class="col-sm-10">

                            <select name="semester" id="name" class="form-control">
                                <option>--Pilih Semester--</option>
                                <option value="1">Ganjil (1)</option>
                                <option value="2">Genap (2)</option>
                            </select>
                            <!-- <input type="text" class="form-control" id="name" name="semster"> -->
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                    </div>
        </form>

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
