<?php
session_start();
include "db_conn.php";
if (!isset($_SESSION['id_level'])) {
  header('location:index.php');
} else {
  $username = $_SESSION['username'];
}
include "db_conn.php";
?>

<!DOCTYPE html>
<html>

<head>
  <title>Cetak Keluhan</title>
</head>

<body>
  <style type="text/css">
    body {
      font-family: sans-serif;
    }

    a {
      background: blue;
      color: #fff;
      padding: 8px 10px;
      text-decoration: none;
      border-radius: 2px;
    }

    .tengah {
      text-align: center;
    }
  </style>
  
      <!-- Fungsi Tabel -->
      <?php
      
      function input($qry)
      {
        $qry = trim($qry);
        $qry = stripslashes($qry);
        $qry = htmlspecialchars($qry);
        return $qry;
      }
      $no = 1;
      $laporan = "SELECT DISTINCT tb_plg.alamat, tb_keluhan.keluhan, tb_plg.nama FROM tb_keluhan, tb_plg
							WHERE tb_keluhan.username = tb_plg.username
							AND tb_keluhan.id_keluhan = '$_GET[id_keluhan]'";
      $hasil = mysqli_query($conn, $laporan);

      while ($qry = mysqli_fetch_assoc($hasil)) { ?>
      <h3>Nama : <?php echo $qry['nama'] ?></h3>
      <h3>Alamat: <?php echo $qry['alamat'] ?></h3>
      <br></br>
      <h3>Yth. Staff/Karyawan ULP Klaten Kota</h3>
      <h3>Saya, <?php echo $qry['nama'] ?> mengajukan keluhan sebagai berikut:</h3> 
      <h3><?php echo $qry['keluhan'] ?></h3>
      <h3>Demikian surat permohonan yang saya buat, mohon maaf bila ada kesalahan </h3>
      <?php } ?>
    </table>
  </div>
  <script>
    window.print();
  </script>
</body>

</html>