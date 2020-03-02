        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

                                

            <div class="row">
                <div class="col-lg">
                    <div class="row">
                        <div class="col-md-3 text-center border-dark">
                            <br>
                        </div>
                        <div class="col-md-6 text-center"><h3>
                                 Nama Siswa<br />
                            
                        <?php
                        foreach ($nilai as $i) : ?>
                        <?= $i['nama']; ?>
                                    <?php endforeach; ?>

                        </h3></div>
                        <div class="col-md-3 text-center"><br />
                        </div>
                 </div>
                    
                <div class="card-body">
              <div class="table-responsive">
                 <!-- <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#pilihsiswa">Tambah Siswa</a> -->

                <!-- ini tabel -->

                               
                <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>

                                    <th width="5%">No</th>
                                    <th>Kategori Nilai</th>
                                    <th>Nilai</th>

                                </tr>
                                
                            </thead>

                            <tbody>
                                 <?php
                                $no=1;
                                $noo=1;
                                foreach ($nilai as $i) : ?>
                                <tr>

                                    <td class="center">
                                    <?php echo $no++; ?>
                                    </td>

                                    <td>Nilai Tugas</td>
                                    <td><?= $i['rata']; ?></td>
                                </tr>

                                <tr>

                                    <td class="center">
                                    <?php echo $no++; ?>
                                    </td>

                                    <td>Nilai UTS</td>
                                    <td><?= $i['uts']; ?></td>
                                </tr>

                                <tr>

                                    <td class="center">
                                    <?php echo $no++; ?>
                                    </td>

                                    <td>Nilai UAS</td>
                                    <td><?= $i['uas']; ?></td>
                                </tr>

                                
                                    <?php endforeach; ?>

                                <!-- sub total -->
                                <tr>
                                    <td colspan=2>Nilai akhir = tugas (50%) + UTS (25%) + UAS (25%)</td>
                                    <td>
                                         <?php
                        foreach ($nilai as $i) : ?>
                        <?= $i['nilaiakhir']; ?>
                                    <?php endforeach; ?>
                                    </td>
                                </tr>
                                <!-- sub total -->
                            </tbody>

                          </table>
                <!-- ini tabel -->

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