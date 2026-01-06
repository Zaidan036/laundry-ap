<?php include __DIR__ . "/../../koneksi.php"; ?> 
<style>
  /* Header Detail */
.detail-header h4 {
  font-weight: 700;
  color: #0f172a;
  letter-spacing: .3px;
}
</style>
<main class="app-main">

  <!-- Header -->
  <div class="detail-header mb3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Data Transaksi</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item">
              <a href="dashboard.php">Home</a>
            </li>
            <li class="breadcrumb-item active">Tambah Transaksi</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="app-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">

          <div class="card card-success card-outline">
            <div class="card-header">
              <div class="card-title">Form Tambah Transaksi</div>
            </div>

            <form method="post" action="form/transaksi/simpan_transaksi.php">
              <div class="card-body">

                <!-- Tanggal -->
                <div class="mb-3">
                  <label class="form-label">Tanggal</label>
                  <input type="date"
                         name="tanggal"
                         class="form-control"
                         value="<?= date('Y-m-d'); ?>"
                         required>
                </div>

                <!-- Customer -->
                <div class="mb-3">
                  <label class="form-label">Customer</label>
                  <select name="kode_customer" class="form-select" required>
                    <option value="">-- Pilih Customer --</option>
                    <?php
                    $cust = mysqli_query(
                      $koneksi,
                      "SELECT kode, nama FROM customer ORDER BY nama ASC"
                    );
                    while ($c = mysqli_fetch_assoc($cust)) {
                      echo "<option value='{$c['kode']}'>
                              {$c['kode']} - {$c['nama']}
                            </option>";
                    }
                    ?>
                  </select>
                </div>

                <!-- Total -->
                <div class="mb-3">
                  <label class="form-label">Total (Rp)</label>
                  <input type="number"
                         name="total"
                         class="form-control"
                         min="0"
                         required>
                </div>

                <!-- Status Cucian -->
                <div class="mb-3">
                  <label class="form-label">Status Cucian</label>
                  <select name="status_cucian" class="form-select" required>
                    <option value="Masuk">Masuk</option>
                    <option value="Proses">Proses</option>
                    <option value="Selesai">Selesai</option>
                    <option value="Diambil">Diambil</option>
                  </select>
                </div>

                <!-- Status Bayar -->
                <div class="mb-3">
                  <label class="form-label">Status Bayar</label>
                  <select name="status_bayar" class="form-select" required>
                    <option value="Belum Lunas">Belum Lunas</option>
                    <option value="Lunas">Lunas</option>
                  </select>
                </div>

              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-success">
                  Simpan
                </button>
                <a href="dashboard.php?menu=transaksi"
                   class="btn btn-secondary float-end">
                  Kembali
                </a>
              </div>
            </form>

          </div>

        </div>
      </div>
    </div>
  </div>

</main>
