<?php
    session_start();
    if(!isset($_SESSION["login"]) ){
        echo  "<script>
        alert('Ayo Login dulu yok! Lets Login');
        </script>";
          header("Location: login.php");
          exit;
      }
    require 'functions.php';
?>

<!DOCTYPE html>
<html lang='en-GB'>  
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/bf9192ff90.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="responsive.css">
	  <title>Halo Admin</title>
    <link rel="icon" type="image/x-icon" href="aset/logo/logo.ico">
    <style>

      h1 {
            color: #123d24;
            margin-top: 100px;
        }

      .dropbtn {
        display: inline-block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
      }

      .dropdown:hover .dropbtn {
        background-color: rgb(46, 40, 40);
      }

      .dropdown {
        display: inline-block;
      }

      .dropdown-content {
        display: none;

        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
      }

      .dropdown-content a {
        color: black;
        padding: 6px 8px;
        text-decoration: none;
        display: block;
        text-align: left;
      }

      .dropdown-content a:hover {
        background-color: #f1f1f1;
      }

      .dropdown:hover .dropdown-content {
        display: block;
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
      </div>
    </header>
    <div class="top-wrapper">
      <div class="container">
        <h1>Selamat Datang Admin!</h1>
        <p>Let's be a simerkarian and back to nature.</p>
        <div class="btn-wrapper">
          <a href="daftarAnggota.php" class="btn btn-green">List Peserta</a>
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