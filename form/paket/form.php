<main class="app-main">
  <!-- App Content Header -->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Data Paket Laundry</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item">
              <a href="dashboard.php">Home</a>
            </li>
            <li class="breadcrumb-item active">Form Paket</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- App Content -->
  <div class="app-content">
    <div class="container-fluid">
      <div class="row g-4">
        <div class="col-md-6">

          <div class="card card-warning card-outline mb-4">
            <div class="card-header">
              <div class="card-title">Form Input Paket Laundry</div>
            </div>

            <form method="post" action="form/paket/simpan_paket.php">
              <div class="card-body">

                <!-- Kode Paket -->
                <div class="row mb-3">
                  <label class="col-sm-4 col-form-label">Kode Paket</label>
                  <div class="col-sm-8">
                    <input type="text"
                           class="form-control"
                           name="kode_paket"
                           placeholder="Contoh: P001"
                           required>
                  </div>
                </div>

                <!-- Nama Paket -->
                <div class="row mb-3">
                  <label class="col-sm-4 col-form-label">Nama Paket</label>
                  <div class="col-sm-8">
                    <input type="text"
                           class="form-control"
                           name="nama_paket"
                           placeholder="Contoh: Cuci Kering"
                           required>
                  </div>
                </div>

                <!-- Jenis -->
                <div class="row mb-3">
                  <label class="col-sm-4 col-form-label">Jenis</label>
                  <div class="col-sm-8">
                    <select name="jenis" class="form-select" required>
                      <option value="">-- Pilih Jenis --</option>
                      <option value="kiloan">Kiloan</option>
                      <option value="satuan">Satuan</option>
                    </select>
                  </div>
                </div>

                <!-- Harga -->
                <div class="row mb-3">
                  <label class="col-sm-4 col-form-label">Harga</label>
                  <div class="col-sm-8">
                    <input type="number"
                           class="form-control"
                           name="harga"
                           min="0"
                           placeholder="Masukkan harga"
                           required>
                  </div>
                </div>

              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-warning">Simpan</button>
                <button type="reset" class="btn float-end">Batal</button>
              </div>
            </form>

          </div>

        </div>
      </div>
    </div>
  </div>
</main>
