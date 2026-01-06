<?php
include "koneksi.php";
?>
<main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0">Dashboard</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
            <div class="row">
              <!--begin::Col-->
              <div class="col-lg-3 col-6">
              <?php
                $qPaket = mysqli_query($koneksi,"SELECT COUNT(*) AS total FROM paket");
                $dataPaket = mysqli_fetch_assoc($qPaket);
                ?>
                <!--begin::Small Box Widget 1-->
                <div class="small-box text-bg-primary">
                  <div class="inner">
                    <h3><?= $dataPaket['total'] ?? 0; ?></h3>
                    <p>Jumlah Paket</p>
                  </div>
                  <svg
                    class="small-box-icon"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                  >
                    <path
                      d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z"
                    ></path>
                  </svg>
                  <a
                    href="dashboard.php?menu=paket"
                    class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
                  >
                    More info <i class="bi bi-link-45deg"></i>
                  </a>
                </div>
                <!--end::Small Box Widget 1-->
              </div>
              <!--end::Col-->
              <div class="col-lg-3 col-6">
                  <?php
                    $qCustomer = mysqli_query(
                      $koneksi,
                      "SELECT COUNT(*) AS total FROM customer"
                    );
                    $dataCustomer = mysqli_fetch_assoc($qCustomer);
                  ?>
                  <!--begin::Small Box Widget 2-->
                  <div class="small-box text-bg-success">
                    <div class="inner">
                      <h3><?= $dataCustomer['total']; ?></h3>
                      <p>Jumlah Customer</p>
                    </div>
                    <svg
                      class="small-box-icon"
                      fill="currentColor"
                      viewBox="0 0 24 24"
                      xmlns="http://www.w3.org/2000/svg"
                      aria-hidden="true"
                    >
                      <path
                        d="M12 12c2.485 0 4.5-2.015 4.5-4.5S14.485 3 12 3
                          7.5 5.015 7.5 7.5 9.515 12 12 12zm0
                          1.5c-3.038 0-9 1.522-9 4.5V21h18v-3
                          c0-2.978-5.962-4.5-9-4.5z"
                      ></path>
                    </svg>
                    <a
                      href="dashboard.php?menu=customer"
                      class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
                    >
                      More info <i class="bi bi-link-45deg"></i>
                    </a>
                  </div>
                  <!--end::Small Box Widget 2-->
                </div>
              <!--end::Col-->
              <div class="col-lg-3 col-6">
              <?php
                $qUser = mysqli_query(
                  $koneksi,
                  "SELECT COUNT(*) AS total FROM user"
                );
                $dataUser = mysqli_fetch_assoc($qUser);
              ?>

              <!--begin::Small Box Widget 3-->
              <div class="small-box text-bg-warning">
                <div class="inner">
                  <h3><?= $dataUser['total']; ?></h3>
                  <p>Jumlah User</p>
                </div>

                <svg
                  class="small-box-icon"
                  fill="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                  aria-hidden="true"
                >
                  <path
                    d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"
                  ></path>
                </svg>

                <a
                  href="dashboard.php?menu=user"
                  class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover"
                >
                  More info <i class="bi bi-link-45deg"></i>
                </a>
              </div>
              <!--end::Small Box Widget 3-->
            </div>
              <!--end::Col-->
              <div class="col-lg-3 col-6">
                <!--begin::Small Box Widget 4-->
                <?php
                $qTransaksi = mysqli_query($koneksi,"SELECT SUM(total) AS total FROM transaksi");
                $dataTransaksi = mysqli_fetch_assoc($qTransaksi);
                ?>
                <!--begin::Small Box Widget 1-->
              <div class="small-box text-bg-danger">
                  <div class="inner">
                    <h3>Rp. <?= number_format((int)$dataTransaksi['total'], 0, ',', '.'); ?></h3>
                    <p>Jumlah Transaksi</p>
                  </div>
                  <svg
                    class="small-box-icon"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                  >
                    <path
                      clip-rule="evenodd"
                      fill-rule="evenodd"
                      d="M2.25 13.5a8.25 8.25 0 018.25-8.25.75.75 0 01.75.75v6.75H18a.75.75 0 01.75.75 8.25 8.25 0 01-16.5 0z"
                    ></path>
                    <path
                      clip-rule="evenodd"
                      fill-rule="evenodd"
                      d="M12.75 3a.75.75 0 01.75-.75 8.25 8.25 0 018.25 8.25.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75V3z"
                    ></path>
                  </svg>
                  <a
                    href="dashboard.php?menu=transaksi"
                    class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
                  >
                    More info <i class="bi bi-link-45deg"></i>
                  </a>
                </div>
                <!--end::Small Box Widget 4-->
              </div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row">
              <!-- Start col -->
              <div class="col-lg-7 connectedSortable">
                <div class="card mt-4">
  <div class="card-header">
    <h3 class="card-title">Transaksi 7 Hari Terakhir</h3>
  </div>
  <div class="card-body">
    <canvas id="transaksiChart" height="120"></canvas>
  </div>
