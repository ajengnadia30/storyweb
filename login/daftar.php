<?php
//Include file koneksi ke database
include "../koneksi.php";

//menerima nilai dari kiriman form pendaftaran
$nama=$_POST["nama"];
$username=$_POST["username"];
$password=$_POST["password"]; //untuk password digunakan enskripsi md5
$level=$_POST["level"]; //untuk password digunakan enskripsi md5


//Query input menginput data kedalam tabel anggota
  $sql="insert into user (nama,username,password,level) values
		('$nama','$username','$password','$level')";

//Mengeksekusi/menjalankan query diatas	
  $hasil=mysqli_query($koneksi,$sql);

//Kondisi apakah berhasil atau tidak
  if ($hasil) {
	header("location:registrasi.php?pesan=berhasil");
  }
else {
	header("location:registrasi.php?pesan=gagal");
}  

?>