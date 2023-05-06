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

$id_switching = "";
$waktu       = "";
$lokasi     = "";
$openclose     = "";
$switching    = "";
$error      = "";
$sukses     = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id_switching     = $_GET['id_switching'];
    $sql1       = "delete from tb_switching where id_switching = '$id_switching'";
    $q1         = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil hapus data";
    }else{
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $id_switching     = $_GET['id_switching'];
    $sql1       = "select * from tb_switching where id_switching = '$id_switching'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $waktu       = $r1['waktu'];
    $lokasi       = $r1['lokasi'];
    $openclose       = $r1['openclose'];
    $switching    = $r1['switching'];

    if ($waktu == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $waktu       = $_POST['waktu']; 
    $switching    = $_POST['switching'];
    $lokasi    = $_POST['lokasi'];
    $openclose    = $_POST['openclose'];

    if ($waktu  && $switching && $lokasi && $openclose) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update tb_switching set waktu = '$waktu',switching = '$switching',openclose = '$openclose',lokasi = '$lokasi' where id_switching = '$id_switching'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "insert into tb_switching (id_switching,waktu,openclose,switching,lokasi) values ('','$waktu','$openclose','$switching','$lokasi')";
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
            <a href="halaman_admin.php" class="nav-link">
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
                header("refresh:2;url=switching.php");
                }
                
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:2;url=switching.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="waktu" class="col-sm-2 col-form-label">Waktu</label>
                        <div class="col-sm-10">
                            <input type="datetime-local" class="form-control" id="waktu" name="waktu" value="<?php echo $waktu ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
                        <div class="col-sm-10">
                        <input list="lokasi" class="form-control" name="lokasi" id="lokasi" value="<?php echo $lokasi ?>">                          
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="openclose" class="col-sm-2 col-form-label">Buka/Tutup</label>
                        <div class="col-sm-10">
                        <!-- <input type="text" class="form-control" id="openclose" name="openclose" "> -->
                            <select name="openclose" id="openclose" value="<?php echo $openclose ?>">
                            <option value="Buka">Buka</option>
                            <option value="Tutup">Tutup</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="switching" class="col-sm-2 col-form-label">Jenis Switching</label>
                        <div class="col-sm-10">
                            <!-- <input type="text" class="form-control" id="switching" name="switching" > -->
                            <select name="switching" id="switching" value="<?php echo $switching ?>">
                            <option value="ABSw">ABSw</option>
                            <option value="LBS">LBS</option>
                            <option value="SSO">SSO</option>
                            <option value="Recloser">Recloser</option>
                            </select>
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
                Data switching
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Waktu</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Open/Close</th>
                            <th scope="col">Switching</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
    $sql = "SELECT * FROM tb_switching";
    $q = mysqli_query($koneksi, $sql);
    $urut = 1;
                        
    while ($r = mysqli_fetch_array($q)){  
        $id_switching = $r['id_switching'];                         
        $waktu = $r['waktu'];
        $lokasi = $r['lokasi'];
        $openclose = $r['openclose'];
        $switching = $r['switching'];
    ?>
        <tr>
            <th scope="row"><?php echo $urut++ ?></th>
            <td scope="row"><?php echo $waktu ?></td>
            <td scope="row"><?php echo $lokasi ?></td>
            <td scope="row"><?php echo $openclose ?></td>
            <td scope="row"><?php echo $switching ?></td>
            <td scope="row">
                <a href="switching.php?op=edit&id_switching=<?php echo $id_switching?>"><button type="button" class="btn btn-warning">Edit</button></a>
                <a href="switching.php?op=delete&id_switching=<?php echo $id_switching?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>            
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
