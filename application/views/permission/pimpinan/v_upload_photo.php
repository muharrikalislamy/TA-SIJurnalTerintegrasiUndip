<?php
$this->load->view('template/pimpinan/head');
$this->load->view('template/pimpinan/header');
$this->load->view('template/pimpinan/sidebar');
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Perbarui Foto Profil
      <small>Manajemen Pengguna</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Manajemen User</li>
    </ol>
  </section>


  <section class="content">
    <table class="table table-bordered table-striped scroll" style="background-color:white;">
      <tr>
        <th>
          <font size="5pt">
            <div class="label-bg label-success">&nbsp;&nbsp;&nbsp;&nbsp;Upload Foto</div>
          </font>
        </th>
        <th>Foto saat ini</th>
      </tr>

      <tr>
        <td>
          <div class="col-md-9">
            <?php echo form_open_multipart('Upload_Foto_Pimpinan/aksi_upload'); ?>
            <input type="file" class="btn btn-default" name="filefoto" />
            <font size="2pt">Pastikan ukuran foto tidak lebih dari 10MB.</font><br><br>
            <input type="submit" class="btn btn-success" value="Upload" />
          </div>
        </td>
        <td>
          <div class="col-md-3">
            <?php $linkfoto = $this->session->userdata('foto'); ?>
            <img src="<?php echo base_url('foto/' . $linkfoto) ?>" class="img-square" alt="User Image" width="160" style="align:center;" />
          </div>
        </td>
    </table>
  </section>
</div>



<?php
$this->load->view('template/pimpinan/footer');
?>


<?php if ($this->session->flashdata('successUpload')) { ?>
  <div class="modal modal-success fade in" id="myModal" style="display: block; padding-right: 17px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Foto berhasil diunggah !</h4>
        </div>
        <div class="modal-footer">
          <button type="button" aria-label="Close" class="btn btn-primary" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
<?php } else if ($this->session->flashdata('errorUpload')) { ?>
  <div class="modal modal-danger fade in" id="myModal" style="display: block; padding-right: 17px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">ERROR : Foto tidak terunggah, silahkan coba lagi !</h4>
        </div>
        <div class="modal-footer">
          <button type="button" aria-label="Close" class="btn btn-primary" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<?php
$this->load->view('template/pimpinan/js');
?>