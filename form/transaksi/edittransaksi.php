<main class="app-main">

<div class="app-content-header">
  <div class="container-fluid">
    <h3>Edit Transaksi</h3>
  </div>
</div>

<div class="app-content">
<div class="container-fluid">
<div class="card card-warning card-outline col-md-6">

<div class="card-header">Form Edit Transaksi</div>

<?php
include __DIR__ . "/../../koneksi.php";
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM transaksi WHERE id_transaksi='$id'"));
?>

<form action="form/transaksi/simpan_edittransaksi.php" method="post">
<div class="card-body">

<input type="hidden" name="id_transaksi" value="<?= $data['id_transaksi'] ?>">

<div class="mb-3">
<label>Tanggal</label>
<input type="date" name="tanggal" class="form-control" value="<?= $data['tanggal'] ?>" required>
</div>

<div class="mb-3">
<label>Customer</label>
<select name="kode_customer" class="form-select" required>
<?php
$c = mysqli_query($koneksi,"SELECT kode_customer,nama FROM customer");
while($x=mysqli_fetch_assoc($c)){
$sel = ($x['kode_customer']==$data['kode_customer'])?'selected':'';
echo "<option value='$x[kode_customer]' $sel>$x[nama]</option>";
}
?>
</select>
</div>

<div class="mb-3">
<label>Status Cucian</label>
<select name="status_cucian" class="form-select">
<?php
$arr = ['Masuk','Proses','Selesai','Diambil'];
foreach($arr as $s){
$sel = ($s==$data['status_cucian'])?'selected':'';
echo "<option value='$s' $sel>$s</option>";
}
?>
</select>
</div>

<div class="mb-3">
<label>Status Bayar</label>
<select name="status_bayar" class="form-select">
<option value="Belum Lunas" <?= $data['status_bayar']=='Belum Lunas'?'selected':'' ?>>Belum Lunas</option>
<option value="Lunas" <?= $data['status_bayar']=='Lunas'?'selected':'' ?>>Lunas</option>
</select>
</div>

</div>

<div class="card-footer">
<button class="btn btn-warning">Update</button>
<a href="dashboard.php?menu=transaksi" class="btn btn-secondary float-end">Batal</a>
</div>
</form>

</div>
</div>
</div>
</main>
