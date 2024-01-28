<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PinRuApp | Login</title>

    <link rel="icon" type="image/x-icon" href="<?= base_url; ?>/dist/img/logo-bawaslu.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url; ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url; ?>/plugins/icheck-bootstrap/icheckbootstrap.min.css">
    <!-- Theme style-->
    <link rel="stylesheet" href="<?= base_url; ?>/dist/css/adminlte.min.css">
    <!-- Google Font:Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Custom style -->
    <style>
        .login-box {
            width: 360px;
            /* sesuaikan lebar sesuai kebutuhan */
            margin: 0 auto;
            margin-top: 50px;
            /* jarak dari atas */
        }

        .login-card-body {
            padding: 20px;
        }

        .login-logo {
            font-size: 24px;
            /* sesuaikan ukuran font sesuai kebutuhan */
            margin-bottom: 15px;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
                <div class="logo-container">
                    <img src="dist/img/logo-bawaslu.png" alt="Logo" width="100px"> <!-- Ganti path/to/logo.png dengan path menuju logo Anda -->
                </div>
                <!-- /.logo-container -->
                <div class="login-logo">
                    <b>PinRu</b>App
                </div>
                <!-- /.login-logo -->
                <p class="login-box-msg">Selamat Datang di Aplikasi Peminjaman Ruangan</p>
                <form action="<?= base_url; ?>/login/prosesLogin" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="ketikkan username.." name="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="ketikkan password.." name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block"><b>Login</b></button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
        <div class="row">
            <div class="col-sm-12">
                <?php
                Flasher::Message();
                ?>
            </div>
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url; ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url; ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url; ?>/dist/js/adminlte.min.js"></script>

</body>

</html>