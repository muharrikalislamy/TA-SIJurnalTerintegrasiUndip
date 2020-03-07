<?php
$this->load->view('template/admin/head');
$this->load->view('template/admin/header');
$this->load->view('template/admin/sidebar');
?>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 -->
  <div class="content-wrapper">
      <!-- Main content -->
      <head>
        <div class="bar">
          <section class="content-header">
            <h1>
              Data Indikator
              <small>Tambah Data Nilai Indikator</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="/serasi"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="/serasi/data-indikator"> Indikator</a></li>
              <li class="active">Tambah</li>
            </ol>
          </section>
        </div>
      </head>

      <section class="content">
      <div class="box box-success box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <a href="<?=base_url('data-indikator/');?>" class="btn btn-default fa fa-arrow-circle-left "></a>
          <h3 class="box-title">Form Tambah Data Indikator</h3>
        </div>

      <div class="box-body">  
        <form class="form-horizontal" action="<?php echo base_url()?>Indikator/submit_nilai_indikator" method="post">

                <div class="form-group">
                  <label for="inputkriteria" class="col-sm-2 control-label">Kode Kriteria : </label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="inputkriteria" readonly value="<?php echo $record['kode_kriteria']?>">
                  </div>
                </div>       

                <div class="form-group">
                  <label for="inputkodeindikator" class="col-sm-2 control-label">Kode Indikator : </label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="inputkodeindikator" readonly value="<?php echo $record['kode_indikator']?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputnamaindikator" class="col-sm-2 control-label">Indikator : </label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="inputnamaindikator" readonly value="<?php echo $record['nama']?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputidpenilaian" class="col-sm-2 control-label">ID Penilaian : </label>
                  <div class="col-md-9">
                    <input class="form-control" name="inputidpenilaian" placeholder="ID Penilaian (contoh : masukkan 'A' untuk nilai indikator A pada indikator yang dipilih, 'B' untuk nilai indikator B dst)" onkeyup="lettersOnly(this)" type="text" maxlength="1" required/>
                  </div>
                </div>
                
                <div class="form-group"> <!-- Form Input Deskripsi Kriteria -->
                  <label for="inputpenilaian" class="col-sm-2 control-label">Penilaian : </label>
                  <div class="col-md-9">
                    <textarea class="form-control" rows="3" type="text" name="inputpenilaian" placeholder="Penilaian" required/></textarea>
                  </div>
                </div>        

                <div class="form-group">
                  <label for="inputnilaipenilaian" class="col-sm-2 control-label">Nilai : </label>
                  <div class="col-md-9">
                    <input class="form-control" name="inputnilaipenilaian" placeholder="Nilai Indikator" type="number" required/>
                  </div>
                </div>

      </div> <!-- box body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-success center-block" style="padding-left: 15%; padding-right: 15%;"><b>Tambah Data</b></button>
            </div>
      </div> <!-- box primary -->                    
      </form>
      </section>

  </div>

  <?php
  $this->load->view('template/admin/footer');
  ?>
  
  <?php
  $this->load->view('template/admin/js');
  ?>