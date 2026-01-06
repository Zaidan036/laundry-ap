<?php
include __DIR__ . "/../../koneksi.php";

// Ambil & bersihkan input
$nama     = mysqli_real_escape_string($koneksi, $_POST['nama']);
$email    = mysqli_real_escape_string($koneksi, $_POST['email']);
$password = $_POST['password'];
$level    = $_POST['level'];

// Validasi level
if ($level != 'admin' && $level != 'kasir') {
    echo "<script>alert('Level tidak valid!'); window.location='../../dashboard.php?menu=adduser';</script>";
    exit;
}

// Cek email duplikat
$cek = mysqli_query($koneksi, "SELECT id FROM user WHERE email='$email'");
if (mysqli_num_rows($cek) > 0) {
    echo "<script>alert('Email sudah terdaftar!'); window.location='../../dashboard.php?menu=adduser';</script>";
    exit;
}

// Hash password
$hash = password_hash($password, PASSWORD_DEFAULT);

// Simpan ke tabel USER (BUKAN tbl_login)
mysqli_query($koneksi, "INSERT INTO user (nama, email, password, level)
VALUES ('$nama', '$email', '$hash', '$level')");

// Redirect sukses
header("Location: ../../dashboard.php?menu=user&status=ditambahkan");
exit;
