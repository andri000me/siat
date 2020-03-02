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

                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newInventarisModal">Tambah Data
                        Inventaris</a>
                    
                    <a href="#" onClick="goprint()" class="btn btn-primary mb-3"><i class="fas fa-print" ></i>Cetak</a>
                    
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <td>
                      <th>nomor</th>
                      <th>nama</th>
                      <th>uraian</th>
                      <th>jumlah</th>
                      <th>tanggal perolehan</th>
                      <th>asal barang</th>
                      <th>keadaan</th>
                      <th>harga</th>
                      <th>keterangan</th>
                      <th>aksi</th>
                    </tr>
                    </td>
                  </thead>
                  <tfoot>
                    <tr>
                    <td>
                      <th>nomor</th>
                      <th>nama</th>
                      <th>uraian</th>
                      <th>jumlah</th>
                      <th>tanggal perolehan</th>
                      <th>asal barang</th>
                      <th>keadaan</th>
                      <th>harga</th>
                      <th>keterangan</th>
                      <th>aksi</th>
                    </tr>
                    </td>
                  </tfoot>
                  <tbody>
                  <?php $n = 1; ?>
                            <?php foreach ($inventaris as $i) : ?>
                            <tr>
                                <th scope="row"><?= $n; ?></th>
                                <td><?= $i['no_inventaris']; ?></td>
                                <td><?= $i['nama']; ?></td>
                                <td><?= $i['uraian']; ?></td>
                                <td><?= $i['kwantitas']; ?></td>
                                <td><?= $i['tgl_perolehan']; ?></td>
                                <td><?= $i['asal_barang']; ?></td>
                                <td><?= $i['keadaan']; ?></td>
                                <td><?= $i['harga']; ?></td>
                                <td><?= $i['keterangan']; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>inventaris/lihat/<?= $i['idinventaris'];?>" class="badge badge-primary">Lihat</a>
                                    <a href="<?= base_url(); ?>inventaris/cetak/<?= $i['idinventaris'];?>" class="badge badge-secondary">Cetak</a>
                                    <a href="<?= base_url(); ?>inventaris/ubah/<?= $i['idinventaris'];?>" class="badge badge-success">Ubah</a>
                                    <a href="<?= base_url(); ?>inventaris/hapus/<?= $i['idinventaris'];?>" class="badge badge-danger" onclick="return confirm('hapus?');">Hapus</a>
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
                        <h5 class="modal-title" id="newInventarisModalLabel">Add New Inventaris</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('inventaris'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="no_inventaris" name="no_inventaris"
                                    placeholder="Nomor Inventaris">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Nama Inventaris">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="uraian" name="uraian"
                                    placeholder="Uraian Inventaris">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="kwantitas" name="kwantitas"
                                    placeholder="Kwantitas Inventaris">
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control" id="tgl_perolehan" name="tgl_perolehan"
                                    placeholder="Tanggal Perolehan Inventaris">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="asal_barang" name="asal_barang"
                                    placeholder="Asal Inventaris">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="keadaan" name="keadaan"
                                    placeholder="Keadaan Inventaris">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga Inventaris">
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

        <script>
        function goprint(){
            window.print();
        }
        </script>