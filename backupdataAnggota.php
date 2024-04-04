<?php
    session_start();
    if(!isset($_SESSION["admin"]) ){
        header("Location: login.php");
        exit;
    }
    require 'functions.php';
    $datauser = query("SELECT * FROM usersimerka ORDER BY id DESC");

    if(isset($_POST["cari"])){
        $datauser = cari($_POST["keyword"]);
    }

    if(isset($_POST["clear"])){
        $datauser = query("SELECT * FROM usersimerka ORDER BY id DESC");

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Anggota Simerka</title>
    <script src="https://kit.fontawesome.com/bf9192ff90.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="responsive.css">

</head>
<body>
<header>
        <div class="container">
            <div class="header-left">
                <img class="logo" src="./aset/logo/logo.png">
            </div>
            <!-- Tambahkan ikon menu disini -->
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
        <h1>Daftar Anggota Simerka</h1>
            <form action="" method="post">
                <label><input type=text name="keyword" id="cari" placeholder="Masukkan kata pencarian ...." autofocus
                autocomplete="off">
                <button class="btn btn-green" type="submit" name="cari">Search</button>
                <button class="btn btn-green" type="submit" name="clear">Clear</button></label>
            </form>
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <button> <a href="registrasi.php"><span>Add New Member</span></a></button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>No.</td>
                                            <td>edit</td>
                                            <td>Username</td>
                                            <td>Email</td>
                                            <td>Alamat</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $i = 1;
                                        foreach ($datauser as $row): ?>
                                            <tr>
                                                <td><?=$i?></td>
                                                <td>
                                                   <button type="button" class="btn btn-green"><a href="ubah.php?id=<?= $row["id"]; ?>" >ubah</a> </button>
                                                   <button type="button" class="btn btn-red"><a href="hapus.php?id=<?= $row["id"]; ?>"
                                                        onclick="return confirm('Yakin ingin menghapus');">hapus</a> </button>
                                                </td>
                                                <td><?= $row['username']?></td>
                                                <td><?= $row['email'] ?></td>
                                                <td><?= $row['alamat']?></td>
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