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

                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newPengadaanModal">Tambah Data Pengadaan</a>
                        
                        <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <td>
                      <th>nama</th>
                      <th>jabatan</th>
                      <th>jenis</th>
                      <th>barang</th>
                      <th>jumlah</th>
                      <th>harga</th>
                      <th>tanggal pengajuan</th>
                      <th>menyetujui</th>
                      <th>aksi</th>
                    </tr>
                    </td>
                  </thead>
                  <tfoot>
                    <tr>
                    <td>
                      <th>nama</th>
                      <th>jabatan</th>
                      <th>jenis</th>
                      <th>barang</th>
                      <th>jumlah</th>
                      <th>harga</th>
                      <th>tanggal pengajuan</th>
                      <th>menyetujui</th>
                      <th>aksi</th>
                    </tr>
                    </td>
                  </tfoot>
                  <tbody>
                  <?php $n = 1; ?>
                            <?php foreach ($pengadaan as $p) : ?>
                            <tr>
                                <th scope="row"><?= $n; ?></th>
                                <td><?= $p['nama']; ?></td>
                                <td><?= $p['jabatan']; ?></td>
                                <td><?= $p['jns_barang']; ?></td>
                                <td><?= $p['barang']; ?></td>
                                <td><?= $p['jumlah']; ?></td>
                                <td><?= $p['harga']; ?></td>
                                <td><?= $p['tgl_pengajuan']; ?></td>
                                <td><?= $p['menyetujui']; ?></td>
                                <td>
                                <a href="<?= base_url(); ?>inventaris/lihatada/<?= $p['idpengadaan'];?>" class="badge badge-primary">Lihat</a>
                                    <!-- <a href="<?= base_url(); ?>inventaris/cetak/<?= $p['idinventaris'];?>" class="badge badge-secondary">Cetak</a> -->
                                    <a href="<?= base_url(); ?>inventaris/ubahada/<?= $p['idpengadaan'];?>" class="badge badge-success">Ubah</a>
                                    <a href="<?= base_url(); ?>inventaris/hapusada/<?= $p['idpengadaan'];?>" class="badge badge-danger" onclick="return confirm('hapus?');">Hapus</a>
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
        <div class="modal fade" id="newPengadaanModal" tabindex="-1" role="dialog" aria-labelledby="newPengadaanModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newPengadaanModalLabel">Tambah Data Pengadaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('inventaris/pengadaan'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Nama Pemohon">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="jabatan" name="jabatan"
                                    placeholder="Jabatan Pemohon">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="jns_barang" name="jns_barang"
                                    placeholder="Jenis Barang">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="barang" name="barang"
                                    placeholder="Nama Barang">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="jumlah" name="jumlah"
                                    placeholder="Jumlah Barang">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="harga" name="harga"
                                    placeholder="Harga Barang">
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control" id="tgl_pengajuan" name="tgl_pengajuan" 
                                    placeholder="Tanggal Pengajuan Pengadaan">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="menyetujui" name="menyetujui"
                                    placeholder="Penanggung Jawab Pengadaan">
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