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
        Log Penilaian
        <small>Sistem Klasifikasi Jurnal</small>
      </h1>

      
      <ol class="breadcrumb">
        <li><a href="/serasi"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Log Penilaian</li>
      </ol>
    </section>

      <section class="content">
      <a href="<?php echo base_url();?>Log_Penilaian_Admin/delete_log_penilaian" class="btn btn-danger fa fa-plus-square-o" onClick="return confirmDelete();" > Hapus Log</a>
      <hr>
      <div class="box box-success box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <h3 class="box-title">Tabel Data Log Penilaian</h3>
        </div>
        <div class="box-body">  
        <table id="log-penilaian" class="table table-bordered table-striped scroll" style="background-color:white;">
        <thead>
        <tr>
          <th>No</th>
          <th>Username</th>
          <th>Nama</th>
          <th>Tanggal</th>
          <th>Waktu</th>
          <th>Alternatif</th>
          <th>Event</th>
        </tr>
        </thead>

        <tbody>
        <?php
        $no=1;
        foreach($logpenilaian as $a) {?>

        <tr>

          <td> <?php echo $no++ ?> </td>

          <td><font size="4px"><div class="label label-default"> <?php echo $a->username ?> </div></font></td>

          <td> <?php echo $a->nama_user ?> </td>
                    
          <td><font size="4px"><div class="label label-default">
          <?php $datetime000 = new DateTime($a->waktu);
          echo $datetime000->format('d F Y'); ?>
          </div></font></td>

          <td><font size="4px"><div class="label label-default">
          <?php $datetime000 = new DateTime($a->waktu);
          echo $datetime000->format('H:i'); ?>
          </div></font></td>

          <td><font size="4px"><div class="label label-default"> <?php echo $a->nama?> </div></font></td>

          <td><font size="4px">
                    <?php if($a->event == 'Nilai Alternatif'){
                      echo '<div class="label bg-green disabled color-palette">Nilai Alternatif</div>';
                    }
                    else if ($a->event == 'Hapus Nilai Alternatif' ){
                      echo '<div class="label bg-red disabled color-palette">Hapus Nilai Alternatif</div>';
                    }
                    else if ($a->event == 'Update Nilai Alternatif' ){
                      echo '<div class="label bg-aqua disabled color-palette">Update Nilai Alternatif</div>';
                    }
                    ?></font>
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
$this->load->view('template/admin/footer');
?>

<?php if ($this->session->flashdata('successSave')) { ?>
  <div class="modal modal-success fade in" id="myModal" style="display: block; padding-right: 17px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Data berhasil disimpan</h4>
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

<script>
function confirmDelete() {
return confirm('Apakah anda yakin ingin menghapus data ini? \nAnda tidak bisa mengembalikan data yang telah dihapus')
}
</script>

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
</script>     -->