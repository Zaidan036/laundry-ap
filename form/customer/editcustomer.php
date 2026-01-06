<main class="app-main">

<!-- App Content Header -->
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
          <li class="breadcrumb-item active">Edit Customer</li>
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
            <div class="card-title">Form Edit Data Customer</div>
          </div>

          <?php
          include __DIR__ . "/../../koneksi.php";

          $kode_customer = $_GET['kode'];
          $sql  = mysqli_query(
              $koneksi,
              "SELECT * FROM customer WHERE kode_customer='$kode_customer'"
          );
          $data = mysqli_fetch_assoc($sql);
          ?>

          <form method="post" action="form/customer/update_customer.php">
            <div class="card-body">

              <div class="row mb-3">
                <label class="col-sm-4 col-form-label">Kode Customer</label>
                <div class="col-sm-8">
                  <input type="text"
                         name="kode_customer"
                         class="form-control"
                         value="<?= $data['kode_customer']; ?>"
                         readonly>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-4 col-form-label">Nama Customer</label>
                <div class="col-sm-8">
                  <input type="text"
                         name="nama"
                         class="form-control"
                         value="<?= $data['nama']; ?>"
                         required>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-4 col-form-label">Alamat</label>
                <div class="col-sm-8">
                  <textarea name="alamat"
                            class="form-control"
                            rows="3"><?= $data['alamat']; ?></textarea>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-4 col-form-label">No. HP</label>
                <div class="col-sm-8">
                  <input type="text"
                         name="no_hp"
                         class="form-control"
                         value="<?= $data['no_hp']; ?>">
                </div>
              </div>

            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-warning">
                <i class="bi bi-save"></i> Update
              </button>
              <a href="dashboard.php?menu=customer" class="btn btn-secondary float-end">
                Batal
              </a>
            </div>
          </form>

        </div>

      </div>
    </div>
  </div>
</div>

</main>
