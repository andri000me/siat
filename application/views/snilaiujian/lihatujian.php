        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

            <div class="row">
                <div class="col-lg">
                    <div class="row">
                        <div class="col-md-3 text-center border-dark">
                            Kelas<br>
                            <?=$this->Model_kelas->getKelas($jadwal['idkelas']);?>
                        </div>
                        <div class="col-md-6 text-center"><h3>Nilai <br />
                        <?=$this->Jadwal_model->getMapel($jadwal['idmapel']);?>
                        </h3></div>
                        <div class="col-md-3 text-center">Guru<br />
                        <?=$this->Model_guru->getGuru($jadwal['idguru']); ?>
                        </div>
                 </div>
                    
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
                      <th>Tugas Harian</th>
                      <th>Nilai raport</th>
                      <th>Aksi</th>
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
                      <th>Tugas Harian</th>
                      <th>Nilai raport</th>
                      <th>Aksi</th>
                    </tr>
                    </td>
                  </tfoot>
                  <tbody>
                  <?php $n = 1; ?>
                            <?php foreach ($siswakelas as $i) : 
                                    $ratanilai = $i['id_nilaiujian'];
                                ?>

                            <tr>
                                <th scope="row"><?= $n; ?></th>
                                <th><?= $i['nis']; ?></td>
                                <td><?= $i['nama']; ?></td>
                                <td><?= $i['uts']; ?></td>
                                <td><?= $i['uas']; ?></td>
                                <td><?= $i['rata']; ?></td>
                                <td><?= $i['nilairapot']; ?></td>

                                <td>
                                <a href="<?= base_url(); ?>nilaiujian/tambahujian/<?=$i['id_nilaiujian'];?>" class="badge badge-success">Tambah Nilai</a><br>
                                <a href="<?= base_url(); ?>nilaiujian/raport/<?=$i['idsiswa'];?>" class="badge badge-secondary">Cetak Raport</a></<a>
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
