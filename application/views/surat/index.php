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

                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newPenyuratanModal">Tambah Data Penyuratan</a>
                        
                        <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable7" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <td>
                    <th>id</th>
                      <th>nomor</th>
                      <th>tanggal</th>
                      <th>pengirim</th>
                      <th>tujuan</th>
                      <th>kepentingan</th>
                      <th>tipe</th>
                      <th>aksi</th>
                    </tr>
                    </td>
                  </thead>
                  <tfoot>
                    <tr>
                    <td>
                    <th>id</th>
                      <th>nomor</th>
                      <th>tanggal</th>
                      <th>pengirim</th>
                      <th>tujuan</th>
                      <th>kepentingan</th>
                      <th>tipe</th>
                      <th>aksi</th>
                    </tr>
                    </td>
                  </tfoot>
                  <tbody>
                  <?php $n = 1; ?>
                            <?php foreach ($penyuratan as $i) : ?>
                            <tr>
                                <th scope="row"><?= $n; ?></th>
                                <td><?= $i['idsurat']; ?></td>
                                <td><?= $i['nomor']; ?></td>
                                <td><?= $i['tanggal']; ?></td>
                                <td><?= $i['pengirim']; ?></td>
                                <td><?= $i['tujuan']; ?></td>
                                <td><?= $i['kepentingan']; ?></td>
                                <td><?= $i['tipe']; ?></td>
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
        <div class="modal fade" id="newPenyuratanModal" tabindex="-1" role="dialog" aria-labelledby="newPenyuratanModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newPenyuratanModalLabel">Tambah Data Penyuratan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('penyuratan'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="nomor" name="nomor"
                                    placeholder="Nomor Surat">
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control" id="tanggal" name="tanggal"
                                    placeholder="Tanggal Surat">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="pengirim" name="pengirim"
                                    placeholder="Pengirim Surat">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="tujuan" name="tujuan"
                                    placeholder="Tujuan Surat">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="kepentingan" name="kepentingan"
                                    placeholder="Kepentingan Surat">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="tipe" name="tipe"
                                    placeholder="Tipe Surat">
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