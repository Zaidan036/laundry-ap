<?php
include __DIR__ . "/../../koneksi.php";

$id = $_POST['id_transaksi'] ?? $_GET['id'] ?? null;
if(!$id){
  echo "ID transaksi tidak ditemukan!";
  exit;
}

/* SIMPAN DETAIL */
if(isset($_POST['tambah'])){
  $kode = $_POST['kode_paket'];
  $qty  = $_POST['qty'];

  $p = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT harga FROM paket WHERE kode_paket='$kode'"));
  $subtotal = $qty * $p['harga'];

  mysqli_query($koneksi,"INSERT INTO detail_transaksi(id_transaksi,kode_paket,qty,subtotal)
  VALUES('$id','$kode','$qty','$subtotal')");

  mysqli_query($koneksi,"UPDATE transaksi SET total = 
    (SELECT IFNULL(SUM(subtotal),0) FROM detail_transaksi WHERE id_transaksi='$id')
    WHERE id_transaksi='$id'");

header("Location: ../../dashboard.php?menu=detail_transaksi&id=$id");
exit;

}

/* HEADER */
$trx = mysqli_fetch_assoc(mysqli_query($koneksi,"
SELECT t.*, c.nama 
FROM transaksi t 
JOIN customer c ON t.kode_customer=c.kode_customer
WHERE t.id_transaksi='$id'
"));
?>
<style>
/* Header Detail */
.detail-header h4 {
  font-weight: 700;
  color: #0f172a;
  letter-spacing: .3px;
}

.detail-header .meta {
  color: #334155;
  font-weight: 500;
  see
}

/* Form input lebih tegas */
.detail-form select,
.detail-form input {
  border-radius: 12px;
  font-weight: 600;
  color: #0f172a;
  border: 1.5px solid #cbd5e1;
}

/* Table */
.detail-table th {
  background: linear-gradient(135deg,#1e293b,#0f172a);
  color: #fff;
  text-transform: uppercase;
  font-size: 13px;
  letter-spacing: .5px;
}

.detail-table td {
  color: #0f172a;
  font-weight: 500;
}

/* Total bar */
.detail-table .total-row th {
  background: #0f172a;
  color: #fff;
  font-size: 15px;
}

/* Tombol */
.detail-table .btn-danger {
  border-radius: 10px;
  padding: 6px 14px;
}
</style>

<div class="detail-header mb3">
<div class="container-fluid mt-3">

<h4>Detail Transaksi #<?= $id ?></h4>
<div class="meta">
  <b><?= $trx['nama'] ?></b><br>
Tanggal : <?= $trx['tanggal'] ?> |
Status : <?= $trx['status_cucian'] ?> |
Bayar : <?= $trx['status_bayar'] ?>

<hr>

<form method="POST" action="dashboard.php?menu=detail_transaksi&id=<?= $id ?>">
<input type="hidden" name="id_transaksi" value="<?= $id ?>">

<div class="row mb-3">
  <div class="col-md-5">
    <select name="kode_paket" class="form-control" required>
      <option value="">Pilih Paket</option>
      <?php
      $p = mysqli_query($koneksi,"SELECT * FROM paket");
      while($x=mysqli_fetch_assoc($p)){
        echo "<option value='$x[kode_paket]'>$x[nama_paket] - Rp ".number_format($x['harga'])."</option>";
      }
      ?>
    </select>
  </div>

  <div class="col-md-3">
    <input type="number" step="0.1" name="qty" class="form-control" placeholder="Kg / Qty" required>
  </div>

  <div class="col-md-2">
    <button type="submit" name="tambah" class="btn btn-success w-100">
      Tambah
    </button>
  </div>
</div>
</form>

<table class="table table-bordered table-striped">
<tr>
<th>Paket</th><th>Qty</th><th>Harga</th><th>Subtotal</th><th>Aksi</th>
</tr>

<?php
$q = mysqli_query($koneksi,"
SELECT d.*, p.nama_paket, p.harga 
FROM detail_transaksi d
JOIN paket p ON d.kode_paket=p.kode_paket
WHERE d.id_transaksi='$id'
");

$total=0;
while($d=mysqli_fetch_assoc($q)){
$total += $d['subtotal'];
?>
<tr>
<td><?= $d['nama_paket'] ?></td>
<td><?= $d['qty'] ?></td>
<td>Rp <?= number_format($d['harga']) ?></td>
<td>Rp <?= number_format($d['subtotal']) ?></td>
<td>
<a href="form/transaksi/hapus_detail.php?id=<?= $d['id_detail'] ?>&trx=<?= $id ?>"
   onclick="return confirm('Hapus item ini?')"
   class="btn btn-danger btn-sm">
   Hapus
</a>
</td>
</tr>
<?php } ?>

<tr class="fw-bold">
<th colspan="3">TOTAL</th>
<th>Rp <?= number_format($total) ?></th>
<th></th>
</tr>
</table>

</div>
</div>
