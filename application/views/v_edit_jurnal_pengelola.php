<?php
$this->load->view('template/pengelola/head');
$this->load->view('template/pengelola/header');
$this->load->view('template/pengelola/sidebar');
?>

<div class="content-wrapper">

  <head>
    <div class="bar">
      <section class="content-header">
        <h1>
          Data Jurnal
          <small>Manajemen Jurnal</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="/serasi"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="/serasi/data-alternatif"> Jurnal</a></li>
          <li class="active">Edit Jurnal</li>
        </ol>
      </section>
    </div>
  </head>

  <section class="content">
    <div class="box box-success box-solid">
      <!-- satu box -->
      <div class="box-header with-border">
        <a href="<?= base_url('home-pengelola/'); ?>" class="btn btn-default fa fa-arrow-circle-left "></a>
        <h3 class="box-title">Form Edit Jurnal</h3>
      </div>

      <div class="box-body">
        <form action="<?php echo base_url('data-jurnalpengelola/update-jurnalpengelola') ?>" method="post">
          <div class="form-group">
            <label for="judul" class="col-sm-2 control-label">Judul : </label>
            <div class="col-md-9">
              <input class="form-control" name="judul" value="<?php echo $record['judul'] ?>" placeholder="Judul" type="text" required />
              <input type="hidden" name="kode" value="<?= $record['kode_jurnal']; ?>">
            </div>
          </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="inputemail" class="col-sm-2 control-label">Singkatan : </label>
          <div class="col-md-9">
            <input class="form-control" name="singkatan" value="<?php echo $record['singkatan'] ?>" placeholder="Singkatan" type="text" required />
          </div>
        </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="" class="col-sm-2 control-label">Nomor Jurnal : </label>
          <div class="col-md-9">
            <input class="form-control" name="nomorjurnal" value="<?php echo $record['nomor_jurnal'] ?>" placeholder="Nomor Jurnal" type="text" required />
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
                <option value="<?= $f->nama ?>" <?php if ($f->nama ==  $record['nama_fakultas']) {
                                                    echo 'selected="selected"';
                                                  } ?>><?= $f->nama ?> </option>
              <?php } ?>
            </select>
            <select class="form-control " name="departemen">
              <option value="" selected>-- Pilih Departemen --</option>
              <?php foreach ($departemen as $key => $d) { ?>
                <option value="<?= $d->nama ?>" <?php if ($d->nama ==  $record['nama_departemen']) {
                                                    echo 'selected="selected"';
                                                  } ?>><?= $d->nama ?> </option>
              <?php } ?>
            </select>
            <select class="form-control " name="lab">
              <option value="" selected>-- Pilih Lab --</option>
              <?php foreach ($lab as $key => $l) { ?>
                <option value="<?= $l->nama ?>" <?php if ($l->nama ==  $record['nama_lab']) {
                                                    echo 'selected="selected"';
                                                  } ?>><?= $l->nama ?> </option>
              <?php } ?>
            </select>
            <select class="form-control " name="lembaga">
              <option value="" selected>-- Pilih Lembaga --</option>
              <?php foreach ($lembaga as $key => $le) { ?>
                <option value="<?= $le->nama ?>" <?php if ($le->nama ==  $record['nama_lembaga']) {
                                                      echo 'selected="selected"';
                                                    } ?>><?= $le->nama ?> </option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="#" class="col-sm-2 control-label">Portal : </label>
          <div class="col-md-9">
            <select class="form-control " name="portal" required id="select-portal">
              <option value="0">-- Pilih Portal --</option>

              <?php foreach ($portal as $key => $p) { ?>
                <option value="<?= $p->nama ?>" <?php if ($p->nama ==  $record['nama_portal']) {
                                                    echo 'selected="selected"';
                                                  } ?>> <?= $p->nama ?> </option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="inputpassword" class="col-sm-2 control-label">URL Portal : </label>
          <div class="col-md-9">
            <input class="form-control" name="urlportal" value="<?php echo $record['url'] ?>" placeholder="URL" type="text" required />
          </div>
        </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="#" class="col-sm-2 control-label">Sponsor : <br />
            <h5>Isi 'N/A' Bila Tidak ada</h5>
          </label>
          <div class="col-md-9">
            <input class="form-control" name="sponsor" value="<?php echo $record['sponsor'] ?>" placeholder="sponsor" type="text" />
          </div>
        </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="#" class="col-sm-2 control-label">Ketua Editor : </label>
          <div class="col-md-9">
            <input class="form-control" value="<?php echo $record['nama_user'] ?>" placeholder="Pengelola" type="text" disabled />
            <input type="hidden" name="pengelola" value="<?= $record['id_user']; ?>">
          </div>
        </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="inputtelepon" class="col-sm-2 control-label">Kode p-issn : <br />
            <h5>Isi 'N/A' Bila Tidak ada</h5>
          </label>
          <div class="col-md-9">
            <input class="form-control" name="pissn" value="<?php echo $record['p_issn'] ?>" placeholder="p-issn" type="text" />
          </div>
        </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="inputtelepon" class="col-sm-2 control-label">Kode e-issn : <br />
            <h5>Isi 'N/A' Bila Tidak ada</h5>
          </label>
          <div class="col-md-9">
            <input class="form-control" name="eissn" value="<?php echo $record['e_issn'] ?>" placeholder="e-issn" type="text" />
          </div>
        </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="#" class="col-sm-2 control-label">English : </label>
          <div class="col-md-9">
            <select class="form-control " name="english">
              <option>-- Pilih Status English --</option>
              <option value="2" name="english" <?= $record['english'] === "2"  ? 'selected' : '' ?>>YA</option>
              <option value="1" name="english" <?= $record['english'] === "1"  ? 'selected' : '' ?>>PARSIAL</option>
              <option value="0" name="english" <?= $record['english'] === "0"  ? 'selected' : '' ?>>TIDAK</option>
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
              <option value="1" name="mpgundip" <?= $record['mpgundip'] === "1"  ? 'selected' : '' ?>>YA</option>
              <option value="0" name="mgpundip" <?= $record['mpgundip'] === "0"  ? 'selected' : '' ?>>TIDAK</option>
            </select>
          </div>
        </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="#" class="col-sm-2 control-label">Kode DOI : </label>
          <div class="col-md-9">
            <input class="form-control" name="doi" value="<?php echo $record['doi'] ?>" placeholder="DOI" type="text" />
          </div>
        </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="#" class="col-sm-2 control-label">Tahun Mulai : <br />
            <h5>Isi Dengan Angka</h5>
          </label>
          <div class="col-md-9">
            <input class="form-control" name="thnmulai" value="<?php echo $record['tahun_mulai'] ?>" placeholder="Tahun Mulai" type="text" required />
          </div>
        </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label class="col-sm-2 control-label">Bulan Terbit : </label>
          <?php
          $bln_arr = explode(',', $record['bln_terbit'])
          ?>
          <div class="col-md-9">
            <label>
              <input type="checkbox" name="blnterbit[]" value="Januari" <?= in_array("Januari", $bln_arr) ? 'checked' : '' ?>>
              Januari
              <input type="checkbox" name="blnterbit[]" value="Februari" <?= in_array("Februari", $bln_arr) ? 'checked' : '' ?>>
              Februari
              <input type="checkbox" name="blnterbit[]" value="Maret" <?= in_array("Maret", $bln_arr) ? 'checked' : '' ?>>
              Maret
              <input type="checkbox" name="blnterbit[]" value="April" <?= in_array("April", $bln_arr) ? 'checked' : '' ?>>
              April
              <input type="checkbox" name="blnterbit[]" value="Mei" <?= in_array("Mei", $bln_arr) ? 'checked' : '' ?>>
              Mei
              <input type="checkbox" name="blnterbit[]" value="Juni" <?= in_array("Juni", $bln_arr) ? 'checked' : '' ?>>
              Juni
              <input type="checkbox" name="blnterbit[]" value="Juli" <?= in_array("Juli", $bln_arr) ? 'checked' : '' ?>>
              Juli
              <input type="checkbox" name="blnterbit[]" value="Agustus" <?= in_array("Agustus", $bln_arr) ? 'checked' : '' ?>>
              Agustus
              <input type="checkbox" name="blnterbit[]" value="September" <?= in_array("September", $bln_arr) ? 'checked' : '' ?>>
              September
              <input type="checkbox" name="blnterbit[]" value="Oktober" <?= in_array("Oktober", $bln_arr) ? 'checked' : '' ?>>
              Oktober
              <input type="checkbox" name="blnterbit[]" value="November" <?= in_array("November", $bln_arr) ? 'checked' : '' ?>>
              November
              <input type="checkbox" name="blnterbit[]" value="Desember" <?= in_array("Desember", $bln_arr) ? 'checked' : '' ?>>
              Desember
            </label>
          </div>
        </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="#" class="col-sm-2 control-label">Tahun Terbit Terakhir : <br />
            <h5>Isi Dengan Angka</h5>
          </label>
          <div class="col-md-9">
            <input class="form-control" name="terbitakhir" value="<?php echo $record['terbit_terakhir'] ?>" placeholder="Terbit Terakhir" type="text" required />
          </div>
        </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="#" class="col-sm-2 control-label">Jumlah No.Terakhir : <br />
            <h5>Isi Dengan Angka</h5>
          </label>
          <div class="col-md-9">
            <input class="form-control" name="noterakhir" value="<?php echo $record['no_terakhir'] ?>" placeholder="Jumlah No.Terakhir" type="text" required />
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
$this->load->view('template/pengelola/footer');
?>

<?php
$this->load->view('template/pengelola/js');
?>