<!DOCTYPE html>
<html>
<head>
	<title>Membuat Login Multi User Level Dengan PHP dan MySQLi - www.malasngoding.com</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
	<br>
    <br>
	<div class="kotak_login">
		<h1>Silahkan login</h1>
        <?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
	?>
    <br>
		<form action="cek_login.php" method="post">
			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Username" required="required">
 
			<label>Password</label>
			<input type="password" name="password" class="form_login" placeholder="Password" required="required">
 
			<input type="submit" class="tombol_login" value="LOGIN">
 
			<br/>
			<center>
                    <h5>Belum mempunyai Akun ? <a class="link" href="registrasi.php">Daftar Disini</a></h5>   
			</center>
		</form>
		
	</div>
 
 
</body>
</html>