        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

         <div class="container">
         <div class="row">
         <div class="col-md-6">
         <div class="card">
            <div class="card-body">
                <h5 class="card-title"><strong>Tanggal Perolehan Barang             :</strong> <?= $penghapusan['tanggal_perolehan']; ?></h5>
                <h5 class="card-title"><strong>Nomor Inventaris             :</strong> <?= $penghapusan['no_inventaris']; ?></h5>
                <h5 class="card-title"><strong>Nama Barang            :</strong> <?= $penghapusan['nama_barang']; ?></h5>
                <h5 class="card-title"><strong>Uraian         :</strong> <?= $penghapusan['uraian']; ?></h5>
                <h5 class="card-title"><strong>Kondisi           :</strong> <?= $penghapusan['kondisi']; ?></h5>
                <h5 class="card-title"><strong>Dihapus              :</strong> <?= $penghapusan['dihapus']; ?></h5>
                <h5 class="card-title"><strong>Keterangan           :</strong> <?= $penghapusan['keterangan']; ?></h5>
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