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
          Data Pengguna
          <small>Manajemen User</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="/serasi"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="/serasi/users"> Pengguna</a></li>
          <li class="active">Tambah Data Pengguna</li>
        </ol>
      </section>
    </div>
  </head>

  <section class="content">
    <div class="box box-success box-solid">
      <!-- satu box -->

      <div class="box-header with-border">
        <a href="<?= base_url('user-data/'); ?>" class="btn btn-default fa fa-arrow-circle-left "></a>
        <h3 class="box-title">Form Tambah Data Pengguna</h3>
      </div>

      <div class="box-body">
        <form class="form-horizontal" action="<?php echo base_url() ?>Users/submit_user" method="post">
          <div class="form-group">
            <label for="inputusername" class="col-sm-2 control-label">Username : </label>
            <div class="col-md-9">
              <input class="form-control" name="inputusername" placeholder="Username" type="text" required />
            </div>
          </div>

          <div class="form-group">
            <label for="inputpassword" class="col-sm-2 control-label">Password : </label>
            <div class="col-md-9">
              <input class="form-control" name="inputpassword" placeholder="Password" type="password" required />
            </div>
          </div>

          <div class="form-group">
            <label for="inputnama" class="col-sm-2 control-label">Nama : </label>
            <div class="col-md-9">
              <input class="form-control" name="inputnama" placeholder="Nama" type="text" required />
            </div>
          </div>

          <div class="form-group">
            <label for="inputpermission" class="col-sm-2 control-label">Permission : </label>
            <div class="col-md-9">
              <select name="inputpermission" class="form-control">
                <option value="admin">Administrator</option>
                <option value="evaluator">Evaluator</option>
                <option value="pengelola">Pengelola</option>
                <option value="pimpinan">Pimpinan</option>
              </select>
            </div>
          </div>

      </div> <!-- box body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-success center-block" style="padding-left: 15%; padding-right: 15%;"><b>Tambah Data</b></button>
      </div>
    </div> <!-- box primary -->

    <!-- <p> COBA :
<input type="text" name="nama"  onkeypress="return huruf(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ .,',this)" >
</p> -->

    </form>
  </section>

</div>



<!-- <script languange ="javascript">
function getkey(kode) {
    if (window.event)
        return window.event.keyCode;
    else if (kode)
        return e.which;
    else return null; }

function huruf(kode, goods, field) {
    var key, keychar; 
    key = getKey(kode);
    if (key ==null) 
        return true; 
    
    keychar = String.fromCharCode(key);
    keychar = keychar.toLowerCase(); 
    goods = goods.toLowerCase();
    
    if (goods.indexOf(keychar) != -1)
        return true;
    else return alert ('hayo ngapain')== '';
    return(false);
    }
</script> -->

<?php if ($this->session->flashdata('duplicateUsername')) { ?>
  <div class="modal modal-danger fade in" id="myModal" style="display: block; padding-right: 17px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Maaf username tersebut sudah terdaftar</h4>
        </div>
        <div class="modal-footer">
          <button type="button" aria-label="Close" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<?php
$this->load->view('template/admin/footer');
?>

<?php
$this->load->view('template/admin/js');
?>