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
        Analisa Kriteria
        <small>Sistem Klasifikasi Jurnal</small>
      </h1>
      
      <ol class="breadcrumb">
        <li><a href="/serasi/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Analisa Kriteria</li>
      </ol>
    </section>


    <section class="content">
    <!-- <div class="box box-primary collapsed-box box-solid"> --> 
    <div class="box box-primary box-solid"><!-- satu box -->
        <div class="box-header with-border">
          <h3 class="box-title">Penilaian Antar Kriteria</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">  
          <div class="row">
          <div class="col-xs-12 col-md-4">
            <div class="form-group">
              <label>Kriteria Pertama</label>
            </div>
          </div>
          
          <div class="col-xs-12 col-md-4">
            <div class="form-group">
              <label>Penilaian</label>
            </div>
          </div>
            
          <div class="col-xs-12 col-md-4">
            <div class="form-group">
              <label>Kriteria Kedua</label>
            </div>
            </div>
          </div>

        <form class="" action="<?php echo base_url('analisa-kriteria/update')?>" method="post"> 
          <!-- manggil fungsi di controller -->
          
          <div class="row"> <!-- satu baris -->
            <div class="col-xs-12 col-md-4">
            <div class="form-group">
              <select class="form-control" name="kriteria1"> <!-- form buat k1 -->
              <?php foreach ($kriteria as $key => $krit) {?>
                  <option value="<?= $krit->kode_kriteria?>"><?= $krit->kode_kriteria ?> - <?= $krit->nama ?> [<?= $krit->kependekan ?>]</option> <!-- ngambil nilai db -->
              <?php }?>
              </select>
            </div>
            </div>
            
            <div class="col-xs-12 col-md-4">
            <div class="form-group">
              <select class="form-control" name="preferensi">
              <?php foreach ($preferensi as $key => $pref) {?>
              <option value="<?=$pref->nilai?>">[<?= $pref->nilai ?>] - <?= $pref->keterangan ?></option>
              <?php }?>  
              </select>
            </div>
            </div>
            
            <div class="col-xs-12 col-md-4">
            <div class="form-group">
              <select class="form-control" name="kriteria2">
              <?php foreach ($kriteria as $key => $krit) {?>
                  <option value="<?= $krit->kode_kriteria?>"><?= $krit->kode_kriteria ?> - <?= $krit->nama ?> [<?= $krit->kependekan ?>]</option>
              <?php }?>
  
              </select>
            </div>
            </div>
          </div>
      </div> <!-- box body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Perbarui</button>
            </div>
    </form> <!-- form -->
  </div> <!-- box primary -->

      <div class="box box-warning box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <h3 class="box-title">Matriks Perbandingan Antar Kriteria</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">  
      <table class="table table-bordered table-striped scroll" style="background-color:white;">
        
        <tr>
          <th>Kriteria</th>
          <?php 
            foreach ($kriteria as $key => $krit) {?> <!-- foreach krit horizontal -->
              <th> <?= $krit->kode_kriteria ?> - <?= $krit->kependekan ?> </th> <!-- krit horizontal -->
          <?php }?>
        </tr>
        
        <?php 
          foreach ($kriteria as $key => $krit) {?> <!-- foreach krit vertial -->
          <tr>
              <td style="font-weight: bold;"> <?= $krit->kode_kriteria ?> - <?= $krit->kependekan ?></td> <!-- krit vertikal -->
              
              <?php 
                foreach ($kriteria as $key => $value) {?> <!-- foreach nilai matriks --> 
                <td><?= $nilai["$krit->kode_kriteria"]["$value->kode_kriteria"]?></td> <!-- nilai matriks -->
              <?php } ?>
          <?php } ?>
          </tr>
        <!-- /krit bawah -->

        <!-- total nilai horizontal kesamping -->
        <tr>
          <th>Total Nilai</th>
          <?php foreach ($kriteria as $key => $krit) {?>
              <th> <?= $krit->jumlah_nilai_kriteria ?> </th>
          <?php }?>
        </tr>
        <!-- total nilai -->
      </table>
      </div> <!-- box body -->
      </div> <!-- box primary -->
 

      <div class="box box-warning box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <h3 class="box-title">Matriks Normalisasi Perbandingan Antar Kriteria</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">  
      <table class="table table-bordered table-striped scroll" style="background-color:white;">
        
        <tr>
          <th>Kriteria</th>
          <?php 
            foreach ($kriteria as $key => $krit) {?> <!-- foreach krit horizontal -->
              <th> <?= $krit->kode_kriteria ?> - <?= $krit->kependekan ?> </th> <!-- krit horizontal -->
          <?php }?>
          <th> Total Nilai</th>
        </tr>
        
        <?php 
          foreach ($kriteria as $key => $krit) {?> <!-- foreach krit vertial -->
          <tr>
              <td style="font-weight: bold;"> <?= $krit->kode_kriteria ?> - <?= $krit->kependekan ?></td> <!-- krit vertikal -->
              <?php 
                foreach ($kriteria as $key => $value) {?> <!-- foreach nilai matriks --> 
                <td><?= $hasil["$krit->kode_kriteria"]["$value->kode_kriteria"]?></td> <!-- nilai matriks -->
              <?php } ?>
              <td style="font-weight: bold;"> <?= $krit->jumlah_nilai_normalisasi ?></td> <!-- krit vertikal -->
          <?php } ?>
          </tr>
        <!-- /krit bawah -->
      </table>
      </div> <!-- box body -->
      </div> <!-- box primary -->


      <div class="box box-success box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <h3 class="box-title">Tabel Pembobotan Kriteria</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">  
        <table id="bobot-tanpa" class="table table-bordered table-striped scroll" style="background-color:white;">
        <thead>
        <tr>
          <th>No</th>
          <th>Kode Kriteria</th>
          <th>Nama Kriteria</th>
          <th>Kependekan</th>
          <th>Bobot Tanpa Dependensi</th>
        </tr>
        </thead>

        <tbody>
        <?php
        $no=1;
        foreach($bobot as $a) {?>
        <tr>

          <td><?php echo $no++ ?></td>
          <td><font size="4px"><div class="label label-default"><?php echo $a->kode_kriteria ?></div></font></td>
          <td><?php echo $a->nama ?></td>
          <td><?php echo $a->kependekan ?></td>
          <td><?php echo $a->bobot_kriteria ?></td>

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

<?php if ($this->session->flashdata('successUpdate')) { ?>
  <div class="modal modal-success fade" id="myModal" style="display: block; padding-right: 17px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Proses Perbarui Berhasil Dilakukan</h4>
      </div>
      <div class="modal-footer">
        <button type="button" aria-label="Close" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  </div>
<?php } 

else if ($this->session->flashdata('gagalUpdate')) { ?>
  <div class="modal modal-danger fade in" id="myModal" style="display: block; padding-right: 17px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tidak Dapat Mengubah Penilaian Kriteria Yang Sama, Silahkan Cek Inputan Kembali</h4>
      </div>
      <div class="modal-footer">
        <button type="button" aria-label="Close" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  </div>
<?php } ?>


<?php
$this->load->view('template/admin/js');
?>