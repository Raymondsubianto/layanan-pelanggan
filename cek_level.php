<?php
session_start();
include "db_conn.php";
function input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
$username = $_POST['username'];
$password = $_POST['password'];

	// menyeleksi data user dengan username dan password yang sesuai
	$login = mysqli_query($conn,"SELECT * FROM db_login where username='$username' and password='$password'");
	// menghitung jumlah data yang ditemukan
	$cek = mysqli_num_rows($login);
	// cek apakah username dan password di temukan pada database
	if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['id_level']=="2"){
 		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['id_level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:Admin/pages/halaman_admin.php");
 
	// cek jika user login sebagai mahasiswa
	}else if($data['id_level']=="3"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['id_level'] = "pelanggan";
		// alihkan ke halaman dashboard mahasiswa
		header("location:User/pages/halaman_plg.php");



	}else{
 
		// alihkan ke halaman login kembali
		header("location:index.php?error=Masukan Username/Password dengan Benar");
	}	
}else{
	header("location:index.php");
}
?>