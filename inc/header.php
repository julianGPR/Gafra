<?php
require_once 'app/init.php';
if ($Ouser->is_login() == false) {
  header("location:login.php");
}
$actual_link = explode('=', "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
  $actual_link = end($actual_link);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Ample Billing and Inventory Software</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  
  <!-- DataTables -->
  <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
  <!-- datepi cker css  -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <!-- select 2 css  -->
  <link rel="stylesheet" type="text/css" href="plugins/select2/css/select2.min.css"/>
  <!-- custom css  -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- Google Font: Source Sans Pro -->
<!-- date picker -->


  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style>
    .select2-container .select2-selection--single {
    height: 37px;
}
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<div class="wrapper">
  <!-- Page Preloder -->
    <div id="page"></div>
    <div id="loading"></div>
    
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
 <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <div></div>
      <div class="notice">
                 <li>
                     <i class="material-symbols-outlined">
                         <a href="" target="_blank"> notifications</a></i>
                    </li>
                    <li> <i class="material-symbols-outlined"><a href="mailto: @gmail.com" target="_blank"> mail</a></i></li>

      </div>
                    
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
          <img src="https://img.freepik.com/premium-vector/woman-avatar-profile-round-icon_24640-14042.jpg">
            <?php//apartado para el nombre del usuario resivido desde la base de datos?>
        </a>
        <div class="dropdown-menu dropdown-menu-right p-0">
          <a href="index.php?page=profile" class="dropdown-item p-1">
            <i class="material-symbols-outlined">person</i> Profile
          </a>

          <a href="index.php?page=profile" class="dropdown-item p-1">
            <i class="material-symbols-outlined">
            stacked_inbox</i>Inbox
          </a>

          <a href="app/action/logout.php" class="dropdown-item pic p-1">
            <i class="material-symbols-outlined" >logout</i> Logout
          </a>
        </div>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->