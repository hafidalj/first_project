<?php
require 'function.php';

if(isset($_POST["submit"]) ){
    if(register($_POST) > 0 ){
        echo"<script>alert('registrasi berhasil')</script>";
    }else{
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
    <title>Sign up Account</title>
    <link rel="stylesheet" href="registerStyle.css">
</head>
<body>
    <div class="container">
        <div class="daftar glass" >
            <h2 class="sign">Sign Up</h2>
            <form action="" method="post" id="formulir">
                <input type="text" name="nama" id="nama" placeholder="Nama" class="isian" required>
                <br>
                <!-- <label for="nama">Nama lengkap</label> -->
                <input type="text" name="username" id="username" placeholder="Username" class="isian" required>
                <br>
                <!-- <label for="email">Email</label> -->
                <input type="email" name="email" id="email" placeholder="Email" class="isian" required>
                <br>
                <!-- <label for="pass">password</label> -->
                <input type="password" name="password" id="password" placeholder="password min 4 karakter" class="isian" required>
                <br>
                <!-- <label for="kon-pass">konfirmasi password</label> -->
                <input type="password" name="password2" id="password2" placeholder="konfirmasi password" class="isian" required>
                <br>
                <button type="submit" id="submit" name="submit" class="submit">Register</button>
                
            </form> 
            <div class="grs">
                <div class="a"></div>
                <p class="tt">Atau daftar dengan</p>
                <div class="a"></div>
            </div>
            <div class="google">
                <!-- <img src="image/logo.png" alt=""> -->
                <span>Google</span>
            </div>
        </div>
        <p><u>sudah punya akun ? <a href="login.php"></u>login sekarang</a></p>
    </div>
</body>
</html>