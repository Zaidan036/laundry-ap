<?php
include "../../koneksi.php";

$kode_paket = $_POST['kode_paket'];
$nama_paket = $_POST['nama_paket'];
$jenis      = $_POST['jenis'];
$harga      = $_POST['harga'];

$query = mysqli_query($koneksi, "
  INSERT INTO paket (kode_paket, nama_paket, jenis, harga)
  VALUES ('$kode_paket', '$nama_paket', '$jenis', '$harga')
");

if ($query) {
  header("Location: ../../../laundry/dashboard.php?menu=paket&status=ditambahkan");
  exit;
} else {
  echo "Data paket gagal ditambahkan";
}
?>
