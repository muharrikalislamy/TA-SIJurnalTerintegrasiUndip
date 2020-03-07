<?php
$this->load->view('template/evaluator/head');
$this->load->view('template/evaluator/header');
$this->load->view('template/evaluator/sidebar');
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
      <li class="active">Dashboard Evaluator</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">


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
            <h3 class="box-title">Alternatif Belum Dievaluasi</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class=""></i></button>
            </div>
          </div>
          <div class="box-body">
            <table id="eva-home-belum" class="table table-bordered table-striped scroll" style="background-color:white;">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Alternatif</th>
                  <th>Judul Jurnal</th>
                  <th>Singkatan</th>

                  <th style="padding-right:10px;">Aksi</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $no = 1;
                foreach ($alternatifbelum as $a) { ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td>
                      <font size="4px">
                        <div class="label label-default"><?php echo $a->kode_alternatif ?></div>
                      </font>
                    </td>
                    <td><?php echo $a->nama ?></td>
                    <td><?php echo $a->singkatan ?></td>

                    <td colspan="3">
                      <a href="<?php echo base_url(); ?>Penilaian_Alternatif/nilai_alternatif/<?php echo $a->kode_alternatif ?>" class="btn btn-success fa fa-pencil-square"> Evaluasi</a>

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
          </div>
          <div class="box-body">
            <table id="eva-home-sudah" class="table table-bordered table-striped scroll" style="background-color:white;">
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
$this->load->view('template/evaluator/footer');
$this->load->view('template/evaluator/js');
?>