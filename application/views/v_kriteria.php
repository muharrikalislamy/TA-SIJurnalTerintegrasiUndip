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
      Data Kriteria
      <small>Sistem Klasifikasi Jurnal</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="/serasi"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Kriteria Utama</li>
    </ol>
  </section>


  <section class="content">
    <a href="<?= base_url('data-kriteria/add'); ?>" class="btn btn-success fa fa-plus-square-o"> Tambah Kriteria</a>
    <hr>


    <div class="box box-success box-solid">
      <!-- satu box -->
      <div class="box-header with-border">
        <h3 class="box-title">Tabel Data Kriteria</h3>
      </div>
      <div class="box-body">
        <table id="data-kriteria" class="table table-bordered table-striped scroll" style="background-color:white;">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Kriteria</th>
              <th>Nama Kriteria</th>
              <th>Kependekan</th>
              <th style="padding-right:10px;">Aksi</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $no = 1;
            foreach ($kriteria as $a) { ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td>
                  <font size="4px">
                    <div class="label label-default"><?php echo $a->kode_kriteria ?></div>
                  </font>
                </td>
                <td><?php echo $a->nama ?></td>
                <td><?php echo $a->kependekan ?></td>

                <td>
                  <a href="<?php echo base_url(); ?>data-kriteria/edit/<?php echo $a->kode_kriteria ?>" class="btn btn-primary fa fa-edit"> Edit</a>

                  <a href="<?php echo base_url(); ?>data-kriteria/delete/<?php echo $a->kode_kriteria ?>" class="btn btn-danger fa fa-trash-o" onClick="return confirmDelete();"> Hapus</a>


                  <button class="btn btn-default fa fa-info" data-toggle="modal" data-target="#DetailsModal<?php echo $a->kode_kriteria ?>"> Info</button>

                </td>
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
          <h4 class="modal-title">Data Berhasil Ditambah</h4>
        </div>
        <div class="modal-footer">
          <button type="button" aria-label="Close" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php } else if ($this->session->flashdata('successUpdate')) { ?>
  <div class="modal modal-success fade" id="myModal" style="display: block; padding-right: 17px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

<!-- Details Modal -->
<?php foreach ($kriteria as $b) { ?>
  <div class="modal fade" id="DetailsModal<?php echo $b->kode_kriteria ?>" tabindex="-1" role="dialog" aria-labelledby="DetailsModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="sr-only">&times;</span></button>
          <h4 class="modal-title" id="DetailsModalLabel"> [<?php echo $b->kode_kriteria ?>] - <?php echo $b->nama ?></h4>
        </div>

        <div class="modal-body">
          <?php echo $b->deskripsi; ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
<!-- Details Modal End-->

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