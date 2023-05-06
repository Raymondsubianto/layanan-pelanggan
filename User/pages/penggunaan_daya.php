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

$id_bulanan = "";
$nama       = "";
$bulan     = "";
$pemakaian    = "";
$error      = "";
$sukses     = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id_bulanan     = $_GET['id_bulanan'];
    $sql1       = "delete from tb_bulanan where id_bulanan = '$id_bulanan'";
    $q1         = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil hapus data";
    }else{
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $id_bulanan = $_GET['id_bulanan'];
    $sql1       = "select * from tb_bulanan where id_bulanan = '$id_bulanan'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);

    $id_bulanan       = $r1['id_bulanan'];
    $pemakaian        = $r1['pemakaian'];
    $bulan            = $r1['bulan'];

    if ($id_bulanan == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $pemakaian    = $_POST['pemakaian'];
    $bulan      = $_POST['bulan'];

    if ($pemakaian && $bulan) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update tb_bulanan set bulan = '$bulan', pemakaian='$pemakaian' where id_bulanan = '$id_bulanan'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "insert into tb_bulanan (id_bulanan,username,pemakaian,bulan) values ('','$username','$pemakaian','$bulan')";
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
            <a href="penggunaan_daya.php" class="nav-link active">
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
        <div class="card">
            <div class="card-header">
                Create / Edit Data
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    header("refresh:2;url=penggunaan_daya.php");//5 : detik
                }
                
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:2;url=penggunaan_daya.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="bulan" class="col-sm-2 col-form-label">Bulan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="bulan" name="bulan" value="<?php echo $bulan ?>">
                        </div>
                    </div>             
                    <div class="mb-3 row">
                        <label for="pemakaian" class="col-sm-2 col-form-label">Pemakaian Bulanan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pemakaian" name="pemakaian" value="<?php echo $pemakaian ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>

        <!-- untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Pemakaian Bulanan
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Bulan</th>
                            <th scope="col">Pemakaian Bulanan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
    $sql = "select * from tb_bulanan where username = '$username'";
    $q = mysqli_query($koneksi, $sql);
    $urut = 1;
                        
    while ($r = mysqli_fetch_array($q)){                           
        $id_bulanan = $r['id_bulanan'];
        $bulan = $r['bulan'];
        $pemakaian = $r['pemakaian'];
    ?>
        <tr>
            <th scope="row"><?php echo $urut++ ?></th>
            <td scope="row"><?php echo $bulan ?></td>
            <td scope="row"><?php echo $pemakaian ?></td>
            <td scope="row">
                <a href="penggunaan_daya.php?op=edit&id_bulanan=<?php echo $id_bulanan?>"><button type="button" class="btn btn-warning">Edit</button></a>
                <a href="penggunaan_daya.php?op=delete&id_bulanan=<?php echo $id_bulanan?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>            
            </td>
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
