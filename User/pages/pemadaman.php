<?php
session_start();
include "db_conn.php";
if (!isset($_SESSION['id_level'])) {
	header('location:../../index.php');
} else {
	$username = $_SESSION['username'];
}

$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "pelanggan";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { //cek koneksi
    die("Tidak bisa terkoneksi ke database");
}

$id_pemadaman = "";
$waktu       = "";
$lokasi     = "";
$estimasi     = "";
$error      = "";
$sukses     = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id_pemadaman     = $_GET['id_pemadaman'];
    $sql1       = "delete from tb_pemadaman where id_pemadaman = '$id_pemadaman'";
    $q1         = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil hapus data";
    }else{
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $id_pemadaman     = $_GET['id_pemadaman'];
    $sql1       = "select * from tb_pemadaman where id_pemadaman = '$id_pemadaman'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $waktu       = $r1['waktu'];
    $lokasi       = $r1['lokasi'];
    $estimasi       = $r1['estimasi'];

    if ($waktu == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $waktu       = $_POST['waktu']; 
    $lokasi    = $_POST['lokasi'];
    $estimasi    = $_POST['estimasi'];

    if ($waktu && $lokasi && $estimasi) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update tb_pemadaman set waktu = '$waktu',estimasi = '$estimasi',
            lokasi = '$lokasi' where id_pemadaman = '$id_pemadaman'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "insert into tb_pemadaman (id_pemadaman,waktu,estimasi,lokasi) 
            values ('','$waktu','$estimasi','$lokasi')";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses     = "Berhasil memasukkan data baru";
            } else {
                $error      = "Gagal memasukkan data";
            }
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UP3 Web | Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  
    <style>
        .mx-auto {
            width: 800px
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4"  style="position:fixed">
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
            <a href="halaman_plg.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            <li class="nav-item">
              <a href="pelanggan.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Data Pelanggan
                </p>
              </a>
            </li> 
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
        <div class="mx-auto">
        <!-- untuk memasukkan data -->
        

        <!-- untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Pemadaman
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Waktu</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Estimasi (jam)</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
    $sql = "SELECT * FROM tb_pemadaman";
    $q = mysqli_query($koneksi, $sql);
    $urut = 1;
                        
    while ($r = mysqli_fetch_array($q)){  
        $id_pemadaman = $r['id_pemadaman'];                         
        $waktu = $r['waktu'];
        $lokasi = $r['lokasi'];
        $estimasi = $r['estimasi'];
    ?>
        <tr>
            <th scope="row"><?php echo $urut++ ?></th>
            <td scope="row"><?php echo $waktu ?></td>
            <td scope="row"><?php echo $lokasi ?></td>
            <td scope="row"><?php echo $estimasi ?></td>
            
        </tr>
    <?php
    }
?>

                    </tbody>                   
                </table>
                
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
