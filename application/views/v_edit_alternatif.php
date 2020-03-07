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
          Edit Alternatif
          <small>Manajemen Alternatif</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="/serasi"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="/serasi/data-alternatif"> Manajemen Alternatif</a></li>
          <li class="active">Edit Alternatif</li>
        </ol>
      </section>
    </div>
  </head>

  <section class="content">
    <div class="box box-success box-solid">
      <!-- satu box -->
      <div class="box-header with-border">
        <a href="<?= base_url('data-alternatif/'); ?>" class="btn btn-default fa fa-arrow-circle-left "></a>
        <h3 class="box-title">Form Edit Data Alternatif</h3>
      </div>

      <div class="box-body">
        <form class="form-horizontal" action="<?php echo base_url() ?>data-alternatif/update" method="post">
          <div class="form-group">
            <label for="inputalternatif" class="col-sm-2 control-label">Kode Alternatif : </label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="inputalternatif" readonly value="<?php echo $record['kode_alternatif'] ?>">
            </div>
          </div>

          <div class="form-group">
            <label for="inputname" class="col-sm-2 control-label">Nama Alternatif : </label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="inputname" value="<?php echo $record['nama'] ?>" required />
            </div>
          </div>

          <div class="form-group">
            <label for="inputsingkatan" class="col-sm-2 control-label">Kependekan : </label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="inputsingkatan" value="<?php echo $record['singkatan'] ?>" required />
            </div>
          </div>

          <input type="hidden" class="form-control" name="inputwaktu" readonly value="<?php echo $record['waktu_penilaian'] ?>">
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