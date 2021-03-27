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
		<?=$title?>
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
	<div class="wrapper ">
		<div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
			<!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
			<div class="logo"><a href="index.php" class="simple-text logo-normal">
					Kicau Mania
				</a></div>
			<div class="sidebar-wrapper">
				<ul class="nav">
					<li class="nav-item active  ">
						<a class="nav-link" href="<?=base_url('admin')?>">
							<i class="material-icons">dashboard</i>
							<p>Dashboard</p>
						</a>
					</li>
					<li class="nav-item ">
						<a class="nav-link" href="<?=base_url('admin/kriteria')?>">
							<i class="material-icons">speaker_notes</i>
							<p>Kriteria</p>
						</a>
					</li>
					<li class="nav-item ">
						<a class="nav-link" href="<?=base_url('admin/event')?>">
							<i class="material-icons">subject</i>
							<p>Event</p>
						</a>
					</li>
                    <li class="nav-item ">
						<a class="nav-link" href="<?=base_url('admin/peserta')?>">
							<i class="material-icons">subject</i>
							<p>Peserta</p>
						</a>
					</li>
					<li class="nav-item ">
						<a class="nav-link" href="penilaian.php">
							<i class="material-icons">repeat_one</i>
							<p>Penilaian</p>
						</a>
					</li>
					<li class="nav-item ">
						<a class="nav-link" href="hasil.php">
							<i class="material-icons">list_alt</i>
							<p>Hasil</p>
						</a>
					</li>
                    <li class="nav-item ">
						<a class="nav-link" href="<?=base_url('admin/user')?>">
							<i class="material-icons">manage_accounts</i>
							<p>User (Admin/Juri)</p>
						</a>
					</li>
				</ul>
			</div>
		</div>
