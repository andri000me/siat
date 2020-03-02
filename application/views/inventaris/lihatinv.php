        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

         <div class="container">
         <div class="row">
         <div class="col-md-6">
         <div class="card">
            <div class="card-body">
                <h5 class="card-title"><strong>Nomor Barang             :</strong> <?= $inventaris['no_inventaris']; ?></h5>
                <h5 class="card-title"><strong>Nama Barang              :</strong> <?= $inventaris['nama']; ?></h5>
                <h5 class="card-title"><strong>Uraian Barang            :</strong> <?= $inventaris['uraian']; ?></h5>
                <h5 class="card-title"><strong>Kwantitas Barang         :</strong> <?= $inventaris['kwantitas']; ?></h5>
                <h5 class="card-title"><strong>Tanggal Perolehan Barang :</strong> <?= $inventaris['tgl_perolehan']; ?></h5>
                <h5 class="card-title"><strong>Asal Barang              :</strong> <?= $inventaris['asal_barang']; ?></h5>
                <h5 class="card-title"><strong>Keadaan Barang           :</strong> <?= $inventaris['keadaan']; ?></h5>
                <h5 class="card-title"><strong>Harga Barang             :</strong> <?= $inventaris['harga']; ?></h5>
                <h5 class="card-title"><strong>Keterangan Barang        :</strong> <?= $inventaris['keterangan']; ?></h5>
                <a href="<?= base_url(); ?>inventaris" class="btn btn-primary">Kembali</a>
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