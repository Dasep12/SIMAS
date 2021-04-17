<?php
$total = $this->m_inventori->getData(array('status' => "dipinjam"), "pinjam_brg")->num_rows();
$url = $this->uri->segment(1);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMAS | <?= $title ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/toastr/toastr.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets/')  ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/')  ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/')  ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url('assets/')  ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?= base_url('assets/')  ?>plugins/daterangepicker/daterangepicker.css">
  <!-- jQuery -->
  <script src="<?= base_url('assets/')  ?>plugins/jquery/jquery.min.js"></script>
  <!-- date-range-picker -->
  <script src="<?= base_url('assets/')  ?>plugins/daterangepicker/daterangepicker.js"></script>
  <style type="text/css">
    .preloader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 9999;
      opacity: 0.5;
      background-color: #fff;
    }

    .loading {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      font: 14px arial;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini pace-primary">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="#" class="btn btn-info btn-sm"><?= $user->nama ?> Login as <?= $user->role == 1  ? 'Administrator' : 'Petugas' ?> <i class="fa fa-user"></i> </a>
          <a href="<?= base_url('Logout') ?>" class="btn btn-danger btn-sm">Logout <i class="fa fa-lock"></i> </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= base_url()  ?>" class="brand-link">
        <img src="<?= base_url('assets/')  ?>dist/img/logo1.png" alt="SIMAS Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">S I M A S</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url('assets/')  ?>dist/img/768px-User_icon_2.svg.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">
              <?= $user->role == 1  ? 'Administrator' : 'Petugas' ?>
            </a>
          </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item">
              <a href="<?= base_url('Dashboard')  ?>" class="nav-link <?= $url === 'Dashboard' ? 'active' : '' ?> ">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <?php if ($user->role == 1) { ?>
              <li class="nav-item">
                <a href="<?= base_url('Master')  ?>" class="nav-link  <?= $url === 'Master' ? 'active' : '' ?> ">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Master Barang
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Upload')  ?>" class="nav-link <?= $url === 'Upload' ? 'active' : '' ?> ">
                  <i class="nav-icon fas fa-upload"></i>
                  <p>
                    Upload Barang Baru
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Laporan')  ?>" class="nav-link <?= $url === 'Laporan' ? 'active' : '' ?> ">
                  <i class="nav-icon fas fa-folder"></i>
                  <p>
                    Laporan
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Form')  ?>" class="nav-link <?= $url === 'Form' ? 'active' : '' ?> ">
                  <i class="nav-icon fas fa-file"></i>
                  <p>
                    Form Peminjaman
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Terpinjam')  ?>" class="nav-link <?= $url === 'Terpinjam' ? 'active' : '' ?> ">
                  <i class="nav-icon fa fa-people-carry"></i>
                  <p>
                    Barang Dipinjamkan <span class="badge badge-primary"><?= $total ?> </span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Manage')  ?>" class="nav-link <?= $url === 'Manage' ? 'active' : '' ?> ">
                  <i class="nav-icon fa fa-cog"></i>
                  <p>
                    Manage User
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('User')  ?>" class="nav-link <?= $url === 'User' ? 'active' : '' ?> ">
                  <i class="nav-icon fa fa-users"></i>
                  <p>
                    User
                  </p>
                </a>
              </li>
            <?php } else if ($user->role == 2) { ?>
              <li class="nav-item">
                <a href="<?= base_url('Form')  ?>" class="nav-link <?= $url === 'Form' ? 'active' : '' ?> ">
                  <i class="nav-icon fas fa-file"></i>
                  <p>
                    Form Peminjaman
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Terpinjam')  ?>" class="nav-link <?= $url === 'Terpinjam' ? 'active' : '' ?> ">
                  <i class="nav-icon fa fa-people-carry"></i>
                  <p>
                    Barang Dipinjamkan <span class="badge badge-primary"><?= $total ?> </span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Laporan')  ?>" class="nav-link <?= $url === 'Laporan' ? 'active' : '' ?> ">
                  <i class="nav-icon fas fa-folder"></i>
                  <p>
                    Laporan
                  </p>
                </a>
              </li>
            <?php } ?>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <?= $contents ?>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.0.0
      </div>
      <strong>Copyright &copy; 2014-2021 </strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->






  <!-- DataTables  & Plugins -->
  <script src="<?= base_url('assets/')  ?>plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/')  ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets/')  ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url('assets/')  ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets/')  ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url('assets/')  ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Select2 -->
  <script src=".<?= base_url('assets/') ?>plugins/select2/js/select2.full.min.js"></script>
  <!-- Bootstrap4 Duallistbox -->
  <script src="<?= base_url('assets/') ?>plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
  <!-- InputMask -->
  <script src="<?= base_url('assets/') ?>plugins/moment/moment.min.js"></script>
  <script src="<?= base_url('assets/') ?>plugins/inputmask/jquery.inputmask.min.js"></script>
  <!-- date-range-picker -->
  <script src="<?= base_url('assets/') ?>plugins/daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap color picker -->
  <script src="<?= base_url('assets/') ?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?= base_url('assets/') ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Bootstrap Switch -->
  <script src="<?= base_url('assets/') ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
  <!-- BS-Stepper -->
  <script src="<?= base_url('assets/') ?>plugins/bs-stepper/js/bs-stepper.min.js"></script>
  <!-- dropzonejs -->
  <script src="<?= base_url('assets/') ?>plugins/dropzone/min/dropzone.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>
  <!-- Page specific script -->
  <!-- SweetAlert2 -->
  <script src="<?= base_url('assets/') ?>plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="<?= base_url('assets/') ?>plugins/toastr/toastr.min.js"></script>
  <script>
    $(function() {
      //Initialize Select2 Elements
      // $('.select2').select2()

      // //Initialize Select2 Elements
      // $('.select2bs4').select2({
      //   theme: 'bootstrap4'
      // })
      //Date picker
      $('#reservationdate,#reservationdate2').datetimepicker({
        format: 'L',
        autoClose: true
      });
      // DropzoneJS Demo Code End
    })
  </script>
</body>
<div class="preloader">
  <div class="loading">
    <div class="spinner-border" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
</div>

</html>