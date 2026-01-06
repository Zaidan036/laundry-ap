<!--begin::App Content-->
<div class="app-content">
  <div class="container-fluid">

    <!-- Alert Sukses -->
    <?php if (isset($_GET['status'])) { ?>
      <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        Data user berhasil <?= htmlspecialchars($_GET['status']); ?>.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php } ?>

    <div class="row mt-3">
      <div class="col-md-12">

        <div class="card card-outline card-secondary">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">
              <i class="bi bi-person-badge-fill me-2"></i>
              <strong>Data User</strong>
            </h3>

            <a href="dashboard.php?menu=adduser" class="btn btn-secondary btn-sm">
              <i class="bi bi-plus-lg"></i> Tambah User
            </a>
          </div>

          <div class="card-body">
            <table class="table table-bordered table-hover text-center align-middle">
              <thead class="table-light">
                <tr>
                  <th width="5%">No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Level</th>
                  <th width="18%">Aksi</th>
                </tr>
              </thead>

              <tbody>
                <?php
                include __DIR__ . "/../../koneksi.php";
                $no = 1;

                // QUERY SESUAI TABEL DI DB
                $sql = mysqli_query($koneksi, "SELECT * FROM user ORDER BY id DESC");
                while ($data = mysqli_fetch_assoc($sql)) {

                  // Badge Level
                  if ($data['level'] == 'admin') {
                    $level = '<span class="badge bg-danger">Admin</span>';
                  } else {
                    $level = '<span class="badge bg-info">Kasir</span>';
                  }
                ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($data['nama']); ?></td>
                    <td><?= htmlspecialchars($data['email']); ?></td>
                    <td><?= $level; ?></td>
                    <td>
                      <a href="dashboard.php?menu=edituser&id=<?= $data['id']; ?>"
                         class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil-square"></i> Edit
                      </a>
                      <a href="form/user/hapus.php?id=<?= $data['id']; ?>"
                         onclick="return confirm('Yakin ingin menghapus user ini?')"
                         class="btn btn-danger btn-sm">
                        <i class="bi bi-trash"></i> Hapus
                      </a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>

        </div>

      </div>
    </div>

  </div>
</div>
<!--end::App Content-->
