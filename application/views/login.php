<style>
  body {
    background-image: url('<?= base_url('assets/dist/img/latarbelakang.jpg') ?>');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-blend-mode: multiply;
    font-family: 'Source Sans Pro', sans-serif;
  }

  .login-box {
    background-color: rgb(62, 171, 243);
    opacity: 1;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('<?= base_url('assets/dist/img/latarbelakang.jpg') ?>');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    opacity: 0.5;
    background-blend-mode: multiply;
    z-index: -1;
  }

  .login-logo img {
    width: 50px;
    height: 50px;
    margin: 10px;
  }

  .login-logo b {
    font-size: 24px;
    color: #fff;
  }

  .login-box-msg {
    font-size: 18px;
    color: #fff;
  }

  .input-group-text {
    background-color: #fff;
    border: none;
    padding: 10px;
  }

  .input-group-text span {
    color: #337ab7;
  }

  .icheck-primary {
    margin-top: 10px;
  }

  .icheck-primary input[type="checkbox"] {
    margin-right: 10px;
  }

  .icheck-primary label {
    font-size: 14px;
    color: #000;
  }

  .btn-primary {
    background-color: #337ab7;
    border-color: #337ab7;
    color: #fff;
  }

  .btn-primary:hover {
    background-color: #23527c;
    border-color: #23527c;
  }

  input[type="password"]::-ms-reveal,
  input[type="password"]::-ms-clear {
    display: none;
  }

  .login-card-body {
    background-color: rgba(24, 23, 23, 0.75);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  .login-box-msg {
    font-size: 18px;
    color: #000;
    text-align: center;
    margin-bottom: 20px;
  }
</style>

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
            <input type="password" name="password" class="form-control" id="password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="icheck-primary">
            <input type="checkbox" id="togglePassword">
            <label for="togglePassword">Show Password</label>
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
  <script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets/dist/js/adminlte.min.js') ?>"></script>
  <script>
    $(document).ready(function() {
      $('#togglePassword').click(function() {
        if ($(this).is(':checked')) {
          $('#password').attr('type', 'text');
        } else {
          $('#password').attr('type', 'password');
        }
      });
    });
  </script>