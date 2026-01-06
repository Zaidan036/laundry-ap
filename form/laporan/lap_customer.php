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
                  <li class="breadcrumb-item active" aria-current="page">Form Customer</li>
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
        <div class="card-header">
          <h3 class="card-title">Laporan Customer</h3>
        </div>

        <form action="form/laporan/lap_customer_cetak.php" method="post">
          <div class="card-body">
            <p>Laporan seluruh data customer</p>
          </div>

          <div class="card-footer">
            <button type="submit" class="btn btn-warning">Cetak</button>
            <a href="dashboard.php" class="btn float-end">Cancel</a>
          </div>
        </form>

      </div>

    </div>
  </div>
</main>
