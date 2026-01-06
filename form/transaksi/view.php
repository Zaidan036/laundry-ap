<!--begin::App Content-->
<div class="app-content">
  <div class="container-fluid">

    <?php if (isset($_GET['status'])) { ?>
      <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        Data transaksi berhasil <?= htmlspecialchars($_GET['status']); ?>.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php } ?>

    <div class="row mt-3">
      <div class="col-md-12">

        <div class="card card-outline card-success">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">
              <i class="bi bi-receipt-cutoff me-2"></i>
              <strong>Data Transaksi</strong>
            </h3>

            <a href="dashboard.php?menu=addtransaksi" class="btn btn-success btn-sm">
              <i class="bi bi-plus-lg"></i> Tambah Transaksi
            </a>
          </div>

          <div class="card-body">
            <table class="table table-bordered table-hover text-center align-middle">
              <thead class="table-light">
                <tr>
                  <th width="5%">No</th>
                  <th>Tanggal</th>
                  <th>Customer</th>
                  <th>Total</th>
                  <th>Status Cucian</th>
                  <th>Status Bayar</th>
                  <th width="20%">Aksi</th>
                </tr>
              </thead>

              <tbody>
                <?php
                include __DIR__ . "/../../koneksi.php";
                $no = 1;

                $query = mysqli_query($koneksi,"
                  SELECT t.id_transaksi, t.tanggal, t.total,
                         t.status_cucian, t.status_bayar,
                         c.nama AS nama_customer
                  FROM transaksi t
                  JOIN customer c ON t.kode_customer = c.kode_customer
                  ORDER BY t.tanggal DESC
                ");

                while ($row = mysqli_fetch_assoc($query)) {
                ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= date('d-m-Y', strtotime($row['tanggal'])); ?></td>
                  <td><?= htmlspecialchars($row['nama_customer']); ?></td>
                  <td>Rp <?= number_format($row['total'],0,',','.'); ?></td>

                  <td>
                    <span class="badge bg-info px-3 py-2">
                      <?= $row['status_cucian']; ?>
                    </span>
                  </td>

                  <td>
                    <span class="badge <?= $row['status_bayar']=='Lunas'?'bg-success':'bg-warning text-dark'; ?> px-3 py-2">
                      <?= $row['status_bayar']; ?>
                    </span>
                  </td>

                  <td>
                    <div class="d-flex justify-content-center gap-2 flex-wrap">
                      <a href="dashboard.php?menu=detail_transaksi&id=<?= $row['id_transaksi'] ?>"
                         class="btn btn-info btn-sm px-3">
                        <i class="bi bi-list"></i> Detail
                      </a>

                      <a href="dashboard.php?menu=edittransaksi&id=<?= $row['id_transaksi']; ?>"
                         class="btn btn-warning btn-sm px-3">
                        <i class="bi bi-pencil-square"></i> Edit
                      </a>

                      <a href="form/transaksi/hapus.php?id=<?= $row['id_transaksi']; ?>"
                         onclick="return confirm('Yakin ingin menghapus transaksi ini?')"
                         class="btn btn-danger btn-sm px-3">
                        <i class="bi bi-trash"></i> Hapus
                      </a>
                    </div>
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
