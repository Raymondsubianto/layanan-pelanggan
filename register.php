<?php 
    include 'db_conn.php';

     error_reporting(0);

     session_start();

     if (isset($_SESSION['username'])) {
         header("Location: index.php");
     }
    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        
        // menyiapkan query
        
        $sql1 = "SELECT * FROM `db_login` WHERE username='$username'";
        $result = mysqli_query($conn, $sql1);
        if (!$result->num_rows > 0) {
            $sql2 = "INSERT INTO `db_login` (`id_user`, `username`, `password`, `id_level`) 
            VALUES (NULL, '$username', '$password', '3')";
        $result = mysqli_query($conn, $sql2);
        if ($result) {
         echo "<script>alert('Selamat, registrasi berhasil!')</script>";
         
        //  $username = "";
        //  $_POST['password'] = "";
        } else {
         echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
        }
       } else {
        echo "<script>alert('Woops! Username Sudah Terdaftar.')</script>";
       }
       

     }
    
        // jika query simpan berhasil, maka user sudah terdaftar
        // maka alihkan ke halaman login
        //if($saved) header("Location: index.php");
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SISTEM INFORMASI PELANGGAN PLN</title>
        <link href="style.css" rel="stylesheet" />
    </head>
	<?php 
    if (isset($_GET['error'])) { ?>
    <p class="error"><?php echo $_GET['error']; ?></p>
<?php } ?>
    <body class = " loginscroll background formbody" > 
        <div class = "loginform">
				<form action="" method="post">
                <h3 class = "formh3">Registrasi Pelanggan</h3>
                    <div>
                        <label class = "loginlabel">Username</label>
	                    <input class = "logininput" type="text" name="username" placeholder="Username">   
                    </div>
                    <div>
                        <label class = "loginlabel">Password</label>
						<input class = "logininput" type="password" name="password" placeholder="Password">
                     </div> 
                                      
                    <div style="margin-top:20px">
					<button class = "loginbutton" type="submit" name="register">Register</button>
                     
                    <div>Sudah punya akun?
                    <a href="index.php" class="registerbutton">Login</a>	disini				                 
                </div>
                </form>
            </div>
    </body>
</html>
