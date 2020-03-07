<?php
$this->load->view('template/admin/head');
$this->load->view('template/admin/header');
$this->load->view('template/admin/sidebar');
?>

<div class="content-wrapper">

  <head>
    <div class="bar">
      <section class="content-header">
        <h1>
          Data Departemen
          <small>Manajemen Departemen</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="/serasi"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="/serasi/data-alternatif"> Departemen</a></li>
          <li class="active">Edit Departemen</li>
        </ol>
      </section>
    </div>
  </head>

  <section class="content">
    <div class="box box-success box-solid">
      <!-- satu box -->
      <div class="box-header with-border">
        <a href="<?= base_url('data-departemen/'); ?>" class="btn btn-default fa fa-arrow-circle-left "></a>
        <h3 class="box-title">Form Edit Fakultas</h3>
      </div>

      <div class="box-body">
        <form action="<?php echo base_url('data-departemen/update-departemen') ?>" method="post">
          <div class="form-group">
            <label for="inputfakultas" class="col-sm-2 control-label">Fakultas : </label>
            <div class="col-md-9">
              <select class="form-control" name="inputfakultas">
                <!-- form buat fakultas -->
                <option>--Pilih Fakultas--</option>
                <?php foreach ($fakultas as $key => $fak) { ?>
                  <option value="<?= $fak->kode_fakultas ?>" <?php if ($fak->kode_fakultas ==  $record['kode_fakultas']) {
                                                                echo 'selected="selected"';
                                                              } ?>><?= $fak->nama ?> </option>

                <?php } ?>
              </select>
            </div>
          </div>
      </div> <!-- box body -->



      <div class="box-body">
        <form class="form-horizontal" action="<?php echo base_url('data-departemen/update-departemen') ?>" method="post">
          <div class="form-group">
            <label for="inputnamadepartemen" class="col-sm-2 control-label">Nama Departemen </label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="inputnamadepartemen" value="<?php echo $record['nama'] ?>" required />
              <input type="hidden" name="kode" value="<?= $record['kode_departemen']; ?>">
            </div>
          </div>
      </div> <!-- box body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-success center-block" style="padding-left: 15%; padding-right: 15%;"><b>Simpan Perubahan</b></button>
      </div>
      </form>

    </div> <!-- box primary -->
  </section>
</div>

<?php
$this->load->view('template/admin/footer');
?>

<?php
$this->load->view('template/admin/js');
?>