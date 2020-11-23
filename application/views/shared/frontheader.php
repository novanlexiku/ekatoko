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
    <!-- Argon CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body class="bg-default">
    <!-- Navbar -->
    <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url() ?>">
                <img src="<?php echo base_url() ?>/assets/img/brand/white.png">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="dashboard.html">
                                <img src="<?php echo base_url() ?>/assets/img/brand/blue.png">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="dashboard.html" class="nav-link">
                            <span class="nav-link-inner--text">Overview</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown" aria-controls="pages_submenu" aria-expanded="false" aria-label="Toggle pages menu item">
                            <span class="nav-link-inner-text">Produk</span>
                            <span class="fas fa-angle-down nav-link-arrow ml-2"></span>
                        </a>
                        <ul class="dropdown-menu" id="pages_submenu">
                            <li><a class="dropdown-item" href="<?php echo base_url() ?>makanan">Makanan</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url() ?>minuman">Minuman</a></li>
                        </ul>
                    </li>

                </ul>
                <hr class="d-lg-none" />
                <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                    <li class="nav-item d-none d-lg-block ml-lg-4">
                        <a href="#!" data-toggle="modal" data-target="#ModalCart" class="btn btn-neutral btn-icon">
                            <span class="btn-inner--icon">
                                <i class="fas fa-shopping-cart mr-2"></i>
                            </span>
                            <span class="nav-link-inner--text">Keranjang <span class="badge badge-primary"><?php echo $this->cart->total_items(); ?></span></span>
                        </a>
                    </li>
                    <?php if ($this->session->userdata('logged_in') != TRUE) { ?>
                        <li class="nav-item d-none d-lg-block ml-lg-4">
                            <a href="<?php echo base_url() ?>login" class="btn btn-neutral btn-icon">
                                <span class="btn-inner--icon">
                                    <i class="fas fa-sign-in-alt mr-2"></i>
                                </span>
                                <span class="nav-link-inner--text">Login</span>
                            </a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item d-none d-lg-block ml-lg-4">
                            <a href="<?php echo base_url() ?>dashboard" target="_blank" class="btn btn-neutral btn-icon">
                                <span class="btn-inner--icon">
                                    <i class="fas fa-columns mr-2"></i>
                                </span>
                                <span class="nav-link-inner--text">Dashboard</span>
                            </a>
                        </li>
                    <?php } ?>

                </ul>
            </div>
        </div>
    </nav>