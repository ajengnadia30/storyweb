<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from story where id='$id'");
 
// mengalihkan halaman kembali ke index.php
echo "<script>alert('Cerita Berhasil Dihapus');window.location='halaman_user.php#cerita'</script>";
 
?>