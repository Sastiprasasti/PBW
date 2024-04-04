<?php
    session_start();
    if(!isset($_SESSION["login"]) ){
        header("Location: login.php");
        exit;
    }
    require 'functions.php';
    $dataskor = query("SELECT username, COUNT(*) as skor FROM misi GROUP BY username ORDER BY skor DESC");

    if(isset($_POST["cari"])){
        $dataskor = carimisi($_POST["keyword"]);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Papan Misi Simerka</title>
    <script src="https://kit.fontawesome.com/bf9192ff90.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="aset/logo/logo.ico">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="responsive.css">
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
        <h1>Papan Capaian Misi Anggota Simerka</h1>
        <p>Siapa yang teratas di papan?</p>
        <p>Ayo lanjutkan misi-misi kalian sobat simerkarian!</p>
            <form action="" method="post">
                <label><input type=text name="keyword" id="keyword" placeholder="Search...." autofocus
                autocomplete="off"></label>
            </form>
                <div class="projects">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="container">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>No.</td>
                                            <td>Username</td>
                                            <td>Skor</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $i = 1;
                                        foreach ($dataskor as $row): ?>
                                            <tr>
                                                <td><?=$i?></td>
                                                <td><?= $row['username']?></td>
                                                <td><?= $row['skor'] . ' kali misi';?></td>
                                            </tr>
                                        <?php $i++; 
                                        endforeach; ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    

    <script src="js/script2.js"></script>

</body>
</html> 