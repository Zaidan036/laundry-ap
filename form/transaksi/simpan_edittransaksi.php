<?php
include __DIR__ . "/../../koneksi.php";

// ambil data dari form
$id_transaksi  = $_POST['id_transaksi'];
$tanggal       = $_POST['tanggal'];
$kode_customer = $_POST['kode_customer'];
$total         = $_POST['total'];
$status_cucian = $_POST['status_cucian'];
$status_bayar  = $_POST['status_bayar'];

// update data transaksi
$update = mysqli_query(
    $koneksi,
    "UPDATE transaksi SET
        tanggal='$tanggal',
        kode_customer='$kode_customer',
        total='$total',
        status_cucian='$status_cucian',
        status_bayar='$status_bayar'
     WHERE id_transaksi='$id_transaksi'"
);

// redirect
if ($update) {
    header("Location: ../../dashboard.php?menu=transaksi&status=diupdate");
} else {
    echo "Gagal update data transaksi";
}
