<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$id_user = $_POST['id_user'];
$kategori = $_POST['kategori'];
$cerita = $_POST['cerita'];
 
// update data ke database
$sql="update story set id='$id', id_user='$id_user', kategori='$kategori', cerita='$cerita' where id='$id'";
 
// mengalihkan halaman kembali ke index.php
if (mysqli_query($koneksi, $sql)) {
    echo "<script>alert('Cerita Berhasil Diedit');window.location='halaman_user.php#cerita'</script>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}
mysqli_close($koneksi);
 
?>