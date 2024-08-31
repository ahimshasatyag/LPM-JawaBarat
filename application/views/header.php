<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title; ?></title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/logoLPM.jpg'); ?>">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/datatables/css/jquery.dataTables.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/css/adminlte.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/skins/_all-skins.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/datepicker/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css">
    <!-- JavaScript -->
    <script src="<?php echo base_url(); ?>assets/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/adminlte/js/adminlte.js"></script>
    <script src="<?php echo base_url(); ?>assets/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/datepicker/js/bootstrap-datepicker.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <a href="<?php echo base_url('beranda'); ?>" class="logo">
                <span class="logo-mini"><b>L</b></span>
                <span class="logo-lg"><img src="<?php echo base_url('assets/images/logoLPM.jpg'); ?>" width="27"
                        alt="LogoLPM" style="margin: 5px; border-radius:5px;"><b>LERMAS</b></span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>

                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Selamat datang <?php echo $this->session->userdata('nama_petugas'); ?>
                            </a>

                        </li>
                    </ul>
                </div>

            </nav>
        </header>



        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu" data-widget="tree">
                    <?php
                                        //jika admin
                                        if ($this->session->userdata('level') == 'admin') {
                                                ?>
                    <li><a href="<?php echo base_url('Dashboard'); ?>"><i class="fa fa-dashboard"></i>
                            <span>Dashboard</span></a>
                        <?php
                                                }
                                                ?>

                    <li><a href="<?php echo base_url('beranda'); ?>"><i class="fa fa-home"></i> <span>Beranda</span></a>
                    </li>

                    <?php

                                                //jika admin
                                                if ($this->session->userdata('level') == 'admin') {
                                                        ?>
                    <li><a href="<?php echo base_url('penduduk/tampil'); ?>"><i class="fa fa-address-card-o"></i>
                            <span>Data Bantuan Sosial</span></a></li>
                    <?php
                                                }
                        ?>
                <li><a href="<?php echo base_url('logout'); ?>"><i class="fa fa-power-off"></i> <span>Logout</span></a>
                </li>
                </ul>
            </section>
        </aside>