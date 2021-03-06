<?php
$this->load->view('template/pimpinan/head');
$this->load->view('template/pimpinan/header');
$this->load->view('template/pimpinan/sidebar');
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
          <li class="active">Edit Password</li>
        </ol>
      </section>
    </div>
  </head>

  <section class="content">
    <div class="box box-success box-solid">
      <!-- satu box -->
      <div class="box-header with-border">
        <!--           <a href="<?= base_url('user-data/'); ?>" class="btn btn-default fa fa-arrow-circle-left "></a>
 -->
        <h3 class="box-title">Form Ubah Password</h3>
      </div>

      <div class="box-body">
        <form class="form-horizontal" action="<?php echo base_url() ?>Users_Pimpinan/update_password" method="post">

          <div class="form-group">
            <label for="inputpassword" class="col-sm-2 control-label">Password Baru : </label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="inputpassword" placeholder="Masukkan Password Baru">
            </div>
          </div>

          <input type="hidden" class="form-control" name="inputiduser" value="<?php echo $recordpengguna['id_user'] ?>">


      </div> <!-- box body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-success center-block" style="padding-left: 20%; padding-right: 20%;"><b>Simpan Perubahan</b></button>
      </div>
    </div> <!-- box primary -->
    </form>



  </section>
</div>



<?php
$this->load->view('template/pimpinan/footer');
?>

<?php
$this->load->view('template/pimpinan/js');
?>