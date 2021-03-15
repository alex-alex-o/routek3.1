<!DOCTYPE html>
<html>

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Routek Выбор модели</title>
   <link rel="stylesheet" href="<?= base_url()?>public/css/normalize.css">

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
      integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <!-- Material Design Bootstrap -->
   <link rel="stylesheet" href="<?= base_url()?>public/css/style.css">
   <link rel="stylesheet" href="<?= base_url()?>public/css/select-model.css">
</head>

<body class="home-page">
    <?php if ($this->session->userdata("role") !== null): ?>
        <?php include(VIEWPATH . '/include/registered_navbar.php'); ?>
    <?php else: ?>
        <?php include(VIEWPATH . '/include/unregistered_navbar.php'); ?>
    <?php endif; ?>

    <main style="margin-top: 71px;" class="py-4">
        <div class="container">

            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div class="row g-3">
                        <!-- Слайдер -->
                        <div class="col-md-12">
                            <?php if ($orderTypeID == 1): ?>
                                <?php $this->load->view('partials/home/engeneering'); ?>
                            <?php else: ?>
                                <?php $this->load->view('partials/home/production'); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
              
                <div class="col-md-2">
                </div>
            </div>
        </div>
    </main>
    
    <script src="<?= base_url() ?>public/libs/jquery/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url() ?>public/js/waves.min.js"></script>
    <script src="<?= base_url() ?>public/js/main.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"
       integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD"
       crossorigin="anonymous">
    </script>
    
</body>

</html>
