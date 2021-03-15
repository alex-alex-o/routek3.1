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
    <?php echo form_open(base_url('auth/login'), 'class="form-signin"'); ?>
        <img class="mb-2" src="<?= base_url(); ?>/public/img/routek-logo-white.svg" alt="Routek logo">
        <h1 class="h4 mb-3 font-weight-light">Вход в личный кабинет</h1>
        <label for="email" class="sr-only">E-mail</label>
        <input type="email" class="form-control  mb-3" name="email" value="<?=set_value('email');?>" placeholder="Email" required autofocus>
        
        <label for="password" class="sr-only" >Пароль</label>
        <input type="password" class="form-control  mb-3" name="password" value="<?=set_value('password');?>" placeholder="Пароль" required>
        
        <div class="d-flex justify-content-between">
            <div class="custom-control custom-checkbox mb-4">
                <input class="mr-2 checkbox-form-signin" type="checkbox"  id="rememberme">
                <label for="rememberme" class="text-light checkbox-form-signin">Запомнить меня</label>
            </div>
            <a href="<?= base_url('auth/forgot_password'); ?>">Забыли пароль?</a>
        </div>

        <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block mb-4" value = "Войти" />
        <a class="nav-link" href="<?= base_url('auth/register'); ?>">Зарегистрироваться</a>
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
</body>

</html>

<?php if (false): ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title><?=isset($title)?$title:'Вход - Routek 2.0' ?></title>
        <!-- Favicon-->
        <link rel="icon" href="<?= base_url() ?>public/favicon.ico" type="image/x-icon">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <!-- Bootstrap Core Css -->
        <link href="<?= base_url() ?>/public/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
        <!-- Waves Effect Css -->
        <link href="<?= base_url() ?>/public/plugins/node-waves/waves.css" rel="stylesheet" />
        <!-- Animation Css -->
        <link href="<?= base_url() ?>/public/plugins/animate-css/animate.css" rel="stylesheet" />
        <!-- Materialize Css -->
        <link href="<?= base_url() ?>/public/css/materialize.css" rel="stylesheet">
        <!-- Custom Css -->
        <link href="<?= base_url() ?>/public/css/style.css" rel="stylesheet">

        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>

    <body class="login-page">
        <div class="login-box">
            <div class="logo">
                <a href="javascript:void(0);">Routek 2.0</a>
            </div>

            <?php if(isset($msg) || validation_errors() !== ''): ?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                    <?= validation_errors();?>
                    <?= isset($msg)? $msg: ''; ?>
                </div>
            <?php endif; ?>

            <?php if($this->session->flashdata('warning')): ?>
                 <div class="alert alert-warning">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                  <?=$this->session->flashdata('warning')?>
                </div>
            <?php endif; ?>

            <?php if($this->session->flashdata('success')): ?>
                  <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                    <?=$this->session->flashdata('success')?>
                  </div>
            <?php endif; ?>

            <div class="card">
                <div class="body">
                    <?php echo form_open(base_url('auth/login'), 'class="login-form" '); ?>
                        <div class="msg">Вход</div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input type="text" class="form-control" name="email" value="<?=set_value('email');?>" placeholder="Email" required autofocus>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" value="<?=set_value('password');?>" placeholder="Пароль" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7">
                                <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                                <label for="rememberme">Запомнить</label>
                            </div>
                            <div class="col-xs-5 text-right">
                                <a  href="<?= base_url('auth/forgot_password'); ?>">Забыли пароль?</a>
                            </div>
                        </div>

                        <?php if($this->recaptcha->_status): ?>
                        <div class="row">
                            <div class="col-xs-12">
                                <?= $this->recaptcha->getWidget(); ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="row">
                            <div class="col-xs-12">
                                <input type="submit" name="submit" id="submit" class="btn btn-block btn-success waves-effect" value="Вход">
                            </div>
                        </div>
                        <div class="m-t-25 align-center">
                            <a href="<?= base_url('auth/register'); ?>">Зарегистрироваться</a>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>

        <!-- Jquery Core Js -->
        <script src="<?= base_url() ?>/public/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap Core Js -->
        <script src="<?= base_url() ?>/public/plugins/bootstrap/js/bootstrap.js"></script>
        <!-- Waves Effect Plugin Js -->
        <script src="<?= base_url() ?>/public/plugins/node-waves/waves.js"></script>
        <!-- Validation Plugin Js -->
        <script src="<?= base_url() ?>/public/plugins/jquery-validation/jquery.validate.js"></script>
        <!-- Custom Js -->
        <script src="<?= base_url() ?>/public/js/admin.js"></script>
        <script src="<?= base_url() ?>/public/js/pages/examples/sign-in.js"></script>
        <script src="<?= base_url() ?>/public/js/required.js"></script>
       <!--- <script src="<?= base_url() ?>public/js/check_form.js"></script> !--->
    </body>

    </html>
<?php endif; ?>