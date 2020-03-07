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
        Penilaian Alternatif
        <small>Sistem Klasifikasi Jurnal</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/serasi"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Penilaian Alternatif</li>
      </ol>
    </section>


      <section class="content">

<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#sudah" data-toggle="tab">Sudah Dievaluasi</a></li>
        <li><a href="#belum" data-toggle="tab">Belum Dievaluasi</a></li>
    </ul>
    
    <div class="tab-content">
    <div class="active tab-pane" id="sudah">
        <table id="penilaian-alternatif-sudah" class="table table-bordered table-striped scroll" style="background-color:white;">
        <thead>
        <tr>
          <th width="10px">No</th>
          <th width="10px">Status</th>
          <th width="100px">Kode Alternatif</th>
          <th width="350px">Judul Jurnal</th>
          <th width="10px">Singkatan</th>
          <th>Tanggal Penilaian</th>
          <th>Waktu</th>
          <th>Penilai</th>
          <th style="padding-right:10px;">Aksi</th>
        </tr>
        </thead>

        <tbody>
        <?php
        $no=1;
        foreach($alternatifsudah as $a) {?>
        <tr>
          <td><?php echo $no++ ?></td>
          
          <td><font size="4px"><div class="label label-success"><?php echo $a->status ?></div></font></td>
          
          <td><font size="4px"><div class="label label-default"><?php echo $a->kode_alternatif ?></div></font></td>
          
          <td><?php echo $a->nama ?></td>
          
          <td><?php echo $a->singkatan ?></td>
          
          <td><font size="4px"><div class="label label-default">
          <?php $datetime000 = new DateTime($a->waktu_penilaian);
          echo $datetime000->format('d F Y'); ?>
          </div></font></td>

          <td><font size="4px"><div class="label label-default">
          <?php $datetime000 = new DateTime($a->waktu_penilaian);
          echo $datetime000->format('H:i'); ?>
          </div></font></td>

          <td><font size="4px"><div class="label label-default"><?php echo $a->nama_user?></div></font></td>


          <td colspan="3">
            <a href="<?php echo base_url(); ?>penilaian-alternatif/edit-nilai/<?php echo $a->kode_alternatif ?>" class="btn btn-primary fa fa-edit"> Edit</a>

            <a href="<?php echo base_url(); ?>penilaian-alternatif/delete-nilai//<?php echo $a->kode_alternatif ?>" class="btn btn-danger fa fa-trash-o" onClick="return confirmDelete();" > Hapus</a>



          </td>
          </tr>
        <?php } ?>
      </tbody>
      </table>

    </div>
              
    
    <div class="tab-pane" id="belum">
        <table id="penilaian-alternatif-belum" class="table table-bordered table-striped scroll" style="background-color:white;">
        <thead>
        <tr>
          <th width="10px">No</th>
          <th width="10px">Status</th>
          <th width="100px">Kode Alternatif</th>
          <th width="400px">Judul Jurnal</th>
          <th width="10px">Singkatan</th>
          <th style="padding-right:10px;">Aksi</th>
        </tr>
        </thead>

        <tbody>
        <?php
        $no=1;
        foreach($alternatifbelum as $a) {?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><font size="4px"><div class="label label-danger"><?php echo $a->status ?></td>
          <td><font size="4px"><div class="label label-default"><?php echo $a->kode_alternatif ?></div></font></td>
          <td><?php echo $a->nama ?></td>
          <td><?php echo $a->singkatan ?></td>

          <td colspan="3">
            <a href="<?php echo base_url(); ?>penilaian-alternatif/nilai/<?php echo $a->kode_alternatif ?>" class="btn btn-success fa fa-pencil-square"> Evaluasi</a>

          </td>
          </tr>
        <?php } ?>
      </tbody>
      </table>

    </div>
              <!-- /.tab-pane -->

              
</div>
<!-- /.tab-content -->
</div>
<!-- /.nav-tabs-custom -->    
      
      </section>
      </div>


<?php
$this->load->view('template/evaluator/footer');
?>


<?php if ($this->session->flashdata('successSave')) { ?>
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
<?php } ?>

<script>
function confirmDelete() {
return confirm('Apakah anda yakin ingin menghapus data ini? \nAnda tidak bisa mengembalikan data yang telah dihapus')
}
</script>

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