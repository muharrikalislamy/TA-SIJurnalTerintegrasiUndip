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
        <a href="#"><i class="fa fa-circle text-success"></i> Online - Evaluator</a>
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Navigasi</li>
      <li><a href="/serasi"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>


      <!-- <li class="header">Penilaian</li>
        <li><a href="/serasi/penilaian-alternatif"><i class="fa fa-book"></i> <span>Alternatif</span>
            <span class="pull-right-container">
            <small class="label pull-right bg-blue">Jurnal</small>
            </span>
            </a>
        </li> -->

      <li class="header">Pemeringkatan</li>

      <li><a href="/serasi/nilai-murni-pi"><i class="fa fa-pencil"></i> <span>Nilai Murni</span></a></li>

      <!--         <li><a href="/serasi/peringkat-alternatif-e"><i class="fa fa-star"></i> <span>Perhitungan</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">TOPSIS</small>
            </span>
            </a>
        </li>        -->

      <li><a href="/serasi/hasil-penilaian-pi"><i class="fa fa-sort-numeric-asc"></i> <span>Hasil Penilaian</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-yellow">TOPSIS</small>
          </span>
        </a>
      </li>

      <li class="header">Menu Lainnya</li>

      <li><a href="/serasi/log-penilaian-pi"><i class="fa fa-history"></i> <span>Log Penilaian</span></a></li>


      <li class="header">Jurnal Report</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-info-circle"></i> <span>Menu Jurnal Report</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/serasi/datapimpinan-reportakreditasi"><i class="fa fa-file-excel-o"></i> <span>Jurnal Terakreditasi</span></a></li>
          <li><a href="/serasi/datapimpinan-reportenglish"><i class="fa fa-file-excel-o"></i> <span>Jurnal English</span></a></li>
          <li><a href="/serasi/datapimpinan-reportpengindeks"><i class="fa fa-file-excel-o"></i> <span>Jurnal Pengindeks</span></a></li>
          <li><a href="/serasi/datapimpinan-reportrekomendasi"><i class="fa fa-file-excel-o"></i> <span>Jurnal Rekomendasi</span>
          <li><a href="/serasi/datapimpinan-reporttidakaktif"><i class="fa fa-file-excel-o"></i> <span>Jurnal Tidak Aktif</span>
            </a>
          </li>
        </ul>
      </li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>