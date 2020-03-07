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
      Data Jurnal Terakreditasi
      <small>Manajemen Jurnal</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="/serasi"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Daftar Jurnal Terakreditasi</li>
    </ol>
  </section>


  <section class="content">
    <div class="box box-success box-solid">
      <!-- satu box -->
      <div class="box-header with-border">
        <a href="<?= base_url('home-admin/'); ?>" class="btn btn-default fa fa-arrow-circle-left "></a>
        <h3 class="box-title">Tabel Data Jurnal Terakreditasi</h3>
      </div>
      <div class="box-body">
        <table id="log-penilaian" class="table table-bordered table-striped scroll" style="background-color:white;">

          <thead>
            <tr>
              <th>No</th>
              <th>Judul Jurnal</th>
              <th>Singkatan</th>
              <th>Ketua Editor</th>
              <th>Nomor SK</th>
              <th>Peringkat Sinta</th>
              <th>Tanggal Mulai SK</th>
              <th>Tanggal Akhir SK</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $no = 1;
            foreach ($js as $js) { ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $js->judul ?></td>
                <td><?php echo $js->singkatan ?></td>
                <td><?php echo $js->nama_user ?></td>
                <td><?php echo $js->nomor ?></td>
                <td><?php echo $js->peringkat_sinta ?></td>
                <td><?php echo $js->tanggal_mulai ?></td>
                <td><?php echo $js->tanggal_berakhir ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div> <!-- box body -->
    </div> <!-- box primary -->
  </section>
</div>


<script>
  // var dat = $id;


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