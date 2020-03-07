<?php
$this->load->view('template/evaluator/head');
$this->load->view('template/evaluator/header');
$this->load->view('template/evaluator/sidebar');
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
      Data Ranking Jurnal
      <small>Berdasarkan Penilaian SPK---<small class="label pull-right bg-green">TOPSIS</small></small>
    </h1>

    <ol class="breadcrumb">
      <li><a href="/serasi"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Ranking Jurnal</li>
    </ol>
  </section>


  <section class="content">
    <div class="box box-success box-solid">
      <!-- satu box -->
      <div class="box-header with-border">
        <h3 class="box-title">Tabel Data Jurnal</h3>
      </div>
      <div class="box-body">

        <table id="data-jurnalpengindeks" class="table table-bordered table-striped scroll" style="background-color:white;">
          <thead>
            <tr>

              <th>No</th>
              <!-- <th>Kode Alternatif</th> -->
              <th>Nama Alternatif</th>
              <th>Kependekan</th>
              <th>Nilai Murni</th>
              <th>Nilai Preferensi</th>
              <th>Rekomendasi</th>
              <th>Peringkat</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $no = 1;
            $nomer = 1;
            $s = 0;
            $label = 'bg-red';
            $tes = 0;
            $rev = false;
            foreach ($alternatifsort as $key => $a) { ?>
              <tr>
                <?php
                if ($key < count($alternatifsort) - 1) { //key nambah terus (?)
                  if ($a->jumlah_nilai_murni >= $alternatifsort[$key + 1]->jumlah_nilai_murni) {
                    $tes = $a->jumlah_nilai_murni;
                    $rev = false;
                  } else {
                    $tes = $alternatifsort[$key + 1]->jumlah_nilai_murni; // variabel tes diisi nilai murni peringkat setelahnya jadi rekomendasi bisa berubah
                    $rev = true; //kasih bintang
                  }
                } else {
                  $tes = $a->jumlah_nilai_murni; //pake nilai murni sendiri
                  $rev = false; //tanpa bintang
                }


                if ($tes >= 85) {
                  $s = 1;
                  $label = 'bg-blue';
                } else if ($tes >= 70) {
                  $s = 2;
                  $label = 'bg-navy';
                } else if ($tes >= 60) {
                  $s = 3;
                  $label = 'bg-yellow';
                } else if ($tes >= 50) {
                  $s = 4;
                  $label = 'bg-aqua';
                } else if ($tes >= 40) {
                  $s = 5;
                  $label = 'bg-purple';
                } else if ($tes >= 30) {
                  $s = 6;
                  $label = 'bg-maroon';
                } else if ($tes < 30) {
                  $s = 0;
                  $label = 'bg-red';
                }
                ?>
                <td><?php echo $nomer++ ?></td>
                <!-- <td> <font size="4px"><div class="label label-default"> <?php echo $a->kode_alternatif ?></td> -->
                <td><?php echo $a->nama ?></td>
                <td><?php echo $a->singkatan ?></td>
                <td><?php echo $a->jumlah_nilai_murni ?></td>
                <td><?php echo $a->preferensi ?></td>

                <td>
                  <font size="4px">
                    <?php if ($s > 0) { ?>
                      <div class="label <?= $label; ?> disabled color-palette">Rekomendasi S<?= $s; ?><?= $rev ? '*' : '' ?></div>
                    <?php } else { ?>
                      <div class="label bg-red color-palette">Belum Rekomendasi</div>
                    <?php } ?>

                  </font>
                </td>

                <td>
                  <font size="4px">
                    <div class="label label-success"> <?php echo $no++ ?>
                </td>


              </tr>
            <?php } ?>
          </tbody>
        </table>

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
  $this->load->view('template/evaluator/js');
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