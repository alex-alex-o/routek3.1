
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

    <main style="margin-top: 71px;" class="py-4">
       <div class="container">

          <div class="row">
             <div class="col-md-2">
             </div>
             <div class="col-md-8">
                <div class="row g-3">
                   <!-- Слайдер -->
                   <div class="col-md-12">
                      <!-- Слайд 4 -->
                      <div class="card model-slide">
                         <div class="card-body text-center">
                            <h5 class="card-title mb-3">Запрос на расчет цены</h5>
                            <div class="d-flex flex-wrap px-3 py-1 justify-content-between">
                               <div class="my-2"><img src="<?php echo base_url();?>/public/img/lc/detail-order.jpg" height="96" alt="Изображение заказа">
                               </div>
                               <div class="my-4">
                                  <p class="mb-1 ">Название</p>
                                  <h6>B500-1290 (1)</h6>
                                  <p class="mb-1">Цвет</p>
                                  <h6>Черный</h6>
                               </div>

                               <div class="my-4">
                                  <p class="mb-1">Технология</p>
                                  <h6>PolyJet</h6>
                                  <p class="mb-1">Материал</p>
                                  <h6>ABS</h6>
                               </div>

                               <div class="my-4">
                                  <p class="mb-1">Точность</p>
                                  <h6>Высокое</h6>
                                  <p class="mb-1">Заполнение</p>
                                  <h6>80%</h6>
                               </div>

                               <div class="my-4">
                                  <p class="mb-1">Дата подачи</p>
                                  <h6>22.05.2020</h6>
                                  <p class="mb-1">Габариты</p>
                                  <h6>49.6x54.4x24.4</h6>
                               </div>

                            </div>

                         </div>

                         <div class="card-body d-flex justify-content-between">
                            <a href="#" class="btn btn-secondary btn-prev">Назад</a>
                            <div class="d-flex flex-wrap">
                               <button class="btn btn-success mr-3" type="button" data-toggle="modal"
                                  data-target="#detailEdit">Изменить параметры печати</button>
                               <a href="/auth/login" class="btn btn-primary btn-next">Отправить на расчет</a>
                            </div>

                         </div>
                      </div>

                   </div>
                   
                   <?php if ($this->session->userdata("role") !== null): ?>
                        <div class="col-md-6">
                           <div class="card">
                              <div class="card-body">
                                 <h5 class="card-title mb-3 text-center"><a href="#" data-toggle="modal"
                                       data-target="#detailInfo">Заказ №
                                       QWE-2201</a></h5>
                                 <div class="d-flex mb-3">
                                    <div>
                                       <img class="mr-3" src="img/lc/detail-order.jpg" alt="order" width="96" height="96">
                                    </div>
                                    <div>
                                       <h5 class="text-secondary">2500 Р</h5>
                                       <p class="card-text font-weight-normal m-0">Срок изготовления: <span
                                             class="font-weight-light">3 рабочих дня</span></p>
                                       <p class="card-text font-weight-normal m-0">Скорость изготовления: <span
                                             class="font-weight-light">обычная</span></p>
                                       <p class="card-text font-weight-normal m-0">Последнее обновление: <span
                                             class="font-weight-light">14.10.2020</span></p>
                                    </div>
                                 </div>
                                 <div class="text-center">
                                    <a href="#" class="btn btn-success" data-toggle="modal"
                                       data-target="#detailInfo">Посмотреть заказ</a>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="col-md-6">
                           <div class="card">
                              <div class="card-body">
                                 <h5 class="card-title mb-3 text-center"><a href="#" data-toggle="modal"
                                       data-target="#detailInfo">Заказ №
                                       QWE-2202</a></h5>
                                 <div class="d-flex mb-3">
                                    <div>
                                       <img class="mr-3" src="img/lc/detail-order.jpg" alt="order" width="96" height="96">
                                    </div>
                                    <div>
                                       <h5 class="text-secondary">2500 Р</h5>
                                       <p class="card-text font-weight-normal m-0">Срок изготовления: <span
                                             class="font-weight-light">3 рабочих дня</span></p>
                                       <p class="card-text font-weight-normal m-0">Скорость изготовления: <span
                                             class="font-weight-light">обычная</span></p>
                                       <p class="card-text font-weight-normal m-0">Последнее обновление: <span
                                             class="font-weight-light">14.10.2020</span></p>
                                    </div>
                                 </div>
                                 <div class="text-center">
                                    <div class="text-center">
                                       <a href="#" class="btn btn-success" data-toggle="modal"
                                          data-target="#detailInfo">Посмотреть заказ</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="col-md-6">
                           <div class="card">
                              <div class="card-body">
                                 <h5 class="card-title mb-3 text-center"><a href="">Заказ № QWE-2202</a></h5>
                                 <div class="d-flex mb-3">
                                    <div>
                                       <img class="mr-3" src="img/lc/detail-order.jpg" alt="order" width="96" height="96">
                                    </div>
                                    <div>
                                       <h5 class="text-secondary">2500 Р</h5>
                                       <p class="card-text font-weight-normal m-0">Срок изготовления: <span
                                             class="font-weight-light">3 рабочих дня</span></p>
                                       <p class="card-text font-weight-normal m-0">Скорость изготовления: <span
                                             class="font-weight-light">обычная</span></p>
                                       <p class="card-text font-weight-normal m-0">Последнее обновление: <span
                                             class="font-weight-light">14.10.2020</span></p>
                                    </div>
                                 </div>
                                 <div class="text-center">
                                    <a href="#" class="btn btn-success" data-toggle="modal"
                                       data-target="#detailInfo">Посмотреть заказ</a>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="col-md-6">
                           <div class="card">
                              <div class="card-body">
                                 <h5 class="card-title mb-3 text-center"><a href="">Заказ № QWE-2202</a></h5>
                                 <div class="d-flex mb-3">
                                    <div>
                                       <img class="mr-3" src="img/lc/detail-order.jpg" alt="order" width="96" height="96">
                                    </div>
                                    <div>
                                       <h5 class="text-secondary">2500 Р</h5>
                                       <p class="card-text font-weight-normal m-0">Точность: <span
                                             class="font-weight-light">высокая</span></p>
                                       <p class="card-text font-weight-normal m-0">Скорость изготовления: <span
                                             class="font-weight-light">обычная</span></p>
                                       <p class="card-text font-weight-normal m-0">Последнее обновление: <span
                                             class="font-weight-light">14.10.2020</span></p>
                                    </div>
                                 </div>
                                 <div class="text-center">
                                    <a href="#" class="btn btn-success" data-toggle="modal"
                                       data-target="#detailInfo">Посмотреть заказ</a>
                                 </div>
                              </div>
                           </div>
                        </div>

                   <?php endif; ?>
                </div>
             </div>
              
             <div class="col-md-2">
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
                        <form class="row bg-white mb-3 p-3 rounded-lg">
                            <div class="col-lg-6">
                                 <div class="row">
                                     <div class="col-lg-12 mb-3">
                                        <label class="form-label h6" for="detail-input1">Загруженные модели</label>
                                        <input class="form-control" id="detail-input1" type="text">
                                     </div>

                                     <div class="col-12 mb-3">
                                         <img style="width: 100%;" class="" src="img/lc/detail.jpg" alt="detail-plhr">
                                     </div>
                                 </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                       <label class="form-label h6" for="detail-input3">Технология</label>
                                       <input class="form-control" id="detail-input3" type="text">
                                    </div>
                                    <div class="col-12 mb-3">
                                       <label class="form-label h6" for="detail-input4">Материал</label>
                                       <input class="form-control" id="detail-input4" type="text">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                       <label class="form-label h6" for="detail-input5">Цвет</label>
                                       <input class="form-control" id="detail-input5" type="text">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                       <label class="form-label h6" for="detail-input6">Количество</label>
                                       <input class="form-control" id="detail-input6" type="text">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                       <label class="form-label h6" for="detail-input7">Заполнение</label>
                                       <input class="form-control" id="detail-input7" type="text">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                       <label class="form-label h6" for="detail-input8">Точность</label>
                                       <input class="form-control" id="detail-input8" type="text">
                                    </div>
                                    <div class="col-4 mb-3">
                                       <label class="form-label h6" for="detail-input9">Габариты (мм)</label>
                                       <input class="form-control" id="detail-input9" type="text">
                                    </div>
                                    <div class="col-4 mb-3">
                                       <label class="form-label h6 invisible" for="detail-input10">Габариты (мм)</label>
                                       <input class="form-control" id="detail-input10" type="text">
                                    </div>
                                    <div class="col-4 mb-3">
                                       <label class="form-label h6 invisible" for="detail-input11">Габариты (мм)</label>
                                       <input class="form-control" id="detail-input11" type="text">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                       <label class="form-label h6" for="detail-input12">Объем (мм3)</label>
                                       <input class="form-control" id="detail-input12" type="text">
                                    </div>
                                    <div class="col-lg-12 mb-5">
                                       <label class="form-label h6" for="inputDetComment">Комментарии</label>
                                       <textarea class="form-control" id="inputDetComment" type="text" rows="4"></textarea>
                                    </div>

                                    <div class="text-right">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                       <button type="button" class="btn btn-primary">Сохранить изменения</button>
                                    </div>
                                </div>
                            </div>

                        </form>
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

    <script type="text/javascript" src="/public/plugins/jsmodeler/three.min.js"></script>
    <script type="text/javascript" src="/public/plugins/jsmodeler/jsmodeler.js"></script>
    <script type="text/javascript" src="/public/plugins/jsmodeler/jsmodeler.ext.three.js"></script>

    <script type="text/javascript" src="/public/plugins/cadviewer/floatingdialog.js"></script>
    <script type="text/javascript" src="/public/plugins/cadviewer/importerviewer.js"></script>
    <script type="text/javascript" src="/public/plugins/cadviewer/importermenu.js"></script>
    <script type="text/javascript" src="/public/plugins/cadviewer/importerapp.js"></script>
    
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const slides = document.querySelectorAll('.model-slide');
            const next = document.querySelectorAll('.btn-next');
            const prev = document.querySelectorAll('.btn-prev');

            function hideSlides() {
               slides.forEach(item => item.style.display = 'none');
            }

            function updateFileList(files) {
                $('#filesToUpload').html('');                 
                for (var key in files) {
                   if (files.hasOwnProperty(key)) {           
                       $('#filesToUpload').append('<tr><td align="left">' + files[key].name + '</td><td><strong><a href = "javascript:void(0)" data-id = "' + files[key].name + '" class = "file-remove" >x</a></strong></td></tr>');
                   }
                }
            }
            
            hideSlides();
            slides[0].style.display = '';

            next[0].addEventListener('click', (e) => {
                e.preventDefault();
                hideSlides();
                slides[2].style.display = '';

                console.log(fileList);
            });

            next[1].addEventListener('click', (e) => {
                e.preventDefault();
                hideSlides();
                slides[3].style.display = '';

                console.log(e);
                console.log(fileList);
            });

            prev[0].addEventListener('click', (e) => {
                e.preventDefault();
                hideSlides();
                slides[0].style.display = '';
            });

            prev[1].addEventListener('click', (e) => {
                e.preventDefault();
                hideSlides();
                slides[1].style.display = '';
            });

            prev[2].addEventListener('click', (e) => {
                e.preventDefault();
                hideSlides();
                slides[2].style.display = '';
            });
            
            document.addEventListener('click', function(e){
                if(e.target && e.target.className === 'file-remove'){
                    delete files[e.target.getAttribute("data-id")];
                    updateFileList(files);
                }
            });
                       // Files select
            var files = {};
            document.querySelector('#modelFiles').addEventListener('change', function () {
                if (this.value) {
                    addedFiles = $('#modelFiles')[0].files;
                    for ( i = 0; i < addedFiles.length; i++) {
                        files[addedFiles[i].name] = addedFiles[i];
                        //if(i === fileList.length - 1) {
                        //    uploadajax(fileList.length - 1, 0);
                        //}
                    }
                    
                    updateFileList(files);
                    hideSlides();
                    slides[1].style.display = '';
                } else {
                    alert("Файл не выбран");
                }
            });
        });
    </script>
    
    <script>
        function uploadajax(ttl,cl){

            var fileList = $('#modelFiles')[0].files;
            console.log($('#modelFiles')[0].files);
            
            var form_data =  "";

            form_data = new FormData();
            form_data.append("upload_image", fileList[cl]);
            form_data.append('<?php echo $this->security->get_csrf_token_name();?>', $("input[name='<?php echo $this->security->get_csrf_token_name();?>']").val());

            var request = $.ajax({
                url: "/home/upload",
                cache: false,
                contentType: false,
                processData: false,
                async: true,
                data: form_data,
                type: 'POST', 
                xhr: function() {  
                    var xhr = $.ajaxSettings.xhr();

                    if (xhr.upload) { 
                        xhr.upload.addEventListener('progress', function(event){
                            var percent = 0;
                            if (event.lengthComputable) {
                                percent = Math.ceil(event.loaded / event.total * 100);
                            }
                        }, false);
                    }
                    return xhr;
                },
                success: function (res, status) {
                    if (status === 'success') {
                        percent = 0;
                        $('#prog').val('');
                        $('#prog').val('--Success: ');
                        if (cl < ttl) {
                            uploadajax(ttl, cl + 1);
                        } else {
                            alert('Done');
                        }
                    }
                },
                fail: function (res) {
                    alert('Failed');
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

