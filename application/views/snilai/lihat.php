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
			<div class="col-md-6 text-center"><h3>Nilai <br />
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
					FROM `daftar`
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
							<select name="nilai[<?=$v['nis'];?>]" class="form-control">
								<option></option>
								<option value="100">100</option>
								<option value="95">95</option>
								<option value="90">90</option>
								<option value="85">85</option>
                                <option value="80">80</option>
								<option value="75">75</option>
								<option value="70">70</option>
								<option value="65">65</option>
                                <option value="60">60</option>
								<option value="55">55</option>
								<option value="50">50</option>
							</select>
							<input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
						</td>
						<?php 
						$nilai = $this->model_snilai->getNilai($v['nis']);
						if ( count($nilai) > 0 ) {
							foreach ($nilai as $key => $value) {
								if ($value['nilai'] == '100') {
									$nilai = "100";
								} elseif ($value['nilai'] == '95') {
									$nilai = "95";
								} elseif ($value['nilai'] == '90') {
									$nilai = "90";
								} elseif ($value['nilai'] == '85') {
                                    $nilai = "85";
                                } elseif ($value['nilai'] == '80') {
                                    $nilai = "80";
                                } elseif ($value['nilai'] == '75') {
                                    $nilai = "75";
                                } elseif ($value['nilai'] == '70') {
                                    $nilai = "70";
                                } elseif ($value['nilai'] == '65') {
                                    $nilai = "65";
                                } elseif ($value['nilai'] == '60') {
                                    $nilai = "60";
                                } elseif ($value['nilai'] == '55') {
                                    $nilai = "55";
                                } elseif ($value['nilai'] == '50') {
									$nilai = "50";
								} else {
									$nilai = "";
								}
								
								echo "
								<td>{$nilai} <br />
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
					<th><input type="submit" value="nilai" name="nilaiBaru" class="btn btn-success"></th>
					<?php 
					$query = "SELECT DISTINCT `tanggal` 
					FROM `daftar`
					WHERE `idmapel` = '{$jadwal['idmapel']}' 
					AND `idkelas` = '{$jadwal['idkelas']}'
					";
					$nilai =  $this->db->query($query)->result_array();
					if (count($nilai) > 0) {
						foreach ($nilai as $k => $v) {
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
