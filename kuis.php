<?php
    session_start();
    if(!isset($_SESSION["login"]) ){
          header("Location: login.php");
          exit;
      }
    require 'functions.php';
    $kuis = query("SELECT * FROM soalkuis");    
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kuis Simerka</title>
    <script src="https://kit.fontawesome.com/bf9192ff90.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="aset/logo/logo.ico">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="responsive.css">

    <style>
        .hidden {
            display: none;
        }

        .tema a {
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
            color: black;
            text-decoration: none !important;
        }
        td{
            width:100%;
        }  

        table{ 
            width: 100%;
            position: relative;
            align-items: center;
        }

        td{
            width:100%;
        }

        input[type="radio"] {
        background-color: black;
        border: 1px solid navy;

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
  
<main>
    <div class="top-wrapper">
        <div class="container">
            <div class="projects">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">

                                <div id="pembukaTes" style="text-align:center;">
                                    <h1>Kuis Simerka</h1>
                                    <div class="fine-bottom-line"></div>
                                    <div class="columns v-distance-l is-center">
                                        <div class="column is-two-thirds is-middle">
                                            <h2 class="mb10">Gimana wawasan kamu tentang efek rumah kaca?</h2>
                                            <div class="v-distance-l">
                                                <p class="is-blueSK">
                                                    Kerjakan ujian dengan jujur dan jangan lupa berdoa!
                                                </p>
                                                <br>
                                                <button onclick="mulaiTes()" class="btn btn-green">Mulai Ujian</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="isiTes" class="hidden">
                                    <div class="column">
                                        <div class="cards">
                                            <h3 id="question" style="text-align:center; margin-bottom:50px;"></h3>
                                                <table> 
                                                    <tr>
                                                        <div class="input-wrapper">
                                                            <td><input type="radio" name="choices" data-id="0" id="choice0">
                                                            <label for="choice0" id="choiceText0"></label></td>
                                                        </div>
                                                    </tr>
                                                    <tr >
                                                        <div class="input-wrapper ">
                                                            <td><input type="radio" name="choices" data-id="1" id="choice1">
                                                            <label for="choice1" id="choiceText1"></label></td>
                                                        </div>
                                                        </tr>
                                                    <tr>
                                                        <div class="input-wrapper ">
                                                            <td><input type="radio" name="choices" data-id="2" id="choice2">
                                                            <label for="choice2" id="choiceText2"></label></td>
                                                        </div>
                                                    </tr>
                                                    <tr class="input-wrapper ">
                                                        <div class="input-wrapper ">
                                                            <td><input type="radio" name="choices" data-id="3" id="choice3">
                                                            <label for="choice3" id="choiceText3"></label></td>
                                                        </div>
                                                    </tr>
                                                </table> 
                                                <br/>
                                            <button onclick="nextQuestion()" id="nextBtn" class="btn btn-green">Next</button>
                                        </div>
                                    </div>
                                </div>


                                <div id="penutupTes" style="text-align:center;" class="hidden">
                                    <h1>Kuis Simerka telah selesai</h1>
                                    <p>Mau coba lagi? Boleh kok</p>
                                    <div class="fine-bottom-line"></div>
                                    <div class="columns v-distance-l is-center">
                                        <div class="column is-two-thirds is-middle">
                                            <h2 class="mb10" id="scoreText"></h2>
                                            <div class="v-distance-l">
                                                <button class="btn btn-blue">
                                                <a href="kuis.php">Coba Lagi</a>
                                                </button>
                                                <button class="btn btn-green" >
                                                <a href="home1.php">Selesai</a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
</main>


<footer>
        <p>Copyright &copy; 2022 Politeknik Statistika STIS</p>
        <p>Salam Go Green!</p>
        <a href="https://www.facebook.com/sasti.prasasti.18/"><img src="aset/sosmed/facebook-2.png"
                alt="facebook Sasti Prasasti"></a>
        <a href="https://twitter.com/acessas"><img src="aset/sosmed/twitter.png" alt="Twitter acessas"></a>
        <a href="https://www.instagram.com/prasastispt/"><img src="aset/sosmed/instagram.png" alt="ig prasastispt"></a>
    </footer>
<script>
 
    var listKuis = <?php echo json_encode($kuis); ?>;


            alert("Yakin udah siap kuis?");
            var DB_QUIZ = listKuis;
            let current_q = 0;
            let total_score = 0;
            let saved_answer = [];

            document.addEventListener("DOMContentLoaded", function (event) {
                setupQuestion();
            });

            function mulaiTes() {
                document.getElementById("pembukaTes").style.display = "none";
                document.getElementById("isiTes").style.display = "block";
            }
            function setupQuestion() {
                document.getElementById("question").innerText =  DB_QUIZ[current_q].soal;
                document.getElementById("choiceText0").innerText = DB_QUIZ[current_q].opsia;
                document.getElementById("choiceText1").innerText = DB_QUIZ[current_q].opsib;
                document.getElementById("choiceText2").innerText = DB_QUIZ[current_q].opsic;
                document.getElementById("choiceText3").innerText = DB_QUIZ[current_q].opsid;
            }

            function nextQuestion() {
                current_q++;

                saveAnswer();

                if (current_q == DB_QUIZ.length - 1) {
                    document.getElementById("nextBtn").innerText = "Submit";
                }

                if (current_q > DB_QUIZ.length - 1) {
                    stopQuiz();
                }

                resetState();
                setupQuestion();
            }


            function resetState() {
                const choosedAnswer = document.querySelector('input[name="choices"]:checked').checked = false;
                if (choosedAnswer !== null) {
                    choosedAnswer.checked = false;
                }
            }

            function stopQuiz() {
                checkscore();
                document.getElementById("isiTes").style.display = "none";
                document.getElementById("penutupTes").style.display = "block";
                document.getElementById("scoreText").innerText = "Score Anda = " + total_score;

                document.getElementById("inputmtkdong").value = total_score;
                return;
            }

            function saveAnswer() {
                const answer = document.querySelector('input[name="choices"]:checked');
                if (answer != null) {
                    //membandingkan array dengan array
                    saved_answer.push(parseInt(answer.getAttribute('data-id')));
                    // console.log(saved_answer);
                } else {
                    //default answer A

                    saved_answer.push(0);
                }
            }

            function checkscore() {
                for (i = 0; i < saved_answer.length; i++) {
                    if (saved_answer[i] == listKuis[i].jawaban) {
                        total_score += 1;
                    } else if (saved_answer[i] != listKuis[i].jawaban) {
                        total_score += 0;
                    }
                }
            }

    
</script>

</body>

</html>