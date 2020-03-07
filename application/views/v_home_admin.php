<?php
$this->load->view('template/admin/head');
$this->load->view('template/admin/header');
$this->load->view('template/admin/sidebar');
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard Admin</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">

      <div class="col-lg-2 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3> <?php echo $userCount[0]->count; ?> </h3>

            <p>Pengguna Sistem</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="/serasi/user-data" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-2 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3> <?php echo $hitungjurnal[0]->count; ?> </h3>

            <p>Jurnal Terdaftar</p>
          </div>
          <div class="icon">
            <i class="fa fa-file-o"></i>
          </div>
          <a href="/serasi/data-jurnal" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-2 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3> <?php echo $jurnalakreditasiCount[0]->count; ?> </h3>

            <p>Jurnal Terakreditasi</p>
          </div>
          <div class="icon">
            <i class="fa fa-file-archive-o"></i>
            <!-- <i class="ion ion-stats-bars"></i> -->
          </div>
          <a href="/serasi/data-js" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-2 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-fuchsia">
          <div class="inner">
            <h3> <?php echo $countjurnalbelumakreditasi[0]->jumlah; ?> </h3>

            <p>Jurnal Belum Terakreditasi</p>
          </div>
          <div class="icon">
            <i class="fa fa-exclamation-circle"></i>
          </div>
          <a href="/serasi/data-jurnalbelumterakreditasi" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-2 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3> <?php echo $jurnaltinggiCount[0]->count; ?> </h3>

            <p>Jurnal Berpengindeks Tinggi</p>
          </div>
          <div class="icon">
            <i class="fa fa-level-up"></i>
          </div>
          <a href="/serasi/data-jurnaltinggi" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-2 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-purple">
          <div class="inner">
            <h3> <?php echo $jurnaldoajCount[0]->count; ?> </h3>

            <p>Jurnal Berpengindeks DOAJ</p>
          </div>
          <div class="icon">
            <i class="fa fa-caret-square-o-up"></i>
          </div>
          <a href="/serasi/data-jurnaldoaj" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>


    <div class="row">
      <div class="col-md-6">


        <!-- DONUT CHART -->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Grafik Jumlah Jurnal Sinta</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <canvas id="jurnalfakultaspieChart" style="height:250px"></canvas>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
      <!-- /.col (LEFT) -->
      <div class="col-md-6">
        <div class="box box-success">

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
          <!-- <div class="box-header with-border">
              <h3 class="box-title">Jumlah Jurnal </h3>
            </div> -->
          <div class="box-body">
            <div id="jurnalakreditasipertahun" style="width:100%; height:315px;"></div>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
      <!-- BAR CHART -->

      <!-- /.col (RIGHT) -->
    </div>
    <!-- /.row -->

    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
          <!-- <div class="box-header with-border">
          <h3 class="box-title">Jumlah Jurnal </h3>
        </div> -->
          <div class="box-body">
            <div id="jurnalPenerbitSinta" style="width:100%; height:315px;"></div>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
          <!-- <div class="box-header with-border">
          <h3 class="box-title">Jumlah Jurnal </h3>
        </div> -->
          <div class="box-body">
            <div id="jurPenerbitSintaByTahun" style="width:100%; height:315px;"></div>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-md-6">
        <div class="box box-success box-solid">
          <!-- satu box -->
          <div class="box-header with-border">
            <h3 class="box-title">Tabel Data Jurnal</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <table id="log-penilaian" class="table table-bordered table-striped scroll" style="background-color:white;">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Singkatan</th>
                  <th>Penerbit</th>
                  <th>Ketua Editor</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $no = 1;
                foreach ($jurnal as $b) { ?>
                  <tr>
                    <td><?php echo $no++ ?></td>

                    <td><?php echo $b->judul ?></td>
                    <td><?php echo $b->singkatan ?></td>
                    <td><?php echo "<b>$b->nama_fakultas</b>" ?>--<?php echo $b->nama_departemen ?>--<?php echo "<b>$b->nama_lab</b>" ?>--<?php echo $b->nama_lembaga ?></td>
                    <td><?php echo $b->nama_user ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div> <!-- box body -->
        </div> <!-- box primary -->

        <!-- </div> box body -->
      </div> <!-- box primary -->


      <!-- <div class="row"> -->
      <div class="col-md-6">
        <div class="box box-success box-solid">
          <!-- satu box -->
          <div class="box-header with-border">
            <h3 class="box-title">Tabel Data Jurnal Terakreditasi</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <table class="table table-bordered table-striped scroll" style="background-color:white;">

              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Singkatan</th>
                  <th>Ketua Editor</th>
                  <th>SK Jurnal</th>

                </tr>
              </thead>

              <tbody>
                <?php
                $no = 1;
                foreach ($jurnalakreditasi as $b) { ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $b->judul ?></td>
                    <td><?php echo $b->singkatan ?></td>
                    <td><?php echo $b->nama_user ?></td>
                    <td><?php echo $b->nomor ?></td>

                  </tr>
                <?php } ?>
              </tbody>
            </table>

          </div> <!-- box body -->
        </div> <!-- box primary -->
      </div> <!-- box body -->
    </div> <!-- box primary -->

    <div class="row">
      <div class="col-md-6">


        <!-- DONUT CHART -->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Grafik Bobot Kriteria</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <canvas id="pieChart" style="height:250px"></canvas>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
      <!-- /.col (LEFT) -->
      <div class="col-md-6">


        <!-- BAR CHART -->
        <div class="box box-success">
          <div class="box-header with-border">

            <h3 class="box-title">Grafik Nilai Preferensi</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div id="bar-chart" style="height: 250px;"></div>
          </div>
          <!-- /.box-body-->
        </div>
        <!-- /.box -->

      </div>
      <!-- /.col (RIGHT) -->
    </div>
    <!-- /.row -->


    <div class="row">
      <div class="col-md-6">
        <div class="box box-success box">
          <!-- satu box -->
          <div class="box-header with-border">
            <h3 class="box-title">Bobot Kriteria</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <table id="kriteria-home" class="table table-bordered table-striped scroll" style="background-color:white;">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Kriteria</th>
                  <th>Nama Kriteria</th>
                  <th>Bobot</th>
                  <th>Nilai Bobot</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $no = 1;
                foreach ($kriteria as $a) { ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td>
                      <font size="4px">
                        <div class="label label-default"><?php echo $a->kode_kriteria ?></div>
                      </font>
                    </td>
                    <td><?php echo $a->nama ?></td>
                    <td>
                      <div class="progress progress-xs progress-striped active">
                        <div class="progress-bar progress-bar-success" style="width: <?php echo $a->bobot_baru * 100 ?>%"></div>
                      </div>
                    </td>
                    <td>
                      <font size="4px"><span class="badge bg-green"><?php echo $a->bobot_baru * 100 ?>%</span>
                    </td>

                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div> <!-- box body -->
        </div> <!-- box primary -->



      </div> <!-- md -->

      <div class="col-md-6">

        <div class="box box-success box">
          <!-- satu box -->
          <div class="box-header with-border">
            <h3 class="box-title">Peringkat Alternatif</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <table id="alternatif-home" class="table table-bordered table-striped scroll" style="background-color:white;">
              <thead>
                <tr>
                  <th>Kode Alternatif</th>
                  <th>Nama Alternatif</th>
                  <th>Preferensi</th>
                  <th>Peringkat</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $no = 1;
                foreach ($alternatif as $a) { ?>
                  <tr>
                    <td>
                      <font size="4px">
                        <div class="label label-default"><?php echo $a->kode_alternatif ?></div>
                      </font>
                    </td>
                    <td><?php echo $a->nama ?></td>
                    <td><?php echo $a->preferensi ?></td>
                    <td>
                      <font size="4px"><span class="badge bg-green"><?php echo $no++ ?></span>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div> <!-- box body -->
        </div> <!-- box primary -->



      </div> <!-- md -->

    </div> <!-- row -->
  </section>

</div>
<!-- /.content-wrapper -->
<?php if ($this->session->flashdata('successSave')) { ?>
  <div class="modal modal-success fade in" id="myModal" style="display: block; padding-right: 17px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Data berhasil disimpan</h4>
        </div>
        <div class="modal-footer">
          <button type="button" aria-label="Close" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<?php } else if ($this->session->flashdata('duplicateUsername')) { ?>
  <div class="modal modal-danger fade in" id="myModal" style="display: block; padding-right: 17px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Maaf username tersebut sudah terdaftar</h4>
        </div>
        <div class="modal-footer">
          <button type="button" aria-label="Close" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<?php }
?>


<?php
$this->load->view('template/admin/footer');
$this->load->view('template/admin/js');
?>