
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
                                    <h5 class="card-title mb-3">Запрос на расчет цены</h5>
                                    <div class="d-flex flex-wrap px-3 py-1 justify-content-between">

                                        <div class="my-2">
                                            <img src="<?php echo $order['snapshot']; ?>" height="96" width="96" alt="Изображение заказа" />
                                        </div>

                                        <div class="my-4">
                                           <p class="mb-1 ">Название</p>
                                           <h6><?php echo $order["name"];?></h6>
                                           <p class="mb-1">Цвет</p>
                                           <h6 class = "color_id"><?php echo $order["color"];?></h6>
                                        </div>

                                        <div class="my-4">
                                           <p class="mb-1">Технология</p>
                                           <h6 class = "technology_id"><?php echo $order["technology"];?></h6>

                                           <p class="mb-1">Материал</p>
                                           <h6 class = "material_id"><?php echo $order["material"];?></h6>
                                        </div>

                                        <div class="my-4">
                                           <p class="mb-1">Точность</p>
                                           <h6 class = "quality_id"><?php echo $order["quality"];?></h6>
                                           <p class="mb-1">Заполнение</p>
                                           <h6 class = "filling"><?php echo $order["filling"]; ?>%</h6>
                                        </div>

                                        <div class="my-4">
                                           <p class="mb-1">Дата подачи</p>
                                           <h6><?php echo $order["created_at"];?></h6>
                                           <p class="mb-1">Габариты (мм3)</p>
                                           <h6><?php echo $order["size_x"];?>x<?php echo $order["size_y"];?>x<?php echo $order["size_z"];?></h6>
                                        </div>

                                    </div>

                               </div>

                               <div class="card-body d-flex justify-content-between text-right">
                                    <span></span>
                                    <div class="d-flex flex-wrap">
                                        <span></span>
                                        <button class="btn btn-success mr-3" type="button" data-toggle="modal" data-target="#detailEdit">Изменить параметры печати</button>
                                    </div>
                               </div>
                           </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                </div>

            </div>
            
            
            <?php if (!$this->session->userdata("user_id")): ?>
                <div id = "contactsPanel" class="row mt-3">
                   <div class="col-md-2">
                   </div>
                   <div class="col-md-8">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <!-- Карточка персональных данных  -->
                                <div id = "registeredPanel" class = "card model-slide" style = "display: none;">
                                    <div class="card-body text-center">
                                        <h5 class="card-title mb-3">Контактная информация</h5>

                                        <div class = "row">
                                            <div class="col-sm-4 mb-2">
                                                <label class="switch">
                                                  <input type="checkbox" class = "alreadyRegistered" id = "registered" name = "registered" checked>
                                                  <span class="slider round"></span>
                                                </label>
                                                <label class="form-label">Я уже зарегистрирован</label>
                                            </div>
                                        </div>

                                        <?php echo form_open(base_url("auth/login"), array("id" => "loginForm"), array("url" => "home/order/$publicID"));?>
                                            <!-- <div id = "registeredPanel" class = "row" style = "display: none;"> -->
                                            <div class = "row">
                                                <div class="col-sm-5 mb-2">
                                                    <label class="form-label h6" for="login">Email</label>
                                                    <input class="form-control" type = "email" id = "login" required="true" name = "email" value = "" placeholder = "Email для входа">
                                                </div>                                            

                                                <div class="col-sm-5 mb-2">
                                                    <label class="form-label h6" for="login">Пароль</label>
                                                    <input class="form-control" type = "password" id = "pass" required="true" name = "password" value = "" placeholder = "Пароль">
                                                </div>                                            

                                                <div class="col-sm-2 mb-2 mt-4">
                                                    <input type = "submit" name ="submit" class="btn btn-primary" value = "Войти" />
                                                </div>

                                            </div>
                                        <?php echo form_close(); ?>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            
                <?php echo form_open_multipart(base_url("home/order/$publicID"), '');?>
                    <div id = "contactsPanel" class="row mt-3">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-8">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <!-- Карточка персональных данных  -->
                                    <div id = "unregisteredPanel" class = "card model-slide">
                                        <div class="card-body text-center">
                                            <h5 class="card-title mb-3">Контактная информация</h5>

                                            <div class = "row">
                                                <div class="col-sm-4 mb-2">
                                                    <label class="switch">
                                                      <input type="checkbox" class = "alreadyRegistered" id = "notRegistered" name = "notRegistered">
                                                      <span class="slider round"></span>
                                                    </label>
                                                    <label class="form-label">Я уже зарегистрирован</label>
                                                </div>
                                            </div>

                                            <div class = "row">

                                                <div class="col-sm-4 mb-2">
                                                    <label class="form-label h6" for="recipient">ФИО</label>
                                                    <input class="form-control" type = "text" id = "name" required="true" name = "name" value = "" placeholder = "Пользователь">
                                                </div>                                            

                                                <div class="col-sm-4 mb-2">
                                                    <label class="form-label h6" for="phone">Телефон</label>
                                                    <input class="form-control" type = "text" id = "phone" name = "phone" placeholder = "Телефон" value = "" >
                                                </div>

                                                <div class="col-sm-4 mb-2">
                                                    <label class="form-label h6" for="email">Email*</label>
                                                    <input class="form-control" type = "text" id = "email" required="true"  name = "email" placeholder = "Email" value = "" >
                                                </div>
                                                <div class="col-sm-12 mb-2 mt-2">

                                                    <input type = "checkbox" name = "registerme" id = "registerme" checked/>
                                                    <label for = "register">Зарегистрировать меня</label>
                                                </div>
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <!-- Доставка -->
                    <div id = "addressPanel" class="row mt-3 ">
                       <div class="col-md-2">
                       </div>
                       <div class="col-md-8">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <!-- Карточка ввода адреса  -->
                                    <div class = "card model-slide">
                                        <div class="card-body text-center">
                                            <h5 class="card-title mb-3">Информация о доставке</h5>
                                            <div class = "row">
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

                                                <div class="col-sm-4 mb-2">
                                                    <label class="form-label h6" for="recipient">ФИО получателя</label>
                                                    <input class="form-control" type = "text" id = "recipient" required="true" name = "recipient" value = "" placeholder = "Получатель">
                                                </div>                                            
                                            </div>

                                        </div>

                                        <div class="card-body d-flex justify-content-between text-right">
                                            <span></span>
                                            <div class="d-flex flex-wrap">
                                                <span></span>
                                                <input type = "submit" class="btn btn-primary" value = "Отправить на расчет" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
            
                <?php echo form_close(); ?>
                    
            <?php else: ?>

                <!-- Панель выбора адреса из списка сохраненных для зарегистрированных пользователей -->
                <?php $this->load->view('partials/shipping/adresses'); ?>
                
                <!-- Всплывающая форма добавления адреса-->
                <?php $this->load->view('partials/shipping/add_form'); ?>
            <?php endif; ?>
                
            <!-- Форма редактирования заказа-->
            <?php $this->load->view('partials/order/edit_form'); ?>
            
        </div>

    </main>
       
    
    
    <script src="<?= base_url() ?>public/libs/jquery/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url() ?>public/js/waves.min.js"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"
       integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD"
       crossorigin="anonymous"></script>

    <script type="text/javascript" src="/public/plugins/jsmodeler/three.min.js"></script>
    <script type="text/javascript" src="/public/plugins/jsmodeler/jsmodeler.js"></script>
    <script type="text/javascript" src="/public/plugins/jsmodeler/jsmodeler.ext.three.js"></script>

    <script type="text/javascript" src="/public/plugins/cadviewer/floatingdialog.js"></script>
    <script type="text/javascript" src="/public/plugins/cadviewer/importerviewer.js"></script>
    <script type="text/javascript" src="/public/plugins/cadviewer/importermenu.js"></script>
    <script type="text/javascript" src="/public/plugins/cadviewer/importerapp.js"></script>

    <!-- Input Mask Plugin Js -->
    <script src="<?= base_url() ?>public/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
    
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            <?php if (isset($firstModelUrl) && !empty($firstModelUrl)): ?>
                var importerApp = new ImporterApp ();
                importerApp.Init ();
                files = ["<?= $firstModelUrl; ?>"];
                importerApp.LoadFilesFromUrl (files, false);
            <?php endif; ?>
                
            changeValue("technology_id");
            changeValue("material_id");
            changeValue("quality_id");
            changeValue("color_id");
            changeValue("filling");
            
        });

        function changeValue(field) {
            document.querySelector('#' + field).addEventListener('change', function (e) {
                if(this.type === "text") {
                    document.querySelector('.' + field).innerHTML = this.value;
                } else {
                    document.querySelector('.' + field).innerHTML = this.options[this.selectedIndex].text;
                }
            });
        }

        document.getElementById('name').addEventListener('change', function (e) {
            document.querySelector('#recipient').value = this.value;
        });

        $('#loginForm').on('submit', function (e) {
            var email = $('#login').val();
            var pass  = $('#pass').val();
            if (email === '' || pass === '') {
                e.preventDefault();
                alert("Неверный Email или пароль!");
            }
            
            $.ajax({
                method:   "POST",
                dataType: "json",
                url:      "<?php echo site_url() . 'auth/check_user' ?>",
                async: false,
                data: {"email" : email, "password" : pass, '<?php echo $this->security->get_csrf_token_name();?>' : $("input[name='<?php echo $this->security->get_csrf_token_name();?>'").val()},
                success: function (response) {
                    if(response.success === false) {
                        alert("Неверный Email или пароль!");
                        e.preventDefault();
                    }
                }
            });
        });
                
        document.querySelectorAll(".alreadyRegistered").forEach(item => item.addEventListener('change', function (e) {
            if (this.checked) {
                document.getElementById('registered').checked = true;
                document.getElementById('notRegistered').checked = false;
                document.getElementById("registeredPanel").style.display = '';
                document.getElementById("unregisteredPanel").style.display = 'none';
                document.getElementById("addressPanel").style.display = 'none';
            } else {
                document.getElementById('registered').checked = true;
                document.getElementById('notRegistered').checked = false;
                document.getElementById("unregisteredPanel").style.display = '';
                document.getElementById("registeredPanel").style.display = 'none';
                document.getElementById("addressPanel").style.display = '';
            }
        }));
        
        $('#phone').inputmask('+9 (999) 999-99-99', { placeholder: '+_ (___) ___-__-__' }); 
        $('#email').inputmask("email");       

        $('#email').on('blur', function(){
            var email = $('#email').val();
            if (email == '') {
                return;
            }
            
            $.ajax({
                method:   "POST",
                dataType: "json",
                url:      "<?php echo site_url() . 'auth/check_email' ?>",
                data: {"email" : email, '<?php echo $this->security->get_csrf_token_name();?>' : $("input[name='<?php echo $this->security->get_csrf_token_name();?>'").val()},
                success: function (response) {
                    if(response.exists === true) {
                        alert("Пользователь с таким email уже существует!");
                    }
                }
            })
        });


    </script>
</body>

</html>

