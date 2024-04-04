<?php
    session_start();
    if(!isset($_SESSION["admin"]) ){
        header("Location: login.php");
        exit;
    }
    require 'functions.php';
?>

<?php
$id = $_GET["id"];

$simerkarian = query("SELECT * FROM usersimerka WHERE id = $id")[0];

if(isset($_POST["submit"])){
    if(ubah($_POST) > 0){
        echo "<script>
        alert('data berhasil diubah');
        document.location.href = 'daftarAnggota.php';
        </script>";
    }
    else{
        echo  "<script>
        alert('data gagal diubah!');
        document.location.href = 'daftarAnggota.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Simerka Member</title>
    <script src="https://kit.fontawesome.com/bf9192ff90.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="aset/logo/logo.ico">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="responsive.css">
    <style>
      
       li , ul {
           list-style-type: none;
       }
       form {
           padding: 0;
           margin: 35px;
        }
        
    input[type="text"] {
        margin: 5px auto;
        width: 50%;
        padding: 10px;
      }
      label{
          margin-right: 30px;
      }

      input[type="password"] {
        margin: 5px auto;
        width: 50%;
        padding: 10px;
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
                <a href="kuis.php">Kuis Simerka</a>
                <a href="misi.php">Mission</a>
                <a href="logout.php" class="logout">Logout</a>
                <a href="papanmisi.php">Papan Skor Misi</a>
                <a href="home1.php">Home</a>
            </div>
        </div>
    </header>
    <div class="top-wrapper">
        <div class="container">

    <h1>Edit Simerka Member</h1>

    <form action="" method="post">
        <input type ="hidden" name="id" value="<?= $simerkarian["id"]; ?>">
        <ul>
            <li>
                <label for="email">E-mail</label>
                <input type="text" name="email" id="email"
                value="<?= $simerkarian["email"]; ?>">
            </li>
            <li>
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat"
                value="<?= $simerkarian["alamat"]; ?>">
            </li>
            <li>
                <input type="hidden" name="username" id="username"
                value="<?= $simerkarian["username"]; ?>">
            </li>
            <li>
            <input type="hidden" name="password" id="password"
                value="<?= $simerkarian["password"]; ?>">
            </li>
            <li>
                <button class="btn facebook" type="submit" name="submit">Ubah</button>
            </li>
        </ul>
    </form>
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