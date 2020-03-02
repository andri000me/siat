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

                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newPenyusutanModal">Tambah Data 
                        Penyusutan</a>
                        
                        <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable6" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <td>
                      <th>perolehan</th>
                      <th>nomor inventaris</th>
                      <th>nama barang</th>
                      <th>uraian</th>
                      <th>kondisi</th>
                      <th>waktu penyusutan</th>
                      <th>aksi</th>
                    </tr>
                    </td>
                  </thead>
                  <tfoot>
                    <tr>
                    <td>
                      <th>perolehan</th>
                      <th>nomor inventaris</th>
                      <th>nama barang</th>
                      <th>uraian</th>
                      <th>kondisi</th>
                      <th>waktu penyusutan</th>
                      <th>aksi</th>
                    </tr>
                    </td>
                  </tfoot>
                  <tbody>
                  <?php $n = 1; ?>
                            <?php foreach ($penyusutan as $i) : ?>
                            <tr>
                                <th scope="row"><?= $n; ?></th>
                                <td><?= $i['tgl_perolehan']; ?></td>
                                <td><?= $i['no_inventaris']; ?></td>
                                <td><?= $i['nama_barang']; ?></td>
                                <td><?= $i['uraian']; ?></td>
                                <td><?= $i['kondisi']; ?></td>
                                <td><?= $i['minggu_penyusutan']; ?></td>
                                <td>
                                <a href="<?= base_url(); ?>inventaris/lihatsusut/<?= $i['idpenyusutan'];?>" class="badge badge-primary">Lihat</a>
                                    <!-- <a href="<?= base_url(); ?>inventaris/cetak/<?= $i['idpenyusutan'];?>" class="badge badge-secondary">Cetak</a> -->
                                    <a href="<?= base_url(); ?>inventaris/ubahsusut/<?= $i['idpenyusutan'];?>" class="badge badge-success">Ubah</a>
                                    <a href="<?= base_url(); ?>inventaris/hapus/<?= $i['idpenyusutan'];?>" class="badge badge-danger" onclick="return confirm('hapus?');">Hapus</a>
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
        <div class="modal fade" id="newPenyusutanModal" tabindex="-1" role="dialog" aria-labelledby="newPenyusutanModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newPenyusutanModalLabel">Tambah Data Penyusutan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('inventaris/penyusutan'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="date" class="form-control" id="tgl_perolehan" name="tgl_perolehan"
                                    placeholder="Tanggal Perolehan Inventaris">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="no_inventaris" name="no_inventaris"
                                    placeholder="Nomor Inventaris">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                    placeholder="Nama Inventaris">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="uraian" name="uraian"
                                    placeholder="Uraian Inventaris">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="kondisi" name="kondisi"
                                    placeholder="Kondisi Inventaris">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="minggu_penyusutan" name="minggu_penyusutan"
                                    placeholder="Minggu Penyusutan Inventaris">
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