<?php
    session_start();
    if(!isset($_SESSION["login"]) ){
        header("Location: login.php");
        exit;
    }
    require 'functions.php';
    $datauser = query("SELECT * FROM usersimerka");
?>

<!DOCTYPE html>
<html lang='en-GB'>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simerka</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="responsive.css">
    <style>
        .container p {
            margin-top: 100px;
            margin-bottom: 50px;
        }

        .container h1 {
            color: #123d24;
        }

        .lesson-icon img {
            width: 150px;
            height: 150px;
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
                a href="home1.php">Home</a>
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
            <h1>Si Paling Mitigasi Efek Rumah Kaca</h1>
            <h1>(Simerka)</h1>
            <p>The main cause of climate change is an increase in the amount of greenhouse gases(CO<sub>2</sub>,
                CH<sub>4</sub>, etc) in the atmosfer.
                Regarding by the publication of Kemenperin (2010), in 2000, emissions of CO<sub>2</sub> reached the
                1.720 million tons of CO<sub>2</sub> equivalent, and if
                no emission reduction action, in 2020 it will be 2,950 million tons CO<sub>2</sub> equivalent. </p>
            <div class="loader">
                <div class="bola"><span>C0<sub>2</sub></span></div>
                <div class="bola"><span>C0<sub>2</sub></span></div>
                <div class="bola"><span>C0<sub>2</sub></span></div>
            </div>
        </div>
    </div>

    <div class="lesson-wrapper">
        <div class="container">
            <div class="heading">
                <h2>Sudahkah melakukan hal berikut ini?</h2>
            </div>

            <div class="lessons">
                <div class="lesson">
                    <div class="lesson-icon">
                        <a href="#"><img
                                src="https://cdn.pixabay.com/photo/2014/06/21/20/11/power-station-374097_1280.jpg"></a>
                        <p>Bahan bakar ramah lingkungan</p>
                    </div>
                    <p class="text-contents">Bakan bakar yang dapat menyebabkan polusi perlu dikurangi dan mari cari
                        alternatif
                        bahan bakar organik yang ramah lingkungan</p>
                </div>
                <div class="lesson">
                    <div class="lesson-icon">
                        <a href="#"><img
                                src="https://cdn.pixabay.com/photo/2022/05/07/20/22/flowers-7180947_1280.jpg"></a>
                        <p>Reboisasi</p>
                    </div>
                    <p class="text-contents">Penghijauan dapat dilakukan mulai dari menanam tanaman hias di rumah.</p>
                </div>
                <div class="lesson">
                    <div class="lesson-icon">
                        <a href="#"><img
                                src="https://cdn.pixabay.com/photo/2014/04/02/10/56/recycling-304974_1280.png"></a>
                        <p>Pembatasan Penggunaan plastik</p>
                    </div>
                    <p class="text-contents">Lakukan reduce terhadap plastik yang tidak ramah lingkungan.</p>
                </div>
                <div class="lesson">
                    <div class="lesson-icon">
                        <a href="#"><img
                                src="https://cdn.pixabay.com/photo/2016/11/29/08/16/power-lines-1868352_1280.jpg"></a>
                        <p>Hemat Listrik</p>
                    </div>
                    <p class="text-contents">Penggunaan listrik yang berlebihan akan meningkatkan demand batu bara yang
                        menimbulkan emisi gas C0<sub>2</sub></p>
                </div>

                <div class="clear"></div>
            </div>
        </div>
    </div>


    <div class="message-wrapper">
        <div class="container">
            <div class="heading">
                <h2>Penasaran misi 5R Simerka? </h2>
                <h3>Ayo klik di bawah ini</h3>
            </div>
            <a href="misi.php"><span class="btn message">Gerakan Mission 5R</span></a>
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
</body>

</html>