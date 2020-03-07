<?php
$this->load->view('template/admin/head');
$this->load->view('template/admin/header');
$this->load->view('template/admin/sidebar');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Perhitungan TOPSIS
        <small>Sistem Klasifikasi Jurnal</small>
      </h1>
      
      <ol class="breadcrumb">
        <li><a href="/serasi/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Peringkat Alternatif</li>
      </ol>
    </section>


    <section class="content">
<!--     <a href="<?=base_url('Export_pdf');?>" class="btn btn-danger fa fa-plus-square-o"> Export PDF</a>
    <hr> -->
      <div class="box box-primary box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <h3 class="box-title">Hasil Penilaian Alternatif</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">  
      <table class="table table-bordered table-striped scroll" style="background-color:white;">
        
        <tr>
          <th>Penilaian</th>
          <?php 
            foreach ($kriteria as $key => $krit) {?> <!-- foreach krit horizontal -->
              <th> <?= $krit->kode_kriteria ?> - <?= $krit->kependekan ?> </th> <!-- krit horizontal -->
          <?php }?>
        </tr>
        
        <?php 
          foreach ($alternatif as $key => $alte) {?> <!-- foreach alte vertial -->
          <tr>
              <td style="font-weight: bold;"> <?= $alte->kode_alternatif ?> - <?= $alte->singkatan ?> </td> <!-- krit vertikal -->
              
              <?php 
                foreach ($kriteria as $key => $value) {?> <!-- foreach nilai matriks --> 
                <td><?= $nilai["$alte->kode_alternatif"]["$value->kode_kriteria"]?></td> <!-- nilai matriks -->
              <?php } ?>
          
        <?php } ?>
          </tr>
        <!-- /krit bawah -->
      </table>
      </div> <!-- box body -->
      </div> <!-- box primary -->


      <div class="box box-primary box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <h3 class="box-title">Normalisasi Penilaian Alternatif</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">  
      <table class="table table-bordered table-striped scroll" style="background-color:white;">
        
        <tr>
          <th>Penilaian</th>
          <?php 
            foreach ($kriteria as $key => $krit) {?> <!-- foreach krit horizontal -->
              <th> <?= $krit->kode_kriteria ?> - <?= $krit->kependekan ?> </th> <!-- krit horizontal -->
          <?php }?>
        </tr>
        
        <?php 
          foreach ($alternatif as $key => $alte) {?> <!-- foreach alte vertial -->
          <tr>
              <td style="font-weight: bold;"> <?= $alte->kode_alternatif ?> - <?= $alte->singkatan ?> </td> <!-- krit vertikal -->
              
              <?php 
                foreach ($kriteria as $key => $value) {?> <!-- foreach nilai matriks --> 
                <td><?= $nilaikuadrat["$alte->kode_alternatif"]["$value->kode_kriteria"]?></td> <!-- nilai matriks -->
              <?php } ?>
          
        <?php } ?>
          </tr>
        <!-- /krit bawah -->

        <!-- total nilai horizontal kesamping -->
        <tr>
          <th>Total Nilai</th>
          <?php foreach ($kriteria as $key => $krit) {?>
              <th> <?= $krit->jumlah_kuadrat_nilai ?> </th>
          <?php }?>
        </tr>
        <!-- total nilai -->
      </table>
      <br>
      <br>

      <table class="table table-bordered table-striped scroll" style="background-color:white;">
        <tr>
          <th>Penilaian</th>
          <?php 
            foreach ($kriteria as $key => $krit) {?> <!-- foreach krit horizontal -->
              <th> <?= $krit->kode_kriteria ?> - <?= $krit->kependekan ?> </th> <!-- krit horizontal -->
          <?php }?>
        </tr>
        
        <?php 
          foreach ($alternatif as $key => $alte) {?> <!-- foreach alte vertial -->
          <tr>
              <td style="font-weight: bold;"> <?= $alte->kode_alternatif ?> - <?= $alte->singkatan ?> </td> <!-- krit vertikal -->
              
              <?php 
                foreach ($kriteria as $key => $value) {?> <!-- foreach nilai matriks --> 
                <td><?= $nilainormalisasi["$alte->kode_alternatif"]["$value->kode_kriteria"]?></td> <!-- nilai matriks -->
              <?php } ?>
          
        <?php } ?>
          </tr>
        <!-- /krit bawah -->
      </table>
      </div> <!-- box body -->
      </div> <!-- box primary -->

      <div class="box box-primary box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <h3 class="box-title">Normalisasi Terbobot</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">  
      <table class="table table-bordered table-striped scroll" style="background-color:white;">
        
        <tr>
          <th>Penilaian</th>
          <?php 
            foreach ($kriteria as $key => $krit) {?> <!-- foreach krit horizontal -->
              <th> <?= $krit->kode_kriteria ?> - <?= $krit->kependekan ?> </th> <!-- krit horizontal -->
          <?php }?>
        </tr>
        
        <?php 
          foreach ($alternatif as $key => $alte) {?> <!-- foreach alte vertial -->
          <tr>
              <td style="font-weight: bold;"> <?= $alte->kode_alternatif ?> - <?= $alte->singkatan ?> </td> <!-- krit vertikal -->
              
              <?php 
                foreach ($kriteria as $key => $value) {?> <!-- foreach nilai matriks --> 
                <td><?= $nilainormalisasiterbobot["$alte->kode_alternatif"]["$value->kode_kriteria"]?></td> <!-- nilai matriks -->
              <?php } ?>
          
        <?php } ?>
          </tr>
        <!-- /krit bawah -->
      </table>
      </div> <!-- box body -->
      </div> <!-- box primary -->

      <div class="box box-warning box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <h3 class="box-title">Matriks Solusi Ideal</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">  
      <table class="table table-bordered table-striped scroll" style="background-color:white;">
        
        <tr>
          <th>Solusi Ideal</th>
          <?php 
            foreach ($kriteria as $key => $krit) {?> <!-- foreach krit horizontal -->
              <th> <?= $krit->kode_kriteria ?> - <?= $krit->kependekan ?> </th> <!-- krit horizontal -->
          <?php }?>
        </tr>
        
        <tr>
          <th>Positif</th>
          <?php foreach ($kriteria as $key => $krit) {?>
              <th> <?= $krit->solusi_ideal_positif ?> </th>
          <?php }?>
        </tr>
        
        <tr>
          <th>Negatif</th>
          <?php foreach ($kriteria as $key => $krit) {?>
              <th> <?= $krit->solusi_ideal_negatif ?> </th>
          <?php }?>
        </tr>
      </table>
      </div> <!-- box body -->
      </div> <!-- box primary -->

      <div class="box box-warning box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <h3 class="box-title">Jarak Solusi Positif</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">  
      <table class="table table-bordered table-striped scroll" style="background-color:white;">
        
        <tr>
          <th>Penilaian</th>
          <?php 
            foreach ($kriteria as $key => $krit) {?> <!-- foreach krit horizontal -->
              <th> <?= $krit->kode_kriteria ?> - <?= $krit->kependekan ?> </th> <!-- krit horizontal -->
          <?php }?>
          <th>Jarak Solusi (+)</th>
        </tr>
        
        <?php 
          foreach ($alternatif as $key => $alte) {?> <!-- foreach alte vertial -->
          <tr>
              <td style="font-weight: bold;"> <?= $alte->kode_alternatif ?> - <?= $alte->singkatan ?> </td> <!-- krit vertikal -->
              
              <?php 
                foreach ($kriteria as $key => $value) {?> <!-- foreach nilai matriks --> 
                <td><?= $nilaiJSP["$alte->kode_alternatif"]["$value->kode_kriteria"]?></td> <!-- nilai matriks -->
              <?php } ?>
              <td style="font-weight: bold;"> <?= $alte->jumlah_jarak_solusi_positif ?></td> <!-- krit vertikal -->
        <?php } ?>
          </tr>
        <!-- /krit bawah -->
      </table>
      </div> <!-- box body -->
      </div> <!-- box primary -->

      <div class="box box-warning box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <h3 class="box-title">Jarak Solusi Negatif</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">  
      <table class="table table-bordered table-striped scroll" style="background-color:white;">
        
        <tr>
          <th>Penilaian</th>
          <?php 
            foreach ($kriteria as $key => $krit) {?> <!-- foreach krit horizontal -->
              <th> <?= $krit->kode_kriteria ?> - <?= $krit->kependekan ?> </th> <!-- krit horizontal -->
          <?php }?>
          <th>Jarak Solusi (-)</th>
        </tr>
        
        <?php 
          foreach ($alternatif as $key => $alte) {?> <!-- foreach alte vertial -->
          <tr>
              <td style="font-weight: bold;"> <?= $alte->kode_alternatif ?> - <?= $alte->singkatan ?> </td> <!-- krit vertikal -->
              
              <?php 
                foreach ($kriteria as $key => $value) {?> <!-- foreach nilai matriks --> 
                <td><?= $nilaiJSN["$alte->kode_alternatif"]["$value->kode_kriteria"]?></td> <!-- nilai matriks -->
              <?php } ?>
              <td style="font-weight: bold;"> <?= $alte->jumlah_jarak_solusi_negatif ?></td> <!-- krit vertikal -->
        <?php } ?>
          </tr>
        <!-- /krit bawah -->
      </table>
      </div> <!-- box body -->
      </div> <!-- box primary -->

      <div class="box box-success box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <h3 class="box-title">Tabel Peringkat Alternatif</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">  
            <table class="table table-bordered table-striped scroll" style="background-color:white;">
        <tr>
          <th>Kode Alternatif</th>
          <th>Nama Alternatif</th>
          <th>Kependekan</th>
          <th>Positif</th>
          <th>Negatif</th>
          <th>Nilai Preferensi</th>
          <th>Peringkat</th>
        </tr>
        
        <?php
        $no=1;
        foreach($alternatifsort as $a) {?>
        <tr>

          <td> <font size="4px"><div class="label label-default"> <?php echo $a->kode_alternatif ?></td>
          <td><?php echo $a->nama ?></td>
          <td><?php echo $a->singkatan ?></td>
          <td><?php echo $a->jumlah_jarak_solusi_positif ?></td>
          <td><?php echo $a->jumlah_jarak_solusi_negatif ?></td>
          <td><?php echo $a->preferensi ?></td>
          <td> <font size="4px"><div class="label label-success"> <?php echo $no++ ?></td>


        </tr>
        <?php } ?>
        
      </table>
      </div> <!-- box body -->
      </div> <!-- box primary -->

    </section>
</div>
       
<?php
$this->load->view('template/admin/footer');
?>

<?php
$this->load->view('template/admin/js');
?>