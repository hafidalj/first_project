<?php
/* jika user ketik url langsung ke index tanpa login maka
langsung dialihkan ke halaman login */
// session_start();
require("function.php");

/*jika user belum login maka tidak boleh masuk ke halaman ini (index)*/ 
if(!isset($_SESSION["login"]) ){ 
    header("Location: login.php");
    exit;
}
// ambil username dari halaman login untuk query ddi database
$username =  $_SESSION["username"];



// pilih semua dari users dimana username sama dengan username yang diambil dari halaman login            
$query = "SELECT * FROM users WHERE username LIKE '%$username%'";

// ambil data dari tabel users  =  mysqli_query(koneksi, query)
// parameter 1.koneksi($conn)
$result = mysqli_query($conn, $query);

// ambil data (fetch) users dari object result diatas
// 1. $profileName = mysqli_fetch_row($result) 
// 2. $profileName = mysqli_fetch_assoc($result))
// 3. $profileName = mysqli_fetch_array($result)
// 4. $profileName = mysqli_fetch_object($result)

$profileName =  mysqli_fetch_assoc($result);

// var_dump($profileName);
if(isset($_POST["kirim"])){
    if(komentar($_POST) > 0 ){ // komentar dari function komentar
        echo"registrasi berhasil";
    }else{
        echo mysqli_error($conn);
    }
}

$query_1 = "SELECT * FROM komentar";

// ambil data dari tabel users  =  mysqli_query(koneksi, query)
// parameter 1.koneksi($conn)
$result_1 = mysqli_query($conn, $query_1);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link rel="stylesheet" href="index-style.css">
</head>
<body>
    <nav>
        <!-- <h1>Home</h1> -->
        <!-- <img src="folder/jojo6.png" alt="" id="fotoProfile"> -->
        <p id="profile-name"><?php echo $profileName["nama"]?></p>
        <a href="logout.php"><button type="submit" id="logout">logout</button></a> 
    </nav>

    <ol reversed>
        <?php while($data_ =  mysqli_fetch_array($result_1)):?>
        <li id="listKomen">
            <p id="komentarUser"><?php echo $data_["username"]?></p>
            <p id="isiKomentar"><?php echo $data_["isiKomentar"]?></p>
        </li>
        <?php endwhile;?>
    </ol>

    <form action="" method="post">
        <input type="text" name="komentar" id="komentar" placeholder="tambahkan komentar">
        <button type="submit" name="kirim" id="kirim">kirim</button>
    </form>

</body>
</html>