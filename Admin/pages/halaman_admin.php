<?php
session_start();
include "db_conn.php";
if (!isset($_SESSION['id_level'])) {
	header('location:index.php');
} else {
	$username = $_SESSION['username'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UP3 Web | Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300%2C400%2C400i%2C700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="position:fixed">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">Selamat Datang, <?php echo $username?>!</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $username?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="halaman_admin.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
              <a href="pelanggan.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Data Pelanggan
                </p>
              </a>
          </li> 
          <li class="nav-item">
            <a href="layanan.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Layanan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="keluhan.php" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Keluhan
              </p>
            </a>
          </li>  
          <li class="nav-item">
            <a href="penggunaan_daya.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Penggunaan Daya
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../logout.php" class="nav-link">
              <i class="nav-icon fas fa-ellipsis-h"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content" >
      <div class="container-fluid">
        <div class="row" >
          <div class="col-lg-3 col-6" style="margin-top:50px">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Data Pelanggan</h3>

                <p>Semua pelanggan PLN</p>
              </div>
              <a href="pelanggan.php" class="small-box-footer">
                Edit disini <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6" style="margin-top:50px">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Layanan</sup></h3>

                <p>Pindah tiang, pasang baru, dll</p>
              </div>
              <a href="layanan.php" class="small-box-footer">
                Edit disini <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6"style="margin-top:50px">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Keluhan</h3>

                <p>Keluhan pelanggan</p>
              </div>
              <a href="keluhan.php" class="small-box-footer">
                Edit disini <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6"style="margin-top:50px">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>Penggunaan Daya</h3>

                <p>Penggunaan Daya Bulanan</p>
              </div>
              <a href="penggunaan_daya.php" class="small-box-footer">
                Edit disini <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

        <!-- Small Box (Stat card) -->
        <div class="row">
        <div class="col-lg-3 col-6" >
            <!-- small card -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>Switching</h3>

                <p>History semua switching</p>
              </div>
              <a href="switching.php" class="small-box-footer">
                Edit disini <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-6" >
            <!-- small card -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>Pemadaman</sup></h3>

                <p>Jadwal dan history pemadaman</p>
              </div>
              <a href="pemadaman.php" class="small-box-footer">
                Edit disini <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <!-- Loading (remove the following to stop the loading)-->
              <div class="overlay">
                <i class="fas fa-3x fa-sync-alt"></i>
              </div>
              <!-- end loading -->
              <div class="inner">
                <h3>Soon</h3>

                <p>Soon</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-cart"></i>
              </div>
              <a href="#" class="small-box-footer">
                Edit disini <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <!-- Loading (remove the following to stop the loading)-->
              <div class="overlay dark">
                <i class="fas fa-3x fa-sync-alt"></i>
              </div>
              <!-- end loading -->
              <div class="inner">
                <h3>Soon</h3>

                <p>Soon</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">
                Edit disini <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

        

        <h5 class="mb-2">Info Menarik</h5>
        <div class="card card-success">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2 bg-gradient-dark">
                  <img class="card-img-top" src="img1.png" alt="Dist Photo 1" style="height:250px">
                  <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <h5 class="card-title text-primary text-white">Card Title</h5>
                    <p class="card-text text-white pb-2 pt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor.</p>
                    <a href="#" class="text-white">Last update 2 mins ago</a>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2">
                  <img class="card-img-top" src="img2.png" alt="Dist Photo 2" style="height:250px">
                  <div class="card-img-overlay d-flex flex-column justify-content-center">
                    <h5 class="card-title text-white mt-5 pt-2">Card Title</h5>
                    <p class="card-text pb-2 pt-1 text-white">
                      Lorem ipsum dolor sit amet, <br>
                      consectetur adipisicing elit <br>
                      sed do eiusmod tempor.
                    </p>
                    <a href="#" class="text-white">Last update 15 hours ago</a>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2">
                  <img class="card-img-top" src="img3.png" alt="Dist Photo 3" style="height:250px">
                  <div class="card-img-overlay">
                    <h5 class="card-title text-primary">Card Title</h5>
                    <p class="card-text pb-1 pt-1 text-white">
                      Lorem ipsum dolor <br>
                      sit amet, consectetur <br>
                      adipisicing elit sed <br>
                      do eiusmod tempor. </p>
                    <a href="#" class="text-primary">Last update 3 days ago</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a> -->
  </div>
  <!-- /.content-wrapper -->

 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
