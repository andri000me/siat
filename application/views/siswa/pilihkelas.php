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
        
        <form action="<?php echo base_url(); ?>siswa/pilihfilter" method="post">
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
                        <label for="name" class="col-sm-2 col-form-label">Jurusan</label>
                        <div class="col-sm-10">

                            <select name="jurusan" id="name" class="form-control">
                                <option>--Pilih Jurusan--</option>
                                <?php  $kt=$this->db->get('jurusan');
                                foreach ($kt->result() as $k){?>
                                <option value="<?php echo $k->idjurusan;?>"><?php echo $k->jurusan;?></option>
                                <?php }?>
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
        </div>
        </div>

</div>
