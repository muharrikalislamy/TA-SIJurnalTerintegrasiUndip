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
          Alternatif
          <small>Tambah Data</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="/serasi"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="/serasi/data-alternatif"> Alternatif</a></li>
          <li class="active">Tambah</li>
        </ol>
      </section>
    </div>
  </head>

  <section class="content">
    <div class="box box-success box-solid">
      <!-- satu box -->
      <div class="box-header with-border">
        <a href="<?= base_url('data-alternatif/'); ?>" class="btn btn-default fa fa-arrow-circle-left "></a>
        <h3 class="box-title">Form Tambah Data Alternatif</h3>
      </div>

      <div class="box-body">
        <form class="form-horizontal" action="<?php echo base_url() ?>data-alternatif/submit" method="post">
          <div class="form-group">
            <label for="inputkode" class="col-sm-2 control-label">Kode Alternatif : </label>
            <div class="col-md-9">
              <input class="form-control" name="inputkode" placeholder="Kode Alternatif (Contoh : Tuliskan '1' Untuk Kode Alternatif = 'A1' dst)" type="number" required />
            </div>
          </div>

          <div class="form-group">
            <label for="inputname" class="col-sm-2 control-label">Pilih Jurnal : </label>
            <div class="col-md-9">

              <select class="form-control " name="inputname" required>
                <option value="0" selected>-- Pilih Judul Jurnal --</option>
                <?php foreach ($jurnal as $key => $j) { ?>
                  <option value="<?= $j->singkatan . ';' . $j->judul ?>"><?= $j->singkatan ?> - <?= $j->judul ?> </option>
                <?php } ?>
              </select>
              <h5>Jurnal Yang Bisa Dipilih Sebagai Alternatif Adalah Jurnal :</h5>
              <h5>- Belum Terakreditasi</h5>
              <h5>- Jurnal Dengan Peringkat Sinta S3-S6</h5>

            </div>
          </div>

          <!-- <div class="form-group">
            <label for="inputsingkatan" class="col-sm-2 control-label">Singkatan : </label>
            <div class="col-md-9">

              <select class="form-control " name="inputsingkatan" required>
                <option value="0" selected>-- Pilih Singkatan Jurnal --</option>
                <?php foreach ($jurnal as $key => $j) { ?>
                  <option value="<?= $j->singkatan ?>"><?= $j->singkatan ?> </option>
                <?php } ?>
              </select>

            </div>
          </div> -->
      </div> <!-- box body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-success center-block" style="padding-left: 15%; padding-right: 15%;"><b>Tambah Data</b></button>



        <div class="box-header with-border">
          <h3 class="box-title">Tabel Data Jurnal Untuk Alternatif</h3>
        </div>
        <div class="box-body">
          <table id="log-penilaian" class="table table-bordered table-striped scroll" style="background-color:white;">

            <thead>
              <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Singkatan</th>
                <th>Penerbit</th>
                <th>Ketua Editor</th>
                <th>Peringkat_Sinta</th>
                <th>Aksi</th>

              </tr>
            </thead>

            <tbody>
              <?php
              $no = 1;
              foreach ($jurnal as $b) { ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $b->judul ?></td>
                  <td><?php echo $b->singkatan ?></td>
                  <td><?php echo "<b>$b->nama_fakultas</b>" ?>--<?php echo $b->nama_departemen ?>--<?php echo "<b>$b->nama_lab</b>" ?>--<?php echo $b->nama_lembaga ?></td>
                  <td><?php echo $b->nama_user ?></td>
                  <td><?php echo $b->peringkat_sinta ?></td>
                  <td>
                    <span data-toggle="tooltip" title="Detail Jurnal" data-placement="top"><a href="#mDetailJurnal<?= $b->kode_jurnal ?>" data-toggle="modal" data-target="#mDetailJurnal<?= $b->kode_jurnal ?> " class="btn btn-sm btn-default "><i class="fa fa-bars" aria-hidden="true"></i></a></span>
                  </td>
                </tr>

                <div class="modal fade" id="mDetailJurnal<?= $b->kode_jurnal ?>" style="padding-right: 17px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Detail Jurnal <?= $b->judul ?> </h4>
                      </div>
                      <div class="modal-body">

                        <div class="row">
                          <label class="col-sm-4">
                            Judul
                          </label>
                          <label class="col-sm-8">
                            <?= $b->judul ?>
                          </label>
                        </div>

                        <div class="row">
                          <label class="col-sm-4">
                            Singkatan
                          </label>
                          <label class="col-sm-8">
                            <?= $b->singkatan ?>
                          </label>
                        </div>

                        <div class="row">
                          <label class="col-sm-4">
                            Nomor Jurnal
                          </label>
                          <label class="col-sm-8">
                            <?= $b->nomor_jurnal ?>
                          </label>
                        </div>

                        <div class="row">
                          <label class="col-sm-4">
                            Penerbit
                          </label>
                          <label class="col-sm-8">
                            <?= $b->nama_fakultas ?>
                          </label>
                        </div>

                        <div class="row">
                          <label class="col-sm-4">
                          </label>
                          <label class="col-sm-8">
                            <?= $b->nama_departemen ?>
                          </label>
                        </div>

                        <div class="row">
                          <label class="col-sm-4">
                          </label>
                          <label class="col-sm-8">
                            <?= $b->nama_lab ?>
                          </label>
                        </div>

                        <div class="row">
                          <label class="col-sm-4">
                          </label>
                          <label class="col-sm-8">
                            <?= $b->nama_lembaga ?>
                          </label>
                        </div>

                        <div class="row">
                          <label class="col-sm-4">
                            Portal
                          </label>
                          <label class="col-sm-8">
                            <?= $b->nama_portal ?>
                          </label>
                        </div>

                        <div class="row">
                          <label class="col-sm-4">
                            URL Portal
                          </label>
                          <label class="col-sm-8">
                            <?= $b->url ?>
                          </label>
                        </div>

                        <div class="row">
                          <label class="col-sm-4">
                            Sponsor
                          </label>
                          <label class="col-sm-8">
                            <?= $b->sponsor ?>
                          </label>
                        </div>

                        <div class="row">
                          <label class="col-sm-4">
                            Ketua Editor
                          </label>
                          <label class="col-sm-8">
                            <?= $b->nama_user ?>
                          </label>
                        </div>

                        <div class="row">
                          <label class="col-sm-4">
                            Kode p-issn
                          </label>
                          <label class="col-sm-8">
                            <?= $b->p_issn ?>
                          </label>
                        </div>

                        <div class="row">
                          <label class="col-sm-4">
                            Kode e-issn
                          </label>
                          <label class="col-sm-8">
                            <?= $b->e_issn ?>
                          </label>
                        </div>

                        <div class="row">
                          <label class="col-sm-4">
                            English
                          </label>
                          <label class="col-sm-8">
                            <?php if ($b->english == 2) {
                              echo "English";
                            } elseif ($b->english == 1) {
                              echo "Parsial";
                            }
                            ?>
                          </label>
                        </div>

                        <div class="row">
                          <label class="col-sm-4">
                            MpgUndip
                          </label>
                          <label class="col-sm-8">
                            <?= $b->mpgundip === '1' ? "Ya" : "Tidak" ?>
                          </label>
                        </div>

                        <div class="row">
                          <label class="col-sm-4">
                            Kode DOI
                          </label>
                          <label class="col-sm-8">
                            <?= $b->doi ?>
                          </label>
                        </div>

                        <div class="row">
                          <label class="col-sm-4">
                            Tahun Mulai
                          </label>
                          <label class="col-sm-8">
                            <?= $b->tahun_mulai ?>
                          </label>
                        </div>

                        <div class="row">
                          <label class="col-sm-4">
                            Terbit Terakhir
                          </label>
                          <label class="col-sm-8">
                            <?= $b->terbit_terakhir ?>
                          </label>
                        </div>

                        <div class="row">
                          <label class="col-sm-4">
                            Bulan Terbit
                          </label>
                          <label class="col-sm-8">
                            <?= $b->bln_terbit ?>
                          </label>
                        </div>

                        <div class="row">
                          <label class="col-sm-4">
                            Jumlah No. Terakhir
                          </label>
                          <label class="col-sm-8">
                            <?= $b->no_terakhir ?>
                          </label>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" aria-label="Close" class="btn btn-success" data-dismiss="modal">Tutup</button>
                      </div>
                    </div>
                  </div>
                </div>
        </div>


      <?php } ?>
      </tbody>
      </table>

      </div> <!-- box primary -->
      </form>
  </section>

</div>

<?php if ($this->session->flashdata('duplicateKode')) { ?>
  <div class="modal modal-danger fade in" id="myModal" style="display: block; padding-right: 17px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Maaf kode atau Jurnal tersebut sudah terdaftar sebagai alternatif</h4>
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