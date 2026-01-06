<?php
include "../../koneksi.php";

$kode_paket = $_GET['kode'];

$query = mysqli_query(
  $koneksi,
  "DELETE FROM paket WHERE kode_paket = '$kode_paket'"
);

if ($query) {
  header("Location: ../../../project/dashboard.php?menu=paket&status=dihapus");
  exit;
} else {
  echo "Data paket gagal dihapus";
}
?>
