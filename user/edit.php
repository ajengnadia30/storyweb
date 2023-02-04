<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Story Web</title>
    <link rel="stylesheet" href="../assets/index.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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

    <div class="container" id="cerita">
        
            <center>
                <h1>Edit <span>Ceirta</span> Anda</h1>
                <p class="cerita-judul">
                    Kumpulan Cerita Cerita Dari Semua Orang Dapat Dilihat Olehmu, Baca Sekarang !
                </p>
            </center>

        <div class="cerita-content">
        <?php
	include '../koneksi.php';
	$id = $_GET['id'];
	$data = mysqli_query($koneksi,"select * from story where id='$id'");
	while($d = mysqli_fetch_array($data)){
		?>
            <div class="cerita-form">
                <form action="edit-aksi.php" method="post">
					<input type="hidden" name="id" value="<?php echo $d['id']; ?>">
					<input type="hidden" name="id_user" value="<?php echo $d['id_user']; ?>">
                    <input type="hidden" name="kategori" value="<?php echo $d['kategori']; ?>">
                    <textarea name="cerita"  cols="30" rows="6" ><?php echo $d['cerita']; ?></textarea>
                    <input type="submit" class="btn-tambah" value="Update Cerita">
                </form>
                <?php 
	}
	?>
            </div>

            <?php
            // import file database.php untuk menggunakan fungsi di dalamnya
            include "../db.php";

            //melakukan looping
            while($data = mysqli_fetch_array($select)){ ?>
            <div class="today">
                <p class="tag-one">#<?php echo $data['kategori']; ?></p>
                <h3 class="cerita-name"><?php echo $data['nama']; ?></h3>
                <p class="cerita-text"><?php echo $data['cerita']; ?></p>

				<div class="btn-action">
					<a class="btn-hapus" href="hapus.php?id=<?php echo $data['id']; ?>"><i class='bx bx-trash'></i></a> 
					<a class="btn-hapus" href="edit.php?id=<?php echo $data['id']; ?>"><i class='bx bx-edit-alt'></i></a> 
				</div>
            </div>
            <?php } ?>
        </div>

        
    </div>

    <footer>
        <center>
            <p class="cerita-text">
                &copy;Copyright By 20552011198_Ajeng Nadia Ependi_TIFK20CD_UASWEB1
            </p>
        </center>
    </footer>
</body>
</html>