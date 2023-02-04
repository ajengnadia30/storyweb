<!DOCTYPE html>
<html>
<head>
	<title>Membuat Login Multi User Level Dengan PHP dan MySQLi - www.malasngoding.com</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");

	
	}
	//include koneksi
include "../koneksi.php";

//get user detail
$username = $_SESSION['username'];
$query = "select * from user where username = ? limit 1";
$stmt = $koneksi->stmt_init();
$stmt->prepare($query);
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_array(MYSQLI_ASSOC);
 
	?>
	<br>
	<br>
	<div class="kotak_login">
		<h1>Hallo <?php echo @$user['username']?> ! </h1>
        <?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="berhasil"){
			echo "<div class='alert-success'>Berhasil Mendaftar !</div>";
		}
	}
	?>
    <br>
		<form action="update_profile.php" method="post">
		<input type="hidden" name="id" class="form-control" id="id" value="<?php echo @$user['id']?>" >
            <label>Nama</label>
			<input type="text" name="nama" class="form_login" placeholder="Masukan Nama Anda" required="required" value="<?php echo @$user['nama']?>">

			<label>Username <span class="tag-username">tidak bisa di ubah</span></label>
			<input type="text" name="username" class="form_login" placeholder="Masukan Username Anda" required="required" value="<?php echo @$user['username']?>">
 
			<label>Password</label>
			<input type="text" name="password" class="form_login" placeholder="Masukan Password Anda" required="required" value="<?php echo @$user['password']?>">

            <input type="hidden" name="level" value="user" >
 
			<input type="submit" class="tombol_login" value="Ubah">
 
			<br/>
			<center>
                    <h5>Sudah selesai ? <a class="link" href="halaman_user.php">Kembali Keberanda</a></h5>   
			</center>
		</form>
		
	</div>
 
 
</body>
</html>