<?php
$this->load->view('template/evaluator/head');
$this->load->view('template/evaluator/header');
$this->load->view('template/evaluator/sidebar');
?>

<div class="content-wrapper">

      <head>
        <div class="bar">
          <section class="content-header">
            <h1>
              Penilaian Alternatif
              <small>Manajemen Alternatif</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="/serasi"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="/serasi/data-alternatif"> Manajemen Alternatif</a></li>
              <li class="active">Penilaian Alternatif</li>
            </ol>
          </section>
        </div>
      </head>

      <section class="content" >
      <div class="box box-success box-solid"> <!-- satu box -->
        <div class="box-header with-border">
          <a href="<?=base_url('penilaian-alternatif/');?>" class="btn btn-default fa fa-arrow-circle-left "></a>
          <h3 class="box-title"><?php echo $record['nama']?> </h3>
        </div>

      <div class="box-body">  
        <form class="" action="<?php echo base_url()?>Penilaian_Alternatif/submit_nilai_alternatif" method="post">
        <div class="form-group">
          <label for="inputpenilai" class="control-label">Penilai : </label>
          <div class="">
            <input type="text" class="form-control" name="inputpenilai" readonly value="<?php echo $this->session->userdata('id_user');?>">
            <!-- <input type="hidden" class="form-control" name="inputstatus" readonly value="Sudah Dievaluasi"> -->
          </div>
        </div>

        <div class="form-group">
          <label for="inputalternatif" class="control-label">Kode Alternatif : </label>
          <div class="">
            <input type="text" class="form-control" name="inputalternatif" readonly value="<?php echo $record['kode_alternatif']?>">
            <!-- <input type="hidden" class="form-control" name="inputstatus" readonly value="Sudah Dievaluasi"> -->
          </div>
        </div>

      <?php foreach ($indikator as $key => $indi) {?>
        <?php $nilai = $this->M_penilaian_alternatif->ambil_nilai_indikator($indi->kode_indikator); ?>
        <div class="form-group">
            <label for="inputname" class="control-label">[<?=$indi->kode_indikator?>] <?=$indi->nama?></label>                         
          <div class="">
            <select class="form-control" name="nilai[<?=$indi->kode_kriteria?>][]" >
                    <!-- <option value="" required/>--Pilih Penilaian Jurnal--</option> -->
                <?php foreach ($nilai as $key => $value) { ?>
                    <option value="<?=$value->nilai?>"><?=$value->penilaian?> [<?=$value->nilai?>]</option>
                <?php } ?>
            </select>
          </div>
        </div>

        <div class="form-group"> <!-- Form Input Catatan -->
            <div class="">
              <textarea class="form-control" rows="3" type="text" name="catatan[<?=$indi->kode_kriteria?>][]" placeholder="Catatan"></textarea>
            </div>
        </div>
      <?php }?>

                                    
      </div> <!-- box body -->
            
      <div class="box-footer">
        <button type="submit" class="btn btn-success center-block" style="padding-left: 15%; padding-right: 15%;"><b>Simpan Penilaian</b></button>
      </div>
</form>      

      </div> <!-- box primary -->
      </section>
</div>
  
<?php
$this->load->view('template/evaluator/footer');
?>

<?php
$this->load->view('template/evaluator/js');
?>