<!--begin::App Content-->
<div class="app-content">
  <div class="container-fluid">

    <!-- Alert -->
    <?php if (isset($_GET['status'])) { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        Data paket berhasil <?= htmlspecialchars($_GET['status']); ?>.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php } ?>

    <div class="row mt-3">
      <div class="col-12">

        <div class="card card-outline card-primary">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">
              🧾 <strong>Data Paket Laundry</strong>
            </h3>
            <a href="dashboard.php?menu=addpaket" class="btn btn-primary btn-sm">
              <i class="bi bi-plus-lg"></i> Tambah Paket
            </a>
          </div>

          <div class="card-body">

            <?php
            include "koneksi.php";

            // ================= PAKET KILOAN =================
            $qKiloan = mysqli_query($koneksi, "SELECT * FROM paket WHERE jenis='kiloan'");
            ?>

            <h5 class="mb-3">📦 Paket Kiloan</h5>
            <table class="table table-bordered table-hover text-center align-middle mb-4">
              <thead class="table-light">
                <tr>
                  <th width="5%">No</th>
                  <th>Kode Paket</th>
                  <th>Nama Paket</th>
                  <th>Harga / Kg</th>
                  <th width="18%">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                while ($data = mysqli_fetch_assoc($qKiloan)) {
                ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $data['kode_paket']; ?></td>
                  <td><?= $data['nama_paket']; ?></td>
                  <td>Rp <?= number_format($data['harga'], 0, ',', '.'); ?></td>
                  <td>
                    <a href="dashboard.php?menu=editpaket&kode=<?= $data['kode_paket']; ?>"
                       class="btn btn-warning btn-sm">
                      <i class="bi bi-pencil-square"></i> Edit
                    </a>
                    <a href="form/paket/hapus.php?kode=<?= $data['kode_paket']; ?>"
                       onclick="return confirm('Yakin ingin menghapus paket ini?')"
                       class="btn btn-danger btn-sm">
                      <i class="bi bi-trash"></i> Hapus
                    </a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>

            <?php
            // ================= PAKET SATUAN =================
            $qSatuan = mysqli_query($koneksi, "SELECT * FROM paket WHERE jenis='satuan'");
            ?>

            <h5 class="mb-3">🧺 Paket Satuan</h5>
            <table class="table table-bordered table-hover text-center align-middle">
              <thead class="table-light">
                <tr>
                  <th width="5%">No</th>
                  <th>Kode Paket</th>
                  <th>Nama Paket</th>
                  <th>Harga / Item</th>
                  <th width="18%">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                while ($data = mysqli_fetch_assoc($qSatuan)) {
                ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $data['kode_paket']; ?></td>
                  <td><?= $data['nama_paket']; ?></td>
                  <td>Rp <?= number_format($data['harga'], 0, ',', '.'); ?></td>
                  <td>
                    <a href="dashboard.php?menu=editpaket&kode=<?= $data['kode_paket']; ?>"
                       class="btn btn-warning btn-sm">
                      <i class="bi bi-pencil-square"></i> Edit
                    </a>
                    <a href="form/paket/hapus.php?kode=<?= $data['kode_paket']; ?>"
                       onclick="return confirm('Yakin ingin menghapus paket ini?')"
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
