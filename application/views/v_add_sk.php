<?php
$this->load->view('template/admin/head');
$this->load->view('template/admin/header');
$this->load->view('template/admin/sidebar');
?>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 -->
<div class="content-wrapper">
  <!-- Main content -->

  <head>
    <div class="bar">
      <section class="content-header">
        <h1>
          Data SK
          <small>Tambah Data SK</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="/serasi"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="/serasi/data-sk"> SK</a></li>
          <li class="active">Tambah</li>
        </ol>
      </section>
    </div>
  </head>

  <section class="content">
    <div class="box box-success box-solid">
      <!-- satu box -->
      <div class="box-header with-border">
        <a href="<?= base_url('data-sk/'); ?>" class="btn btn-default fa fa-arrow-circle-left "></a>
        <h3 class="box-title">Form Tambah Data SK</h3>
      </div>

      <div class="box-body">
        <form action="<?php echo base_url('data-sk/add') ?>" method="post">
          <div class="form-group">
            <label for="inputnomorsk" class="col-sm-2 control-label">Nomor SK : </label>
            <div class="col-md-9">
              <input class="form-control" name="inputnomorsk" placeholder="Nomor SK" type="text" required />
            </div>
          </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="inputnomorsk" class="col-sm-2 control-label">Deskripsi : </label>
          <div class="col-md-9">
            <input class="form-control" name="inputdeskripsisk" placeholder="Deskripsi SK" type="text" />
          </div>
        </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="inputnomorsk" class="col-sm-2 control-label">Tanggal Penetapan SK : </label>
          <div class="col-md-9">
            <input class="form-control" name="inputpenetapansk" placeholder="SK" type="date" required />
          </div>
        </div>

      </div> <!-- box body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-success center-block" style="padding-left: 15%; padding-right: 15%;"><b>Tambah Data</b></button>
      </div>
    </div> <!-- box primary -->
    </form>
  </section>
</div>

<script>
  $(document).ready(function() {
    $('#myModal').modal('show');
  });
</script>

<?php
$this->load->view('template/admin/footer');
?>

<?php
$this->load->view('template/admin/js');
?>