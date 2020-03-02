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

                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSppModal">Tambah Data Pembayaran SPP</a>
                    
                    <a href="#" onClick="goprint()" class="btn btn-primary mb-3"><i class="fas fa-print" ></i>Cetak</a>   
                        <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable10" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <td>
                      <th>nis</th>
                      <th>nama</th>
                      <th>kelas</th>
                      <th>keterangan</th>
                      <th>tanggal</th>                      
                      <th>jumlah</th>
                      <th>aksi</th>
                    </tr>
                    </td>
                  </thead>
                  <tfoot>
                    <tr>
                    <td>
                      <th>nis</th>
                      <th>nama</th>
                      <th>kelas</th>
                      <th>keterangan</th>
                      <th>tanggal</th>                      
                      <th>jumlah</th>
                      <th>aksi</th>
                    </tr>
                    </td>
                  </tfoot>
                  <tbody>
                  <?php $n = 1; ?>
                            <?php foreach ($spp as $i) : ?>
                            <tr>
                                <th scope="row"><?= $n; ?></th>
                                <td><?= $i['nis']; ?></td>
                                <td><?= $i['nama']; ?></td>                                
                                <td><?= $i['kelas']; ?></td>
                                <td><?= $i['keterangan']; ?></td>
                                <td><?= $i['tanggal']; ?></td>
                                <td><?= $i['jumlah']; ?></td>
                                <td>
                                    <!-- <a href="<?= base_url(); ?>inventaris/lihat/<?= $i['idinventaris'];?>" class="badge badge-primary">Lihat</a> -->
                                    <!-- <a href="<?= base_url(); ?>inventaris/cetak/<?= $i['idinventaris'];?>" class="badge badge-secondary">Cetak</a> -->
                                    <a href="<?= base_url(); ?>bendahara/ubah/<?= $i['idspp'];?>" class="badge badge-success">Ubah</a>
                                    <a href="<?= base_url(); ?>bendahara/hapus/<?= $i['idspp'];?>" class="badge badge-danger" onclick="return confirm('hapus?');">Hapus</a>
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
        <div class="modal fade" id="newSppModal" tabindex="-1" role="dialog" aria-labelledby="newSppModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newSppModalLabel">Tambah Data Pembayaran SPP</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('bendahara'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="nis" name="nis"
                                    placeholder="NIS Siswa">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Nama Siswa">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="kelas" name="kelas"
                                    placeholder="Kelas Siswa">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    placeholder="Keterangan Pembayaran SPP">
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control" id="tanggal" name="tanggal"
                                    placeholder="Tanggal Pembayaran SPP">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="jumlah" name="jumlah"
                                    placeholder="Jumlah Pembayaran">
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
        }</script>