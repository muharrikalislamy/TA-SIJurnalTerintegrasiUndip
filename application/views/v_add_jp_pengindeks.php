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
          Data Jurnal
          <small>Tambah Data Jurnal Pada Pengindeks</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="/serasi"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="/serasi/data-pengindeks"> Jurnal Pengindeks</a></li>
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
        <form action="<?php echo base_url('data-jp/submit-jp-pengindeks') ?>" method="post">
          <div class="form-group">
            <label for="inputnamapengindeks" class="col-sm-2 control-pengindeksel">Nama Pengindeks : </label>
            <div class="col-md-9">
              <input class="form-control" value="<?php echo $record['nama'] ?>" placeholder="Pengindeks" type="text" disabled />
              <input type="hidden" name="inputnamapengindeks" value="<?= $record['kode_pengindeks']; ?>">
            </div>
          </div>
      </div> <!-- box body -->



      <div class="box-body">
        <div class="form-group">
          <label for="inputkategori" class="col-sm-2 control-pengindeksel">Kategori Pengindeks : </label>
          <div class="col-md-9">
            <!-- <select name="inputkategori" class="form-control">
              <option>--Pilih Kategori--</option>
              <option value="Tinggi">Tinggi</option>
              <option value="Sedang">Sedang</option>
              <option value="Rendah">Rendah</option>
            </select> -->
            <input class="form-control" value="<?php echo $record['kategori'] ?>" placeholder="Pengindeks" type="text" disabled />
              <input type="hidden" name="inputkategori" value="<?= $record['kode_pengindeks']; ?>">
          </div>
        </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="inputjurnal" class="col-sm-2 control-label">Jurnal : </label>
          <div class="col-md-9">
            <select class="form-control " name="inputjurnal" required>
              <option value="0" selected>-- Pilih Judul Jurnal --</option>
              <?php foreach ($jurnal as $key => $j) { ?>
                <option value="<?= $j->kode_jurnal ?>"><?= $j->judul ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div><!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="inputurl" class="col-sm-2 control-label">URL Pengindeks : </label>
          <div class="col-md-9">
            <input class="form-control" name="inputurl" placeholder="URL Pengindeks" type="text" required />
          </div>
        </div>
      </div><!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="inputketerangan" class="col-sm-2 control-label">Keterangan Pendukung : </label>
          <div class="col-md-9">
            <input class="form-control" name="inputketerangan" placeholder="Keterangan pendukung" type="text" required />
          </div>
        </div>
      </div><!-- box body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-success center-block" style="padding-left: 15%; padding-right: 15%;"><b>Tambah Data</b></button>

        <div class="box-header with-border">
          <h3 class="box-title">Tabel Riwayat Pengindeks Jurnal Terkait</h3>
        </div>
        <div class="box-body">
          <table id="data-sk" class="table table-bordered table-striped scroll" style="background-color:white;">

            <thead>
              <tr>
                <th>No</th>
                <th>Judul Jurnal</th>
                <th>Pengindeks</th>
                <th>Kategori</th>
                <th>URL Pengindeks</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $no = 1;
              foreach ($jp as $jp) { ?>
                <?php if ($id == $jp->kode_pengindeks) : ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $jp->judul ?></td>
                    <td><?php echo $jp->nama ?></td>
                    <td><?php echo $jp->kategori ?></td>
                    <td><?php echo $jp->url_pengindeks ?></td>
                    <td><?php echo $jp->keterangan ?></td>
                    <td>
                      <a href="<?php echo base_url(); ?>JP/delete_jp_pengindeks/<?php echo $jp->kode_jp ?>" class="btn btn-danger fa fa-trash-o" onClick="return confirmDelete();"> Hapus</a>
                    </td>
                  </tr>
              <?php endif;
              } ?>
            </tbody>
          </table>

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