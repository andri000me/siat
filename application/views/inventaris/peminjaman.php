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

                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newInventarisModal">Tambah Data Peminjaman</a>
                        
                        <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <td>
                      <th>nama_barang</th>
                      <th>jumlah</th>
                      <th>keperluan</th>
                      <th>pinjam</th>
                      <th>kembali</th>
                      <th>peminjam</th>
                      <th>petugas</th>
                      <th>aksi</th>
                    </tr>
                    </td>
                  </thead>
                  <tfoot>
                    <tr>
                    <td>
                      <th>nama_barang</th>
                      <th>jumlah</th>
                      <th>keperluan</th>
                      <th>pinjam</th>
                      <th>kembali</th>
                      <th>peminjam</th>
                      <th>petugas</th>
                      <th>aksi</th>
                    </tr>
                    </td>
                  </tfoot>
                  <tbody>
                  <?php $n = 1; ?>
                            <?php foreach ($peminjaman as $p) : ?>
                            <tr>
                                <th scope="row"><?= $n; ?></th>
                                <td><?= $p['nama_barang']; ?></td>
                                <td><?= $p['jumlah']; ?></td>
                                <td><?= $p['keperluan']; ?></td>
                                <td><?= $p['tgl_pinjam']; ?></td>
                                <td><?= $p['tgl_kembali']; ?></td>
                                <td><?= $p['peminjam']; ?></td>
                                <td><?= $p['petugas']; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>inventaris/lihatpinjam/<?= $p['idpeminjaman'];?>" class="badge badge-primary">Lihat</a>
                                    <!-- <a href="<?= base_url(); ?>inventaris/cetak/<?= $p['idpeminjaman'];?>" class="badge badge-secondary">Cetak</a> -->
                                    <a href="<?= base_url(); ?>inventaris/ubahpinjam/<?= $p['idpeminjaman'];?>" class="badge badge-success">Ubah</a>
                                    <a href="<?= base_url(); ?>inventaris/hapus/<?= $p['idpeminjaman'];?>" class="badge badge-danger" onclick="return confirm('hapus?');">Hapus</a>
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
                        <h5 class="modal-title" id="newInventarisModalLabel">Tambah Data Peminjaman</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('inventaris/peminjaman'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                    placeholder="Nama Barang yang Dipinjam">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="jumlah" name="jumlah"
                                    placeholder="Jumlah Barang Dipinjam">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="keperluan" name="keperluan"
                                    placeholder="Keperluan Peminjam">
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam"
                                    placeholder="Tanggal Pinjam Barang">
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali"
                                    placeholder="Tanggal Barang Kembali">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="peminjam" name="peminjam"
                                    placeholder="Nama Peminjam">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="petugas" name="petugas"
                                    placeholder="Petugas Penerima Peminjaman Barang">
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