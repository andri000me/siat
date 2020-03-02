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

                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMapelModal">Tambah Data Mapel</a>
                        
                        <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable12" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <td>
                      <th>kode</th>
                      <th>mapel</th>
                      <th>aksi</th>
                    </tr>
                    </td>
                  </thead>
                  <tfoot>
                    <tr>
                    <td>
                      <th>kode</th>
                      <th>mapel</th>
                      <th>aksi</th>
                    </tr>
                    </td>
                  </tfoot>
                  <tbody>
                  <?php $n = 1; ?>
                            <?php foreach ($mapel as $i) : ?>
                            <tr>
                                <th scope="row"><?= $n; ?></th>
                                <td><?= $i['kd_mapel']; ?></td>
                                <td><?= $i['mapel']; ?></td>
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
        <div class="modal fade" id="newMapelModal" tabindex="-1" role="dialog" aria-labelledby="newMapelModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newMapelModalLabel">Tambah Data Mapel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('kurikulum/mapel'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="kd_mapel" name="kd_mapel"
                                    placeholder="Kode Mata Pelajaran">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="mapel" name="mapel"
                                    placeholder="Nama Mata Pelajaran">
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