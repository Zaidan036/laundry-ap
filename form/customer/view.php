<!--begin::App Content-->
<div class="app-content">
  <div class="container-fluid">

    <!-- Alert -->
    <?php if (isset($_GET['status'])) { ?>
      <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        Data customer berhasil <?= htmlspecialchars($_GET['status']); ?>.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php } ?>

    <div class="row mt-3">
      <div class="col-md-12">

        <div class="card card-outline card-info">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">
              <i class="bi bi-people-fill me-2"></i>
              <strong>Data Customer</strong>
            </h3>

            <a href="dashboard.php?menu=addcustomer" class="btn btn-info btn-sm">
              <i class="bi bi-plus-lg"></i> Tambah Customer
            </a>
          </div>

          <div class="card-body">
            <table class="table table-bordered table-hover text-center align-middle">
              <thead class="table-light">
                <tr>
                  <th width="5%">No</th>
                  <th>Kode Customer</th>
                  <th>Nama Customer</th>
                  <th>Alamat</th>
                  <th>No. HP</th>
                  <th width="18%">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include __DIR__ . "/../../koneksi.php";
                $no = 1;
                $sql = mysqli_query($koneksi, "SELECT * FROM customer");
                while ($data = mysqli_fetch_assoc($sql)) {
                ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['kode_customer']; ?></td>
                    <td><?= $data['nama']; ?></td>
                    <td><?= $data['alamat']; ?></td>
                    <td><?= $data['no_hp']; ?></td>
                    <td>
                      <a href="dashboard.php?menu=editcustomer&kode=<?= $data['kode_customer']; ?>"
                         class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil-square"></i> Edit
                      </a>

                      <a href="form/customer/hapus.php?kode=<?= $data['kode_customer']; ?>"
                         onclick="return confirm('Yakin ingin menghapus customer ini?')"
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
