<div class="main-panel">
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
		<div class="container-fluid">
			<div class="navbar-wrapper">
				<a class="navbar-brand" href="javascript:;">Tambah Post Berita</a>
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
							<a class="dropdown-item" href="#">Log out</a>
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
				<div class="col-md-8">
					<div class="card">
						<div class="card-header card-header-primary">
							<h4 class="card-title">Post</h4>
							<p class="card-category">Silahkan isi form di bawah ini!</p>
						</div>
						<div class="card-body">
							<form action="<?=base_url('admin/post_store')?>" enctype="multipart/form-data" method="POST">
								<div class="row mt-3">
									<div class="col-md-6">
										<div class="form-group">
											<label class="bmd-label-floating">Judul</label>
											<input type="text" name="title" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<label class="bmd-label-floating">Foto</label><br>
										<input type="file" name="foto">
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-12">
										<div class="form-group">
											<label class="bmd-label-floating">Deskripsi</label>
											<textarea name="deskripsi" class="form-control"></textarea>
										</div>
									</div>
								</div>
								<input name="add_record" type="submit" value="Add" class="btn btn-primary pull-right">
								<div class="clearfix"></div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card card-profile">
						<div class="card-body">
							<h4 class="card-title">Post</h4>
							<p class="card-description">
								Menyediakan informasi mengenai perlombaan, seperti jadwal, peserta, dan hasil perlombaan
								yang telah dilakukan
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
