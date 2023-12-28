<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/plugins/fullcalendar/main.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-5iZ5l2a2Aa4/GzLuO8OKrUvFiSNruENYZuA8bfxiMTIsMIVnuny+2K2PDmO4t0JXpQ1fc/aZl6eEtOOui7psVjA==" crossorigin="anonymous" />
  <!-- FullCalendar CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />

  <!-- FullCalendar JS -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>


  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url(); ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url(); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url(); ?>/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/dist/css/tanggal.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url(); ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url(); ?>/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url(); ?>/plugins/summernote/summernote-bs4.min.css">
  <style>
    .bg-dashboard {
      background-color: #DBEADD;
    }

    .tulisan {
      color: #0D5329;
    }

    .bgtopbar {
      color: #D9D9D9;
    }

    .aktif {
      background-color: #D9D9D9;
    }

    .gradient-custom-2 {
      /* fallback for old browsers */
      background: #7e40f6;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right,
          rgba(126, 64, 246, 1),
          rgba(80, 139, 252, 1));

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to right,
          rgba(126, 64, 246, 1),
          rgba(80, 139, 252, 1));
    }

    .mask-custom {
      background: rgba(24, 24, 16, 0.2);
      border-radius: 2em;
      backdrop-filter: blur(25px);
      border: 2px solid rgba(255, 255, 255, 0.05);
      background-clip: padding-box;
      box-shadow: 10px 10px 10px rgba(46, 54, 68, 0.03);
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <?= $this->include('templates/topbar'); ?>
    <!-- kodingan file topbar yang berada dalam folder templates/ file topbar -->

    <?= $this->include('templates/sidebar'); ?>
    <!-- kodingan file sidegbar yang berada dalam folder templates/ file sidebar -->

    <div class="content-wrapper">
      <?= $this->renderSection('page-content'); ?>

    </div>



    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="/login/logout">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <script src="<?= base_url(); ?>/plugins/moment/moment.min.js"></script>
  <script src="<?= base_url(); ?>/plugins/fullcalendar/main.js"></script>

  <!-- jQuery -->
  <script src="<?= base_url(); ?>/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= base_url(); ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url(); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="<?= base_url(); ?>/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="<?= base_url(); ?>/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="<?= base_url(); ?>/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?= base_url(); ?>/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?= base_url(); ?>/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?= base_url(); ?>/plugins/moment/moment.min.js"></script>
  <script src="<?= base_url(); ?>/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?= base_url(); ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="<?= base_url(); ?>/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?= base_url(); ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url(); ?>/dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?= base_url(); ?>/dist/js/pages/dashboard.js"></script>
</body>

</html>