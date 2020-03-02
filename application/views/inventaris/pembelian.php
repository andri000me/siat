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

                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newPembelianModal">Tambah Data
                        Pembelian</a>

                        <a href="#" onClick="goprint()" class="btn btn-primary mb-3"><i class="fas fa-print" ></i>Cetak</a>
                        
                        <? print_r($inventaris) ?>

                        <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <td>
                      <th>beli</th>
                      <th>nama</th>
                      <th>uraian</th>
                      <th>kwantitas</th>
                      <th>harga</th>
                      <th>pembayaran</th>
                      <th>terima</th>
                      <th>keterangan</th>
                      <th>aksi</th>
                    </tr>
                    </td>
                  </thead>
                  <tfoot>
                    <tr>
                    <td>
                      <th>beli</th>
                      <th>nama</th>
                      <th>uraian</th>
                      <th>kwantitas</th>
                      <th>harga</th>
                      <th>pembayaran</th>
                      <th>terima</th>
                      <th>keterangan</th>
                      <th>aksi</th>
                    </tr>
                    </td>
                  </tfoot>
                  <tbody>
                  <?php $n = 1; ?>
                            <?php foreach ($pembelian as $e) : ?>
                            <tr>
                                <th scope="row"><?= $n; ?></th>
                                
                                <td><?= $e['tgl_beli']; ?></td>
                                <td><?= $e['nama']; ?></td>
                                <td><?= $e['uraian']; ?></td>
                                <td><?= $e['kwantitas']; ?></td>
                                <td><?= $e['harga']; ?></td>
                                <td><?= $e['cara_bayar']; ?></td>
                                <td><?= $e['tgl_terima']; ?></td>
                                <td><?= $e['keterangan']; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>inventaris/lihatbeli/<?= $e['idpembelian'];?>" class="badge badge-primary">Lihat</a>                                   
                                    <a href="<?= base_url(); ?>inventaris/ubahbeli/<?= $e['idpembelian'];?>" class="badge badge-success">Ubah</a>
                                    <a href="<?= base_url(); ?>inventaris/hapusbeli/<?= $e['idpembelian'];?>" class="badge badge-danger" onclick="return confirm('hapus?');">Hapus</a>
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
        <div class="modal fade" id="newPembelianModal" tabindex="-1" role="dialog" aria-labelledby="newPembelianModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newPembelianModalLabel">Tambah Data Pembelian</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="<?= base_url('inventaris/pembelian'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="date" class="form-control" id="tgl_beli" name="tgl_beli"
                                    placeholder="Tanggal Pembelian">
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
                                <input type="text" class="form-control" id="harga" name="harga"
                                    placeholder="Harga Pembelian">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="cara_bayar" name="cara_bayar"
                                    placeholder="Metode Pembayaran">
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control" id="tgl_terima" name="tgl_terima"
                                    placeholder="Tanggal Terima Pembelian">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    placeholder="Keterangan Pembelian">
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