<?php
include __DIR__ . "/../../koneksi.php";

$id = mysqli_real_escape_string($koneksi, $_GET['id']);
$data = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id'");
$d = mysqli_fetch_assoc($data);

if (!$d) {
  echo "<script>alert('Data tidak ditemukan'); window.location='dashboard.php?menu=user';</script>";
  exit;
}
?>

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
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item"><a href="dashboard.php?menu=user">Data User</a></li>
            <li class="breadcrumb-item active">Edit User</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="app-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">

          <div class="card card-warning card-outline">
            <div class="card-header">
              <div class="card-title">Form Edit Data User</div>
            </div>

            <form action="form/user/simpan_edituser.php" method="post">
              <div class="card-body">

                <input type="hidden" name="id" value="<?= $d['id']; ?>">

                <div class="mb-3">
                  <label class="form-label">Nama</label>
                  <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($d['nama']); ?>" required>
                </div>

                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($d['email']); ?>" required>
                </div>

                <div class="mb-3">
                  <label class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak diubah">
                </div>

                <div class="mb-3">
                  <label class="form-label">Level</label>
                  <select name="level" class="form-control" required>
                    <option value="admin" <?= $d['level']=='admin'?'selected':'' ?>>Admin</option>
                    <option value="kasir" <?= $d['level']=='kasir'?'selected':'' ?>>Kasir</option>
                  </select>
                </div>

              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-warning">Update</button>
                <a href="dashboard.php?menu=user" class="btn btn-secondary float-end">Kembali</a>
              </div>
            </form>

          </div>

        </div>
      </div>
    </div>
  </div>

</main>
