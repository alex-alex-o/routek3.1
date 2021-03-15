
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

    <?php if(isset($msg) || validation_errors() !== ''): ?>
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa-warning"></i> Внимание!</h4>
            <?= validation_errors();?>
            <?= isset($msg)? $msg: ''; ?>
        </div>
    <?php endif; ?> 
    
    <?php echo form_open_multipart(base_url('home/shipping'), '');?>
    <main style="margin-top: 71px;" class="py-4">
        <div class="container">
            <div class="row mt-3">
               <div class="col-md-2">
               </div>
               <div class="col-md-8">
                    <div class="row g-3">
                        <div class="col-md-12">

                            <!-- Карточка ввода адреса  -->
                            <div class = "card model-slide">
                                <div class="card-body text-center">
                                    <h5 class="card-title mb-3">Ввдедите адрес доставки</h5>
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

                                </div>

                                <div class="card-body d-flex justify-content-between  text-right">
                                    <span></span>
                                    <div class="d-flex flex-wrap">
                                        <input type = "submit" class="btn btn-primary" value = "Отправить на расчет" />
                                    </div>
                                </div>   
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
        
        
    <div class="modal fade" id="detailEdit" tabindex="-1" aria-labelledby="detailEdit" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
           <div class="modal-content">
                <div class="modal-header">
                   <h4 class="modal-title">Редактировать</h4>
                   <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <div class="container">
                        <input type = "hidden" id = "public_id" name = "public_id"  value = "<?php echo $order["public_id"]; ?>"/>
                        <div class="row bg-white mb-3 p-3 rounded-lg">
                            <div class="col-lg-6">
                                 <div class="row">
                                     <div class="col-lg-12 mb-3">
                                        <label class="form-label h6" for="detail-input1">Загруженные модели</label>
                                     </div>

                                     <div class="col-12 mb-3">
                                         <?php /* <img style="width: 100%;" class="" src="<?php echo base_url();?>/public/img/lc/detail.jpg" alt="detail-plhr"> */; ?>
                                         <canvas id = "modelcanvas" height = "500" width="400"></canvas>
                    `
                                     </div>
                                 </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                       <label class="form-label h6" for="technology_id">Технология</label>
                                        <select class="form-control show-tick" id = "technology_id" name = "technology_id">
                                            <?php foreach($technologies as $technology): ?>
                                                <?php if (!empty($technology['name'])): ?>
                                                    <option value = "<?= $technology['id']; ?>" <?= ($technology['id'] == $order["technology_id"] ? "selected" : "") ?> ><?= $technology['name']; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>                                       
                                    </div>
                                    <div class="col-12 mb-3">
                                       <label class="form-label h6" for="material_id">Материал</label>
                                        <select class="form-control show-tick" id = "material_id" name = "material_id">
                                            <?php foreach($materials as $material): ?>
                                                <?php if (!empty($material['name'])): ?>
                                                    <option value = "<?= $material['id']; ?>"  <?= ($material['id'] == $order["material_id"] ? "selected" : "") ?>><?= $material['name']; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>                                       
                                    </div>
                                    
                                    <div class="col-sm-6 mb-3">
                                       <label class="form-label h6" for="color_id">Цвет</label>
                                        <select class="form-control show-tick" id = "color_id" name = "color_id">
                                            <?php foreach($colors as $color): ?>
                                                <?php if (!empty($color['name'])): ?>
                                                    <option value = "<?= $color['id']; ?>"  <?= ($color['id'] == $order["color_id"] ? "selected" : "") ?>><?= $color['name']; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>                                
                                    </div>
                                    
                                    <div class="col-sm-6 mb-3">
                                       <label class="form-label h6" for="quantity">Количество</label>
                                       <input class="form-control" id="quantity" type="text" name = "quantity" value = "<?php echo $order["quantity"]; ?>" />
                                    </div>
                                    
                                    <div class="col-sm-6 mb-3">
                                       <label class="form-label h6" for="filling">Заполнение (%)</label>
                                       <input class="form-control" id="filling" type="text" name = "filling" value = "<?php echo $order["filling"]; ?>" />
                                    </div>
                                    
                                    <div class="col-sm-6 mb-3">
                                       <label class="form-label h6" for="quality_id">Точность (мм)</label>
                                        <select class="form-control show-tick" id = "quality_id" name = "quality_id">
                                            <?php foreach($qualities as $quality): ?>
                                                <?php if (!empty($quality['value'])): ?>
                                                    <option value = "<?= $quality['id']; ?>"  <?= ($quality['id'] == $order["quality_id"] ? "selected" : "") ?>><?= $quality['value']; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>  
                                    </div>


                                    <div class="col-lg-12 mb-5">
                                       <label class="form-label h6" for="description">Комментарии</label>
                                       <textarea class="form-control" type="text" id = "description" name = "description" rows="4"></textarea>
                                    </div>

                                    <div class="text-right">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                       <button type="button" class="btn btn-primary" data-dismiss="modal">Сохранить изменения</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                   </div>

                </div>
             </div>
        </div>
    </div>
        
    <?php echo form_close(); ?>
    
    <script src="<?= base_url() ?>public/libs/jquery/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url() ?>public/js/waves.min.js"></script>
    <script src="<?= base_url() ?>public/js/main.js"></script>
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
       
    </script>
    
    
    <?php if (false): ?>
        <!--- chat app --->
       <script id="chat-24-widget-code" type="text/javascript">!function (e) { var t = {}; function n(c) { if (t[c]) return t[c].exports; var o = t[c] = {i: c, l: !1, exports: {}}; return e[c].call(o.exports, o, o.exports, n), o.l = !0, o.exports } n.m = e, n.c = t, n.d = function (e, t, c) { n.o(e, t) || Object.defineProperty(e, t, {configurable: !1, enumerable: !0, get: c}) }, n.n = function (e) { var t = e && e.__esModule ? function () { return e.default } : function () { return e }; return n.d(t, "a", t), t }, n.o = function (e, t) { return Object.prototype.hasOwnProperty.call(e, t) }, n.p = "/packs/", n(n.s = 0) }([function (e, t) { window.chat24WidgetCanRun = true, window.chat24WidgetCanRun && function () { window.chat24ID = "5a42308c9c5a7bfc6f018c7aefaa66ca", window.chat24io_lang = "ru"; var e = "https://livechat.chat2desk.com", t = document.createElement("script"); t.type = "text/javascript", t.async = !0, fetch(e + "/packs/manifest.json?nocache=" + (new Date()).getTime()).then(function (e) { return e.json() }).then(function (n) { t.src = e + n["widget.js"]; var c = document.getElementsByTagName("script")[0]; c ? c.parentNode.insertBefore(t, c) : document.documentElement.firstChild.appendChild(t); var o = document.createElement("link"); o.href = e + n["widget.css"], o.rel = "stylesheet", o.id = "chat-24-io-stylesheet", o.type = "text/css", document.getElementById("chat-24-io-stylesheet") || document.getElementsByTagName("head")[0].appendChild(o); }) }() }]);</script>
    <?php endif; ?>
   
</body>

</html>

