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

                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newInventarisModal">Tambah Data Penghapusan</a>
                        
                        <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable4" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <td>
                      <th>Perolehan</th>
                      <th>Nomor Inventaris</th>
                      <th>Nama Barang</th>
                      <th>Uraian</th>
                      <th>Kondisi</th>
                      <th>Dihapus</th>
                      <th>Keterangan</th>
                      <th>aksi</th>
                    </tr>
                    </td>
                  </thead>
                  <tfoot>
                    <tr>
                    <td>
                      <th>Perolehan</th>
                      <th>Nomor Inventaris</th>
                      <th>Nama Barang</th>
                      <th>Uraian</th>
                      <th>Kondisi</th>
                      <th>Dihapus</th>
                      <th>Keterangan</th>
                      <th>aksi</th>
                    </tr>
                    </td>
                  </tfoot>
                  <tbody>
                  <?php $n = 1; ?>
                            <?php foreach ($penghapusan as $d) : ?>
                            <tr>
                                <th scope="row"><?= $n; ?></th>
                                <td><?= $d['tanggal_perolehan']; ?></td>
                                <td><?= $d['no_inventaris']; ?></td>
                                <td><?= $d['nama_barang']; ?></td>
                                <td><?= $d['uraian']; ?></td>
                                <td><?= $d['kondisi']; ?></td>
                                <td><?= $d['dihapus']; ?></td>
                                <td><?= $d['keterangan']; ?></td>
                                <td>
                                <a href="<?= base_url(); ?>inventaris/lihathapus/<?= $d['idpenghapusan'];?>" class="badge badge-primary">Lihat</a>
                                    <!-- <a href="<?= base_url(); ?>inventaris/cetak/<?= $d['idpenghapusan'];?>" class="badge badge-secondary">Cetak</a> -->
                                    <a href="<?= base_url(); ?>inventaris/ubahhapus/<?= $d['idpenghapusan'];?>" class="badge badge-success">Ubah</a>
                                    <a href="<?= base_url(); ?>inventaris/hapus/<?= $d['idpenghapusan'];?>" class="badge badge-danger" onclick="return confirm('hapus?');">Hapus</a>
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
        <div class="modal fade" id="newInventarisModal" tabindex="-1" role="dialog" aria-labelledby="newInventarisModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newInventarisModalLabel">Tambah Data Penghapusan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('inventaris/penghapusan'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="date" class="form-control" id="tanggal_perolehan" name="tanggal_perolehan"
                                    placeholder="Tanggal Perolehan Inventaris">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="no_inventaris" name="no_inventaris"
                                    placeholder="Nomor faktur Inventaris">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                    placeholder="Nama Barang Inventaris">
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
                                <input type="text" class="form-control" id="dihapus" name="dihapus"
                                    placeholder="Alasan Penghapusan Inventaris">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    placeholder="Keterangan Inventaris">
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