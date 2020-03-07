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
              Data Kriteria
              <small>Manajemen Kriteria</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="/serasi"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="/serasi/data-kriteria"> Manajemen Kriteria</a></li>
              <li class="active">Tambah Data Kriteria</li>
            </ol>
          </section>
        </div>
      </head>

      <section class="content">
      <div class="box box-success box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <a href="<?=base_url('data-kriteria/');?>" class="btn btn-default fa fa-arrow-circle-left "></a>
          <h3 class="box-title">Form Tambah Data Kriteria</h3>
        </div>

      <div class="box-body">  
        <form class="form-horizontal" action="<?php echo base_url()?>Kriteria/submit_kriteria" method="post">
                      
          <div class="form-group">
            <label for="inputkode" class="col-sm-2 control-label">Kode Kriteria : </label>
              <div class="col-md-9">
                <input class="form-control" name="inputkode" placeholder="Kode Kriteria (Contoh : Tuliskan '1' Untuk Kode Kriteria = 'K1' dst)" type="number" required/>
              </div>
          </div>

          <div class="form-group"> <!-- Form Input Nama Kriteria -->
            <label for="inputname" class="col-sm-2 control-label">Nama : </label>
              <div class="col-md-9">
                <input class="form-control" name="inputname" placeholder="Nama Kriteria" type="text" required/>
              </div>
          </div>


          <div class="form-group"> <!-- Form Input Singkatan Kriteria -->
            <label for="inputkependekan" class="col-sm-2 control-label">Kependekan : </label>
              <div class="col-md-9">
                <input input type="text" maxlength="3" class="form-control" name="inputkependekan" placeholder="Kependekan" type="text" required/>
              </div>
          </div>


          <div class="form-group"> <!-- Form Input Deskripsi Kriteria -->
            <label for="inputdeskripsi" class="col-sm-2 control-label">Deskripsi : </label>
              <div class="col-md-9">
                <textarea class="form-control" rows="3" type="text" name="inputdeskripsi" placeholder="Deskripsi" required/></textarea>
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

  <?php  if ($this->session->flashdata('duplicateKode')) { ?>
  <div class="modal modal-danger fade in" id="myModal" style="display: block; padding-right: 17px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Maaf Kode Kriteria Tersebut Sudah Terdaftar</h4>
      </div>
      <div class="modal-footer">
        <button type="button" aria-label="Close" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  </div>
  <?php } ?>


<script>
$(document).ready(function () {
    $('#myModal').modal('show');
});
</script>

  <?php
  $this->load->view('template/admin/footer');
  ?>
  
  <?php
  $this->load->view('template/admin/js');
  ?>