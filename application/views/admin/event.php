<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <a class="navbar-brand" href="javascript:;">Event</a>
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
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4 class="card-title ">Data Event</h4>
                                    <p class="card-category"> Ini adalah data event</p>
                                </div>
                                <div class="col-lg-6">
                                    <a href="<?=base_url('admin/event_create')?>"><button class="btn btn-danger btn-sm float-right">Tambah</button></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Nama Event
                                        </th>
                                        <th>
                                            Juri
                                        </th>
                                        <th width="20%">Aksi</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no=1;
                                            foreach($event as $data){
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $no++; ?>
                                            </td>
                                            <td>
                                                <?php echo $data->nama_event; ?>
                                            </td>
                                            <td>
                                                <?php echo $data->juri; ?>
                                            </td>
                                            <td>
                                                <a href="<?=base_url('admin/edit_event/'.$data->id_event)?>">
                                                    <button type="button" class="btn btn-primary btn-sm">Edit</button>
                                                </a>
                                                <a onclick="return confirm('Data akan dihapus!')" href="<?=base_url('admin/del_event/'.$data->id_event)?>">
                                                    <button type="button" class="btn btn-danger btn-sm">Hapus</button>
                                                </a>
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
    </div>