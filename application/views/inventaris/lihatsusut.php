        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

         <div class="container">
         <div class="row">
         <div class="col-md-6">
         <div class="card">
            <div class="card-body">
                <h5 class="card-title"><strong>Tanggal Perolehan             :</strong> <?= $penyusutan['tgl_perolehan']; ?></h5>
                <h5 class="card-title"><strong>Nomor Inventaris             :</strong> <?= $penyusutan['no_inventaris']; ?></h5>
                <h5 class="card-title"><strong>Nama Barang            :</strong> <?= $penyusutan['nama_barang']; ?></h5>
                <h5 class="card-title"><strong>Uraian Barang         :</strong> <?= $penyusutan['uraian']; ?></h5>
                <h5 class="card-title"><strong>Kondisi Barang           :</strong> <?= $penyusutan['kondisi']; ?></h5>
                <h5 class="card-title"><strong>Minggu Penyusutan Barang              :</strong> <?= $penyusutan['minggu_penyusutan']; ?></h5>
                <a href="<?= base_url(); ?>penyusutan" class="btn btn-primary">Kembali</a>
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