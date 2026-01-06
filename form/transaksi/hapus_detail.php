<?php
include "../../koneksi.php";

$id = $_GET['id'];
$trx = $_GET['trx'];

mysqli_query($koneksi,"DELETE FROM detail_transaksi WHERE id_detail='$id'");

mysqli_query($koneksi,"UPDATE transaksi SET total =
  (SELECT IFNULL(SUM(subtotal),0) FROM detail_transaksi WHERE id_transaksi='$trx')
  WHERE id_transaksi='$trx'");
header("Location: ../../dashboard.php?menu=detail_transaksi&id=$trx");
exit;
