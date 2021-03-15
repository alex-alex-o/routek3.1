<!doctype html>
<html class="h-100" lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Routek Вход в личный кабинет</title>
    <!-- Routek icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>/public/img/favicons/favicon-16x16.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/css/mdb.min.css">


    <link rel="stylesheet" href="<?= base_url() ?>/public/css/dashboard.css">
</head>

<body class="text-center body-signin">
    <!-- Start form-signin -->
    <?php echo form_open(base_url('auth/company_register'), 'class="form-signin" '); ?>
        <img class="mb-2" src="<?= base_url(); ?>/public/img/routek-logo-white.svg" alt="Routek logo">
        <h1 class="h4 mb-3 font-weight-light">Зарегистрировать компанию</h1>

        <label for="name" class="sr-only">Контактное лицо</label>
        <input type="text" class="form-control  mb-3" name="name" value="<?=set_value('name');?>" placeholder="Контактное лицо" required autofocus>

        <label for="company" class="sr-only">Название компании</label>
        <input type="text" class="form-control  mb-3" name="company" value="<?=set_value('company');?>" placeholder="Название компании (Необязательно)" required autofocus>

        <label for="phone" class="sr-only">Телефон</label>
        <input type="phone" class="form-control  mb-3 phone-number" name="phone" value="<?=set_value('phone');?>" placeholder="Телефон" required autofocus>
        
        <label for="email" class="sr-only">E-mail</label>
        <input type="email" class="form-control  mb-3" name="email" value="<?=set_value('email');?>" placeholder="Email" required autofocus>
        
        <label for="password" class="sr-only" >Пароль</label>
        <input type="password" class="form-control  mb-3" name="password" value="<?=set_value('password');?>" placeholder="Пароль" required>

        <label for="password" class="sr-only" >Подтверждение пароля</label>
        <input type="password" class="form-control  mb-3" name="confirm_password" value="<?=set_value('confirm_password');?>" placeholder="Подтверждение пароля" required>
        
        <div class="form-group">
            <input type="checkbox" name="is_free_medic_production" id="is_free_medic_production" class="filled-in chk-col-pink">
            <label for="is_free_medic_production">Могу произвести изделие.</label>
        </div>

        <div class="form-group">
            <input type="checkbox" name="is_free_medic_construct" id="is_free_medic_construct" class="filled-in chk-col-pink">
            <label for="is_free_medic_construct">Могу разработать модель.</label>
        </div>                    

        <div class="form-group">
            <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
            <label for="terms">Cогласен с <a target="_blank" href="https://routek.tech/doc/politics.html">условиями использования</a>.</label>
        </div>
        
        <div class="d-flex justify-content-between">
            <div class="custom-control custom-checkbox mb-4">
                <input class="mr-2 checkbox-form-signin" type="checkbox"  id="rememberme">
                <label for="rememberme" class="text-light checkbox-form-signin">Запомнить меня</label>
            </div>
            <a href="<?= base_url('auth/forgot_password'); ?>">Забыли пароль?</a>
        </div>

        <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block mb-4" value = "Войти" />
    <?php echo form_close(); ?>
    <!-- End form-signin -->

    <!-- jQuery -->
    <script type="text/javascript" src="<?= base_url() ?>/public/js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?= base_url() ?>/public/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?= base_url() ?>/public/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?= base_url() ?>/public/js/mdb.min.js"></script>
    
    <script src="<?= base_url() ?>public/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
    
    <script>
        $('.phone-number').inputmask('+9 (999) 999-99-99', { placeholder: '+_ (___) ___-__-__' });        
    </script>
    
</body>

</html>

<?php if (false): ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?=isset($title)?$title:'Registration - CI Material Admin' ?></title>
    <!-- Favicon-->
    <link rel="icon" href="<?= base_url() ?>public/favicon.ico" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core Css -->
    <link href="<?= base_url() ?>public/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="<?= base_url() ?>public/plugins/node-waves/waves.css" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="<?= base_url() ?>public/plugins/animate-css/animate.css" rel="stylesheet" />
    <!-- Materialize Css -->
    <link href="<?= base_url() ?>public/css/materialize.css" rel="stylesheet">
    <!-- Custom Css -->
    <link href="<?= base_url() ?>public/css/style.css" rel="stylesheet">
    <!-- Google reCaptcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body class="login-page">
    <div class="login-box">
        <?php if(isset($msg) || validation_errors() !== ''): ?>
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa-warning"></i> Внимание!</h4>
                <?= validation_errors();?>
                <?= isset($msg)? $msg: ''; ?>
            </div>
        <?php endif; ?> 
        <div class="card">
            <div class="body">
                <?php echo form_open(base_url('auth/company_register'), 'class="login-form" '); ?>
                    <div class="msg">Создать аккаунт</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="name" placeholder="Контактное лицо" required autofocus>
                        </div>
                    </div>
                    
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">account_balance</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="company" placeholder="Название компании (Необязательно)" autofocus>
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">phone</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control phone-number" name="phone" placeholder="Телефон" required autofocus>
                        </div>
                    </div>
                    
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="email" placeholder="email" required autofocus>
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">location_city</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="city" placeholder="Город" required autofocus>
                        </div>
                    </div>                    
                    
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Пароль" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="confirm_password" placeholder="Подтверждение пароля" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <input type="checkbox" name="is_free_medic_production" id="is_free_medic_production" class="filled-in chk-col-pink">
                        <label for="is_free_medic_production">Могу произвести изделие.</label>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="is_free_medic_construct" id="is_free_medic_construct" class="filled-in chk-col-pink">
                        <label for="is_free_medic_construct">Могу разработать модель.</label>
                    </div>                    
                    
                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                        <label for="terms">Я согласен с <a target="_blank" href="https://routek.tech/doc/politics.html">условиями использования</a>.</label>
                    </div>
                    <?php if($this->recaptcha->_status): ?>
                    <div class="form-group">
                        <?= $this->recaptcha->getWidget(); ?>
                    </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <input type="submit" name="submit" id="submit" class="btn btn-block btn-success waves-effect" value="Зарегистрироваться">
                        </div>
                    </div>
                    <div class="m-t-25 align-center">
                        <a href="<?= base_url('auth/login'); ?>">Уже есть аккаунт?</a>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    

    <!-- Jquery Core Js -->
    <script src="<?= base_url() ?>public/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core Js -->
    <script src="<?= base_url() ?>public/plugins/bootstrap/js/bootstrap.js"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="<?= base_url() ?>public/plugins/node-waves/waves.js"></script>
    <!-- Validation Plugin Js -->
    <script src="<?= base_url() ?>public/plugins/jquery-validation/jquery.validate.js"></script>
    <!-- Custom Js -->
    <script src="<?= base_url() ?>public/js/admin.js"></script>
    <script src="<?= base_url() ?>public/js/pages/examples/sign-in.js"></script>
    <!-- Input Mask Plugin Js -->
    <script src="<?= base_url() ?>public/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
    
    <script>
        $('.phone-number').inputmask('+9 (999) 999-99-99', { placeholder: '+_ (___) ___-__-__' });        
    </script>

</body>

</html>
<?php endif; ?>