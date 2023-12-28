<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; ?></title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url(); ?>/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/plugins/ekko-lightbox/ekko-lightbox.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <?= $this->include('templates/navbar'); ?>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  
  <?= $this->renderSection('content'); ?>
  
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
   <!-- Main Footer -->
   <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<script src="<?= base_url(); ?>/plugins/jquery/jquery.min.js"></script>

<script src="<?= base_url(); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>/dist/js/pages/dashboard.js"></script>
<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>/dist/js/adminlte.min.js"></script>
<script src="<?= base_url(); ?>/plugins/filterizr/jquery.filterizr.min.js"></script>
<!-- AdminLTE for demo purposes -->
</body>
</html>
