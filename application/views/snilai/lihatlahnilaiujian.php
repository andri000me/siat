        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

<?= $this->session->flashdata('flash')  ?>.


            <div class="row">
                <div class="col-lg">
                    <a href="<?= base_url(); ?>snilaiujian" class="btn btn-primary mb-3">Kembali</a>

                    <!-- <div class="row">
                        <div class="col-md-3 text-center border-dark">
                            Kelas<br>
                            <?=$this->Model_kelas->getKelas($jadwal['idkelas']);?>
                        </div>
                        <div class="col-md-6 text-center"><h3>Nilai <br />
                        <?=$this->Jadwal_model->getMapel($jadwal['idmapel']);?>
                        </h3></div>
                        <div class="col-md-3 text-center">Guru<br />
                        <?=$this->Model_guru->getGuru($jadwal['idguru']); ?>
                        </div> -->
      <!--            </div> -->
                    
                <div class="card-body">
              <div class="table-responsive">
                 <!-- <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#pilihsiswa">Tambah Siswa</a> -->

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <td>
                      <th>NIS</th>
                      <th>Nama</th>
                      <th>Nilai UTS</th>
                      <th>Nilai UAS</th>
                      <th>Nilai Akhir</th>
                      <th>Keterangan</th>
                    </tr>
                    </td>
                  </thead>
                  <tfoot>
                    <tr>
                    <td>
                      <th>NIS</th>
                      <th>Nama</th>
                      <th>Nilai UTS</th>
                      <th>Nilai UAS</th>
                      <th>Nilai Akhir</th>
                      <th>Keterangan</th>
                    </tr>
                    </td>
                  </tfoot>
                  <tbody>
                  <?php $n = 1; ?>
                            <?php foreach ($siswakelas as $i) : 
                                    $ratanilai = $i['idratanilai'];
                                ?>

                            <tr>
                                <th scope="row"><?= $n; ?></th>
                                <th><?= $i['nis']; ?></td>
                                <td><?= $i['nama']; ?></td>
                                <td>
                                    <!-- membuat form-->
                                    <form action="" method="post">
                                        <input type="hidden" id="" name="fkidratanilai" value="<?= $ratanilai?>">

                                        <input type="text" size="5" id="" name="nilaiuts">

                                        <button type="submit" class="badge badge-success">Simpan</button>
                                    </form>
                                    <!-- membuat form-->

                                </td>
                                <td>
                                    <!-- membuat form-->
                                    <form action="" method="post">
                                        <input type="hidden" id="" name="fkidratanilai" value="<?= $ratanilai?>">

                                        <input type="text" size="5" id="" name="nilaiuas">

                                        <button type="submit" class="badge badge-success">Simpan</button>
                                    </form>
                                    <!-- membuat form-->

                                </td>
                                <td><a href="<?= base_url(); ?>snilaiujian/lihattugas/<?=$i['idratanilai'];?>"> <?= $i['nilaiakhir']; ?></td> <!-- menampilkan halaman isi nilai uts uas dan rata tugas -->
                                <td><?= $i['keterangan']; ?></td>
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
        <div class="modal fade" id="newInventarisModal" tabindex="-1" role="dialog" aria-labelledby="pilihsiswa"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newInventarisModalLabel">Tambah Siswa Untuk penilaian</h5>
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