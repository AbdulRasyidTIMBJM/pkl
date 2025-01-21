<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CSSD RS ISLAM</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="<?= base_url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">
</head>
<?php if ($this->session->flashdata('pesan')): ?>
  <div class="alert alert-warning">
    <?= $this->session->flashdata('pesan'); ?>
  </div>
<?php endif; ?>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <img src="<?= base_url('assets/dist/img/logo.png') ?>" alt="CSSD"> <b>SI-CSSD</b>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Selamat datang di halaman login</p>

        <form action="<?= base_url('login/validasi') ?>" method="post">
          <div class="input-group mb-3">
            <input type="text" name="username" class="form-control" id="username" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" name="password" class="form-control" id="password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-eye" id="togglePassword"></span>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4 offset-md-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
      </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>a"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets/dist/js/adminlte.min.js') ?>"></script>
  <script src="<?= base_url('path/togglePassword.js') ?>"></script>
</body>

</html>