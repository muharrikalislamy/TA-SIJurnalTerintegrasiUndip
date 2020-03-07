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
          Data Indikator
          <small>Tambah Data Indikator</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="/serasi"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="/serasi/data-indikator"> Indikator</a></li>
          <li class="active">Tambah</li>
        </ol>
      </section>
    </div>
  </head>

  <section class="content">
    <div class="box box-success box-solid">
      <!-- satu box -->
      <div class="box-header with-border">
        <a href="<?= base_url('data-indikator/'); ?>" class="btn btn-default fa fa-arrow-circle-left "></a>
        <h3 class="box-title">Form Tambah Data Indikator</h3>
      </div>

      <div class="box-body">
        <form class="form-horizontal" action="<?php echo base_url() ?>data-indikator/submit-indikator" method="post">
          <div class="form-group">
            <label for="inputkriteria" class="col-sm-2 control-label">Kriteria Utama : </label>
            <div class="col-md-9">
              <select class="form-control" name="inputkriteria">
                <!-- form buat k1 -->
                <?php foreach ($kriteria as $key => $krit) { ?>
                  <option value="<?= $krit->kode_kriteria ?>"><?= $krit->nama ?> (<?= $krit->kode_kriteria ?>) </option> <!-- ngambil nilai db -->
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="inputindikator" class="col-sm-2 control-label">Kode Indikator : </label>
            <div class="col-md-9">
              <input class="form-control" name="inputindikator" placeholder="Kode Indikator (contoh : tuliskan '1' untuk untuk indikator 1 pada kriteria utama yang dipilih, '2' untuk indikator 2 dst)" type="number" required />
            </div>
          </div>

          <div class="form-group">
            <label for="inputnamaindikator" class="col-sm-2 control-label">Nama Indikator : </label>
            <div class="col-md-9">
              <input class="form-control" name="inputnamaindikator" placeholder="Nama Indikator" type="text" required />
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

<?php if ($this->session->flashdata('duplicateKode')) { ?>
  <div class="modal modal-danger fade in" id="myModal" style="display: block; padding-right: 17px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Kode Indikator Tersebut Sudah Terdaftar</h4>
        </div>
        <div class="modal-footer">
          <button type="button" aria-label="Close" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php } ?>


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