<?php
include __DIR__ . "/../../koneksi.php";

// Validasi parameter
if (!isset($_GET['id'])) {
    header("Location: ../../dashboard.php?menu=user");
    exit;
}

$id = mysqli_real_escape_string($koneksi, $_GET['id']);

// Cek data ada atau tidak
$cek = mysqli_query($koneksi, "SELECT id FROM user WHERE id='$id'");
if (mysqli_num_rows($cek) == 0) {
    echo "<script>alert('Data user tidak ditemukan!'); window.location='../../dashboard.php?menu=user';</script>";
    exit;
}

// Hapus user
mysqli_query($koneksi, "DELETE FROM user WHERE id='$id'");

// Redirect sukses
header("Location: ../../dashboard.php?menu=user&status=dihapus");
exit;
