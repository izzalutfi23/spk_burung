<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>
		Hasil Perlombaan
	</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css"
		href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
	<!-- CSS Files -->
	<link href="<?=base_url('assets/css/material-dashboard.css?v=2.1.2')?>" rel="stylesheet" />
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="<?=base_url('assets/demo/demo.css')?>" rel="stylesheet" />
</head>

<body class="">
	<!-- End Navbar -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="card card-stats">
						<div class="card-header card-header-warning card-header-icon">
							<div class="card-icon">
								<i class="material-icons">content_copy</i>
							</div>
							<p class="card-category">Used Space</p>
							<h3 class="card-title">49/50
								<small>GB</small>
							</h3>
						</div>
						<div class="card-footer">
							<div class="stats">
								<i class="material-icons text-danger">warning</i>
								<a href="javascript:;">Get More Space...</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="card card-stats">
						<div class="card-header card-header-success card-header-icon">
							<div class="card-icon">
								<i class="material-icons">store</i>
							</div>
							<p class="card-category">Revenue</p>
							<h3 class="card-title">$34,245</h3>
						</div>
						<div class="card-footer">
							<div class="stats">
								<i class="material-icons">date_range</i> Last 24 Hours
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="card card-stats">
						<div class="card-header card-header-danger card-header-icon">
							<div class="card-icon">
								<i class="material-icons">info_outline</i>
							</div>
							<p class="card-category">Fixed Issues</p>
							<h3 class="card-title">75</h3>
						</div>
						<div class="card-footer">
							<div class="stats">
								<i class="material-icons">local_offer</i> Tracked from Github
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="card card-stats">
						<div class="card-header card-header-info card-header-icon">
							<div class="card-icon">
								<i class="fa fa-twitter"></i>
							</div>
							<p class="card-category">Followers</p>
							<h3 class="card-title">+245</h3>
						</div>
						<div class="card-footer">
							<div class="stats">
								<i class="material-icons">update</i> Just Updated
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">

				<?php
                $no=1; 
                foreach($event as $data){
                $no++;
            ?>

            <?php
                $hasil_ranks=array();
                $peserta = $this->db->query("SELECT * FROM peserta WHERE id_event='$data->id_event'")->result();
                foreach($peserta as $data_alternatif) {
            ?>
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
                        <?php
                        number_format($hasil = $data_min->min/$data_nilai->nilai,2);
                        $hasil_kali = $hasil*$data_kriteria->bobot;
                        $hasil_normalisasi=$hasil_normalisasi+$hasil_kali;
                    ?>
                <?php } ?>

                <?php }elseif ($data_kriteria->jenis=="benefit") {
                $max = $this->db->query("SELECT id_kriteria, MAX(nilai) AS max FROM nilai WHERE id_kriteria='$data_nilai->id_kriteria' GROUP BY id_kriteria")->result();
                foreach($max as $data_max) { ?>
                        <?php
                        $hasil = $data_nilai->nilai/$data_max->max;
                        $hasil_kali = $hasil*$data_kriteria->bobot;
                        $hasil_normalisasi=$hasil_normalisasi+$hasil_kali;
                    ?>
                <?php } ?>
                <?php }
                ?>
                <?php } } ?>
                        <?php
                        $hasil_rank['nilai'] = $hasil_normalisasi;
                        $hasil_rank['alternatif'] = $data_alternatif->nama_peserta;
                        array_push($hasil_ranks,$hasil_rank);
                        $hasil_normalisasi; ?>
            <?php } ?>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Hasil Rangking</h4>
                        <p class="card-category"> Hasil urutan setelah dilakukan perhitungan</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th style="text-align: center;">Ranking</th>
                                    <th style="text-align: center;">Nama Peserta</th>
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
									
			<?php } ?>

		</div>
	</div>
	</div>

	<!--   Core JS Files   -->
	<script src="<?=base_url('assets/js/core/jquery.min.js')?>"></script>
	<script src="<?=base_url('assets/js/core/popper.min.js')?>"></script>
	<script src="<?=base_url('assets/js/core/bootstrap-material-design.min.js')?>"></script>
	<script src="<?=base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js')?>"></script>
	<!-- Plugin for the momentJs  -->
	<script src="<?=base_url('assets/js/plugins/moment.min.js')?>"></script>
	<!--  Plugin for Sweet Alert -->
	<script src="<?=base_url('assets/js/plugins/sweetalert2.js')?>"></script>
	<!-- Forms Validations Plugin -->
	<script src="<?=base_url('assets/js/plugins/jquery.validate.min.js')?>"></script>
	<!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
	<script src="<?=base_url('assets/js/plugins/jquery.bootstrap-wizard.js')?>"></script>
	<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
	<script src="<?=base_url('assets/js/plugins/bootstrap-selectpicker.js')?>"></script>
	<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
	<script src="<?=base_url('assets/js/plugins/bootstrap-datetimepicker.min.js')?>"></script>
	<!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
	<script src="<?=base_url('assets/js/plugins/jquery.dataTables.min.js')?>"></script>
	<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
	<script src="<?=base_url('assets/js/plugins/bootstrap-tagsinput.js')?>"></script>
	<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
	<script src="<?=base_url('assets/js/plugins/jasny-bootstrap.min.js')?>"></script>
	<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
	<script src="<?=base_url('assets/js/plugins/fullcalendar.min.js')?>"></script>
	<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
	<script src="<?=base_url('assets/js/plugins/jquery-jvectormap.js')?>"></script>
	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="<?=base_url('assets/js/plugins/nouislider.min.js')?>"></script>
	<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
	<script src="<?=base_url('https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js')?>"></script>
	<!-- Library for adding dinamically elements -->
	<script src="<?=base_url('assets/js/plugins/arrive.min.js')?>"></script>
	<!--  Google Maps Plugin    -->
	<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
	<!-- Chartist JS -->
	<script src="<?=base_url('assets/js/plugins/chartist.min.js')?>"></script>
	<!--  Notifications Plugin    -->
	<script src="<?=base_url('assets/js/plugins/bootstrap-notify.js')?>"></script>
	<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
	<script src="<?=base_url('assets/js/material-dashboard.js?v=2.1.2')?>" type="text/javascript"></script>
	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="<?=base_url('assets/demo/demo.js')?>"></script>


</body>

</html>
