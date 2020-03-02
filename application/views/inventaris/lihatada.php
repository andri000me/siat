        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

         <div class="container">
         <div class="row">
         <div class="col-md-6">
         <div class="card">
            <div class="card-body">
                <h5 class="card-title"><strong>Nama Pengusul            :</strong> <?= $pengadaan['nama']; ?></h5>
                <h5 class="card-title"><strong>Jabatan Pengusul             :</strong> <?= $pengadaan['jabatan']; ?></h5>
                <h5 class="card-title"><strong>Jenis Barang            :</strong> <?= $pengadaan['jns_barang']; ?></h5>
                <h5 class="card-title"><strong>Nama Barang         :</strong> <?= $pengadaan['barang']; ?></h5>
                <h5 class="card-title"><strong>Jumlah Barang        :</strong> <?= $pengadaan['jumlah']; ?></h5>
                <h5 class="card-title"><strong>Harga Barang              :</strong> <?= $pengadaan['harga']; ?></h5>
                <h5 class="card-title"><strong>Tanggal Pengajuan Barang           :</strong> <?= $pengadaan['tgl_pengajuan']; ?></h5>
                <h5 class="card-title"><strong>Penanggung Jawab Pengadaan             :</strong> <?= $pengadaan['menyetujui']; ?></h5>
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