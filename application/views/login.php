<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMAS | Login </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/toastr/toastr.min.css">
    <style>
        body {
            background-image: url('assets/dist/img/daniel-janzen-S6pSolcfd_0-unsplash.jpg');
        }
    </style>
</head>

<body class="holding-transation login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="<?= base_url() ?>" class="h5">Sistem Informasi Manajemen Assets</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form onsubmit="return cek()" action="<?= base_url('Login/auth') ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" id="iduser" name="iduser" class="form-control" placeholder="ID Petugas / NISN">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="social-auth-links text-center mt-2 mb-3">
                        <button type="submit" name="submit" class="btn btn-block btn-primary">
                            <i class="fas fa-save mr-2"></i> Sign in
                        </button>
                    </div>
                    <!-- /.social-auth-links -->
                </form>
                <?php if ($this->session->flashdata('failed')) { ?>
                    <div class="alert alert-danger">
                        <label class="small text-center">akun tidak ditemukan hubungi administrator</label>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-info">
                        <label class="small justiy-text-center text-center">Perhatian ! isi data diri anda dengan benar</label>
                    </div>
                <?php } ?>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

        <!-- /.login-box -->
        <!-- jQuery -->
        <script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
        <!-- SweetAlert2 -->
        <script src="<?= base_url('assets/') ?>plugins/sweetalert2/sweetalert2.min.js"></script>
        <!-- Toastr -->
        <script src="<?= base_url('assets/') ?>plugins/toastr/toastr.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>


        <script>
            function cek() {
                if (document.getElementById('iduser').value == "") {
                    toastr.info('Perhatian ! data iduser kosong');
                    return false;
                } else if (document.getElementById('password').value == "") {
                    toastr.info('Perhatian ! data password kosong');
                    return false;
                }
                return;
            }
        </script>
</body>

</html>