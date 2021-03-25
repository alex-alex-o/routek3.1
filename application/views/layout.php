<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Routek</title>
    <!-- Routek icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url()?>public/img/favicons/favicon-16x16.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?= base_url()?>public/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="<?= base_url()?>public/css/mdb.css">
    <link rel="stylesheet" href="<?= base_url()?>public/css/dashboard.css">
    
    <!-- jQuery -->
    <script type="text/javascript" src="<?= base_url()?>public/js/jquery.min.js"></script>

</head>

<body>

    <!-- Start navbar -->
    <?php if ($this->session->userdata("role") !== null): ?>
        <?php include('include/registered_navbar.php'); ?>
    <?php else: ?>
        <?php include('include/unregistered_navbar.php'); ?>
    <?php endif; ?>
    
    <div class="container-fluid">
      <div class="row">
          <!-- Start sidebar -->
          <?php if ($this->session->userdata("role") == 1): ?>
              <?php include('include/admin_sidebar.php'); ?>
          <?php elseif ($this->session->userdata("role") == 2): ?>
              <?php include('include/company_sidebar.php'); ?>
          <?php elseif ($this->session->userdata("role") == 5): ?>
              <?php include('include/engeneer_sidebar.php'); ?>
          <?php else: ?>
              <?php include('include/user_sidebar.php'); ?>
          <?php endif; ?>
          <!-- End sidebar -->


          <!-- Start main-page -->

          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 grey lighten-5">
              <?php $this->load->view($view);?>
          </main>
      </div>
    </div>

    <!-- Bootstrap tooltips -->
    <script src="<?= base_url()?>public/js/admin.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script src="<?= base_url()?>public/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script src="<?= base_url()?>public/js/mdb.min.js"></script>
    <!-- Your custom scripts (optional) -->
    <script src="<?= base_url()?>public/js/wow.min.js"></script>
    
   
    <script>
      new WOW().init();
    </script>
    <!-- <script src="js/dashboard.js"></script> -->
</body>

</html>