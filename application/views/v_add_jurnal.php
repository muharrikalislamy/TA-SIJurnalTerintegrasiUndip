<?php
$this->load->view('template/admin/head');
$this->load->view('template/admin/header');
$this->load->view('template/admin/sidebar');
?>



<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

<div class="content-wrapper">
  <!-- Main content -->

  <head>
    <div class="bar">
      <section class="content-header">
        <h1>
          Data Jurnal
          <small>Tambah Data Jurnal</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="/serasi"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="/serasi/data-jurnal"> Jurnal</a></li>
          <li class="active">Tambah</li>
        </ol>
      </section>
    </div>
  </head>

  <section class="content">
    <div class="box box-success box-solid">
      <!-- satu box -->
      <div class="box-header with-border">
        <a href="<?= base_url('data-jurnal/'); ?>" class="btn btn-default fa fa-arrow-circle-left "></a>
        <h3 class="box-title">Form Tambah Data Jurnal</h3>
      </div>

      <div class="box-body">
        <form action="<?php echo base_url('data-jurnal/add') ?>" method="post">
          <div class="form-group">
            <label for="judul" class="col-sm-2 control-label">Judul : </label>
            <div class="col-md-9">
              <input class="form-control" name="judul" value="<?= set_value('judul') ?>" placeholder="Judul" type="text" required />
            </div>
          </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="inputemail" class="col-sm-2 control-label">Singkatan : </label>
          <div class="col-md-9">
            <input class="form-control" name="singkatan" value="<?= set_value('singkatan') ?>" placeholder="Singkatan" type="text" required />
          </div>
        </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="" class="col-sm-2 control-label">Nomor Jurnal : </label>
          <div class="col-md-9">
            <input class="form-control" name="nomorjurnal" value="<?= set_value('nomorjurnal') ?>" placeholder="Nomor Jurnal" type="text" required />
          </div>
        </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="#" class="col-sm-2 control-label">Penerbit : <br />
            <h5>Isi yang dianggap perlu</h5>
          </label>
          <div class="col-md-9">
            <select class="form-control " name="fakultas">
              <option value="" selected>-- Pilih Fakultas --</option>
              <?php foreach ($fakultas as $key => $f) { ?>
                <option value="<?= $f->nama ?>"><?= $f->nama ?> </option>
              <?php } ?>
            </select>
            <select class="form-control " name="departemen">
              <option value="" selected>-- Pilih Departemen --</option>
              <?php foreach ($departemen as $key => $d) { ?>
                <option value="<?= $d->nama ?>"><?= $d->nama ?> </option>
              <?php } ?>
            </select>
            <select class="form-control " name="lab">
              <option value="" selected>-- Pilih Lab --</option>
              <?php foreach ($lab as $key => $l) { ?>
                <option value="<?= $l->nama ?>"><?= $l->nama ?> </option>
              <?php } ?>
            </select>
            <select class="form-control " name="lembaga">
              <option value="" selected>-- Pilih Lembaga --</option>
              <?php foreach ($lembaga as $key => $le) { ?>
                <option value="<?= $le->nama ?>"><?= $le->nama ?> </option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div> <!-- box body -->


      <div class="box-body">
        <div class="form-group">
          <label for="#" class="col-sm-2 control-label">Portal : </label>
          <div class="col-md-9">
            <select class="form-control " name="portal" required>
              <option value="" selected>-- Pilih Portal --</option>
              <?php foreach ($portal as $key => $p) { ?>
                <option value="<?= $p->nama ?>"><?= $p->nama ?> </option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="inputpassword" class="col-sm-2 control-label">URL Portal : </label>
          <div class="col-md-9">
            <input class="form-control" name="urlportal" value="<?= set_value('urlportal') ?>" placeholder="URL" type="text" required />
          </div>
        </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="#" class="col-sm-2 control-label">Sponsor : <br />
            <h5>Isi 'N/A' Bila Tidak ada</h5>
          </label>
          <div class="col-md-9">
            <input class="form-control" name="sponsor" value="<?= set_value('sponsor') ?>" placeholder="sponsor" type="text" />
          </div>
        </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="#" class="col-sm-2 control-label">Ketua Editor : </label>
          <div class="col-md-9">
            <select class="form-control " name="pengelola" required id="select-portal">
              <option value="0" selected>-- Pilih Ketua Editor --</option>
              <?php foreach ($pengelola as $key => $kelola) { ?>
                <option value="<?= $kelola->id_user ?>"><?= $kelola->nama_user ?> </option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="inputtelepon" class="col-sm-2 control-label">Kode p-issn : <br />
            <h5>Isi 'N/A' Bila Tidak ada</h5>
          </label>
          <div class="col-md-9">
            <input class="form-control" name="pissn" value="<?= set_value('pissn') ?>" placeholder="p-issn" type="text" />
          </div>
        </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="inputtelepon" class="col-sm-2 control-label">Kode e-issn : <br />
            <h5>Isi 'N/A' Bila Tidak ada</h5>
          </label>
          <div class="col-md-9">
            <input class="form-control" name="eissn" value="<?= set_value('eissn') ?>" placeholder="e-issn" type="text" />
          </div>
        </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="#" class="col-sm-2 control-label">English : </label>
          <div class="col-md-9">
            <select class="form-control " name="english">
              <option>-- Pilih Status English --</option>
              <option value="2" name="english" <?= set_value('english') === "2"  ? 'selected' : '' ?>>YA</option>
              <option value="1" name="english" <?= set_value('english') === "1"  ? 'selected' : '' ?>>PARSIAL</option>
              <option value="0" name="english" <?= set_value('english') === "0"  ? 'selected' : '' ?>>TIDAK</option>
            </select>
          </div>
        </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="#" class="col-sm-2 control-label">MpgUndip : </label>
          <div class="col-md-9">
            <select class="form-control " name="mpgundip">
              <option>-- Pilih Status MpgUndip --</option>
              <option value="1" name="mpgundip" <?= set_value('mpgundip') === "1"  ? 'selected' : '' ?>>YA</option>
              <option value="0" name="mgpundip" <?= set_value('mpgundip') === "0"  ? 'selected' : '' ?>>TIDAK</option>
            </select>
          </div>
        </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="#" class="col-sm-2 control-label">Kode DOI : </label>
          <div class="col-md-9">
            <input class="form-control" name="doi" value="<?= set_value('doi') ?>" placeholder="DOI" type="text" />
          </div>
        </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="#" class="col-sm-2 control-label">Tahun Mulai : <br />
            <h5>Isi Dengan Angka</h5>
          </label>
          <div class="col-md-9">
            <input class="form-control" name="thnmulai" value="<?= set_value('thnmulai') ?>" placeholder="Tahun Mulai" type="text" required />
          </div>
        </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label class="col-sm-2 control-label">Bulan Terbit : </label>
          <div class="col-md-9">
            <label>
              <input type="checkbox" name="blnterbit[]" value="Januari" <?= set_value('blnterbit') === "Januari" ? 'checked' : '' ?>>
              Januari
              <input type="checkbox" name="blnterbit[]" value="Februari" <?= set_value('blnterbit') === "Februari" ? 'checked' : '' ?>>
              Februari
              <input type="checkbox" name="blnterbit[]" value="Maret" <?= set_value('blnterbit') === "Maret" ? 'checked' : '' ?>>
              Maret
              <input type="checkbox" name="blnterbit[]" value="April" <?= set_value('blnterbit') === "April" ? 'checked' : '' ?>>
              April
              <input type="checkbox" name="blnterbit[]" value="Mei" <?= set_value('blnterbit') === "Mei" ? 'checked' : '' ?>>
              Mei
              <input type="checkbox" name="blnterbit[]" value="Juni" <?= set_value('blnterbit') === "Juni" ? 'checked' : '' ?>>
              Juni
              <input type="checkbox" name="blnterbit[]" value="Juli" <?= set_value('blnterbit') === "Juli" ? 'checked' : '' ?>>
              Juli
              <input type="checkbox" name="blnterbit[]" value="Agustus" <?= set_value('blnterbit') === "Agustus" ? 'checked' : '' ?>>
              Agustus
              <input type="checkbox" name="blnterbit[]" value="September" <?= set_value('blnterbit') === "September" ? 'checked' : '' ?>>
              September
              <input type="checkbox" name="blnterbit[]" value="Oktober" <?= set_value('blnterbit') === "Oktober" ? 'checked' : '' ?>>
              Oktober
              <input type="checkbox" name="blnterbit[]" value="November" <?= set_value('blnterbit') === "November" ? 'checked' : '' ?>>
              November
              <input type="checkbox" name="blnterbit[]" value="Desember" <?= set_value('blnterbit') === "Desember" ? 'checked' : '' ?>>
              Desember
            </label>
          </div>
        </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="#" class="col-sm-2 control-label">Tahun Terbit Terakhir :<br />
            <h5>Isi Dengan Angka</h5>
          </label>
          <div class="col-md-9">
            <input class="form-control" name="terbitakhir" value="<?= set_value('terbitakhir') ?>" placeholder="Terbit Terakhir" type="text" required />
          </div>
        </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="#" class="col-sm-2 control-label">Jumlah No.Terakhir : <br />
            <h5>Isi Dengan Angka</h5>
          </label>
          <div class="col-md-9">
            <input class="form-control" name="noterakhir" value="<?= set_value('noterakhir') ?>" placeholder="Jumlah No.Terakhir" type="text" required />
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


<?php if ($this->session->flashdata('duplicateNama')) { ?>
  <div class="modal modal-danger fade in" id="myModal" style="display: block; padding-right: 17px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Maaf Jurnal tersebut sudah terdaftar</h4>
        </div>
        <div class="modal-footer">
          <button type="button" aria-label="Close" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php } ?>


<script>
  // $(document).ready(function() {
  //   $('#myModal').modal('show');
  // });
</script>

<?php
$this->load->view('template/admin/footer');
// $this->load->view('template/admin/js_footer');
?>

<?php
$this->load->view('template/admin/js');
?>