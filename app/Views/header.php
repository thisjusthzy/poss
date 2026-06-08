<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>POINT OF SALE | </title>

    <!-- Bootstrap -->
    <link href="<?= base_url('../vendors/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('../vendors/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url('../vendors/nprogress/nprogress.css')?>" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?= base_url('../vendors/iCheck/skins/flat/green.css')?>" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="<?= base_url('../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')?>" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?= base_url('../vendors/jqvmap/dist/jqvmap.min.css')?>" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css')?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('../build/css/custom.min.css')?>" rel="stylesheet">
    <!-- POS Custom Style -->
    <link href="<?= base_url('css/pos-custom.css')?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Sidebar color override (must be last to beat Gentelella + mCustomScrollbar) -->
    <style>
      body { background: #7f1d1d !important; }
      .col-md-3.left_col,
      .left_col,
      .left_col.scroll-view,
      .left_col .mCustomScrollBox,
      .left_col .mCSB_container,
      .left_col .mCSB_draggerContainer,
      .left_col .mCSB_scrollTools,
      .nav_title,
      .main_menu_side,
      #sidebar-menu { background: #7f1d1d !important; }
      .right_col,
      .top_nav,
      .top_nav .nav_menu { background: #f4f6fb !important; }
      .top_nav { background: #ffffff !important; }
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
              <a href="<?= base_url('/Home/dashboard')?>" class="site_title">
                <i class="fa fa-shopping-cart"></i>
                <span>POS System</span>
              </a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <?php 
                $session_foto = session()->get('foto');
                $foto_path = (!empty($session_foto) && file_exists(FCPATH . 'images/' . $session_foto)) 
                    ? base_url('images/' . $session_foto) 
                    : base_url('images/duar.jpeg');
                ?>
                <img src="<?= $foto_path ?>" alt="" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>SELAMAT DATANG,</span>
                <h2><?= session()->get('username')?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

        