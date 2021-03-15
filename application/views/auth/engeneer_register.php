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
        <div class="logo">
            <a href="javascript:void(0);">Routek 2.0</a>
        </div>
        <?php if(isset($msg) || validation_errors() !== ''): ?>
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa-warning"></i> Alert!</h4>
                <?= validation_errors();?>
                <?= isset($msg)? $msg: ''; ?>
            </div>
        <?php endif; ?> 
        <div class="card">
            <div class="body">
                <?php echo form_open(base_url('auth/engeneer_register'), 'class="login-form" '); ?>
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
                            <input type="text" class="form-control" name="company" placeholder="Название компании(Необязательно)" autofocus>
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">phone</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="phone" placeholder="Телефон" required autofocus>
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
                        
                    <?php if (false): ?>
                        <div class="form-group">
                            <input type="checkbox" name="is_free_medic_construct" id="is_free_medic_construct" class="filled-in chk-col-pink">
                            <label for="is_free_medic_construct">Могу разработать модель</label>
                        </div>
                    <?php endif; ?>
                    
                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                        <label for="terms">Я прочитал и согласен с <a target="_blank" href="https://routek.tech/doc/politics.html">условиями использования</a>.</label>
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
</body>

</html>