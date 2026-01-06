<?php
include "../../koneksi.php";

// ambil data dari form edit
$kode_customer = $_POST['kode_customer'];
$nama          = $_POST['nama'];
$alamat        = $_POST['alamat'];
$no_hp         = $_POST['no_hp'];

// update data customer
$update = mysqli_query(
    $koneksi,
    "UPDATE customer 
     SET nama   = '$nama',
         alamat = '$alamat',
         no_hp  = '$no_hp'
     WHERE kode_customer = '$kode_customer'"
);

// redirect
if ($update) {
    header("location:../../dashboard.php?menu=customer&status=diupdate");
} else {
    echo "Data customer gagal diperbarui";
}
?>
