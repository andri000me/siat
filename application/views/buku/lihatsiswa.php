        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

         <div class="container">
         <div class="row">
         <div class="col-md-6">
         <div class="card">
            <div class="card-body">
                <h5 class="card-title"><strong>nis siswa          :</strong> <?= $siswa['nis']; ?></h5>
                <h5 class="card-title"><strong>Nama siswa              :</strong> <?= $siswa['nama']; ?></h5>
                <h5 class="card-title"><strong>jenis kelamin           :</strong> <?= $siswa['gender']; ?></h5>
                <h5 class="card-title"><strong>tanggal lahir        :</strong> <?= $siswa['tgl_lahir']; ?></h5>
                <h5 class="card-title"><strong>tempat lahir            :</strong> <?= $siswa['tempat_lahir']; ?></h5>
                <h5 class="card-title"><strong>Agama                    :</strong> <?= $siswa['agama']; ?></h5>
                <h5 class="card-title"><strong>Alamat                   :</strong> <?= $siswa['alamat']; ?></h5>
                <h5 class="card-title"><strong>kelas                   :</strong> <?= $siswa['idkelas']; ?></h5>
                <a href="<?= base_url(); ?>buku" class="btn btn-primary">Kembali</a>
            </div>
         </div>
         </div>
         </div>
         </div>
         </div>
         </div>
         </div>
         </div>
         </div>
         </div>