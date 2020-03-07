<?php
$this->load->view('template/pimpinan/head');
$this->load->view('template/pimpinan/header');
$this->load->view('template/pimpinan/sidebar');
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
      <li class="active">Dashboard Pimpinan</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
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

      <!-- /.row -->

      <div class="col-md-6">

        <div class="box box-success box-solid">
          <!-- satu box -->
          <div class="box-header with-border">
            <h3 class="box-title">Tabel Data Rekomendasi Jurnal Akreditasi--<small class="label pull-right bg-red">METODE SPK TOPSIS</small></h3>
          </div>
          <div class="box-body">
            <table class="table table-bordered table-striped scroll" style="background-color:white;">

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

      <div class="col-md-6">
        <div class="box box-success box-solid">
          <!-- satu box -->
          <div class="box-header with-border">
            <h3 class="box-title">Tabel Data Jurnal Terakreditasi</h3>
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
      </div> <!-- md -->

      <div class="col-md-6">

        <div class="box box-success box-solid">
          <!-- satu box -->
          <div class="box-header with-border">
            <h3 class="box-title">Tabel Data Jurnal Internasional</h3>
          </div>
          <div class="box-body">
            <table class="table table-bordered table-striped scroll" style="background-color:white;">

              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Singkatan</th>
                  <th>Ketua Editor</th>
                  <th>Status English</th>

                </tr>
              </thead>

              <tbody>
                <?php
                $no = 1;
                foreach ($jurnalenglish as $b) { ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $b->judul ?></td>
                    <td><?php echo $b->singkatan ?></td>
                    <td><?php echo $b->nama_user ?></td>


                    <td>
                      <?php if ($b->english == 2) {
                          echo "English";
                        } elseif ($b->english == 1) {
                          echo "Parsial";
                        }
                        ?>

                    </td>

                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div> <!-- box primary -->
      </div> <!-- md -->

      <div class="col-md-12">
        <div class="box box-success box-solid">
          <!-- satu box -->
          <div class="box-header with-border">
            <h3 class="box-title">Tabel Data Jurnal Per Pengindeks</h3>
          </div>
          <div class="box-body">
            <table id="log-penilaian-pi" class="table table-bordered table-striped scroll" style="background-color:white;">

              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Singkatan</th>
                  <th>Ketua Editor</th>
                  <th>Pengindeks</th>
                  <th>Status Pengindeks</th>
                  <th>URL Pengindeks</th>

                </tr>
              </thead>

              <tbody>
                <?php
                $no = 1;
                foreach ($jurnalpengindeks as $b) { ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $b->judul ?></td>
                    <td><?php echo $b->singkatan ?></td>
                    <td><?php echo $b->nama_user ?></td>
                    <td><?php echo $b->nama ?></td>
                    <td><?php echo $b->kategori ?></td>
                    <td><?php echo $b->url_pengindeks ?></td>

                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div> <!-- box body -->
        </div> <!-- box primary -->
      </div> <!-- md -->

    </div>

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
$this->load->view('template/pimpinan/footer');
$this->load->view('template/pimpinan/js');
?>