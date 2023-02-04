<?php
//Include file koneksi ke database
include "../koneksi.php";

//menerima nilai dari kiriman form pendaftaran
$id_user=$_POST["id_user"];
$kategori=$_POST["kategori"];
$cerita=$_POST["cerita"];


//Query input menginput data kedalam tabel anggota
  $sql="insert into story (id_user,kategori,cerita) values
		('$id_user','$kategori','$cerita')";

//Mengeksekusi/menjalankan query diatas	
  $hasil=mysqli_query($koneksi,$sql);

//Kondisi apakah berhasil atau tidak
  if ($hasil) {
  echo "<script>alert('Cerita Berhasil Ditambahkan');window.location='halaman_user.php#cerita'</script>";
  }
else {  
  echo "<script>alert('Cerita Gagal Ditambahkan');window.location='halaman_user.php'</script>";
}  

?>