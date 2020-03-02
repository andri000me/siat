<div class="container">
	<?php if($this->session->flashdata('flash')): ?>
		<div class="row mt-3">
			<div class="col-md-6">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
	  				Data <strong>Berhasil!</strong> <?= $this->session->flashdata('flash')  ?>.
	  					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    				<span aria-hidden="true">&times;</span>
	  				</button>
				</div>
			</div>
		</div>
	<?php endif ?>
	<?php //print_r($jadwal); ?>
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-3 text-center border-dark">
				Kelas<br>
				<?=$this->Model_kelas->getKelas($jadwal['idkelas']);?>
			</div>
			<div class="col-md-6 text-center"><h3>Absensi <br />
			<?=$this->Jadwal_model->getMapel($jadwal['idmapel']);?>
			</h3></div>
			<div class="col-md-3 text-center">Guru<br />
			<?=$this->Model_guru->getGuru($jadwal['idguru']); ?>
			</div>
		</div>
		<div class="row">
			<form action="" method="post">
				<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<th>Nama Siswa</th>
					<th>
						Baru
					</th>
					<?php 
					$query = "SELECT DISTINCT `tanggal` 
					FROM `absensi`
					WHERE `idmapel` = '{$jadwal['idmapel']}' 
					AND `idkelas` = '{$jadwal['idkelas']}'
					";
					$absen =  $this->db->query($query)->result_array();
					if (count($absen) > 0) {
						foreach ($absen as $k => $v) {
						?>
						<th><?=date("d F", strtotime($v['tanggal']) );?></th>
						<?php }
					}
					?>
				</thead>
				<tbody>
					
				<?php if (count($siswakelas) > 0) {
						foreach ($siswakelas as $k => $v) {
						?>
					<tr>
						<td><?=$v['nama'];?></td>
						<td>
							<select name="status[<?=$v['nis'];?>]" class="form-control">
								<option></option>
								<option value="m">Masuk</option>
								<option value="i">Ijin</option>
								<option value="a">Alpha</option>
								<option value="s">Sakit</option>
							</select>
							<input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
						</td>
						<?php 
						$absen = $this->model_sabsensi->getAbsen($v['nis']);
						if ( count($absen) > 0 ) {
							foreach ($absen as $key => $value) {
								if ($value['status'] == 'm') {
									$status = "Masuk";
								} elseif ($value['status'] == 'i') {
									$status = "Ijin";
								} elseif ($value['status'] == 'a') {
									$status = "Alpha";
								} elseif ($value['status'] == 's') {
									$status = "Sakit";
								} else {
									$status = "";
								}
								
								echo "
								<td>{$status} <br />
								{$value['keterangan']}</td>
								";
							}
							
						}
						?>
						
					</tr>
					<?php }
				}
				?>
					
				</tbody>
				<tfoot>
					<th></th>
					<th><input type="submit" value="Absen" name="absenBaru" class="btn btn-success"></th>
					<?php 
					$query = "SELECT DISTINCT `tanggal` 
					FROM `absensi`
					WHERE `idmapel` = '{$jadwal['idmapel']}' 
					AND `idkelas` = '{$jadwal['idkelas']}'
					";
					$absen =  $this->db->query($query)->result_array();
					if (count($absen) > 0) {
						foreach ($absen as $k => $v) {
						?>
						<th><?=date("d F", strtotime($v['tanggal']) );?></th>
						<?php }
					}
					?>
				</tfoot>
			</table>
				</div>
			<input type="hidden" name="idmapel" value="<?=$jadwal['idmapel'];?>" >
			<input type="hidden" name="idkelas" value="<?=$jadwal['idkelas'];?>" >
			</form>
		</div>
	</div>
</div>
</div>
	</div>
</div>