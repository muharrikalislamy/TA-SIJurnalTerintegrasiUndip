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

          Data SK Jurnal
          <small>Tambah Data SK Jurnal</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="/serasi"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="/serasi/data-jurnal"> SK Jurnal</a></li>
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
        <form action="<?php echo base_url('data-js/submit-js-sk') ?>" method="post">
          <div class="form-group">
            <label for="inputnomorsk" class="col-sm-2 control-label">Nomor SK : </label>
            <div class="col-md-9">
              <input class="form-control" value="<?php echo $record['nomor'] ?>" placeholder="SK" type="text" disabled />
              <input type="hidden" name="inputnomorsk" value="<?= $record['kode_sk']; ?>">
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
          <label for="inputsinta" class="col-sm-2 control-label">Peringkat Sinta : </label>
          <div class="col-md-9">
            <select class="form-control " name="inputsinta" required>
              <option value="0" selected>-- Pilih Peringkat Sinta --</option>
              <option value="S1">S1</option>
              <option value="S2">S2</option>
              <option value="S3">S3</option>
              <option value="S4">S4</option>
              <option value="S5">S5</option>
              <option value="S6">S6</option>
            </select>
          </div>
        </div>
      </div><!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="inputmulaisk" class="col-sm-2 control-label">Tanggal Mulai SK : </label>
          <div class="col-md-9">
            <input class="form-control" name="inputmulaisk" placeholder="SK" type="date" required />
          </div>
        </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="inputakhirsk" class="col-sm-2 control-label">Tanggal Berakhir SK : </label>
          <div class="col-md-9">
            <input class="form-control" name="inputakhirsk" placeholder="SK" type="date" required />
          </div>
        </div>
      </div> <!-- box body -->

      <div class="box-body">
        <div class="form-group">
          <label for="inputurlsinta" class="col-sm-2 control-label">URL Sinta : </label>
          <div class="col-md-9">
            <input class="form-control" name="inputurlsinta" placeholder="URL Sinta" type="text" required />
          </div>
        </div>
      </div><!-- box body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-success center-block" style="padding-left: 15%; padding-right: 15%;"><b>Tambah Data</b></button>

        <div class="box-header with-border">
          <h3 class="box-title">Tabel Riwayat SK Jurnal Terkait</h3>
        </div>
        <div class="box-body">
          <table id="data-sk" class="table table-bordered table-striped scroll" style="background-color:white;">

            <thead>
              <tr>
                <th>Riwayat</th>
                <th>Judul Jurnal</th>
                <th>Nomor SK</th>
                <th>Peringkat Sinta</th>
                <th>Tanggal Mulai SK</th>
                <th>Tanggal Akhir SK</th>
                <th>URL Sinta</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $no = 1;
              foreach ($js as $js) { ?>
                <?php if ($id == $js->kode_sk) : ?>
                  <tr>
                    <td><?php echo $js === 0 ? "SK Terbaru" : "SK ke-" . $no++ ?></td>
                    <td><?php echo $js->judul ?></td>
                    <td><?php echo $js->nomor ?></td>
                    <td><?php echo $js->peringkat_sinta ?></td>
                    <td><?php echo $js->tanggal_mulai ?></td>
                    <td><?php echo $js->tanggal_berakhir ?></td>
                    <td><?php echo $js->url_sinta ?></td>
                    <td>
                      <a href="<?php echo base_url(); ?>JS/delete_js_sk/<?php echo $js->kode_js ?>" class="btn btn-danger fa fa-trash-o" onClick="return confirmDelete();"> Hapus</a>
                    </td>
                  </tr>
              <?php endif;
              } ?>
            </tbody>
          </table>
        </div> <!-- box body -->
      </div> <!-- box primary -->


      </form>
  </section>
</div>

<script>
  // var dat = $id;


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