<!-- Left side column. contains the logo and sidebar -->
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
        <a href="#"><i class="fa fa-circle text-success"></i> Online - Administrator</a>
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Navigasi</li>
      <li><a href="/serasi/home-admin"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>

      <li class="header">Menu SPK</li>



      <li class="treeview">
        <a href="#">
          <i class="fa fa-calculator"></i> <span>Pembobotan Kriteria</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/serasi/analisa-kriteria"><i class="fa fa-balance-scale"></i> <span>Analisa Berpasangan</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-yellow">ANP</small>
              </span>
            </a>
          </li>

          <li><a href="/serasi/dependence-kriteria"><i class="fa fa-link"></i> <span>Interdependensi</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-yellow">ANP</small>
              </span>
            </a>
          </li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-line-chart"></i> <span>Pemeringkatan Alternatif</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">

          <li><a href="/serasi/nilai-murni-a"><i class="fa fa-pencil"></i> <span>Nilai Murni</span>
          <li><a href="/serasi/peringkat-alternatif-a"><i class="fa fa-star"></i> <span>Perhitungan</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">TOPSIS</small>
              </span>
          <li><a href="/serasi/hasil-penilaian-a"><i class="fa fa-sort-numeric-asc"></i> <span>Hasil Penilaian</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">TOPSIS</small>
              </span>
            </a>
          </li>
      </li>
    </ul>
    </li>

    <!-- <li class="header">Menu Lainnya</li> -->
    <li class="treeview">
      <a href="#">
        <i class="fa fa-folder"></i> <span>Manajemen</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="/serasi/user-data"><i class="fa fa-user"></i> <span>Pengguna</span></a></li>
        <li><a href="/serasi/data-kriteria"><i class="fa fa-check-square-o"></i> <span>Kriteria Utama</span></a></li>
        <li><a href="/serasi/data-indikator"><i class="fa fa-question-circle"></i> <span>Indikator Kriteria</span></a></li>
        <li><a href="/serasi/nilai-kepentingan"><i class="fa fa-crosshairs"></i> <span>Nilai Kepentingan</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">ANP</small>
            </span>
          </a>
        </li>

        <li><a href="/serasi/data-alternatif"><i class="fa fa-book"></i> <span>Alternatif</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-blue">Jurnal</small>
            </span>
          </a>
        </li>
      </ul>
    </li>

    <li><a href="/serasi/log-penilaian-a"><i class="fa fa-history"></i> <span>Log Penilaian</span></a></li>

    <li class="header">ٍSetelan Jurnal</li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-database"></i> <span>Menu Setelan Jurnal</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="/serasi/data-jurnal"><i class="fa fa-file"></i> <span>Jurnal Terdaftar</span></a></li>
        <li><a href="/serasi/data-sk"><i class="fa fa-edit"></i> <span>Kelola SK</span></a></li>
        <li><a href="/serasi/data-pengindeks"><i class="fa fa-tag"></i> <span>Daftar Pengindeks</span></a></li>
        <li><a href="/serasi/data-portal"><i class="fa fa-rss-square"></i> <span>Daftar Portal</span></a></li>
        </a>
    </li>
    </ul>
    </li>

    <li class="header">Penerbit</li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-university"></i> <span>Menu Penerbit</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="/serasi/data-lembaga"><i class="fa fa-suitcase"></i> <span>Daftar Lembaga</span></a></li>
        <li><a href="/serasi/data-fakultas"><i class="fa fa-building"></i> <span>Daftar Fakultas</span></a></li>
        <li><a href="/serasi/data-departemen"><i class="fa fa-building-o"></i> <span>Daftar Departemen</span></a></li>
        <li><a href="/serasi/data-lab"><i class="fa fa-gears"></i> <span>Daftar Lab</span>
          </a>
        </li>
      </ul>
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
        <li><a href="/serasi/dataadmin-reportakreditasi"><i class="fa fa-file-excel-o"></i> <span>Jurnal Terakreditasi</span></a></li>
        <li><a href="/serasi/dataadmin-reportenglish"><i class="fa fa-file-excel-o"></i> <span>Jurnal English</span></a></li>
        <li><a href="/serasi/dataadmin-reportpengindeks"><i class="fa fa-file-excel-o"></i> <span>Jurnal Pengindeks</span></a></li>
        <li><a href="/serasi/dataadmin-reportrekomendasi"><i class="fa fa-file-excel-o"></i> <span>Jurnal Rekomendasi</span>
        <li><a href="/serasi/dataadmin-reporttidakaktif"><i class="fa fa-file-excel-o"></i> <span>Jurnal Tidak Aktif</span>
          </a>
        </li>
      </ul>
    </li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>