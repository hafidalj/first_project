<?php
// session_start dijalankan paling atas
// session_start();
require 'function.php'; // termasuk session start

if(isset($_SESSION["login"]) ){
    header("Location: index.php");
    exit;
}



if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn,"SELECT * FROM users WHERE username = '$username'");

    // cek username 
    if(mysqli_num_rows($result) === 1){
        // cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password,$row["password"])){
            // set session
            $_SESSION["login"] = true;
            $_SESSION["username"] = $username;
            header("Location: index.php");
            exit;
        }
    }
    $error = true;
    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="loginStyle.css">
</head>
<body>
    <div class="container1">
        <h1 class="football"></h1>
        <div class="card-login glass">
            <div class="txt">
                <h2 id="log-in">Masuk</h2>
                <div id="sign-back">
                    <a href="register.php" id="daftar"><p>Daftar</p></a>
                    <!-- <p id="sign">Daftar</p> -->
                </div>
                
            </div>
            <form action="" method="post">
                <input type="text" name="username" id="username" placeholder="Username">
                <input type="password" name="password" id="password" placeholder="password">
                <button type="login" id="login" name="login">Login</button>
            </form>
            <div class="grs">
                <div class="a"></div>
                <p class="tt">Atau masuk dengan</p>
                <div class="a"></div>
            </div>
            <div class="google">
                <img src="image/logo.png" alt="">
                <span>Google</span>
            </div>
        </div>
    </div>
</body>
</html>