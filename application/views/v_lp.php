<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Sumon Rahman">
    <meta name="description" content="">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Ejournal Undip</title>
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="assets/lp/images/apple-touch-icon.png">
    <link rel="shortcut icon" type="image/ico" href="assets/lp/images/tis.ico" />
    <!-- Plugin-CSS -->
    <link rel="stylesheet" href="assets/lp/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/lp/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/lp/css/linearicons.css">
    <link rel="stylesheet" href="assets/lp/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/lp/css/animate.css">
    <!-- Main-Stylesheets -->
    <link rel="stylesheet" href="assets/lp/css/normalize.css">
    <link rel="stylesheet" href="assets/lp/style.css">
    <link rel="stylesheet" href="assets/lp/css/responsive.css">
    <script src="assets/lp/js/vendor/modernizr-2.8.3.min.js"></script>
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body data-spy="scroll" data-target=".mainmenu-area">
    <!-- Preloader-content -->
    <div class="preloader">
        <span><i class="lnr lnr-sun"></i></span>
    </div>
    <!-- MainMenu-Area -->
    <nav class="mainmenu-area" data-spy="affix" data-offset-top="200">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary_menu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="assets/lp/images/logo.png" alt="Logo"></a>
            </div>
            <div class="collapse navbar-collapse" id="primary_menu">
                <ul class="nav navbar-nav mainmenu">
                    <li class="active"><a href="#home_page">Home</a></li>
                    <li><a href="#about_page">Tentang</a></li>
                    <li><a href="https://www.undip.ac.id/language/id/" target="_blank">Web Undip</a></li>
                    <li><a href="http://lppm.undip.ac.id/" target="_blank">LPPM Undip</a></li>
                    <li><a href="http://sinta2.ristekdikti.go.id/affiliations/detail?id=6&view=overview" target="_blank">SINTA</a></li>
                    <li><a href="https://doaj.org/search?source=%7B%22query%22%3A%7B%22query_string%22%3A%7B%22query%22%3A%22undip%22%2C%22default_operator%22%3A%22AND%22%7D%7D%7D" target="_blank">DOAJ</a>
                    </li>
                    <li><a href="http://scopus.com" target="_blank">SCOPUS</a></li>
                    <li><a href="https://www.ebsco.com/" target="_blank">EBSCO</a></li>
                    <li><a href="#contact_page">Hubungi Kami</a></li>
                </ul>
                <div class="right-button hidden-xs">
                    <a href="<?= base_url('login'); ?>">Masuk Serasi Undip</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- MainMenu-Area-End -->
    <!-- Home-Area -->
    <header class="home-area overlay" id="home_page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 hidden-sm col-md-5">
                    <figure class="mobile-image wow fadeInUp" data-wow-delay="0.2s">
                        <img src="assets/lp/images/header-mobile.png" alt="">
                    </figure>
                </div>
                <div class="col-xs-12 col-md-7">
                    <div class="space-80 hidden-xs"></div>
                    <h2 class="wow fadeInUp" data-wow-delay="0.4s"><b>Sistem Informasi Jurnal Terintegrasi</b></h2>
                    <h3 class="wow fadeInUp" data-wow-delay="0.4s">Universitas Diponegoro </h3>
                    <div class="space-20"></div>
                    <div class="desc wow fadeInUp" data-wow-delay="0.6s">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiing elit, sed do eiusmod tempor incididunt ut
                            labore et laborused sed do eiusmod tempor incididunt ut labore et laborused.</p>
                    </div>
                    <div class="space-20"></div>
                    <a href="<?= base_url('login'); ?>" class="bttn-white wow fadeInUp" data-wow-delay="0.8s"><i></i>Masuk Serasi Undip</a>
                </div>
            </div>
    </header>
    <!-- Home-Area-End -->
    <!-- About-Area -->
    <section class="section-padding" id="about_page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-10 col-md-offset-1">
                    <div class="page-title text-center">
                        <img src="assets/lp/images/about-logo.png" alt="About Logo">
                        <div class="space-20"></div>
                        <h5 class="title">Tentang E-Journal Undip</h5>
                        <div class="space-30"></div>
                        <h3 class="blue-color">A beautiful app for consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut mollit anim id est laborum. Sedut perspiciatis unde omnis. </h3>
                        <div class="space-20"></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiing elit, sed do eiusmod tempor incididunt ut
                            labore et laborused sed do eiusmod tempor incididunt ut labore et laborused.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About-Area-End -->
    <!-- Progress-Area -->

    <footer class="footer-area" id="contact_page">
        <div class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title text-center">
                            <h5 class="title">Hubungi Kami</h5>
                            <h3 class="dark-color">Informasi Lebih Lanjut</h3>
                            <div class="space-60"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <div class="footer-box">
                            <div class="box-icon">
                                <span class="lnr lnr-map-marker"></span>
                            </div>
                            <p>Gedung ICT Center Lt. 4 LPPM<br /> Tembalang, Semarang</p>
                        </div>
                        <div class="space-30 hidden visible-xs"></div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="footer-box">
                            <div class="box-icon">
                                <span class="lnr lnr-phone-handset"></span>
                            </div>
                            <p>(Telp) 024-7460032 <br /> (Fax) 024-7460039</p>
                        </div>
                        <div class="space-30 hidden visible-xs"></div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="footer-box">
                            <div class="box-icon">
                                <span class="lnr lnr-envelope"></span>
                            </div>
                            <p>lppm@live.undip.ac.id <br /> muharrikalislamy@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-Bootom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="pull-right hidden-xs">
                    <b>Sistem Jurnal Terintegrasi</b> Universitas Diponegoro
                </div>
                <strong>Copyright &copy; 2020 v.2.1</strong>
            </div>
        </div>
        <!-- Footer-Bootom-End -->
    </footer>
    <!-- Footer-Area-End -->
    <!--Vendor-JS-->
    <script src="assets/lp/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/lp/js/vendor/jquery-ui.js"></script>
    <script src="assets/lp/js/vendor/bootstrap.min.js"></script>
    <!--Plugin-JS-->
    <script src="assets/lp/js/owl.carousel.min.js"></script>
    <script src="assets/lp/js/contact-form.js"></script>
    <script src="assets/lp/js/ajaxchimp.js"></script>
    <script src="assets/lp/js/scrollUp.min.js"></script>
    <script src="assets/lp/js/magnific-popup.min.js"></script>
    <script src="assets/lp/js/wow.min.js"></script>
    <!--Main-active-JS-->
    <script src="assets/lp/js/main.js"></script>
</body>

</html>