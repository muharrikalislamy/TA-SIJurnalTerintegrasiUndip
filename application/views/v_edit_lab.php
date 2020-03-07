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
          Data Laboratorium
          <small>Manajemen Laboratorium</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="/serasi"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="/serasi/data-alternatif"> Laboratorium</a></li>
          <li class="active">Edit Laboratorium</li>
        </ol>
      </section>
    </div>
  </head>

  <section class="content">
    <div class="box box-success box-solid">
      <!-- satu box -->
      <div class="box-header with-border">
        <a href="<?= base_url('data-lab/'); ?>" class="btn btn-default fa fa-arrow-circle-left "></a>
        <h3 class="box-title">Form Edit Laboratorium</h3>
      </div>

      <div class="box-body">
        <form action="<?php echo base_url('data-lab/update-lab') ?>" method="post">
          <div class="form-group">
            <label for="inputdepartemen" class="col-sm-2 control-label">Departemen : </label>
            <div class="col-md-9">
            <select class="form-control" name="inputdepartemen">
                <!-- form buat departemen -->
                <option>--Pilih Departemen--</option>
                <?php foreach ($departemen as $key => $dep) { ?>
                   <option value="<?= $dep->kode_departemen ?>"  <?php if($dep->kode_departemen ==  $record['kode_departemen']){echo 'selected="selected"'; }?>  ><?= $dep->nama ?>  </option>
                <?php } ?>
              </select>
        </div>
          </div>
      </div> <!-- box body -->

      <div class="box-body">
        <form class="form-horizontal" action="<?php echo base_url('data-lab/update-lab') ?>" method="post">
          <div class="form-group">
            <label for="inputnamalab" class="col-sm-2 control-label">Nama Laboratorium </label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="inputnamalab" value="<?php echo $record['nama'] ?>" required />
              <input type="hidden" name="kode" value="<?= $record['kode_lab']; ?>">
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