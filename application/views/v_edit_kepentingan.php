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
              Edit Kriteria
              <small>Manajemen Nilai Preferensi</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="/serasi"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="/serasi/nilai-kepentingan">Manajemen Nilai Kepentingan</a></li>
              <li class="active">Edit Nilai Kepentingan</li>
            </ol>
          </section>
        </div>
      </head>

  <section class="content" >
      <div class="box box-success box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <a href="<?=base_url('nilai-kepentingan/');?>" class="btn btn-default fa fa-arrow-circle-left "></a>
          <h3 class="box-title">Form Edit Nilai Kepentingan</h3>
        </div>

      <div class="box-body">  
      <form class="form-horizontal" action="<?php echo base_url()?>nilai-kepentingan/update" method="post">
                <div class="form-group">
                <label for="inputpreferensi" class="col-sm-2 control-label">Kode Kepentingan : </label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="inputpreferensi" readonly value="<?php echo $record['id_preferensi']?>">
                  </div>
                </div>

                <div class="form-group">
                <label for="inputnilai" class="col-sm-2 control-label">Nilai : </label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="inputnilai" readonly value="<?php echo $record['nilai']?>">
                  </div>
                </div>     

                <div class="form-group">
                <label for="inputketerangan" class="col-sm-2 control-label">Keterangan : </label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="inputketerangan" value="<?php echo $record['keterangan']?>">
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