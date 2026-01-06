<main class="app-main">

  <!-- Header -->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Data User</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item">
              <a href="dashboard.php">Home</a>
            </li>
            <li class="breadcrumb-item active">Tambah User</li>
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
              <div class="card-title">Form Tambah Data User</div>
            </div>

            <!-- FORM -->
            <form action="form/user/simpan_user.php" method="post">
              <div class="card-body">

                <div class="mb-3">
                  <label class="form-label">Nama</label>
                  <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                </div>

                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" placeholder="email@example.com" required>
                </div>

                <div class="mb-3">
                  <label class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                  <label class="form-label">Level</label>
                  <select name="level" class="form-control" required>
                    <option value="">-- Pilih Level --</option>
                    <option value="admin">Admin</option>
                    <option value="kasir">Kasir</option>
                  </select>
                </div>

              </div>

              <!-- Footer -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="dashboard.php?menu=user" class="btn btn-secondary float-end">Kembali</a>
              </div>
            </form>
            <!-- END FORM -->

          </div>

        </div>
      </div>
    </div>
  </div>

</main>
