<?php
include __DIR__ . "/../../koneksi.php";

// Ambil & amankan input
$id    = mysqli_real_escape_string($koneksi, $_POST['id']);
$nama  = mysqli_real_escape_string($koneksi, $_POST['nama']);
$email = mysqli_real_escape_string($koneksi, $_POST['email']);
$level = $_POST['level'];
$pass  = $_POST['password'];

// Validasi level enum
if ($level != 'admin' && $level != 'kasir') {
    echo "<script>alert('Level tidak valid!'); window.location='../../dashboard.php?menu=user';</script>";
    exit;
}

// Cek email duplikat (kecuali dirinya sendiri)
$cek = mysqli_query($koneksi, "SELECT id FROM user WHERE email='$email' AND id!='$id'");
if (mysqli_num_rows($cek) > 0) {
    echo "<script>alert('Email sudah digunakan user lain!'); window.location='../../dashboard.php?menu=user';</script>";
    exit;
}

// Jika password diisi → update + hash
if (!empty($pass)) {
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    mysqli_query($koneksi, "UPDATE user SET 
        nama='$nama',
        email='$email',
        password='$hash',
        level='$level'
        WHERE id='$id'");
} else {
    // Jika password kosong → tidak diubah
    mysqli_query($koneksi, "UPDATE user SET 
        nama='$nama',
        email='$email',
        level='$level'
        WHERE id='$id'");
}

// Redirect sukses
header("Location: ../../dashboard.php?menu=user&status=diupdate");
exit;
