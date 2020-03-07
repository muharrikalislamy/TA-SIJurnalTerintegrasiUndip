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
          Data Pengguna
          <small>Manajemen User</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="/serasi"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="/serasi/users">Pengguna</a></li>
          <li class="active">Edit Data Pengguna</li>
        </ol>
      </section>
    </div>
  </head>

  <section class="content">
    <div class="box box-success box-solid">
      <!-- satu box -->
      <div class="box-header with-border">
        <a href="<?= base_url('user-data/'); ?>" class="btn btn-default fa fa-arrow-circle-left "></a>
        <h3 class="box-title">Form Edit Data Pengguna</h3>
      </div>

      <div class="box-body">
        <form class="form-horizontal" action="<?php echo base_url() ?>Users/update_user" method="post">

          <div class="form-group">
            <label for="inputiduser" class="col-sm-2 control-label">Id : </label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="inputiduser" readonly value="<?php echo $recordpengguna['id_user'] ?>">
            </div>
          </div>

          <div class="form-group">
            <label for="inputusername" class="col-sm-2 control-label">Username : </label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="inputusername" readonly value="<?php echo $recordpengguna['username'] ?>">
            </div>
          </div>

          <div class="form-group">
            <label for="inputnama" class="col-sm-2 control-label">Nama : </label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="inputnama" value="<?php echo $recordpengguna['nama_user'] ?>" required />
            </div>
          </div>

          <div class="form-group">
            <label for="inputpermission" class="col-sm-2 control-label">Permission : </label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="inputpermission" readonly value="<?php echo $recordpengguna['permission'] ?>">
            </div>
          </div>

      </div> <!-- box body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-success center-block" style="padding-left: 20%; padding-right: 20%;"><b>Simpan Perubahan</b></button>
      </div>
    </div> <!-- box primary -->
    </form>



  </section>
</div>



<?php
$this->load->view('template/admin/footer');
?>

<?php
$this->load->view('template/admin/js');
?>