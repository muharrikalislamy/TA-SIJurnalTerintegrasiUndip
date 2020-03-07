<body class="hold-transition skin-green-light sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="/serasi" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>SU</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>SERASI</b> UNDIP</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url('foto/' . $this->session->userdata('foto')) ?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $this->session->userdata('nama_user'); ?></span>
              </a>

              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?php echo base_url('foto/' . $this->session->userdata('foto')) ?>" class="img-circle" alt="User Image">

                  <p>
                    <?php echo $this->session->userdata('nama_user'); ?> - Pimpinan
                    <small>Sistem Jurnal Terintegrasi</small>
                  </p>
                </li>

                <!-- Menu Body -->
                <li class="user-body">
                  <div class="row">
                    <div class="col-xs-6 text-center">
                      <a href="/serasi/pimpinan-data/edit/<?php echo $this->session->userdata('id_user') ?>">Ubah Profil</a>
                    </div>

                    <div class="col-xs-6 text-center">
                      <a href="/serasi/upload-foto-pimpinan">Ubah Foto</a>
                    </div>
                  </div>

                  <br>

                  <div class="row">
                    <div class="col-xs-6 text-center">
                      <a href="/serasi/pimpinan-data/edit-username/<?php echo $this->session->userdata('id_user') ?>">Ubah Username</a>
                    </div>

                    <div class="col-xs-6 text-center">
                      <a href="/serasi/pimpinan-data/edit-password/<?php echo $this->session->userdata('id_user') ?>">Ubah Password</a>
                    </div>
                  </div>
                  <!-- /.row -->
                </li>

                <!-- Menu Footer -->
                <li class="user-footer">
                  <div class="pull-right">
                    <a href="/serasi/logout" class="btn btn-danger btn-flat">Keluar</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
          </ul>
        </div>
      </nav>
    </header>