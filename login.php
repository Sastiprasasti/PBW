<?php
        session_start();
        if(isset($_SESSION["login"])){
            header("Location: misi.php");
            exit;
        }

        require 'functions.php';
        if(isset($_POST['login'])){
            $username = $_POST["username"];
            $password = $_POST["password"];

            $result = mysqli_query($conn, "SELECT `username`, `password`, `level`  FROM usersimerka WHERE username = '$username'");
           
            //cek username
            if(mysqli_num_rows($result) == 1){
              // $data = mysqli_fetch_assoc($result);
                //cek password
                $row = mysqli_fetch_assoc($result);
                if(password_verify($password, $row["password"]) ) {
                    //set session 
                    $_SESSION["login"] = true;
                    if($row['level'] == "admin" ){
                        $_SESSION["admin"] = true;
                        header('Location: haloAdmin.php');
                        exit;
                    }
                    else{
                      header('Location: misi.php');
                      exit;
                    }
                }
            }
            $error = true;
        }
    ?> 


<!DOCTYPE html>
<html lang='en-GB'>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login to Simerka</title>
  <script src="https://kit.fontawesome.com/bf9192ff90.js" crossorigin="anonymous"></script>
  <link rel="icon" type="image/x-icon" href="aset/logo/logo.ico">
  <link rel="stylesheet" href="stylesheet.css">
  <link rel="stylesheet" href="responsive.css">
  <style>
    .container h1 {
      color: #123d24;
    }
    ul,li {
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

    
      input[type="password"] {
        margin: 5px auto;
        width: 50%;
        padding: 10px;
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
                        <a href="registrasi.php">Registrasi</a>
                    </div>
                </div>
            </div>

            <div class="header-right">
              <a href="registrasi.php">Registrasi</a>
            </div>
      </div>
    </div>
  </header>

    <div class="top-wrapper">
        <div class="container">
            <h1>Login to Simerka</h1>
            <p>Simerka is a platform for making us aware about greenhouse effects.</p>
            <p>Let's be a simerkarian and <i>back to nature.</i></p>
            
            <?php if(isset($error)):?>
                <p style="color:red; font-style:italic;">username/password tidak sesuai!</p>
            <?php endif;?>


            <form action="" method="post">
                <ul>
                    <li>
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username">
                    </li>
                    <li>
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password">
                    </li>
                    <li>
                        <button class="btn namaapa" type="submit" name="login">Login</button>
                    </li>
                    <p>belum punya akun? daftar <a href="registrasi.php" color="blue">di sini</a></p>
                </ul>
            </form>
            
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