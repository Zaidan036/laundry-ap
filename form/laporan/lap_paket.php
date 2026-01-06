<?php
include "koneksi.php";
$q = mysqli_query($koneksi, "SELECT * FROM paket ORDER BY kode_paket ASC");
?>

<main class="app-main">

<div class="app-content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h3 class="mb-0">Laporan Data Paket</h3>
      </div>
      <div class="col-sm-6">
        <a href="form/laporan/lap_paket_cetak.php"
           class="btn btn-success float-sm-end">
          <i class="bi bi-printer"></i> Cetak
        </a>
      </div>
    </div>
  </div>
</div>

<div class="app-content">
  <div class="container-fluid">

    <div class="card">
      <div class="card-body">

        <table class="table table-bordered table-striped">
          <thead class="table-dark text-center">
            <tr>
              <th>No</th>
              <th>Kode Paket</th>
              <th>Nama Paket</th>
              <th>Jenis</th>
              <th>Harga</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($q)) {
            ?>
            <tr>
              <td class="text-center"><?= $no++; ?></td>
              <td><?= $row['kode_paket']; ?></td>
              <td><?= $row['nama_paket']; ?></td>
              <td><?= ucfirst($row['jenis']); ?></td>
              <td>Rp. <?= number_format($row['harga'], 0, ',', '.'); ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>

      </div>
    </div>

  </div>
</div>

</main>
