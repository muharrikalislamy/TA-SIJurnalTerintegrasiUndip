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
          Data Lembaga
          <small>Manajemen Lembaga</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="/serasi"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="/serasi/data-alternatif"> Lembaga</a></li>
          <li class="active">Edit Lembaga</li>
        </ol>
      </section>
    </div>
  </head>

  <section class="content">
    <div class="box box-success box-solid">
      <!-- satu box -->
      <div class="box-header with-border">
        <a href="<?= base_url('data-lembaga/'); ?>" class="btn btn-default fa fa-arrow-circle-left "></a>
        <h3 class="box-title">Form Edit Lembaga</h3>
      </div>

      <div class="box-body">
        <form class="form-horizontal" action="<?php echo base_url('data-lembaga/update-lembaga') ?>" method="post">
          <div class="form-group">
            <label for="inputnamalembaga" class="col-sm-2 control-label">Nama Lembaga </label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="inputnamalembaga" value="<?php echo $record['nama'] ?>" required />
              <input type="hidden" name="kode" value="<?= $record['kode_lembaga']; ?>">
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