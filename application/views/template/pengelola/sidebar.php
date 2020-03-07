<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('foto/' . $this->session->userdata('foto')) ?>" class="img-circle" alt="User Image">
      </div>

      <div class="pull-left info">
        <p>
          <b>
            <?php
            echo $this->session->userdata('nama_user');
            ?>
          </b>
        </p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online - Pengelola</a>
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Navigasi</li>
      <li><a href="/serasi"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>


      <li class="header">Menu Jurnal</li>
      <li><a href="/serasi/datapengelola-jurnal"><i class="fa fa-book"></i> <span>Jurnal</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green">Kelola</small>

          </span>
        </a>
      </li>
      <li class="header">Jurnal Report</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-info-circle"></i> <span>Menu Jurnal Report</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/serasi/datapengelola-reportakreditasi"><i class="fa fa-file-excel-o"></i> <span>Jurnal Terakreditasi</span></a></li>
          <li><a href="/serasi/datapengelola-reportenglish"><i class="fa fa-file-excel-o"></i> <span>Jurnal English</span></a></li>
          <li><a href="/serasi/datapengelola-reportpengindeks"><i class="fa fa-file-excel-o"></i> <span>Jurnal Pengindeks</span></a></li>
          <li><a href="/serasi/datapengelola-reportrekomendasi"><i class="fa fa-file-excel-o"></i> <span>Jurnal Rekomendasi</span>
          <li><a href="/serasi/datapengelola-reporttidakaktif"><i class="fa fa-file-excel-o"></i> <span>Jurnal Tidak Aktif</span>
            </a>
          </li>
        </ul>
      </li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>