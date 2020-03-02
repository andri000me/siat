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

                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newKaryawanModal">Tambah Data Karyawan</a>
                        
                        <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable8" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <td>
                    <th>id</th>
                      <th>status</th>
                      <th>nama</th>
                      <th>lahir</th>
                      <th>jabatan</th>
                      <th>gender</th>
                      <th>agama</th>
                      <th>alamat</th>
                      <th>aksi</th>
                    </tr>
                    </td>
                  </thead>
                  <tfoot>
                    <tr>
                    <td>
                    <th>id</th>
                      <th>status</th>
                      <th>nama</th>
                      <th>lahir</th>
                      <th>jabatan</th>
                      <th>gender</th>
                      <th>agama</th>
                      <th>alamat</th>
                      <th>aksi</th>
                    </tr>
                    </td>
                  </tfoot>
                  <tbody>
                  <?php $n = 1; ?>
                            <?php foreach ($karyawan as $i) : ?>
                            <tr>
                                <th scope="row"><?= $n; ?></th>
                                <td><?= $i['idkaryawan']; ?></td>
                                <td><?= $i['status']; ?></td>
                                <td><?= $i['nama']; ?></td>
                                <td><?= $i['lahir']; ?></td>
                                <td><?= $i['jabatan']; ?></td>
                                <td><?= $i['gender']; ?></td>
                                <td><?= $this->model_induk->getAgama($i['idagama']); ?></td>
                                <td><?= $i['alamat']; ?></td>
                                <td>
                                    <a href="" class="badge badge-success">Edit</a>
                                    <a href="" class="badge badge-danger">Delete</a>
                                </td>
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
        <div class="modal fade" id="newKaryawanModal" tabindex="-1" role="dialog" aria-labelledby="newKaryawanModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newKaryawanModalLabel">Tambah Data Karyawan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('induk'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="status" name="status"
                                    placeholder="Status Karyawan">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Nama Karyawan">
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control" id="lahir" name="lahir"
                                    placeholder="Tanggal Lahir">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="jabatan" name="jabatan"
                                    placeholder="Jabatan Karyawan">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="gender" name="gender"
                                    placeholder="Jenis Kelamin Karyawan">
                            </div>
                            <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Agama<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <?php
                                        echo $this->model_induk->agamaDropdown();
                                        ?>
                                    </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    placeholder="Alamat Karyawan">
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