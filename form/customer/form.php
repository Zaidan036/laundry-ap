<main class="app-main">

  <!-- Header -->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Data Customer</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item">
              <a href="dashboard.php">Home</a>
            </li>
            <li class="breadcrumb-item active">Tambah Customer</li>
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

          <div class="card card-primary card-outline">
            <div class="card-header">
              <div class="card-title">Form Tambah Data Customer</div>
            </div>

            <form action="form/customer/simpan_customer.php" method="post">
              <div class="card-body">

                <!-- Kode Customer -->
                <div class="mb-3">
                  <label class="form-label">Kode Customer</label>
                  <input type="text"
                         name="kode_customer"
                         class="form-control"
                         placeholder="CUST01"
                         required>
                </div>

                <!-- Nama -->
                <div class="mb-3">
                  <label class="form-label">Nama Customer</label>
                  <input type="text"
                         name="nama"
                         class="form-control"
                         required>
                </div>

                <!-- Alamat -->
                <div class="mb-3">
                  <label class="form-label">Alamat</label>
                  <textarea name="alamat"
                            class="form-control"
                            rows="3"
                            placeholder="Alamat customer"></textarea>
                </div>

                <!-- No HP -->
                <div class="mb-3">
                  <label class="form-label">No. HP</label>
                  <input type="text"
                         name="no_hp"
                         class="form-control"
                         placeholder="08xxxxxxxxxx">
                </div>

              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="dashboard.php?menu=customer"
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
