        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

         <div class="container">
         <div class="row">
         <div class="col-md-6">
         <div class="card">
            <div class="card-body">
                <h5 class="card-title"><strong>Tanggal Beli Inventaris:</strong> <?= $pembelian['tgl_beli']; ?></h5>
                <h5 class="card-title"><strong>Nama Barang:</strong> <?= $pembelian['nama']; ?></h5>
                <h5 class="card-title"><strong>Uraian Barang:</strong> <?= $pembelian['uraian']; ?></h5>
                <h5 class="card-title"><strong>Kwantitas Barang:</strong> <?= $pembelian['kwantitas']; ?></h5>
                <h5 class="card-title"><strong>Harga Pembelian Inventaris:</strong> <?= $pembelian['harga']; ?></h5>
                <h5 class="card-title"><strong>Cara Pembayaran Barang:</strong> <?= $pembelian['cara_bayar']; ?></h5>
                <h5 class="card-title"><strong>Tanggal Terima Barang:</strong> <?= $pembelian['tgl_terima']; ?></h5>            
                <h5 class="card-title"><strong>Keterangan Barang:</strong> <?= $pembelian['keterangan']; ?></h5>
                <a href="<?= base_url(); ?>pembelian" class="btn btn-primary">Kembali</a>
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