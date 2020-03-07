<?php
$this->load->view('template/admin/head');
$this->load->view('template/admin/header');
$this->load->view('template/admin/sidebar');
?>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Jurnal Per Pengindeks
      <small>Manajemen Pengindeks</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="/serasi"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Daftar Jurnal Per Pengindeks</li>
    </ol>
  </section>


  <section class="content">
    <div class="box box-success box-solid">
      <!-- satu box -->
      <div class="box-header with-border">
        <a href="<?= base_url('data-pengindeks/'); ?>" class="btn btn-default fa fa-arrow-circle-left "></a>
        <h3 class="box-title">Tabel Data Jurnal Per Pengindeks</h3>
      </div>
      <div class="box-body">
        <table id="data-sk" class="table table-bordered table-striped scroll" style="background-color:white;">

          <thead>
            <tr>
              <th>Riwayat</th>
              <th>Judul Jurnal</th>
              <th>Pengindeks</th>
              <th>Kategori</th>
              <th>URL Pengindeks</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $no = 1;
            foreach ($jp as $jp) { ?>
              <tr>
                <td><?php echo $jp === 0 ? "Pengindeks Terbaru" : "Pengindeks ke-" . $no++ ?></td>
                <td><?php echo $jp->judul ?></td>
                <td><?php echo $jp->nama ?></td>
                <td><?php echo $jp->kategori ?></td>
                <td><?php echo $jp->url_pengindeks ?></td>
                <td>
                  <a href="<?php echo base_url(); ?>JP/delete_jP_pengindeks/<?php echo $jp->kode_jp ?>" class="btn btn-danger fa fa-trash-o" onClick="return confirmDelete();"> Hapus</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div> <!-- box body -->
    </div> <!-- box primary -->
  </section>
</div>

<script>
  $(document).ready(function() {
    $('#myModal').modal('show');
  });
</script>

<?php
$this->load->view('template/admin/footer');
?>

<?php
$this->load->view('template/admin/js');
?>