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
          Data Departemen
          <small>Tambah Data Departemen</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="/serasi"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="/serasi/data-departemen"> Departemen</a></li>
          <li class="active">Tambah</li>
        </ol>
      </section>
    </div>
  </head>

  <section class="content">
    <div class="box box-success box-solid">
      <!-- satu box -->
      <div class="box-header with-border">
        <a href="<?= base_url('data-departemen/'); ?>" class="btn btn-default fa fa-arrow-circle-left "></a>
        <h3 class="box-title">Form Tambah Data Departemen</h3>
      </div>


      <div class="box-body">
        <form action="<?php echo base_url('data-departemen/add') ?>" method="post">
          <div class="form-group">
            <label for="inputfakultas" class="col-sm-2 control-label">Fakultas : </label>
            <div class="col-md-9">
              <select class="form-control" name="inputfakultas">
                <!-- form buat fakultas -->
                <option>-- Pilih Fakultas --</option>
                <?php foreach ($fakultas as $key => $fak) { ?>
                  <option value="<?= $fak->kode_fakultas ?>"><?= $fak->nama ?> </option>
                <?php } ?>
              </select>
            </div>
          </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="inputnamadepartemen" class="col-sm-2 control-label">Nama Departemen : </label>
          <div class="col-md-9">
            <input class="form-control" name="inputnamadepartemen" placeholder="Nama Departemen" type="text" required />
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

<?php if ($this->session->flashdata('duplicateNama')) { ?>
  <div class="modal modal-danger fade in" id="myModal" style="display: block; padding-right: 17px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Maaf Nama Departemen tersebut sudah terdaftar</h4>
        </div>
        <div class="modal-footer">
          <button type="button" aria-label="Close" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<?php
$this->load->view('template/admin/footer');
?>

<?php
$this->load->view('template/admin/js');
?>