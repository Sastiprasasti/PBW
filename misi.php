<?php
    session_start();
    if(!isset($_SESSION["login"]) ){
        header("Location: login.php");
        exit;
    }

?>

<!DOCTYPE html>
<html lang='en-GB'>  
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/bf9192ff90.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="aset/logo/logo.ico">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="responsive.css">
	  <title>Mission Simerka</title>
    <style>
        h1{
            margin-top: 100px;
            margin-bottom: 60px;
        }
        .btn{
            flex-direction: column;
        }
        .signup {
        background-color: #239b76;
        margin-right: 10px;
        }

        .namaapa {
        background-color: #3b5998;
        margin-right: 10px;
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
        <h1>Doing Mission in Simerka</h1>
        <p>Let's be a simerkarian and <i>back to nature.</i></p>
        <div class="misisimerka">
        <div class="btn-wrapper">
          <a href="reuse.php" class="btn signup">Reuse</a>
          <a href="recycle.php" class="btn namaapa">Recycle</a>
          <a href="reduce.php" class="btn signup">Reduce</a>
          <a href="replace.php" class="btn namaapa">Replace</a>
          <a href="replant.php" class="btn signup">Replant</a>
        </div>
        </div>
      </div>
    </div>
    <footer>
        <p>Copyright &copy; 2022 Politeknik Statistika STIS</p>
        <p>Salam Go Green!</p>
        <a href="https://www.facebook.com/sasti.prasasti.18/"><img src="aset/sosmed/facebook-2.png"
                alt="facebook Sasti Prasasti"></a>
        <a href="https://twitter.com/acessas"><img src="aset/sosmed/twitter.png" alt="Twitter acessas"></a>
        <a href="https://www.instagram.com/prasastispt/"><img src="aset/sosmed/instagram.png" alt="ig prasastispt"></a>
    </footer>

    <!-- <script>
      document.getElementById('listMember').style.display = 'none';
    </script> -->
</body>
</html>