
<!DOCTYPE html>
<html>

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Routek Выбор модели</title>
   <link rel="stylesheet" href="<?= base_url()?>public/css/normalize.css">

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
      integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
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
                        <!-- Карточка детали -->
                        <div class="col-md-12">
                           <div class="card model-slide">
                               <div class="card-body text-center">
                                    <h5 class="card-title mb-3">Спасибо за заказ</h5>

                                    <div class="my-4">
                                       <h6>В ближайшее время наш менеджер свяжется с вами!</h6>
                                    </div>

                                    <div class="card-body d-flex justify-content-between text-right">
                                         <span></span>
                                         <a class="btn btn-success mr-3" type="button" href = "/home/index">Сделать новый заказ</a>
                                         <div class="d-flex flex-wrap">
                                             
                                             <span></span>
                                         </div>
                                    </div>
                                </div>
                           </div>

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
</body>

</html>

