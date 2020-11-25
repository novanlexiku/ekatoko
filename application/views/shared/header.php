<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title><?php echo $title; ?></title>
    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url() ?>/assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/vendor/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/vendor/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/vendor/summernote-master/summernote.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/vendor/dropify/dropify.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/b-1.6.5/datatables.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

    <!-- Argon CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header  align-items-center">
                <a class="navbar-brand" href="javascript:void(0)">
                    <img src="<?php echo base_url() ?>/assets/img/brand/logo.svg" class="navbar-brand-img" alt="...">
                </a>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url() ?>dashboard">
                                <i class="ni ni-shop text-primary"></i>
                                <span class="nav-link-text">Dashboards</span>
                            </a>
                        </li>
                        <?php if ($this->session->userdata('user_level') == '1') { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#navbar-transaksi" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-transaksi">
                                    <i class="ni ni-ungroup text-orange"></i>
                                    <span class="nav-link-text">Transaksi</span>
                                </a>
                                <div class="collapse" id="navbar-transaksi">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="<?php echo base_url() ?>pembelian" class="nav-link">
                                                <span class="sidenav-normal"> Pembelian </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#navbar-konfirmasi" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-konfirmasi">
                                    <i class="ni ni-bag-17 text-info"></i>
                                    <span class="nav-link-text">Konfirmasi</span>
                                </a>
                                <div class="collapse" id="navbar-konfirmasi">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="<?php echo base_url() ?>pemesanan" class="nav-link">
                                                <span class="sidenav-normal"> Pemesanan </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo base_url() ?>pengiriman" class="nav-link">
                                                <span class="sidenav-normal"> Pengiriman </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <hr class="my-3">
                            <h6 class="navbar-heading pl-4 text-muted">
                                <span class="docs-normal">Master Data</span>
                            </h6>
                            <li class="nav-item">
                                <a class="nav-link" href="#navbar-barang" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-barang">
                                    <i class="ni ni-spaceship"></i>
                                    <span class="nav-link-text">Barang</span>
                                </a>
                                <div class="collapse" id="navbar-barang">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="<?php echo base_url() ?>barang" class="nav-link">
                                                <span class="sidenav-normal"> Barang </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo base_url() ?>promo" class="nav-link">
                                                <span class="sidenav-normal"> Promo </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo base_url() ?>kategori" class="nav-link">
                                                <span class="sidenav-normal"> Kategori </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#navbar-pengguna" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-pengguna">
                                    <i class="ni ni-circle-08"></i>
                                    <span class="nav-link-text">Pengguna</span>
                                </a>
                                <div class="collapse" id="navbar-pengguna">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="<?php echo base_url() ?>pengguna" class="nav-link">
                                                <span class="sidenav-normal"> Pengguna </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo base_url() ?>daftarstaff" class="nav-link">
                                                <span class="sidenav-normal"> Staff </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url() ?>bank">
                                    <i class="ni ni-credit-card"></i>
                                    <span class="nav-link-text">Bank</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url() ?>daftartutorial">
                                    <i class="ni ni-air-baloon"></i>
                                    <span class="nav-link-text">Tutorial</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url() ?>laporan">
                                    <i class="ni ni-chart-pie-35"></i>
                                    <span class="nav-link-text">Laporan</span>
                                </a>
                            </li>
                        <?php } elseif ($this->session->userdata('user_level') == '2') { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#navbar-transaksi" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-transaksi">
                                    <i class="ni ni-ungroup text-orange"></i>
                                    <span class="nav-link-text">Transaksi</span>
                                </a>
                                <div class="collapse" id="navbar-transaksi">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="<?php echo base_url() ?>penjualan" class="nav-link">
                                                <span class="sidenav-normal"> Penjualan </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo base_url() ?>pembelian" class="nav-link">
                                                <span class="sidenav-normal"> Pembelian </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#navbar-konfirmasi" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-konfirmasi">
                                    <i class="ni ni-bag-17 text-info"></i>
                                    <span class="nav-link-text">Konfirmasi</span>
                                </a>
                                <div class="collapse" id="navbar-konfirmasi">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="<?php echo base_url() ?>pemesanan" class="nav-link">
                                                <span class="sidenav-normal"> Pemesanan </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo base_url() ?>pengiriman" class="nav-link">
                                                <span class="sidenav-normal"> Pengiriman </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <hr class="my-3">
                            <h6 class="navbar-heading pl-4 text-muted">
                                <span class="docs-normal">Master Data</span>
                            </h6>

                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url() ?>laporan">
                                    <i class="ni ni-chart-pie-35"></i>
                                    <span class="nav-link-text">Laporan</span>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#navbar-konfirmasi" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-konfirmasi">
                                    <i class="ni ni-bag-17 text-info"></i>
                                    <span class="nav-link-text">Konfirmasi</span>
                                </a>
                                <div class="collapse" id="navbar-konfirmasi">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="<?php echo base_url() ?>pemesanan" class="nav-link">
                                                <span class="sidenav-normal"> Pemesanan </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo base_url() ?>pengiriman" class="nav-link">
                                                <span class="sidenav-normal"> Pengiriman </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Search form -->
                    <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input class="form-control" placeholder="Search" type="text">
                            </div>
                        </div>
                        <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </form>
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center  ml-md-auto ">
                        <li class="nav-item d-xl-none">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item d-sm-none">
                            <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                                <i class="ni ni-zoom-split-in"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img alt="Image placeholder" src="<?php echo base_url() ?>/assets/img/theme/team-4.jpg">
                                    </span>
                                    <div class="media-body  ml-2  d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold"><?php echo $this->session->userdata('user_nama'); ?></span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome!</h6>
                                </div>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>My profile</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-settings-gear-65"></i>
                                    <span>Settings</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-calendar-grid-58"></i>
                                    <span>Activity</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-support-16"></i>
                                    <span>Support</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="<?php echo base_url() ?>logout" class="dropdown-item">
                                    <i class="ni ni-user-run"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header -->