</div>
                </div>
                <!-- /.card -->

                <!-- DIRECT CHAT LAUNDRY -->
<div class="card direct-chat direct-chat-primary mb-4">
  <div class="card-header">
    <h3 class="card-title">Chat Pelanggan</h3>

    <div class="card-tools">
      <span title="Pesan Baru" class="badge text-bg-primary"> 2 </span>
      <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
        <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
        <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
      </button>
      <button
        type="button"
        class="btn btn-tool"
        title="Daftar Pelanggan"
        data-lte-toggle="chat-pane"
      >
        <i class="bi bi-people-fill"></i>
      </button>
      <button type="button" class="btn btn-tool" data-lte-toggle="card-remove">
        <i class="bi bi-x-lg"></i>
      </button>
    </div>
  </div>

  <!-- /.card-header -->
  <div class="card-body">
    <!-- Pesan -->
    <div class="direct-chat-messages">

      <!-- Pesan dari pelanggan -->
      <div class="direct-chat-msg">
        <div class="direct-chat-infos clearfix">
          <span class="direct-chat-name float-start">Budi Santoso</span>
          <span class="direct-chat-timestamp float-end">01 Jan 21:15</span>
        </div>
        <img
          class="direct-chat-img"
          src="dist/assets/img/user1-128x128.jpg"
          alt="Foto Pelanggan"
        />
        <div class="direct-chat-text">
          Halo kak, laundry saya sudah selesai belum ya?
        </div>
      </div>

      <!-- Balasan admin -->
      <div class="direct-chat-msg end">
        <div class="direct-chat-infos clearfix">
          <span class="direct-chat-name float-end">Admin Laundry</span>
          <span class="direct-chat-timestamp float-start">01 Jan 21:17</span>
        </div>
        <img
          class="direct-chat-img"
          src="dist/assets/img/user5-128x128.jpg"
          alt="Foto Admin"
        />
        <div class="direct-chat-text">
          Halo kak 😊 laundry sudah selesai dan bisa diambil hari ini.
        </div>
      </div>

      <!-- Pesan pelanggan -->
      <div class="direct-chat-msg">
        <div class="direct-chat-infos clearfix">
          <span class="direct-chat-name float-start">Budi Santoso</span>
          <span class="direct-chat-timestamp float-end">01 Jan 21:20</span>
        </div>
        <img
          class="direct-chat-img"
          src="dist/assets/img/user1-128x128.jpg"
          alt="Foto Pelanggan"
        />
        <div class="direct-chat-text">
          Oke kak, saya ambil besok pagi ya.
        </div>
      </div>

    </div>
    <!-- /.direct-chat-messages -->

    <!-- Daftar pelanggan -->
    <div class="direct-chat-contacts">
      <ul class="contacts-list">

        <li>
          <a href="#">
            <img
              class="contacts-list-img"
              src="dist/assets/img/user1-128x128.jpg"
              alt="Avatar"
            />
            <div class="contacts-list-info">
              <span class="contacts-list-name">
                Budi Santoso
                <small class="contacts-list-date float-end">Hari ini</small>
              </span>
              <span class="contacts-list-msg">
                Laundry sudah selesai belum ya?
              </span>
            </div>
          </a>
        </li>

        <li>
          <a href="#">
            <img
              class="contacts-list-img"
              src="dist/assets/img/user3-128x128.jpg"
              alt="Avatar"
            />
            <div class="contacts-list-info">
              <span class="contacts-list-name">
                Siti Aminah
                <small class="contacts-list-date float-end">Kemarin</small>
              </span>
              <span class="contacts-list-msg">
                Bisa minta antar ke rumah?
              </span>
            </div>
          </a>
        </li>

        <li>
          <a href="#">
            <img
              class="contacts-list-img"
              src="dist/assets/img/user5-128x128.jpg"
              alt="Avatar"
            />
            <div class="contacts-list-info">
              <span class="contacts-list-name">
                Andi Pratama
                <small class="contacts-list-date float-end">2 hari lalu</small>
              </span>
              <span class="contacts-list-msg">
                Harga laundry bed cover berapa ya?
              </span>
            </div>
          </a>
        </li>

      </ul>
    </div>
    <!-- /.direct-chat-pane -->
  </div>

  <!-- /.card-body -->
  <div class="card-footer">
    <form action="#" method="post">
      <div class="input-group">
        <input
          type="text"
          name="message"
          placeholder="Ketik pesan..."
          class="form-control"
        />
        <span class="input-group-append">
          <button type="submit" class="btn btn-primary">
            Kirim
          </button>
        </span>
      </div>
    </form>
  </div>
</div>
<!-- /.direct-chat -->
            </div>
            <!-- /.row (main row) -->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>