        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

            <div class="row">
                <div class="col-lg">
                    <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                    <?php endif; ?>

                    <?= $this->session->flashdata('message'); ?>

                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newJadwalModal">Tambah Data Jadwal</a>
                        
                        <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable15" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <td>
                      <th>hari</th>
                      <th>jam</th>
                      <th>tingkat</th>
                      <th>jurusan</th>
                      <th>kelas</th>
                      <th>mapel</th>
                      <th>guru</th>
                      <th>ruangan</th>
                      <!-- <th>aksi</th> -->
                    </tr>
                    </td>
                  </thead>
                  <tfoot>
                    <tr>
                    <td>
                    <th>hari</th>
                      <th>jam</th>
                      <th>tingkat</th>
                      <th>jurusan</th>
                      <th>kelas</th>
                      <th>mapel</th>
                      <th>guru</th>
                      <th>ruangan</th>
                      <!-- <th>aksi</th> -->
                    </tr>
                    </td>
                  </tfoot>
                  <tbody>
                  <?php $n = 1; ?>
                            <?php foreach ($jadwal as $i) : ?>
                            <tr>
                                <th scope="row"><?= $n; ?></th>
                                <td><?= $i['hari']; ?></td>
                                <td><?= $i['jam']; ?></td>
                                <td><?= $i['tingkat']; ?></td>
                                <td><?= $this->jadwal_model->getJurusan($i['idjurusan']); ?></td>
                                <td><?= $this->jadwal_model->getKelas($i['idkelas']); ?></td>
                                <td><?= $this->jadwal_model->getMapel($i['idmapel']); ?></td>
                                <td><?= $i['idguru']; ?></td>
                                <td><?= $this->jadwal_model->getRuangan($i['idruangan']); ?></td>
                                <!-- <td> -->
                                    <!-- <a href="" class="badge badge-success">Edit</a>
                                    <a href="" class="badge badge-danger">Delete</a> -->
                                </!-->
                            </tr>
                            <?php $n++; ?>
                            <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Modal -->
        <div class="modal fade" id="newJadwalModal" tabindex="-1" role="dialog" aria-labelledby="newJadwalModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newJadwalModalLabel">Tambah Data Jadwal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('kurikulum/jadwal'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="hari" name="hari"
                                    placeholder="hari">
                            </div>
                            <div class="form-group">
                                <input type="time" class="form-control" id="jam" name="jam"
                                    placeholder="jam">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="tingkat" name="tingkat"
                                    placeholder="tingkat">
                            </div>
                            <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jurusan<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <?php
                                        echo $this->jadwal_model->jurusanDropdown();
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Kelas<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <?php
                                        echo $this->jadwal_model->kelasDropdown();
                                        ?>
                                    </div>
                                </div>
                            <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Mapel<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <?php
                                        echo $this->jadwal_model->mapelDropdown();
                                        ?>
                                    </div>
                                </div>
                            <div class="form-group row">
								<label class="col-sm-3 col-form-label">Guru<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <?php
                                        echo $this->model_guru->guruDropdown();
                                        ?>
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Ruangan<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <?php
                                        echo $this->jadwal_model->ruanganDropdown();
                                        ?>
                                    </div>
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
