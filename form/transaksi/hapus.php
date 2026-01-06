<?php
include __DIR__ . "/../../koneksi.php";

$id = $_GET['id'];

$hapus = mysqli_query(
    $koneksi,
    "DELETE FROM tbl_transaksi WHERE id_transaksi='$id'"
);

if ($hapus) {
    header("location:../../dashboard.php?menu=transaksi&status=dihapus");
} else {
    echo "Transaksi gagal dihapus";
}
