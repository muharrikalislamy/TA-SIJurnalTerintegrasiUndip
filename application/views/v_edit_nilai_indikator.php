<?php
$this->load->view('template/admin/head');
$this->load->view('template/admin/header');
$this->load->view('template/admin/sidebar');
?>

<div class="content-wrapper">

      <head>
        <div class="bar">
          <section class="content-header">
            <h1>
              Data Indikator
              <small>Manajemen Indikator</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="/serasi"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="/serasi/data-alternatif"> Indikator</a></li>
              <li class="active">Edit Indikator</li>
            </ol>
          </section>
        </div>
      </head>

      <section class="content" >
      <div class="box box-success box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <a href="<?=base_url('data-indikator/');?>" class="btn btn-default fa fa-arrow-circle-left "></a>
          <h3 class="box-title">Form Edit Indikator</h3>
        </div>

      <div class="box-body">  
      <form class="form-horizontal" action="<?php echo base_url()?>Indikator/update_nilai_indikator" method="post">
                <div class="form-group">
                  <label for="inputidpenilaian" class="col-sm-2 control-label">ID Penilaian : </label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="inputidpenilaian" readonly value="<?php echo $record['id_penilaian']?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputkriteria" class="col-sm-2 control-label">Kode Kriteria : </label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="inputkriteria" readonly value="<?php echo $record['kode_kriteria']?>" required/>
                  </div>
                </div>       

                <div class="form-group">
                  <label for="inputnamaindikator" class="col-sm-2 control-label">Nama Indikator : </label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="inputnamaindikator" readonly value="<?php echo $record['nama']?>" required/>
                  </div>
                </div>

                <div class="form-group"> <!-- Form Input Deskripsi Kriteria -->
                  <label for="inputpenilaian" class="col-sm-2 control-label">Penilaian : </label>
                  <div class="col-md-9">
                    <textarea class="form-control" rows="3" type="text" name="inputpenilaian" placeholder="" required/><?php echo $record['penilaian']?></textarea>
                  </div>
                </div>  

                <div class="form-group">
                  <label for="inputnilaipenilaian" class="col-sm-2 control-label">Nilai : </label>
                  <div class="col-md-9">
                    <input type="number" step="any" class="form-control" name="inputnilaipenilaian" value="<?php echo $record['nilai']?>" required/>
                  </div>
                </div>
      </div> <!-- box body -->
            
      <div class="box-footer">
        <button type="submit" class="btn btn-success center-block" style="padding-left: 15%; padding-right: 15%;"><b>Simpan Perubahan</b></button>
      </div>
      </form>      

      </div> <!-- box primary -->
      </section>
</div>
  
<?php
$this->load->view('template/admin/footer');
?>

<?php
$this->load->view('template/admin/js');
?>