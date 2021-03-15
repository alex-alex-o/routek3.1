<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?=isset($title)?$title.' -'.$this->general_settings['application_name']: $this->general_settings['application_name'] ?></title>
    <!-- Favicon-->
    <link rel="icon" href="<?= base_url($this->general_settings['favicon'])?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?= base_url() ?>public/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Custom Css -->
    <link href="<?= base_url() ?>public/css/style.css" rel="stylesheet">
    <!-- Materialize Css -->
    <link href="<?= base_url() ?>public/css/materialize.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="<?= base_url() ?>public/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="<?= base_url() ?>public/plugins/dropzone/dropzone.css" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="<?= base_url() ?>public/plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

    <!-- Jquery Core Js -->
    <script src="<?= base_url() ?>public/plugins/jquery/jquery.min.js"></script>
</head>

<body class="home-page">
    
    <?php include(VIEWPATH . '/include/navbar.php'); ?>
   
    <section class = "content">
        <div class="row clearfix">
            <div class="col-md-12">
                <?php if (false): ?>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h2>Заказчикам</h2>
                            </div>
                            <div class = "body">
                                <a href="/auth/login" class = "btn btn-primary btn-block btn-lg waves-effect">Вход</a>
                                <a href="/auth/register" class = "btn btn-secondary btn-block btn-lg waves-effect">Регистрация</a>
                                <a href="/auth/forgot_password" class = "btn btn-block btn-lg waves-effect">Забыли пароль?</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                
                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h2>Для Заказчиков <br/>&nbsp;</h2>
                        </div>
                        <div class = "body">
                            <a href="/auth/login" class = "btn btn-primary btn-block btn-lg waves-effect">Вход</a>
                            <a href="/auth/register" class = "btn btn-secondary btn-block btn-lg waves-effect">Регистрация</a>
                            <a href="/auth/forgot_password" class = "btn btn-block btn-lg waves-effect">Забыли пароль?</a>
                        </div>
                    </div>
                </div>                
                
                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h2>Для Производственных партнеров и Проектировщиков</h2>
                        </div>
                        <div class = "body">
                            <a href="/auth/login" class = "btn btn-primary btn-block btn-lg waves-effect">Вход</a>

                            <a href="/auth/company_register" class = "btn btn-secondary btn-block btn-lg waves-effect">Регистрация</a>

                            <a href="/auth/forgot_password" class = "btn btn-block btn-lg waves-effect">Забыли пароль?</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    
    <!-- Jquery Core Js -->
    <script src="<?= base_url() ?>public/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core Js -->
    <script src="<?= base_url() ?>public/plugins/bootstrap/js/bootstrap.js"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="<?= base_url() ?>public/plugins/node-waves/waves.js"></script>
    <!-- Validation Plugin Js -->
    <script src="<?= base_url() ?>public/plugins/jquery-validation/jquery.validate.js"></script>

    <script type="text/javascript" src="/public/plugins/jsmodeler/three.min.js"></script>
    <script type="text/javascript" src="/public/plugins/jsmodeler/jsmodeler.js"></script>
    <script type="text/javascript" src="/public/plugins/jsmodeler/jsmodeler.ext.three.js"></script>

    <script type="text/javascript" src="/public/plugins/cadviewer/floatingdialog.js"></script>
    <script type="text/javascript" src="/public/plugins/cadviewer/importerviewer.js"></script>
    <script type="text/javascript" src="/public/plugins/cadviewer/importermenu.js"></script>
    <script type="text/javascript" src="/public/plugins/cadviewer/importerapp.js"></script>
    
    <!-- Jquery Spinner Plugin Js -->
    <script src="<?= base_url() ?>public/plugins/jquery-spinner/js/jquery.spinner.js"></script>
    
    <script>
        $(document).ready(function () {
            var importerApp = new ImporterApp ();
            importerApp.Init ();

            function updateToken(name, hash) {
                $("input[name='" + name + "']").each(function() {
                    $( "input[name='" + name + "']" ).val( hash );
                });
            }
            
//            Dropzone.options.myDropzone = {
//                acceptedFiles: ".stl, .obj",
//                init: function() {
//                    this.on("complete", function(file) {
//                        this.removeFile(file);
//                    });        
//                    this.on('success', function() {
//			if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
//                            // console.log(this.getQueuedFiles());
//			}
//                    });
//                },
//                success: function () {
//                    // var fileInput = document.getElementById ('file');
//                    importerApp.ProcessFiles (this.getAcceptedFiles(), false);
//                }
//            };
            
            $(".cost").on("change", function() {
                $.ajax({
                    method:   "POST",
                    dataType: "json",
                    url:      "<?php echo site_url() . 'home/get_cost' ?>",
                    data: {"material_id" : this.value, '<?php echo $this->security->get_csrf_token_name();?>' : $("input[name='<?php echo $this->security->get_csrf_token_name();?>'").val()} 
                })
                .done(function( data ) {
                    $("#cost").val($("#volume").val() * data.cost * $("#quantity").val());
                    updateToken(data.csrfName, data.csrfHash);
                });
                
            });
        });
    </script>
</body>

</html>
