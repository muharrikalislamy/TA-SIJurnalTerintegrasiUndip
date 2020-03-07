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
              <small>Manajemen Kriteria</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="/serasi"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="/serasi/data-kriteria"> Manajemen Kriteria</a></li>
              <li class="active">Edit Data Kriteria</li>
            </ol>
          </section>
        </div>
      </head>

  <section class="content" >
      <div class="box box-success box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <a href="<?=base_url('data-kriteria/');?>" class="btn btn-default fa fa-arrow-circle-left "></a>
          <h3 class="box-title">Form Edit Data Kriteria</h3>
        </div>

      <div class="box-body">  
          <form class="form-horizontal" action="<?php echo base_url()?>data-kriteria/update" method="post">
                <div class="form-group">
                <label for="inputkriteria" class="col-sm-2 control-label">Kode Kriteria : </label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="inputkriteria" readonly value="<?php echo $record['kode_kriteria']?>">
                  </div>
                </div>

                <div class="form-group">
                <label for="inputname" class="col-sm-2 control-label">Nama Kriteria : </label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="inputname" value="<?php echo $record['nama']?>" required/>
                  </div>
                </div>

                <div class="form-group">
                <label class="col-sm-2 control-label">Kependekan : </label>
                  <div class="col-md-9">
                    <input input type="text" maxlength="3" class="form-control" name="inputkependekan" value="<?php echo $record['kependekan']?>" required/>
                  </div>
                </div>

                <div class="form-group"> <!-- Form Input Deskripsi Kriteria -->
                <label for="inputdeskripsi" class="col-sm-2 control-label">Deskripsi : </label>
                  <div class="col-md-9">
                    <textarea class="form-control" rows="3" type="text" name="inputdeskripsi" placeholder=""><?php echo $record['deskripsi']?></textarea>
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