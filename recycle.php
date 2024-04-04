<?php
    session_start();
    session_start();
    if(!isset($_SESSION["login"]) ){
        header("Location: login.php");
        exit;
    }
    require 'functions.php';

    if(isset($_POST["kirim"])){


      if(datamisi($_POST) > 0){
          echo "<script>
                  alert('Unggahan misi telah berhasil');
                  document.location.href  = 'misi.php';
          </script>";
      }
      else{
        echo "<script>
        alert('Data Gagal ditambahkan');
        document.location.href  = 'reduce.php';
        </script>";
      }
  }
?>


<!DOCTYPE html>
<html lang='en-GB'>  
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="responsive.css">
    <link rel="icon" type="image/x-icon" href="aset/logo/logo.ico">
    <script src="https://kit.fontawesome.com/bf9192ff90.js" crossorigin="anonymous"></script>
	  <title>Mission Simerka - Recycle</title>
    <style>
         ul,li {
            list-style-type: none;
        }
      form ul li label {
        margin-right: 9%;
        display: inline-block;
        width: 150px;
      
       }
        
    
    </style>
</head>
<body>
<header>
      <div class="container">
        <div class="header-left">
          <img class="logo" src="./aset/logo/logo.png">
        </div>

         <!--ikon menu -->
         <div class="menu-icon">
                <div class="dropdown">
                    <a class="dropbtn"><span><i class="fa-solid fa-bars"></i></span></a>
                    <div class="dropdown-content">
                    <a href="home1.php">Home</a>
                    <a href="kuis.php">Kuis Simerka</a>
                    <a href="misi.php">Mission</a>
                        <?php
                        if($_SESSION["admin"]){
                          echo "<a href='daftarAnggota.php'>Daftar Anggota</a>";
                        }
                        ?>
                    <a href="papanmisi.php">Papan Skor Misi</a>
                    <a href="logout.php" class="logout">Logout</a>
                    </div>
                </div>
            </div>

        <div class="header-right">
        <a href="home1.php">Home</a>
            <a href="kuis.php">Kuis Simerka</a>
            <a href="misi.php">Mission</a>
                <?php
                if($_SESSION["admin"]){
                  echo "<a href='daftarAnggota.php'>Daftar Anggota</a>";
                }
                ?>
            <a href="papanmisi.php">Papan Skor Misi</a>
            <a href="logout.php" class="logout">Logout</a>
        </div>
      </div>
    </header>
    <div class="top-wrapper">
      <div class="container">
        <h1>Upload Recycle Mission Simerka</h1>
        <p>Simerka is a platform for making us aware about greenhouse effects.</p>
        <p>Let's be a simerkarian and back to nature.</p>
        <div class="btn-wrapper">
        <form action = "" method="post" enctype="multipart/form-data">
          <ul>
          <li>
              <label for="username">Username : </label>
              <input type="text" name="username" id="username">
            </li>

            <li>
              <label for="namakegiatan">Nama Kegiatan : </label>
              <input type="text" name="namakegiatan" id="namakegiatan">
            </li>

            <li>
              <label for="tanggal">Tanggal  : </label>
              <input type="date" name="tanggal" id="tanggal">
            </li>

            <li>
              <input type="hidden" name="namamisi" id="namamisi" value="Recycle" readonly="readonly">
            </li>

            <li>
              <label for="image">Foto Misi : </label>
              <input type="file" name="image" id="image">
            </li>

            <li>
              <button type="submit" class="btn btn-green" name="kirim">Submit</button>
            </li>
          </ul>
        </form>
      </div>
    </div>
  </div>
</body>


<footer>
        <p>Copyright &copy; 2022 Politeknik Statistika STIS</p>
        <p>Salam Go Green!</p>
        <a href="https://www.facebook.com/sasti.prasasti.18/"><img src="aset/sosmed/facebook-2.png"
                alt="facebook Sasti Prasasti"></a>
        <a href="https://twitter.com/acessas"><img src="aset/sosmed/twitter.png" alt="Twitter acessas"></a>
        <a href="https://www.instagram.com/prasastispt/"><img src="aset/sosmed/instagram.png" alt="ig prasastispt"></a>
    </footer>

</html>