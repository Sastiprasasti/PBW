<?php
require 'functions.php';
if(isset($_POST["register"])){
    if(registrasi($_POST) > 0){
        echo "<script>
                alert('Registrasi telah berhasil');
                document.location.href  = 'login.php';
        </script>";
    }
    else{
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Simerka Member</title>
    <link rel="icon" type="image/x-icon" href="aset/logo/logo.ico">
    <script src="https://kit.fontawesome.com/bf9192ff90.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="aset/logo/logo.ico">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="responsive.css">
    <style>
        ul,li {
            list-style-type: none;
        }
      form ul li label {
        margin-right: 9%;
        display: inline-block;
        width: 70px;
      
       }
   
       form ul li input {
        
        margin-left:30%;
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
                        <a href="login.php">Login</a>
                    </div>
                </div>
            </div>

            <div class="header-right">
                <a href="login.php">Login</a>
            </div>
        </div>
    </header>
    <div class="top-wrapper">
        <div class="container">
        <h1>Registrasi Simerka Member</h1>
        <form action="" method="post">
            <ul>
                <li>
                    <label for="email">E-mail</label>
                    <input type="text" name="email" id="email">
                </li>
                <li>
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat">
                </li>
                <li>
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username">
                </li>
                <li>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                    title="Harus berisi setidaknya satu angka dan satu huruf besar dan kecil, dan setidaknya 8 karakter atau lebih" required>
                </li>
                <li>
                    <label for="password2">Konfirmasi Password</label>
                    <input type="password" name="password2" id="password2"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                    title="Harus berisi setidaknya satu angka dan satu huruf besar dan kecil, dan setidaknya 8 karakter atau lebih" required>
                </li>
                <li>
                    <button class="btn namaapa" type="submit" name="register">Register</button>
                </li>
            </ul>
        </form>
            <div class="asking-log">
                <h4>Sudah punya akun?</h4>
                <p>login <a href="login.php">di sini</a> </p>
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