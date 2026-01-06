<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login Laundry</title>

    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="dark" />
    <!--end::Accessibility Meta Tags-->

    <!--begin::Fonts-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      crossorigin="anonymous"
    />
    <!--end::Fonts-->

    <!--begin::Third Party Plugin-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin-->

    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="dist/css/adminlte.css" />
    <!--end::Required Plugin(AdminLTE)-->

    <!-- ===== Dark Blue Professional Theme ===== -->
    <style>
      /* 60% - Dark Navy */
      body.login-page {
        background-color: #0f172a !important;
        color: #e5e7eb;
      }

      /* Logo */
      .login-logo a {
        color: #38bdf8;
        font-weight: 700;
      }

      /* 30% - Slate Blue */
      .card,
      .login-card-body {
        background-color: #1e293b;
        border: none;
        border-radius: 12px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.4);
        color: #e5e7eb;
      }

      .login-box-msg {
        color: #cbd5e1;
      }

      /* Input */
      .form-control {
        background-color: #0f172a;
        border: 1px solid #334155;
        color: #e5e7eb;
      }

      .form-control::placeholder {
        color: #94a3b8;
      }

      .form-control:focus {
        background-color: #0f172a;
        border-color: #38bdf8;
        box-shadow: 0 0 0 0.15rem rgba(56, 189, 248, 0.25);
        color: #e5e7eb;
      }

      .input-group-text {
        background-color: #0f172a;
        border: 1px solid #334155;
        color: #38bdf8;
      }

      /* Checkbox */
      .form-check-label {
        color: #cbd5e1;
      }

      .form-check-input {
        background-color: #0f172a;
        border-color: #334155;
      }

      .form-check-input:checked {
        background-color: #38bdf8;
        border-color: #38bdf8;
      }

      /* 10% - Accent */
      .btn-primary {
        background-color: #38bdf8;
        border: none;
        color: #0f172a;
        font-weight: 600;
      }

      .btn-primary:hover {
        background-color: #0ea5e9;
        color: #0f172a;
      }

      /* Links */
      a {
        color: #38bdf8;
        text-decoration: none;
      }

      a:hover {
        color: #7dd3fc;
      }

      /* Social buttons */
      .social-auth-links .btn-primary {
        background-color: #1d4ed8;
        color: #e5e7eb;
      }

      .social-auth-links .btn-danger {
        background-color: #b91c1c;
      }
    </style>
  </head>
  <!--end::Head-->

  <!--begin::Body-->
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Laundry</b></a>
      </div>

      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Sign in to start your session</p>

          <form action="proses_login.php" method="post">
            <div class="input-group mb-3">
              <input
                type="email"
                class="form-control"
                placeholder="Email"
                name="txtUsername"
                required
              />
              <div class="input-group-text">
                <span class="bi bi-envelope"></span>
              </div>
            </div>

            <div class="input-group mb-3">
              <input
                type="password"
                class="form-control"
                placeholder="Password"
                name="txtPassword"
                required
              />
              <div class="input-group-text">
                <span class="bi bi-lock-fill"></span>
              </div>
            </div>

            <div class="row">
              <div class="col-8">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    id="remember"
                  />
                  <label class="form-check-label" for="remember">
                    Remember Me
                  </label>
                </div>
              </div>

              <div class="col-4">
                <div class="d-grid">
                  <button type="submit" class="btn btn-primary">
                    Sign In
                  </button>
                </div>
              </div>
            </div>
          </form>

          <div class="social-auth-links text-center mt-4 d-grid gap-2">
            <p class="text-muted">- OR -</p>
            <a href="#" class="btn btn-primary">
              <i class="bi bi-facebook me-2"></i> Sign in using Facebook
            </a>
            <a href="#" class="btn btn-danger">
              <i class="bi bi-google me-2"></i> Sign in using Google
            </a>
          </div>

          <p class="mb-1 mt-3">
            <a href="forgot-password.html">I forgot my password</a>
          </p>
          <p class="mb-0">
            <a href="register.html">Register a new membership</a>
          </p>
        </div>
      </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"></script>
    <script src="../js/adminlte.js"></script>
  </body>
  <!--end::Body-->
</html>
