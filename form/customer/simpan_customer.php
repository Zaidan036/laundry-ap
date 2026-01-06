<?php
include "../../koneksi.php";

// ambil data dari form
$kode_customer = $_POST['kode_customer'];
$nama          = $_POST['nama'];
$alamat        = $_POST['alamat'];
$no_hp         = $_POST['no_hp'];

// simpan ke database
$simpan = mysqli_query(
    $koneksi,
    "INSERT INTO customer (kode_customer, nama, alamat, no_hp)
     VALUES ('$kode_customer', '$nama', '$alamat', '$no_hp')"
);

// redirect
if ($simpan) {
    header("Location: ../../dashboard.php?menu=customer&status=ditambahkan");
    exit;
} else {
    echo "Data customer gagal disimpan";
}
?>
