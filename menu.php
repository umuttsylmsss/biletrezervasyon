<?php 

ob_start();
session_start();
 ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Uçak Rezervasyon</title>
    <link rel="icon" href="images/favicon.png">
    <link href="../../../css2.css?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/line-awesome.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/daterangepicker.css">
    <link rel="stylesheet" href="css/animated-headline.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/flag-icon.min.css">
    <link rel="stylesheet" href="css/jquery.autocomplete.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="preloader" id="preloader">
        <div class="loader">
            <svg class="spinner" viewbox="0 0 50 50">
                <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
            </svg>
        </div>
    </div>
    <header class="header-area">
        <div class="header-top-bar padding-right-100px padding-left-100px">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="header-top-content">
                            <div class="header-left">
                                <ul class="list-items">
                                    <li><a href="#"><i class="la la-phone mr-1"></i>(123) 123-456</a></li>
                                    <li><a href="#"><i class="la la-envelope mr-1"></i>test@gmail.com</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header-top-content">
                            <div class="header-right d-flex align-items-center justify-content-end">


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-menu-wrapper padding-right-100px padding-left-100px">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="menu-wrapper">
                            <a href="#" class="down-button"><i class="la la-angle-down"></i></a>
                            <div class="logo">
                                Uçak Rezervasyon
                                <div class="menu-toggler">
                                    <i class="la la-bars"></i>
                                    <i class="la la-times"></i>
                                </div>
                            </div>
                            <div class="main-menu-content">
                                <nav>
                                    <ul>
                                        <li>
                                            <a href="index.php">Anasayfa</a>
                                        </li>
                                        <li>
                                            <a href="hakkimizda.php">Hakkımızda</a>
                                        </li>

                                        <li>
                                            <a href="iletisim.php">İletişim</a>
                                        </li>
                                        
                                        <?php if(isset($_SESSION['oturum'])){ ?>
                                             <li>
                                            <a href="rezervasyonlar.php">Rezervasyonlarım</a>
                                        </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="cikis-yap.php">Çıkış</a>
                                            </li>
                                        <?php } else {?>
                                            <li class="nav-item">
                                                <a class="nav-link" href="giris.php">Giriş / Kayıt</a>
                                            </li>
                                        <?php } ?>



                                    </ul>
                                </nav>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>