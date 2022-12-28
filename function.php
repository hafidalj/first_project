<?php
    session_start();
    // koneksi ke database
    //menggunakan parameter 1.nama host 2.root 3.password(kosong) 4.nama database(phpdasar)
    $conn = mysqli_connect("localhost", "root", "", "practice");

    function register($data) {
        global $conn;
        $nama = ($data["nama"]);
        $username = strtolower(stripslashes($data["username"]));
        $email=($data["email"]);
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);

        if($password !== $password2 ){
            echo"<script>alert('konfirmasi password salah')</script>";
            return false;
        }if($password == '' && $password2==''){
            echo"<script>alert('password belum diisi')</script>";   
            return false;
        }if(strlen($password) <= 4){
            echo"<script>alert('Panjang karakter minimal 4')</script>";   
            return false;
        }

        // enkripsi
        $password = password_hash($password, PASSWORD_DEFAULT);

        // tambah user ke database
        mysqli_query($conn, "INSERT INTO users VALUES('$nama','$username','$email','$password')");

        return mysqli_affected_rows($conn);
        
    }
    function komentar($data){
        global $conn;
        $komentar = ($data["komentar"]);
        $username = $_SESSION["username"];

        $query = "INSERT INTO komentar VALUES
                    ('','$komentar','$username')";
        mysqli_query($conn, "$query");
        // 
        return mysqli_affected_rows($conn);
        

    }
?>