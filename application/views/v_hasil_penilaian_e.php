<?php
$this->load->view('template/evaluator/head');
$this->load->view('template/evaluator/header');
$this->load->view('template/evaluator/sidebar');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hasil Penilaian Alternatif
        <small>Sistem Klasifikasi Jurnal</small>
      </h1>
      
      <ol class="breadcrumb">
        <li><a href="/serasi/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Hasil Penilaian Alternatif</li>
      </ol>
    </section>


    <section class="content">

<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#sudah" data-toggle="tab">Rekomendasi & Peringkat</a></li>
        <li><a href="#belum" data-toggle="tab">Penilaian Jurnal Tiap Kriteria</a></li>
        <li><a href="#hayo" data-toggle="tab">Penilaian Jurnal Tiap Indikator</a></li>
    </ul>
    
    <div class="tab-content">
    <div class="active tab-pane" id="sudah">
<table id="peringkat-alte-a" class="table table-bordered table-striped scroll" style="background-color:white;">
        <thead>
        <tr>
          <th>Kode Alternatif</th>
          <th>Nama Alternatif</th>
          <th>Kependekan</th>
          <th>Nilai Murni</th>
          <th>Jarak Solusi (+)</th>
          <th>Jarak Solusi (-)</th>
          <th>Nilai Preferensi TOPSIS</th>
          <th>Rekomendasi</th>
          <th>Peringkat</th>
        </tr>
        </thead>

        <tbody>
        <?php
        $no = 1;
        $s = 0;
        $label = 'bg-red';
        $tes = 0;
        $rev = false;
        foreach($alternatifsort as $key => $a) {?>
        <tr>
          <?php 
              if($key < count($alternatifsort)-1) {
                if ($alternatifsort[$key+1]->jumlah_nilai_murni <= $a->jumlah_nilai_murni) {
                    $tes = $a->jumlah_nilai_murni;
                    $rev = false;
                } else {
                  $tes = $alternatifsort[$key+1]->jumlah_nilai_murni;
                  $rev = true;
                }
              } 
              else {
                $tes = $a->jumlah_nilai_murni;
                $rev = false;
              }
              

              if($tes >= 85){
                $s = 1;
                $label = 'bg-blue';
              }
              else if ($tes >=70){
                $s = 2;
                $label = 'bg-navy';
              }
              else if ($tes >=60){
                $s = 3;
                $label = 'bg-yellow';
              }
              else if ($tes >=50){
                $s = 4;
                $label = 'bg-aqua';
              }
              else if ($tes >=40){
                $s = 5;
                $label = 'bg-purple';
              }
              else if ($tes >=30){
                $s = 6;
                $label = 'bg-maroon';
              }
              else if ($tes <30){
                $s = 0;
                $label = 'bg-red';
              }
          ?>
          <td> <font size="4px"><div class="label label-default"> <?php echo $a->kode_alternatif ?></td>
          <td><?php echo $a->nama ?></td>
          <td><?php echo $a->singkatan ?></td>
          <td><?php echo $a->jumlah_nilai_murni ?></td>
          <td><?php echo $a->jumlah_jarak_solusi_positif ?></td>
          <td><?php echo $a->jumlah_jarak_solusi_negatif ?></td>
          <td><?php echo $a->preferensi ?></td>

          <td>
            <font size="4px">
              <?php if ($s > 0) { ?>
                <div class="label <?=$label;?> disabled color-palette">Rekomendasi S<?=$s;?><?=$rev ? '*' : ''?></div>  
              <?php } else { ?>
                <div class="label bg-red color-palette">Belum Rekomendasi</div>
              <?php } ?>
              
            </font>
          </td>

          <td> <font size="4px"><div class="label label-success"> <?php echo $no++ ?></td>


        </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
              
    
    <div class="tab-pane" id="belum">
      <table id="tiapkrit" class="table table-bordered table-striped scroll" style="background-color:white;">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Jurnal</th>
          <?php 
            foreach ($kriteria as $key => $krit) {?> <!-- foreach krit horizontal -->
              <th> <?= $krit->nama ?> </th> <!-- krit horizontal -->
          <?php }?>
        </tr>
      </thead>  
      <tbody>
        <?php 
          $noo=1;
          foreach ($alternatif as $key => $alte) {?> <!-- foreach alte vertial -->
          <tr>
              <td><?php echo $noo++ ?></td>
              <td> <font size="4px"><div class="label label-default"> <?= $alte->singkatan ?> </td> <!-- krit vertikal -->

              <?php 
                foreach ($kriteria as $key => $value) {?> <!-- foreach nilai matriks --> 
                <td><?= $nilai["$alte->kode_alternatif"]["$value->kode_kriteria"]?></td> <!-- nilai matriks -->
              <?php } ?>
          
        <?php } ?>
          </tr>
        <!-- /krit bawah -->
      </tbody>
      </table>
    </div>
              <!-- /.tab-pane -->


    <div class="tab-pane" id="hayo">
      <table id="tiapindi" class="table table-bordered table-striped scroll" style="background-color:white;">
      <thead>
        <tr>
          <th>No</th>          
          <th>Penilaian</th>
          <?php 
            foreach ($alternatif as $key => $alte) {?> <!-- foreach krit horizontal -->
              <th> <?= $alte->singkatan ?> </th> <!-- krit horizontal -->
          <?php }?>
        </tr>
      </thead>  
      <tbody>
        <?php 
          $nooo=1;
          foreach ($indikator as $key => $indi) {?> <!-- foreach alte vertial -->
          <tr>
              <td><?php echo $nooo++ ?></td>
              <td> <?= $indi->nama ?> </td> <!-- krit vertikal -->
              <?php 
                foreach ($alternatif as $key => $value) {?> <!-- foreach nilai matriks --> 
                <td><?= $ialin["$indi->kode_indikator"]["$value->kode_alternatif"]?></td> <!-- nilai matriks -->
              <?php } ?>
          
        <?php } ?>
          </tr>
        <!-- /krit bawah -->
      </tbody>
      </table>
    </div>
              <!-- /.tab-pane -->
</div>
<!-- /.tab-content -->
</div>

    </section>
</div>
       
<?php
$this->load->view('template/evaluator/footer');
?>

<?php
$this->load->view('template/evaluator/js');
?>