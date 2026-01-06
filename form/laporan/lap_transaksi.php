
<main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form Transaksi</li>
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
                    <div class="card-title">Laporan Transaksi</div>
                  </div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form method="post" action="form/laporan/lap_transaksi_cetak.php" >
                    <!--begin::Body-->
                    <div class="card-body">
                      <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Tanggal Awal</label>
                        <div class="col-sm-8">
                          <input type="date" class="form-control" id="inputEmail3" name="txtTgl_awal" />
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-4 col-form-label">Tanggal Akhir</label>
                        <div class="col-sm-8">
                          <input type="date" class="form-control" id="inputPassword3" name="txtTgl_akhir" />
                        </div>
                      </div>
                      
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-warning">Cetak</button>
                      <button type="reset" class="btn float-end">Cancel</button>
                    </div>
                    <!--end::Footer-->
                  </form>
                  <!--end::Form-->
                </div>
                <!--end::Horizontal Form-->
            </div>
        </div>
    </div>
</div>