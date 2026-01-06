<?php
include __DIR__ . "/../../koneksi.php";

$kode_paket = $_POST['kode_paket'];
$nama_paket = $_POST['nama_paket'];
$jenis      = $_POST['jenis'];
$harga      = $_POST['harga'];

$query = mysqli_query($koneksi, "
  UPDATE paket SET
    nama_paket = '$nama_paket',
    jenis      = '$jenis',
    harga      = '$harga'
  WHERE kode_paket = '$kode_paket'
");

if ($query) {
  echo "<script>
    alert('Data paket berhasil diperbarui');
    window.location.href='../../dashboard.php?menu=paket';
  </script>";
} else {
  echo "<script>
    alert('Gagal memperbarui data paket');
    history.back();
  </script>";
}
?>
