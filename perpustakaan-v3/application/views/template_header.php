<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $wp->wp_judul ?></title>
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/dist/img/'.$wp->wp_favicon) ?>">
    <link href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/plugins/slick/slick/slick.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/plugins/slick/slick/slick-theme.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/dist/css/styles.css" rel="stylesheet">
    <script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  </head>
  <body>
    <!--
    <nav class="nav-sosial">
      <div class="container">
        <ul>
          <li><a href="">Facebook</a></li>
          <li><a href="">Twitter</a></li>
          <li><a href="">Instagram</a></li>
          <li><a href="">Youtube</a></li>
        </ul>
      </div>
    </nav>
    -->
    <nav class="navbar navbar-menu navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url() ?>">
            <img src="<?php echo base_url('assets/dist/img/'.$wp->wp_logo) ?>" class="logo" style="width:60px;">
            <div class="sitename"><?php echo $wp->wp_judul ?></div>
            <div class="subname"><?php echo $wp->wp_nama ?></div>
          </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url() ?>">Beranda</a></li>
            <li><a href="<?php echo site_url('profil') ?>">Profil</a></li>
            <li><a href="<?php echo site_url('jurnal') ?>">Jurnal</a></li>
            <li><a href="<?php echo site_url('area_anggota') ?>">Area Anggota</a></li>
            <li><a href="<?php echo site_url('auth') ?>">Login</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>