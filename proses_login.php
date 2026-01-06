<?php
session_start();
include "koneksi.php";
$username = $_POST['txtUsername'];
$password = $_POST['txtPassword'];
$sql = mysqli_query($koneksi,"SELECT * FROM user where email = '$username' AND password = '$password'");
if(mysqli_num_rows($sql) > 0){
    $_SESSION['username'] = $username;
    header('location: ./dashboard.php');
    exit;
}else{
    echo "Login gagal. Username atau Passwod anda salah!";
}
?>