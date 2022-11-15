<?php 

$path = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Coffee Project | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <!-- Alertyfy CSS -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
  <!--Alertyfy Bootstrap theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- data tables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="managerDashboard.php" class="nav-link <?php if($path=='managerDashboard.php'){ echo 'active'; }else{echo ''; } ?>"><strong>Home</strong></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="managerdeliveries.php" class="nav-link <?php if($path=='managerdeliveries.php'){ echo 'active'; }else{echo ''; } ?>"><strong>Deliveries</strong></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="adminincludes/managerlogout.php" role="button">
          <i class="fas fa-house-user"></i>
          <strong>Logout</strong>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="managerDashboard.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="Coffee-Project Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-dark">Coffee Project</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><strong> Welcome
            <?php if(isset($_SESSION['auth_user']['name'])){
              echo $_SESSION['auth_user']['name'];
            }
            ?>
          </strong></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="managerDashboard.php" class="nav-link <?= $path == 'managerDashboard.php'?'active':''; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a> 
          </li>
          <li class="nav-item">
            <a href="managerfarmers.php" class="nav-link <?= $path == 'managerfarmers.php'?'active':''; ?>">
              <i class="nav-icon fas fa-person-booth"></i>
              <p>
                Farmers
              </p>
            </a> 
          </li>
          <li class="nav-item">
            <a href="managerdeliveries.php" class="nav-link <?= $path == 'managerdeliveries.php'?'active':''; ?>">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Deliveries
              </p>
            </a> 
          </li>
            <a href="managerfactoryjournal.php" class="nav-link <?= $path == 'managerfactoryjournal.php'?'active':''; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Factory Journal
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>