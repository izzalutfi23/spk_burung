<div class="main-panel">
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
		<div class="container-fluid">
			<div class="navbar-wrapper">
				<a class="navbar-brand" href="javascript:;">Hasil Dari Perhitungan SAW</a>
			</div>
			<button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
				aria-expanded="false" aria-label="Toggle navigation">
				<span class="sr-only">Toggle navigation</span>
				<span class="navbar-toggler-icon icon-bar"></span>
				<span class="navbar-toggler-icon icon-bar"></span>
				<span class="navbar-toggler-icon icon-bar"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-end">
				<form class="navbar-form">
					<div class="input-group no-border">
						<input type="text" value="" class="form-control" placeholder="Search...">
						<button type="submit" class="btn btn-white btn-round btn-just-icon">
							<i class="material-icons">search</i>
							<div class="ripple-container"></div>
						</button>
					</div>
				</form>
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="javascript:;">
							<i class="material-icons">dashboard</i>
							<p class="d-lg-none d-md-block">
								Stats
							</p>
						</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">
							<i class="material-icons">person</i>
							<p class="d-lg-none d-md-block">
								Account
							</p>
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
							<a class="dropdown-item" href="#">Profile</a>
							<a class="dropdown-item" href="#">Settings</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?=base_url('login/logout')?>">Log out</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- End Navbar -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header card-header-primary">
							<h4 class="card-title ">Normalisasi</h4>
							<p class="card-category"> Normalisasi Nilai</p>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table">
									<thead class=" text-primary">
										<th rowspan="2" style="text-align: center;">Alternatif</th>
										<th colspan="<?php echo $jml_kriteria; ?>" style="text-align: center;">Kriteria
										</th>
										<tr>
											<?php
                                                foreach($kriterias as $data_kriteria) {
                                            ?>
											<th style="text-align: center;">
												<?php echo $data_kriteria->nama_kriteria ?></th>
											<?php } ?>
									</thead>
									<tbody>
										<?php
                                            foreach($peserta as $data_alternatif) {
                                        ?>
										<tr>
											<td>
												<center>K<?php echo $data_alternatif->id_peserta ?></center>
											</td>
											<?php
                                            // tampilkan nilai dengan id_alternatif ...
                                            $hasil_normalisasi=0;
                                            $nilai = $this->db->query("SELECT * FROM nilai WHERE id_peserta='$data_alternatif->id_peserta'")->result();
                                            foreach($nilai as $data_nilai) {
                                            //
                                                $kriteria = $this->db->query("SELECT * FROM kriteria WHERE id_kriteria='$data_nilai->id_kriteria'")->result();
                                                foreach($kriteria as $data_kriteria) {
                                                if ($data_kriteria->jenis=="cost") {
                                                    $min = $this->db->query("SELECT id_kriteria, MIN(nilai) AS min FROM nilai WHERE id_kriteria='$data_nilai->id_kriteria' GROUP BY id_kriteria")->result();
                                                    foreach($min as $data_min) { ?>
											<td>
												<center>
													<?php
                                                        echo number_format($hasil = $data_min->min/$data_nilai->nilai,2);
                                                            $hasil_kali = $hasil*$data_kriteria->bobot;
                                                            $hasil_normalisasi=$hasil_normalisasi+$hasil_kali;

                                                        ?>
												</center>
											</td>
											<?php } ?>

											<?php }elseif ($data_kriteria->jenis=="benefit") {
                                                    $max = $this->db->query("SELECT id_kriteria, MAX(nilai) AS max FROM nilai WHERE id_kriteria='$data_nilai->id_kriteria' GROUP BY id_kriteria")->result();
                                                    foreach($max as $data_max) { ?>
											<td>
												<center>
													<?php
                                                        echo $hasil = $data_nilai->nilai/$data_max->max;
                                                            $hasil_kali = $hasil*$data_kriteria->bobot;
                                                            $hasil_normalisasi=$hasil_normalisasi+$hasil_kali;

                                                        ?>
												</center>
											</td>
											<?php } ?>
											<?php }
                                                ?>

											<?php } } ?>

										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header card-header-primary">
							<h4 class="card-title ">Pembobotan</h4>
							<p class="card-category"> Pembobotan Nilai</p>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table">
									<thead class=" text-primary">
										<th rowspan="2" style="text-align: center;">Alternatif</th>
										<th colspan="<?php echo $jml_kriteria; ?>" style="text-align: center;">Kriteria
										</th>
										<th rowspan="2" style="text-align: center;">Hasil</th>
										<tr>
											<?php
                                            foreach($kriterias as $data_kriteria) {
                                        ?>
											<th style="text-align: center;">
												<?php echo $data_kriteria->nama_kriteria ?></th>
											<?php } ?>
									</thead>
									<tbody>
										<?php
                                            $hasil_ranks=array();
                                            foreach($peserta as $data_alternatif) {
                                        ?>
										<tr>
											<td>
												<center>K<?php echo $data_alternatif->id_peserta ?></center>
											</td>
											<?php
                                            // tampilkan nilai dengan id_alternatif ...
                                            $hasil_normalisasi=0;
                                            $nilai = $this->db->query("SELECT * FROM nilai WHERE id_peserta='$data_alternatif->id_peserta'")->result();
                                            foreach($nilai as $data_nilai) {
                                            //
                                                $kriteria = $this->db->query("SELECT * FROM kriteria WHERE id_kriteria='$data_nilai->id_kriteria'")->result();
                                                foreach($kriteria as $data_kriteria) {
                                                if ($data_kriteria->jenis=="cost") {
                                                    $min = $this->db->query("SELECT id_kriteria, MIN(nilai) AS min FROM nilai WHERE id_kriteria='$data_nilai->id_kriteria' GROUP BY id_kriteria")->result();
                                                    foreach($min as $data_min) { ?>
											<td>
												<center>
													<?php
                                                    number_format($hasil = $data_min->min/$data_nilai->nilai,2);
                                                    echo  $hasil_kali = $hasil*$data_kriteria->bobot;
                                                    $hasil_normalisasi=$hasil_normalisasi+$hasil_kali;
                                                ?>
												</center>
											</td>
											<?php } ?>

											<?php }elseif ($data_kriteria->jenis=="benefit") {
                                            $max = $this->db->query("SELECT id_kriteria, MAX(nilai) AS max FROM nilai WHERE id_kriteria='$data_nilai->id_kriteria' GROUP BY id_kriteria")->result();
                                            foreach($max as $data_max) { ?>
											<td>
												<center>
													<?php
                                                    $hasil = $data_nilai->nilai/$data_max->max;
                                                    echo $hasil_kali = $hasil*$data_kriteria->bobot;
                                                    $hasil_normalisasi=$hasil_normalisasi+$hasil_kali;
                                                ?>
												</center>
											</td>
											<?php } ?>
											<?php }
                                            ?>
											<?php } } ?>
											<td>
												<center>
													<?php
                                                    $hasil_rank['nilai'] = $hasil_normalisasi;
                                                    $hasil_rank['alternatif'] = $data_alternatif->nama_peserta;
                                                    array_push($hasil_ranks,$hasil_rank);
                                                    echo $hasil_normalisasi; ?>
													</<center>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<div class="row">
							<div class="col-lg-6">
								<h4 class="card-title ">Hasil Rangking</h4>
								<p class="card-category"> Hasil urutan setelah dilakukan perhitungan</p>
							</div>
							<div class="col-lg-6">
                                <form action="<?=base_url('juri/cetak')?>" method="post" target="_blank">
                                <?php 
                                    $json = json_encode($hasil_ranks);
                                ?>
                                <input type="hidden" name="event" value="<?=$event->nama_event?>">
                                <textarea style="display: none;" name="hasil"><?=$json?></textarea>
								<button type="submit"
										class="btn btn-danger btn-sm float-right">Cetak</button>
                                </form>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table">
								<thead class=" text-primary">
									<th style="text-align: center;">Ranking</th>
									<th style="text-align: center;">Nama Alternatif</th>
									<th style="text-align: center;">Nilai Akhir</th>
								</thead>
								<tbody>
									<?php
                                    $no=1;
                                    rsort($hasil_ranks);
                                    foreach ($hasil_ranks as $rank) { ?>
									<tr>
										<td>
											<center><?php echo $no++ ?></center>
										</td>
										<td>
											<center><?php echo $rank['alternatif']; ?></center>
										</td>
										<td>
											<center><?php echo $rank['nilai']; ?></center>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
