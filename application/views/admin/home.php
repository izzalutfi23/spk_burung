<div class="main-panel">
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
		<div class="container-fluid">
			<div class="navbar-wrapper">
				<a class="navbar-brand" href="javascript:;">Dashboard</a>
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
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="card card-stats">
						<div class="card-header card-header-warning card-header-icon">
							<div class="card-icon">
								<i class="material-icons">speaker_notes</i>
							</div>
							<p class="card-category">Kriteria</p>
							<h3 class="card-title"><?=$kriteria?>
							</h3>
						</div>
						<div class="card-footer">
							<div class="stats">
								<a href="<?=base_url('admin/kriteria')?>">
									<button class="btn-sm btn btn-success">More</button>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="card card-stats">
						<div class="card-header card-header-success card-header-icon">
							<div class="card-icon">
								<i class="material-icons">subject</i>
							</div>
							<p class="card-category">Event</p>
							<h3 class="card-title"><?=$event?></h3>
						</div>
						<div class="card-footer">
							<div class="stats">
								<a href="<?=base_url('admin/event')?>">
									<button class="btn-sm btn btn-success">More</button>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="card card-stats">
						<div class="card-header card-header-danger card-header-icon">
							<div class="card-icon">
								<i class="material-icons">subject</i>
							</div>
							<p class="card-category">Peserta</p>
							<h3 class="card-title"><?=$peserta?></h3>
						</div>
						<div class="card-footer">
							<div class="stats">
								<a href="<?=base_url('admin/peserta')?>">
									<button class="btn-sm btn btn-success">More</button>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="card card-stats">
						<div class="card-header card-header-info card-header-icon">
							<div class="card-icon">
							<i class="material-icons">manage_accounts</i>
							</div>
							<p class="card-category">User</p>
							<h3 class="card-title"><?=$user?></h3>
						</div>
						<div class="card-footer">
							<div class="stats">
								<a href="<?=base_url('admin/user')?>">
									<button class="btn-sm btn btn-success">More</button>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

