
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

    <?php if(isset($msg) || validation_errors() !== ''): ?>
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa-warning"></i> Внимание!</h4>
            <?= validation_errors();?>
            <?= isset($msg)? $msg: ''; ?>
        </div>
    <?php endif; ?> 
    
    <main style="margin-top: 71px;" class="py-4">
        <div class="container">

            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <!-- Слайд с выбором файла -->
                            <?php echo form_open_multipart(base_url("user/shipping/$publicID"), '');?>
                                <!-- Слайд с выбором технологии -->
                                <div class = "card">
                                    <div class="card-body text-center">
                                       <h5 class="card-title mb-3">Выберите адрес доставки из сохраненных или добавьте новый</h5>
                                    </div>
                                    
                                    <?php $i = 0; ?>
                                    <?php foreach($shippings as $shipping): ?>

                                        <?php if ($i == 0): ?>
                                            <div class="row justify-content-center mb-3">
                                        <?php endif; ?>

                                        <div class="col-4">
                                            <input type="radio" class="btn-check" name="shipping_info_id" value="<?php echo $shipping["id"]; ?>" id="<?php echo $shipping["id"]; ?>" autocomplete="off" checked="checked">
                                           <label class="btn btn-outline-secondary d-block" for="<?php echo $shipping["id"]; ?>">
                                               <b><?php echo $shipping["last_name"]; ?> <?php echo $shipping["first_name"]; ?> <?php echo $shipping["middle_name"]; ?> </b><br />
                                               <?php echo $shipping["city"]; ?> <?php echo $shipping["street"]; ?> <?php echo $shipping["house"]; ?> <?php echo $shipping["office"]; ?><br />
                                               <?php echo $shipping["phone"]; ?> <?php echo $shipping["email"]; ?>
                                           </label>
                                        </div>

                                        <?php $i ++; ?>
                                        <?php if ($i == 2): ?>
                                            </div>
                                            <?php $i = 0; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>

                                    <?php if ($i > 0 && $i < 2): ?>
                                        </div>
                                    <?php endif; ?>   
                                
                                    <div class="card-body d-flex justify-content-between">
                                        <span></span>
                                        <div class="d-flex flex-wrap">
                                            <button class="btn btn-success mr-3" type="button" data-toggle="modal" data-target="#detailEdit">Добавить адрес</button>
                                            <input type = "submit" class="btn btn-primary" value = "Отправить на расчет" />
                                        </div>
                                    </div>

                                </div>
                            <?php echo form_close(); ?>

                        </div>

                    </div>
                </div>

                <div class="col-md-2">
                </div>

            </div>

        </div>

    </main>
    
    <div class="modal fade" id="detailEdit" tabindex="-1" aria-labelledby="detailEdit" aria-hidden="true">
        <div class="modal-dialog modal-lg">
           <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ввдедите адрес доставки</h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        
                        <?php echo form_open_multipart(base_url("user/shipping/add/$publicID"), 'id = "shipping-form"');?>
                            <div class="col-md-2">
                            </div>
                            <input type = "hidden" id = "public_id" name = "public_id"  value = ""/>
                            <div class="col-md-12">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <!-- Карточка ввода адреса  -->
                                        <div class = "row">
                                            <div class="col-sm-4 mb-2">
                                                <label class="form-label h6" for="LastName">Фамилия</label>
                                                <input class="form-control" type = "text" id = "recipient" required="true" name = "last_name" placeholder = "Фамилия">
                                            </div>
                                            <div class="col-sm-4 mb-2">
                                                <label class="form-label h6" for="FirstName">Имя</label>
                                                <input class="form-control" type = "text" id = "recipient" required="true" name = "first_name" placeholder = "Имя">
                                            </div>
                                            <div class="col-sm-4 mb-2">
                                                <label class="form-label h6" for="MiddleName">Отчество</label>
                                                <input class="form-control" type = "text" id = "recipient" required="true" name = "middle_name" placeholder = "Отчество">
                                            </div>

                                            <div class="col-sm-4 mb-2">
                                                <label class="form-label h6" for="phone">Телефон</label>
                                                <input class="form-control" type = "text" id = "phone" name = "phone" placeholder = "Телефон" >
                                            </div>

                                            <div class="col-sm-4 mb-2">
                                                <label class="form-label h6" for="email">Email*</label>
                                                <input class="form-control" type = "text" id = "email" required="true"  name = "email" placeholder = "Email" >
                                            </div>

                                            <div class="col-sm-5 mb-2">
                                                <label class="form-label h6" for="city">Город *</label>
                                                <input class="form-control" type = "text" id = "city"   name = "city"  required="true"  placeholder = "Город" value = "">
                                            </div>

                                            <div class="col-sm-7 mb-2">
                                                <label class="form-label h6" for="street">Улица *</label>
                                                <input class="form-control" type = "text" id = "street" name = "street" required="true" placeholder = "Улица" value = "">
                                            </div>

                                            <div class="col-sm-4 mb-2">
                                                <label class="form-label h6" for="house">Дом *</label>
                                                <input class="form-control" type = "text" id = "house"  name = "house" required="true" placeholder = "Дом" value = "">
                                            </div>

                                            <div class="col-sm-4 mb-2">
                                                <label class="form-label h6" for="office">Офис/Квартира</label>
                                                <input class="form-control" type = "text" id = "office" name = "office" placeholder = "Офис/Квартира" value = "">
                                            </div>
                                        </div>

                                        <div class="card-body d-flex justify-content-between  text-right">
                                            <span></span>
                                            <div class="d-flex flex-wrap">
                                                <input type = "submit" class="btn btn-primary" value = "Добавить адрес" />
                                            </div>
                                        </div>   
                                    </div>
                                </div>
                            </div>
                        <?php echo form_close(); ?>                        
                    </div>
                </div>
             </div>
        </div>
    </div>
    
    <script src="<?= base_url() ?>public/libs/jquery/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url() ?>public/js/waves.min.js"></script>
    <script src="<?= base_url() ?>public/js/main.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"
       integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD"
       crossorigin="anonymous"></script>
       
</body>

</html>
