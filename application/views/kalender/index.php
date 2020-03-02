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

                    <div class="container" align="center">  
                    <div class="card" style="width: 20rem">
                    <div class="card-header">
                        <strong> Kalender Akademik</strong> 
                    </div>
                    <div class="card-body">
                    <?= $calendar;?>
                    </div>
                    </div>
                    </div>

                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newKegiatanModal">Tambah Data Kegiatan Sekolah</a>
                        
                        <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable15" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <td>
                      <th>mulai</th>
                      <th>berakhir</th>
                      <th>keterangan</th>
                      <th>aksi</th>
                    </tr>
                    </td>
                  </thead>
                  <tfoot>
                    <tr>
                    <td>
                      <th>mulai</th>
                      <th>berakhir</th>
                      <th>keterangan</th>
                      <th>aksi</th>
                    </tr>
                    </td>
                  </tfoot>
                  <tbody>
                  <?php $n = 1; ?>
                            <?php foreach ($kalender as $k) : ?>
                            <tr>
                                <th scope="row"><?= $n; ?></th>
                                <td><?= $k['mulai']; ?></td>
                                <td><?= $k['berakhir']; ?></td>                                
                                <td><?= $k['keterangan']; ?></td>
                                <td>
                                    <a href="ubah/<?= $k['id']; ?>" class="badge badge-success">Edit</a>
                                    <a href="hapus/<?= $k['id']; ?>" class="badge badge-danger">Delete</a>
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
        <div class="modal fade" id="newKegiatanModal" tabindex="-1" role="dialog" aria-labelledby="newKegiatanModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newKegiatanModalLabel">Tambah Data Kegiatan Sekolah</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('kalender'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="date" class="form-control" id="mulai" name="mulai"
                                    placeholder="Tanggal Mulai Kegiatan">
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control" id="berakhir" name="berakhir"
                                    placeholder="Tanggal Berakhir Kegiatan">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    placeholder="Keterangan Kegiatan">
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

