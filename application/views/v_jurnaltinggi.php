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
      <li class="active">Daftar Jurnal Berpengindeks Tinggi</li>
    </ol>
  </section>


  <section class="content">
    <!-- <hr> -->

    <div class="box box-success box-solid">
      <!-- satu box -->
      <div class="box-header with-border">
      <a href="<?= base_url('home-admin/'); ?>" class="btn btn-default fa fa-arrow-circle-left "></a>
        <h3 class="box-title">Tabel Data Jurnal Berpengindeks Tinggi (SCOPUS & WOS)</h3>
      </div>
      <div class="box-body">
        <table id="data-jurnalpengindeks" class="table table-bordered table-striped scroll" style="background-color:white;">

          <thead>
            <tr>
            <th>No</th>
              <th>Judul</th>
              <th>Singkatan</th>
              <th>Ketua Editor</th>
              <!-- <th>Pengindeks</th>
              <th>Status Pengindeks</th> -->
              <th>URL Pengindeks</th>
              <th>Keterangan</th>

            </tr>
          </thead>

          <tbody>
            <?php
            $no = 1;
            foreach ($jurnaltinggi as $b) { ?>
              <tr>
              <td><?php echo $no++ ?></td>
                <td><?php echo $b->judul ?></td>
                <td><?php echo $b->singkatan ?></td>
                <td><?php echo $b->nama_user ?></td>
                <!-- <td><?php echo $b->nama ?></td>
                <td><?php echo $b->kategori ?></td> -->
                <td><?php echo $b->url_pengindeks ?></td>
                <td><?php echo $b->keterangan ?></td>
              </tr>

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