<?php

$conn = mysqli_connect("localhost", "root", "", "pbw");


function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;
    $username= htmlspecialchars($data['username']);
    $misi= htmlspecialchars($data['misi']);
    $gambar = htmlspecialchars($data["gambar"]);

    //query insert data
    $query = "INSERT INTO mission 
                VALUES 
                ('', '$username', '$misi', '$gambar')";
    mysqli_query($conn, $query);
    return (mysqli_affected_rows($conn));
} 

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM usersimerka WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;

    $id = $data["id"];
    $username = htmlspecialchars(strtolower(stripslashes($data["username"])));
    $email = htmlspecialchars($data["email"]);
    $alamat =  htmlspecialchars($data["alamat"]);
    $password = $data["password"];
    $query = "UPDATE usersimerka SET 
          
                email = '$email',
                alamat = '$alamat',
                username= '$username',
                password = '$password'
                WHERE `id` = $id
                ";        
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}

function registrasi($data){
    global $conn;
    $username = htmlspecialchars(strtolower(stripslashes($data["username"])));
    $email = htmlspecialchars($data["email"]);
    $alamat =  htmlspecialchars($data["alamat"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username
    $result = mysqli_query($conn, "SELECT username FROM usersimerka WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)){
        echo "<script>
            alert('username sudah terdaftar');
        </script>";
        return false;
    }

    //konfirmasi password
    if($password !== $password2){
            echo "<script>
                alert('Pastikan password dan konfirmasi password sama!');
                </script>";
            return false;
        } 
        
    
   // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO usersimerka(`email`,
    `alamat`, `username`, `password`)
     VALUES('$email', '$alamat', '$username', '$password')");

    return mysqli_affected_rows($conn);
    }

function datamisi($data){
    global $conn;
    $username = htmlspecialchars(strtolower(stripslashes($data["username"])));
    $namakegiatan = htmlspecialchars($data["namakegiatan"]);
    $tanggal =  $data["tanggal"];
    $namamisi = $data["namamisi"];
    // $image = $data["image"];

    //jalankan upload gambar dulu
    $image = upload();
    if(!$image){
        return false;
    } 
 
    mysqli_query($conn, "INSERT INTO misi(`username`,
    `namakegiatan`, `tanggal`, `namamisi`, `image`)
     VALUES('$username', '$namakegiatan', '$tanggal',
      '$namamisi', '$image')");
     

    return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile = $_FILES['image']['name'];
    $ukuranFile = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpName = $_FILES['image']['tmp_name'];

    //cek apakah tidak ada gambar yang diunggah
    if($error === 4){
        echo "<script>
        alert('Masukkan gambar terlebih dahulu');
        </script>";

        return false;
    }

    //cek beneran gambar bukan si ya ampun
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'svg'];
    $esktensiGambar = explode('.', $namaFile);
    $esktensiGambar = strtolower(end($esktensiGambar));
    if(!in_array($esktensiGambar, $ekstensiGambarValid)){
        echo "<script>
        alert('anuu... yang Anda upload bukan gambar');
        </script>";
        return false;
    };

    //$format = pathinfo($namaFile, PATHINFO_EXTENSION);
    $namaFileBaru = uniqid();
    
    $namaFileBaru .= '.';
    $namaFileBaru .= $esktensiGambar;
    
    //jika ukuran gambar terlalu besar
    if($ukuranFile > 1000000){
        echo "<script>
        alert('Gambar yang diunggah terlalu besar!');
        </script>";
        return false;
    };

    //lolos pengecekan, gambar siap di upload
    move_uploaded_file($tmpName, '../aset/img/' . $namaFileBaru);
    return $namaFileBaru;
}


function cari($keyword){
    $query = "SELECT * FROM usersimerka WHERE username LIKE '%$keyword%'
    OR email LIKE '%$keyword%' OR alamat LIKE '%$keyword%'
    ";

    return query($query);
}

function carimisi($keyword){

    $query = "SELECT username, COUNT(*) as skor FROM misi 
    WHERE username LIKE '%$keyword%' 
    GROUP BY username ORDER BY skor DESC ";
    

    return query($query);
}
