<?php
include "../../koneksi.php";

if (!isset($_GET['kode'])) {
    header("location:../../dashboard.php?menu=customer");
    exit;
}

$kode = $_GET['kode'];

$hapus = mysqli_query(
    $koneksi,
    "DELETE FROM tbl_customer WHERE kode='$kode'"
);

if ($hapus) {
    header("location:../../dashboard.php?menu=customer&status=dihapus");
} else {
    echo "Data customer gagal dihapus";
}
?>
