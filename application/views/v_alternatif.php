<?php
$this->load->view('template/admin/head');
$this->load->view('template/admin/header');
$this->load->view('template/admin/sidebar');
?>

<!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 -->


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Alternatif
      <small>Sistem Klasifikasi Jurnal</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Alternatif</li>
    </ol>
  </section>


  <section class="content">
    <a href="<?= base_url('data-alternatif/add'); ?>" class="btn btn-success fa fa-plus-square-o"> Tambah Alternatif</a>
    <hr>

    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#sudah" data-toggle="tab">Sudah Dievaluasi</a></li>
        <li><a href="#belum" data-toggle="tab">Belum Dievaluasi</a></li>
      </ul>

      <div class="tab-content">
        <div class="active tab-pane" id="sudah">

          <table id="data-alternatif-sudah" class="table table-bordered table-striped scroll" style="background-color:white;">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Alternatif</th>
                <th>Judul Jurnal</th>
                <th>Kependekan</th>
                <th>Status</th>
                <th>Tanggal Penilaian</th>
                <th>Waktu Penilaian</th>
                <th>Penilai</th>
                <th style="padding-right:10px;">Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $no = 1;
              foreach ($sudah as $a) { ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td>
                    <font size="4px">
                      <div class="label label-default"><?php echo $a->kode_alternatif ?></div>
                    </font>
                  </td>
                  <td><?php echo $a->nama ?></td>
                  <td><?php echo $a->singkatan ?></td>

                  <td>
                    <font size="4px">
                      <?php if ($a->status == 'Belum Dievaluasi') {
                        echo '<div class="label label-danger">Belum Dievaluasi</div>';
                      } else if ($a->status == 'Sudah Dievaluasi') {
                        echo '<div class="label label-success">Sudah Dievaluasi</div>';
                      }
                      ?></font>
                  </td>

                  <td>
                    <font size="4px">
                      <div class="label label-default">
                        <?php $datetime000 = new DateTime($a->waktu_penilaian);
                        echo $datetime000->format('d F Y'); ?>
                      </div>
                    </font>
                  </td>

                  <td>
                    <font size="4px">
                      <div class="label label-default">
                        <?php $datetime000 = new DateTime($a->waktu_penilaian);
                        echo $datetime000->format('H:i'); ?>
                      </div>
                    </font>
                  </td>

                  <td>
                    <font size="4px">
                      <div class="label label-default"><?php echo $a->nama_user ?></div>
                    </font>
                  </td>


                  <td colspan="3">
                    <div class="btn-group-vertical">
                      <!-- <a href="<?php echo base_url(); ?>data-alternatif/edit/<?php echo $a->kode_alternatif ?>" class="btn btn-primary fa fa-edit"> Edit</a> -->
                      <a href="<?php echo base_url(); ?>data-alternatif/delete/<?php echo $a->kode_alternatif ?>" class="btn btn-danger fa fa-trash-o" onClick="return confirmDelete();"> Hapus</a>
                    </div>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>

        </div>


        <div class="tab-pane" id="belum">

          <table id="data-alternatif-belum" class="table table-bordered table-striped scroll" style="background-color:white;">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Alternatif</th>
                <th>Judul Jurnal</th>
                <th>Kependekan</th>
                <th>Status</th>
                <th style="padding-right:10px;">Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $no = 1;
              foreach ($belum as $a) { ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td>
                    <font size="4px">
                      <div class="label label-default"><?php echo $a->kode_alternatif ?></div>
                    </font>
                  </td>
                  <td><?php echo $a->nama ?></td>
                  <td><?php echo $a->singkatan ?></td>

                  <td>
                    <font size="4px">
                      <?php if ($a->status == 'Belum Dievaluasi') {
                        echo '<div class="label label-danger">Belum Dievaluasi</div>';
                      } else if ($a->status == 'Sudah Dievaluasi') {
                        echo '<div class="label label-success">Sudah Dievaluasi</div>';
                      }
                      ?></font>
                  </td>

                  <td colspan="3">
                    <!-- <a href="<?php echo base_url(); ?>data-alternatif/edit/<?php echo $a->kode_alternatif ?>" class="btn btn-primary fa fa-edit"> Edit</a> -->

                    <a href="<?php echo base_url(); ?>data-alternatif/delete/<?php echo $a->kode_alternatif ?>" class="btn btn-danger fa fa-trash-o" onClick="return confirmDelete();"> Hapus</a>

                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>

        </div>
        <!-- /.tab-pane -->


      </div>
      <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
  </section>
</div>



<?php
$this->load->view('template/admin/footer');
?>


<?php if ($this->session->flashdata('successSave')) { ?>
  <div class="modal modal-success fade in" id="myModal" style="display: block; padding-right: 17px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
<?php } ?>


<script>
  function confirmDelete() {
    return confirm('Apakah anda yakin ingin menghapus data ini? \nAnda tidak bisa mengembalikan data yang telah dihapus')
  }
</script>

<?php
$this->load->view('template/admin/js');
?>