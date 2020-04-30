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
        Data Indikator
        <small>Manajemen Indikator</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/serasi"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Indikator Kriteria</li>
      </ol>
    </section>


      <section class="content">
      <a href="<?=base_url('data-indikator/add');?>" class="btn btn-success fa fa-plus-square-o"> Tambah Indikator</a>
      <hr>

      <div class="box box-success box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <h3 class="box-title">Tabel Data Indikator</h3>
        </div>
        <div class="box-body">  
        <table id="data-indikator" class="table table-bordered table-striped scroll" style="background-color:white;">
        
        <thead>
        <tr>
          <th>No</th>
          <th>Kode Indikator</th>
          <th>Kode Kriteria</th>
          <th>Nama Indikator</th>
          <th>Aksi</th>  
        </tr>
        </thead>

        <tbody>
        <?php
        $no=1;
        foreach($indikator as $b) {?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><font size="4px"><div class="label label-default"><?php echo $b->kode_indikator ?></div></font></td>
          <td><?php echo $b->kode_kriteria ?></td>
          <td><?php echo $b->nama ?></td>
          <td>
            
          <a href="<?php echo base_url(); ?>data-indikator/edit/<?php echo $b->kode_indikator ?>" class="btn btn-primary fa fa-edit"> Edit</a>
          
          <a href="<?php echo base_url(); ?>Indikator/delete_indikator/<?php echo $b->kode_indikator ?>" class="btn btn-danger fa fa-trash-o" onClick="return confirmDelete();" > Hapus</a>

          <a href="<?php echo base_url(); ?>data-indikator/input-nilai/<?php echo $b->kode_indikator ?>" class="btn btn-success fa fa-pencil-square"> Masukan Nilai</a>


          </td>
        </tr>
        <?php } ?>
      </tbody>  
      </table>
      </div> <!-- box body -->
      </div> <!-- box primary -->


      <div class="box box-success box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <h3 class="box-title">Tabel Data Nilai Indikator</h3>
        </div>
        <div class="box-body">  
        <table id="data-nilai-indikator" class="table table-bordered table-striped scroll" style="background-color:white;">
        <thead>
        <tr>
          <th>No</th>
          <th>ID Penilaian</th>
          <th>Kode Kriteria</th>
          <th>Kode Indikator</th>
          <th>Indikator</th>
          <th>Penilaian Indikator</th>
          <th>Nilai</th>
          <th>Aksi</th>  
        </tr>
        </thead>

        <tbody>
        <?php
        $no=1;
        foreach($nilai as $a) {?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><font size="4px"><div class="label label-default"><?php echo $a->id_penilaian ?></div></font></td>
          <td><?php echo $a->kode_kriteria ?></td>
          <td><?php echo $a->kode_indikator ?></td>
          <td><?php echo $a->nama ?></td>
          <td><?php echo $a->penilaian ?></td>
          <td><?php echo $a->nilai ?></td>
          <td>
            
          <a href="<?php echo base_url(); ?>Indikator/edit_nilai_indikator/<?php echo $a->id_penilaian ?>" class="btn btn-primary fa fa-edit"> Edit</a>
          
          <a href="<?php echo base_url(); ?>Indikator/delete_nilai_indikator/<?php echo $a->id_penilaian ?>" class="btn btn-danger fa fa-trash-o" onClick="return confirmDelete();"> Hapus</a>

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
        <h4 class="modal-title">Data Berhasil Disimpan</h4>
      </div>
      <div class="modal-footer">
        <button type="button" aria-label="Close" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  </div>
<?php } 

else if ($this->session->flashdata('successUpdate')) { ?>
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
<?php } 

else if ($this->session->flashdata('duplicateKode')) { ?>
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
<?php } 

else if ($this->session->flashdata('successDelete')) { ?>
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