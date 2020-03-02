        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

         <div class="container">
         <div class="row">
         <div class="col-md-6">
         <div class="card">
            <div class="card-body">
                <h5 class="card-title"><strong>Nama Barang             :</strong> <?= $peminjaman['nama_barang']; ?></h5>
                <h5 class="card-title"><strong>Jumlah Barang              :</strong> <?= $peminjaman['jumlah']; ?></h5>
                <h5 class="card-title"><strong>Keperluan Peminjam            :</strong> <?= $peminjaman['keperluan']; ?></h5>
                <h5 class="card-title"><strong>Tanggal Pinjam         :</strong> <?= $peminjaman['tgl_pinjam']; ?></h5>
                <h5 class="card-title"><strong>Tanggal Kembali          :</strong> <?= $peminjaman['tgl_kembali']; ?></h5>
                <h5 class="card-title"><strong>Nama Peminjam              :</strong> <?= $peminjaman['peminjam']; ?></h5>
                <h5 class="card-title"><strong>Nama Petugas           :</strong> <?= $peminjaman['petugas']; ?></h5>
                <a href="<?= base_url(); ?>peminjaman" class="btn btn-primary">Kembali</a>
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