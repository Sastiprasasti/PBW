<?php

session_start();
    if(!isset($_SESSION["admin"]) ){
        header("Location: login.php");
        exit;
    }
require 'functions.php';
$datauser = query("SELECT * FROM usersimerka");

$id = $_GET["id"];

if( hapus($id) > 0){
    echo "<script>
            alert('data berhasil dihapus');
            document.location.href = 'daftarAnggota.php';
            </script>";
}
else{
    echo "<script>
            alert('data gagal dihapus!');
            document.location.href = 'daftarAnggota.php';
            </script>";
}
?>