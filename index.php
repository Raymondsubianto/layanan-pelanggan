<?php
    include 'db_conn.php';

    error_reporting(0);
    
    session_start();
    
    if (isset($_SESSION['username'])) {
        header("Location: halaman_plg.php");
    }
    
    if (isset($_POST['submit'])) {
     $username = $_POST['username'];
     $password = $_POST['password'];
    
     $sql = "SELECT * FROM `db_login` WHERE username='$username' AND password='$password'";
     $result = mysqli_query($conn, $sql);
     if ($result->num_rows > 0) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['username'] = $row['username'];
      header("Location: halaman_plg.php");
     } else {
      echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
     }
    }
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
				<form action="cek_level.php" method="post">
                <h3 class = "formh3">Silahkan Login</h3>
                    <div>
                        <label class = "loginlabel">Username</label>
	                    <input class = "logininput" type="text" name="username" placeholder="Username">   
                    </div>
                    <div>
                        <label class = "loginlabel">Password</label>
						<input class = "logininput" type="password" name="password" placeholder="Password">
                     </div>
                    
                    <div style="margin-top:20px">
					<button class = "loginbutton" type="submit">Log In</button>
                    </div> 
                    <div>Belum punya akun?
                    <a href="register.php" class="registerbutton">Register</a>					                 
                </div>                       
                </form>
                
        </div>
        
    </body>
</html>

