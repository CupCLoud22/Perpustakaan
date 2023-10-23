<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title ?> | Perpustakaan</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
  <style>
    ./*datepicker {
      z-index: 9999 !important;
    }*/
  </style>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
  <script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo site_url('admin/dashboard') ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>PSA</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>PERPUSTAKAAN</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url() ?>assets/dist/img/user-enginer.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('nm') ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url() ?>assets/dist/img/user-enginer.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('nm') ?> - <?php echo $this->session->userdata('level') ?>
                  <small>Bergabung sejak <?php echo date('M Y', strtotime($this->session->userdata('tgl'))) ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo site_url('admin/profil') ?>" class="btn btn-default btn-flat"><i class="fa fa-user"></i> Profil</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url('auth/keluar') ?>" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Keluar</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url() ?>assets/dist/img/user-enginer.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nm') ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <?php 
          $role_id = $this->session->userdata('role_id');
          $queryMenu = "SELECT * FROM tb_user_access INNER JOIN tb_menu ON tb_user_access.menu_id = tb_menu.menu_id WHERE tb_user_access.role_id = $role_id";
          $menu = $this->db->query($queryMenu)->result_array();
          foreach($menu as $m){
            $querySubMenu = "SELECT * FROM tb_sub_menu WHERE menu_id = '".$m['menu_id']."' ORDER BY sub_menu_numb";
            $subMenu = $this->db->query($querySubMenu);
        ?>

        <?php 
            if($subMenu->num_rows() < 1){
        ?>
        <li <?php echo ($title == $m['menu_name'])? 'class="active"' : ''; ?>>
          <a href="<?php echo base_url($m['menu_url']) ?>">
            <i class="<?php echo $m['menu_icon'] ?>"></i> <span><?php echo $m['menu_name'] ?></span>
          </a>
        <?php }else{ ?>
        
          <li class="treeview<?php echo ($title == $m['menu_name'])? ' active' : ''; ?>">
          <a href="<?php echo base_url($m['menu_url']) ?>">
            <i class="<?php echo $m['menu_icon'] ?>"></i> <span><?php echo $m['menu_name'] ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
        <?php } ?>

          <ul class="treeview-menu">
            <?php 
              foreach($subMenu->result_array() as $sm){
            ?>
            <li><a href="<?php echo base_url($sm['sub_menu_url']) ?>"><i class="<?php echo $sm['sub_menu_icon'] ?>"></i> <?php echo $sm['sub_menu_name'] ?></a></li>
            <?php } ?>
          </ul>

        </li>

        <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>