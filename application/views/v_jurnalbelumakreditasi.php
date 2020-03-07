<?php
$this->load->view('template/admin/head');
$this->load->view('template/admin/header');
$this->load->view('template/admin/sidebar');
?>

<!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 -->


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Jurnal
      <small>Manajemen Jurnal</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="/serasi"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Daftar Jurnal</li>
    </ol>
  </section>


  <section class="content">

    <!-- <hr> -->

    <div class="box box-success box-solid">
      <!-- satu box -->
      <div class="box-header with-border">
        <a href="<?= base_url('home-admin/'); ?>" class="btn btn-default fa fa-arrow-circle-left "></a>
        <h3 class="box-title">Tabel Data Jurnal Belum Terakreditasi</h3>
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
              <th>Aksi</th>

            </tr>
          </thead>

          <tbody>
            <?php
            $no = 1;
            foreach ($jurnalbelumakre as $b) { ?>
              <tr>
                <td><?php echo $no++ ?></td>

                <td><?php echo $b->judul ?></td>
                <td><?php echo $b->singkatan ?></td>
                <td><?php echo "<b>$b->nama_fakultas</b>" ?>--<?php echo $b->nama_departemen ?>--<?php echo "<b>$b->nama_lab</b>" ?>--<?php echo $b->nama_lembaga ?></td>
                <td><?php echo $b->nama_user ?></td>
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
    </div> <!-- box body -->
</div> <!-- box primary -->




</section>
</div>


<?php
$this->load->view('template/evaluator/footer');
?>


<?php
if ($this->session->flashdata('successSave')) { ?>
  <div class="modal modal-success fade in" id="myModal" style="display: block; padding-right: 17px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Data Berhasil Disimpan</h4>
        </div>
        <div class="modal-footer">
          <button type="button" aria-label="Close" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php } else if ($this->session->flashdata('successUpdate')) { ?>
  <div class="modal modal-success fade" id="myModal">
    <div class="modal modal-success fade in" id="myModal" style="display: block; padding-right: 17px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Data Berhasil Disimpan</h4>
          </div>
          <div class="modal-footer">
            <button type="button" aria-label="Close" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  <?php } else if ($this->session->flashdata('duplicateKode')) { ?>
    <div class="modal modal-danger fade in" id="myModal" style="display: block; padding-right: 17px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Proses Gagal, Data Tersebut Sudah Terdaftar, Silahkan Cek Kembali Inputan Anda</h4>
          </div>
          <div class="modal-footer">
            <button type="button" aria-label="Close" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  <?php } else if ($this->session->flashdata('successDelete')) { ?>
    <div class="modal modal-danger fade in" id="myModal" style="display: block; padding-right: 17px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Data berhasil dihapus</h4>
          </div>
          <div class="modal-footer">
            <button type="button" aria-label="Close" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  <?php }

  ?>

  <?php
  $this->load->view('template/admin/js');
  ?>

  <!-- <script languange ="javascript">

function getkey(kode) {
    if (window.event)
        return window.event.keyCode;
    else if (kode)
        return e.which;
    else return null; }

function huruf(kode, goods, field) {
    var key, keychar; 
    key = getKey(kode);
    if (key ==null) 
        return true; 
    
    keychar = String.fromCharCode(key);
    keychar = keychar.toLowerCase(); 
    goods = goods.toLowerCase();
    
    if (goods.indexOf(keychar) != -1)
        return true;
    else return alert ('hayo ngapain')== '';
    return(false);
    }
</script> -->