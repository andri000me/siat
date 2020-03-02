        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

         <div class="container">
         <div class="row">
         <div class="col-md-6">
         <div class="card">
            <div class="card-body">
                <h5 class="card-title"><strong>Status Karyawan          :</strong> <?= $karyawan['status']; ?></h5>
                <h5 class="card-title"><strong>Nama Karyawan              :</strong> <?= $karyawan['nama']; ?></h5>
                <h5 class="card-title"><strong>Tanggal Lahir           :</strong> <?= $karyawan['lahir']; ?></h5>
                <h5 class="card-title"><strong>Jabatan Karyawan         :</strong> <?= $karyawan['jabatan']; ?></h5>
                <h5 class="card-title"><strong>Jenis Kelamin            :</strong> <?= $karyawan['gender']; ?></h5>
                <h5 class="card-title"><strong>Agama                    :</strong> <?= $karyawan['agama']; ?></h5>
                <h5 class="card-title"><strong>Alamat                   :</strong> <?= $karyawan['alamat']; ?></h5>
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