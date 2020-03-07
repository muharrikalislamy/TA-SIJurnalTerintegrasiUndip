<?php

$this->load->view('template/admin/head');

$this->load->view('template/admin/js');

?>

<!DOCTYPE html>
<html>

<head>


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="shortcut icon" href="<?php echo base_url('assets/alte/dist/img/tis.ico') ?>" width="160" height="120" />

</head>


<body class="login-page">

  <style type="text/css">
    .login {
      position: absolute;
      margin-top: -275px;
      margin-left: -200px;
      left: 50%;
      top: 50%;
      width: 400px;
      height: 220px;


    }

    body {
      width: 100% !important;
      height: 100% !important;
      background: url("<?php echo base_url('assets/alte/dist/img/undipbg.png') ?>")no-repeat center center fixed !important;
      background-size: cover !important;

    }
  </style>


  <div class="login" class="limiter">
    <div class="wrap-login100">
      <form class="login100-form validate-form" action="<?php echo base_url('auth/auth_process') ?>" method="post">
        <div class="login-logo" class="login100-form-title p-b-26">
          <img src="<?php echo base_url('assets/alte/dist/img/undiplagi.png') ?>" width="160" height="120" alt="Universitas Diponegoro"><br>
        </div>
        <div class="login-logo">
          <img src="<?php echo base_url('assets/alte/dist/img/serasi.png') ?>" width="290" height="62" alt="Universitas Diponegoro"><br>
        </div>

        <div class="wrap-input100 validate-input">
          <input class="input100" type="text" name="username" placeholder="Username">
          <span class="focus-input100" class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>

        <div class="wrap-input100 validate-input">
          <span class="btn-show-pass">
            <i class="zmdi zmdi-eye"></i>
          </span>
          <input class="input100" type="password" name="password" placeholder="Password">
          <span class="focus-input100" class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>

        <div class="container-login100-form-btn">
          <div class="wrap-login100-form-btn">
            <div class="login100-form-bgbtn"></div>
            <button class="login100-form-btn">
              Login
            </button>
          </div>
        </div>

      </form>
    </div>
  </div>

  <!-- MODAL POPUP start -->
  <?php if ($this->session->flashdata('wrongAuth')) { ?>
    <div class="modal modal-warning fade in" id="myModal" style="display: block; padding-right: 17px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Username atau Password salah. Harap cek kembali.</h4>
          </div>
          <div class="modal-footer">
            <button type="button" aria-label="Close" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login_form/vendor/bootstrap/css/bootstrap.min.css') ?>" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login_form/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login_form/fonts/iconic/css/material-design-iconic-font.min.css') ?>" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login_form/vendor/animate/animate.css') ?>" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login_form/vendor/css-hamburgers/hamburgers.min.css') ?>" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login_form/vendor/animsition/css/animsition.min.css') ?>" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login_form/vendor/select2/select2.min.css') ?>" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login_form/vendor/daterangepicker/daterangepicker.css') ?>" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login_form/css/util.css') ?>" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login_form/css/main.css') ?>" />
  <!--===============================================================================================-->

</body>

</html>