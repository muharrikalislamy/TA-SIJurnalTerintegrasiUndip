<?php
$this->load->view('template/pengelola/head');
$this->load->view('template/pengelola/header');
$this->load->view('template/pengelola/sidebar');
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
      <li class="active">Dashboard Pengelola</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->


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
      </div>
      <!-- /.col (RIGHT) -->
    </div>
    <!-- /.row -->

    <div class="row">
      <div class="col-md-6">
        <div class="box box-success box">
          <!-- satu box -->
          <div class="box-header with-border">
            <h3 class="box-title">Kelola Jurnal</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class=""></i></button>
            </div>
          </div>
          <div class="box-body">
            <table id="log-penilaian" class="table table-bordered table-striped scroll" style="background-color:white;">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul Jurnal</th>
                  <th>Singkatan</th>


                  <th style="padding-right:10px;">Aksi</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $no = 1;
                foreach ($jurnalpengelola as $jp) { ?>
                  <?php if ($a == $jp->id_user) : ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $jp->judul ?></td>
                      <td><?php echo $jp->singkatan ?></td>

                      <td colspan="3">
                        <a href="<?php echo base_url(); ?>data-jurnalpengelola/edit/<?php echo $jp->kode_jurnal ?>" class="btn btn-primary fa fa-edit"> Edit</a>
                        <a href="<?php echo base_url(); ?>data-jurnalpengelola/add-pengindeks/<?php echo $jp->kode_jurnal ?>" class="btn btn-sm btn-warning fa fa-plus"> Update Pengindeks</a>
                      </td>
                    </tr>
                <?php endif;
                } ?>
              </tbody>
            </table>
          </div> <!-- box body -->
        </div> <!-- box primary -->
      </div> <!-- md -->

      <div class="col-md-6">

        <div class="box box-success box">
          <!-- satu box -->
          <div class="box-header with-border">
            <h3 class="box-title">Daftar Jurnal</h3>
          </div>
          <div class="box-body">
            <table id="log-penilaian2" class="table table-bordered table-striped scroll" style="background-color:white;">

              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Singkatan</th>
                  <th>Penerbit</th>
                  <th>Ketua Editor</th>
                  <th>Aksi</th>

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
                    <td>
                      <span data-toggle="tooltip" title="Detail Jurnal" data-placement="top"><a href="#mDetailJurnal<?= $b->kode_jurnal ?>" data-toggle="modal" data-target="#mDetailJurnal<?= $b->kode_jurnal ?> " class="btn btn-sm btn-default "><i class="fa fa-bars" aria-hidden="true"></i></a></span>
                    </td>
                  </tr>

                  <div class="modal fade" id="mDetailJurnal<?= $b->kode_jurnal ?>" style="padding-right: 17px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Detail Jurnal <?= $b->judul ?> </h4>
                        </div>
                        <div class="modal-body">

                          <div class="row">
                            <label class="col-sm-4">
                              Judul
                            </label>
                            <label class="col-sm-8">
                              <?= $b->judul ?>
                            </label>
                          </div>

                          <div class="row">
                            <label class="col-sm-4">
                              Singkatan
                            </label>
                            <label class="col-sm-8">
                              <?= $b->singkatan ?>
                            </label>
                          </div>

                          <div class="row">
                            <label class="col-sm-4">
                              Nomor Jurnal
                            </label>
                            <label class="col-sm-8">
                              <?= $b->nomor_jurnal ?>
                            </label>
                          </div>

                          <div class="row">
                            <label class="col-sm-4">
                              Penerbit
                            </label>
                            <label class="col-sm-8">
                              <?= $b->nama_fakultas ?>
                            </label>
                          </div>

                          <div class="row">
                            <label class="col-sm-4">
                            </label>
                            <label class="col-sm-8">
                              <?= $b->nama_departemen ?>
                            </label>
                          </div>

                          <div class="row">
                            <label class="col-sm-4">
                            </label>
                            <label class="col-sm-8">
                              <?= $b->nama_lab ?>
                            </label>
                          </div>

                          <div class="row">
                            <label class="col-sm-4">
                            </label>
                            <label class="col-sm-8">
                              <?= $b->nama_lembaga ?>
                            </label>
                          </div>

                          <div class="row">
                            <label class="col-sm-4">
                              Portal
                            </label>
                            <label class="col-sm-8">
                              <?= $b->nama_portal ?>
                            </label>
                          </div>

                          <div class="row">
                            <label class="col-sm-4">
                              URL Portal
                            </label>
                            <label class="col-sm-8">
                              <?= $b->url ?>
                            </label>
                          </div>

                          <div class="row">
                            <label class="col-sm-4">
                              Sponsor
                            </label>
                            <label class="col-sm-8">
                              <?= $b->sponsor ?>
                            </label>
                          </div>

                          <div class="row">
                            <label class="col-sm-4">
                              Ketua Editor
                            </label>
                            <label class="col-sm-8">
                              <?= $b->nama_user ?>
                            </label>
                          </div>

                          <div class="row">
                            <label class="col-sm-4">
                              Kode p-issn
                            </label>
                            <label class="col-sm-8">
                              <?= $b->p_issn ?>
                            </label>
                          </div>

                          <div class="row">
                            <label class="col-sm-4">
                              Kode e-issn
                            </label>
                            <label class="col-sm-8">
                              <?= $b->e_issn ?>
                            </label>
                          </div>

                          <div class="row">
                            <label class="col-sm-4">
                              English
                            </label>
                            <label class="col-sm-8">
                              <?php if ($b->english == 2) {
                                  echo "English";
                                } elseif ($b->english == 1) {
                                  echo "Parsial";
                                } elseif ($b->english == 0) {
                                  echo "Tidak";
                                }
                                ?>
                            </label>
                          </div>

                          <div class="row">
                            <label class="col-sm-4">
                              MpgUndip
                            </label>
                            <label class="col-sm-8">
                              <?= $b->mpgundip === '1' ? "Ya" : "Tidak" ?>
                            </label>
                          </div>

                          <div class="row">
                            <label class="col-sm-4">
                              Kode DOI
                            </label>
                            <label class="col-sm-8">
                              <?= $b->doi ?>
                            </label>
                          </div>

                          <div class="row">
                            <label class="col-sm-4">
                              Tahun Mulai
                            </label>
                            <label class="col-sm-8">
                              <?= $b->tahun_mulai ?>
                            </label>
                          </div>

                          <div class="row">
                            <label class="col-sm-4">
                              Terbit Terakhir
                            </label>
                            <label class="col-sm-8">
                              <?= $b->terbit_terakhir ?>
                            </label>
                          </div>

                          <div class="row">
                            <label class="col-sm-4">
                              Bulan Terbit
                            </label>
                            <label class="col-sm-8">
                              <?= $b->bln_terbit ?>
                            </label>
                          </div>

                          <div class="row">
                            <label class="col-sm-4">
                              Jumlah No. Terakhir
                            </label>
                            <label class="col-sm-8">
                              <?= $b->no_terakhir ?>
                            </label>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" aria-label="Close" class="btn btn-success" data-dismiss="modal">Tutup</button>
                        </div>
                      </div>
                    </div>
                  </div>


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
$this->load->view('template/pengelola/footer');
$this->load->view('template/pengelola/js');
?>

<?php
if ($this->session->flashdata('successSave')) { ?>
  <div class="modal modal-success fade in" id="myModal" style="display: block; padding-right: 17px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Data Berhasil Ditambah</h4>
        </div>
        <div class="modal-footer">
          <button type="button" aria-label="Close" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php } else if ($this->session->flashdata('successUpdate')) { ?>
  <div class="modal modal-success fade" id="myModal" style="display: block; padding-right: 17px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Data Berhasil Disimpan</h4>
        </div>
        <div class="modal-footer">
          <button type="button" aria-label="Close" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php } else if ($this->session->flashdata('successDelete')) { ?>
  <div class="modal modal-danger fade in" id="myModal" style="display: block; padding-right: 17px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Data berhasil dihapus</h4>
        </div>
        <div class="modal-footer">
          <button type="button" aria-label="Close" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php }
?>