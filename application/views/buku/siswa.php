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

                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSiswaModal">Tambah Data Siswa</a>

                    <a href="#" onClick="goprint()" class="btn btn-primary mb-3"><i class="fas fa-print" ></i>Cetak</a>
                        
                        <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable9" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <td>
                      <th>nis</th>
                      <th>nama</th>
                      <th>gender</th>
                      <th>tanggal</th>
                      <th>tempat</th>                      
                      <th>agama</th>
                      <th>alamat</th>
                      <th>kelas</th>
                      <th>aksi</th>
                    </tr>
                    </td>
                  </thead>
                  <tfoot>
                    <tr>
                    <td>
                      <th>nis</th>
                      <th>nama</th>
                      <th>gender</th>
                      <th>tanggal</th>
                      <th>tempat</th>                      
                      <th>agama</th>
                      <th>alamat</th>
                      <th>kelas</th>
                      <th>aksi</th>
                    </tr>
                    </td>
                  </tfoot>
                  <tbody>
                  <?php $n = 1; ?>
                            <?php foreach ($siswa as $i) : ?>
                            <tr>
                                <th scope="row"><?= $n; ?></th>
                                <td><?= $i['nis']; ?></td>
                                <td><?= $i['nama']; ?></td>                                
                                <td><?= $i['gender']; ?></td>
                                <td><?= $i['tgl_lahir']; ?></td>
                                <td><?= $i['tempat_lahir']; ?></td>
                                <td><?= $this->model_induk->getAgama($i['idagama']); ?></td>
                                <td><?= $i['alamat']; ?></td>
                                <td><?= $this->model_kelas->getKelas($i['idkelas']); ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>buku/lihatsiswa/<?= $i['idsiswa'];?>" class="badge badge-primary">Lihat</a>
                                    <a href="<?= base_url(); ?>buku/ubahsiswa/<?= $i['idsiswa'];?>" class="badge badge-success">Ubah</a>
                                    <a href="<?= base_url(); ?>buku/hapussiswa/<?= $i['idsiswa'];?>" class="badge badge-danger" onclick="return confirm('hapus?');">Hapus</a>
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
        <div class="modal fade" id="newSiswaModal" tabindex="-1" role="dialog" aria-labelledby="newSiswaModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newSiswaModalLabel">Tambah Data Siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('buku/siswa'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="nis" name="nis"
                                    placeholder="Nis Karyawan">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Nama Karyawan">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="gender" name="gender"
                                    placeholder="Jenis Kelamin Karyawan">
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                                    placeholder="Tanggal Lahir">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                    placeholder="Tempat Lahir">
                            </div>
                            <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Agama<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <?php
                                        echo $this->model_induk->agamaDropdown();
                                        ?>
                                    </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    placeholder="Alamat Karyawan">
                            </div>
                            <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Kelas<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <?php
                                        echo $this->model_kelas->kelasDropdown();
                                        ?>
                                    </div>
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
        </div>
        </div>
        </div>
        
        
        <script>
        function goprint(){
            window.print();
        }
        </script>