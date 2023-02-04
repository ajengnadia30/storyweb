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
		<h1>Silahkan Daftar</h1>
        <?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="berhasil"){
			echo "<div class='alert-success'>Berhasil Mendaftar !</div>";
		}
	}
	?>
    <br>
		<form action="daftar.php" method="post">
            <label>Nama</label>
			<input type="text" name="nama" class="form_login" placeholder="Masukan Nama Anda" required="required">

			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Masukan Username Anda" required="required">
 
			<label>Password</label>
			<input type="password" name="password" class="form_login" placeholder="Masukan Password Anda" required="required">

            <input type="hidden" name="level" value="user" >
 
			<input type="submit" class="tombol_login" value="Daftar">
 
			<br/>
			<center>
                    <h5>Sudah mempunyai Akun ? <a class="link" href="login.php">Login Disini</a></h5>   
			</center>
		</form>
		
	</div>
 
 
</body>
</html>