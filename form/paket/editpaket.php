
<main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0">Data Barang</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form Barang</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row g-4">
              <!--begin::Col-->
              <div class="col-12">
               
              </div>
              <!--end::Col-->
              <!--begin::Col-->
              <div class="col-md-6">

                <!--begin::Horizontal Form-->
                <div class="card card-warning card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header">
                    <div class="card-title">Form Input Data Barang</div>
                  </div>
                  <!--end::Header-->
                  <!--begin::Form-->
                    <?php
                      include __DIR__ . "/../../koneksi.php";
                      $kode = $_GET['kode'];
                      $sql  = mysqli_query($koneksi,"SELECT * FROM paket WHERE kode_paket='$kode'");
                      $data = mysqli_fetch_array($sql);
                    ?>
                  <form method="post" action="form/barang/simpan_editpaket.php" >
                    <!--begin::Body-->
                    <div class="card-body">
                      <!-- Kode Paket -->
                      <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Kode Paket</label>
                        <div class="col-sm-8">
                          <input type="text"
                            class="form-control"
                            name="kode_paket"
                            value="<?= $data['kode_paket']; ?>"
                            readonly>
                        </div>
                      </div>

                      <!-- Nama Paket -->
                      <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Nama Paket</label>
                        <div class="col-sm-8">
                          <input type="text"
                            class="form-control"
                            name="nama_paket"
                            value="<?= $data['nama_paket']; ?>"
                            required>
                        </div>
                      </div>

                      <!-- Jenis -->
                      <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Jenis</label>
                        <div class="col-sm-8">
                          <select name="jenis" class="form-select" required>
                            <option value="kiloan" <?= $data['jenis']=='kiloan'?'selected':''; ?>>
                              Kiloan
                            </option>
                            <option value="satuan" <?= $data['jenis']=='satuan'?'selected':''; ?>>
                              Satuan
                            </option>
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
                            value="<?= $data['harga']; ?>"
                            min="0"
                            required>
                        </div>
                      </div>

                    </div>

                    <div class="card-footer">
                      <button type="submit" class="btn btn-warning">Simpan</button>
                      <a href="dashboard.php?menu=paket" class="btn float-end">Batal</a>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>