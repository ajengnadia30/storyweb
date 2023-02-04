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

    <div class="container">
        <div class="content-menu">
            <div class="logo">
                <h1>Story<span>Web</span></h1>
            </div>
            <div class="menu">
                <ul class="menu-list">
                    <li class="menu-link"><a href="#home">Beranda</a></li>
                    <li class="menu-link"><a href="#about">Tentang</a></li>
                    <li class="menu-link"><a href="#cerita">Cerita</a></li>
                    <li class="menu-link">
                        <a class="btn-login" href="profile.php">Hai <?php echo @$user['nama']?> !</a>
                        <a class="btn-signup" href="../logout.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container" id="home">
        <div class="content-home">
            <div class="text-home">
                <p class="tag-home">
                    #1 BEST WEBSITE FOR YOUR StORY
                </p>
                <h1 class="text1">
                    Bagikan Ceritamu Buat Semua Orang <span>Bahagia</span> dengan Ceritamu !
                </h1>
                <p class="tag-cerita">
                “Kesakitan membuatmu berpikir. Pikiran membuatmu bijaksana. Kebijaksanaan membuat kita bisa bertahan dalam hidup”. – John Patrick
                </p>
				<a class="btn-baca" href="#cerita">Buat Cerita</a>
            </div>
            <div class="img-home">
                <img src="../images/home.png" alt="">
            </div>
        </div>
    </div>

    <div class="container" id="about">
        <div class="about-content">
             <div class="img-about">
                <img src="../images/home.svg" alt="">
            </div>
            <div class="about-text">
                <h3 class="text-judul">
                    About Story<span>Web</span>
                </h3>
                <p class="tag-home">
                    #Menjadikan Cerita menjadi Sebuah Kisah
                </p>
                <p class="tag-cerita">
                Bercerita adalah <span>menyampaikan</span> suatu yang mengisahkan tentang <span>perbuatan</span> atau suatu kejadian dan disampaikan secara lisan dengan tujuan membagikan <span>pengalaman</span> dan pengetahuan kepada orang lain.
                </p>
                <br>
                <p class="tag-cerita">
                Bercerita adalah suatu <span>kegiatan</span> yang dilakukan seseorang secara lisan kepada orang lain dengan alat atau tanpa alat tentang apa yang harus disampaikan dalam bentuk pesan, informasi atau hanya sebuah dongeng yang untuk didengarkan dengan rasa <span>menyenangkan</span>.
                </p>

                <a class="btn-baca" href="#cerita">Baca Cerita</a>
            </div>
        </div>
    </div>

    <div class="container" id="cerita">
        
            <center>
                <h1>Cerita Dari Story<span>Web</span></h1>
                <p class="cerita-judul">
                    Kumpulan Cerita Cerita Dari Semua Orang Dapat Dilihat Olehmu, Baca Sekarang !
                </p>
            </center>

        <div class="cerita-content">
            <div class="cerita-form">
                <form action="tambah_cerita.php" method="post">
					<input type="hidden" name="id_user" value="<?php echo @$user['id']?>">
                    <input type="hidden" name="kategori" value="today">
                    <textarea name="cerita"  cols="30" rows="6" placeholder="Tulis Cerita .. " required></textarea>
                    <input type="submit" class="btn-tambah" value="Tambah Cerita">
                </form>
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