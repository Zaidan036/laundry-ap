<?php
include __DIR__ . "/../../koneksi.php";

// ambil data dari form
$tanggal        = $_POST['tanggal'];
$kode_customer  = $_POST['kode_customer'];
$total          = $_POST['total'];
$status_cucian  = $_POST['status_cucian'];
$status_bayar   = $_POST['status_bayar'];

// simpan ke database
$simpan = mysqli_query(
    $koneksi,
    "INSERT INTO transaksi 
     (tanggal, kode_customer, total, status_cucian, status_bayar)
     VALUES 
     ('$tanggal', '$kode_customer', '$total', '$status_cucian', '$status_bayar')"
);

// redirect
if ($simpan) {
    header("location:../../dashboard.php?menu=transaksi&status=ditambahkan");
} else {
    echo "Gagal menyimpan transaksi";
}
