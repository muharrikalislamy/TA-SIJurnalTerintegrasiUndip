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
          Data Pengindeks
          <small>Tambah Data Pengindeks</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="/serasi"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="/serasi/data-pengindeks"> Pengindeks</a></li>
          <li class="active">Tambah</li>
        </ol>
      </section>
    </div>
  </head>

  <section class="content">
    <div class="box box-success box-solid">
      <!-- satu box -->
      <div class="box-header with-border">
        <a href="<?= base_url('data-pengindeks/'); ?>" class="btn btn-default fa fa-arrow-circle-left "></a>
        <h3 class="box-title">Form Tambah Data Pengindeks</h3>
      </div>

      <div class="box-body">
        <form action="<?php echo base_url('data-pengindeks/add') ?>" method="post">
          <div class="form-group">
            <label for="inputnamapengindeks" class="col-sm-2 control-pengindeksel">Nama Pengindeks : </label>
            <div class="col-md-9">
              <input class="form-control" name="inputnamapengindeks" placeholder="Nama Pengindeks" type="text" required />
            </div>
          </div>
      </div> <!-- box body -->

      <div class="box-body">
          <div class="form-group">
            <label for="inputnamapengindeks" class="col-sm-2 control-pengindeksel">Kategori : </label>
            <div class="col-md-9">
            <select name="inputkategori" class="form-control">
            <option >--Pilih Kategori--</option>
                <option >Tinggi</option>
                <option >Sedang</option>
                <option >Rendah</option>
              </select>
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