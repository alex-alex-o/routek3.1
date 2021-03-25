<!--
<link rel="stylesheet" href="<?= base_url()?>public/plugins/dropzone/dropzone.css">
<link rel="stylesheet" href="<?= base_url()?>public/plugins/dropzone/basic.css">
-->

<!-- Слайдер -->
<div class="col-md-12">
    <!-- Слайд с выбором файла -->
    <?php echo form_open_multipart(base_url("home/index/$orderTypeID"), '');?>
        <input type="hidden" class = "form-control" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>" />
        
        <div class="card model-slide">
            <div class="card-body text-center">
                <h5 class="card-title mb-3">Запрос на оценку стоимости 3D-печати</h5>
                <h6 class="mb-3 text-secondary"><?= $acceptFiles?></h6>

                <div class = "row">
                    <input type="text" value = "" name = "fileList" />
                </div>
                
                <?php if ($this->session->userdata("role") !== null && false): ?>
                    <a href="#" class = "btn btn-success mr-3">Недавние загрузки</a>
                <?php endif; ?>
                    <?php // <input id="modelFiles" multiple type="file" accept="" style="display: none;"  name="files[]"> ?>

                <input id="file" type="file" accept="<?= $acceptFiles?>" style="display: none;"  name="files[]" multiple>
                <label for="file" class="btn btn-primary">Загрузить 3D модель</label>

                <p class="mt-2">Максимальный размер файла <?= round($maxFileSize / 1024); ?> Мб</p>
                
                <?php if ($this->session->userdata("role") === null): ?>
                    <div class = "row">
                        <div class="col-sm-6 mb-2">
                            <label class="form-label h6" for="email">Email</label>
                            <input class="form-control" type = "email" id = "email" name = "email" value = "<?=$email;?>" placeholder = "Email для связи">
                        </div>                                            

                        <div class="col-sm-6 mb-2">
                            <label class="form-label h6" for="phone">Телефон</label>
                            <input class="form-control" type = "phone" id = "phone" name = "phone" value = "<?=$phone;?>" placeholder = "Телефон для связи">
                        </div>                                            
                    </div>                      
                <?php endif; ?>
            </div>

            <ul id = "stepProgressBar">
                <li class="step">
                    <a>
                        <div class="bullet completed">1</div>
                    </a>
                    <p class="step-subtext">загрузка файла</p>
                </li>

                <li class="step">
                    <div id="bullet" class="bullet">2</div>
                    <p class="step-subtext">выбор процесса</p>
                </li>
            </ul>
            
            <div class="card-body d-flex justify-content-between" >
                <a href="#" class="btn btn-secondary btn-prev" style = "display: none;">Назад</a>
                <span></span>
                <a href="#" class="btn btn-primary btn-next stage1">Далее</a>
            </div>             
        </div>

        <!-- Слайд с выбором технологии -->
        <div class = "card model-slide" style = "display: none;">
            <div class="card-body text-center">
               <h5 class="card-title mb-3">Выбор технологии ЗD печати</h5>

            </div>

            <?php $i = 0; ?>
            <?php foreach($technologies as $techonlogy): ?>

                <?php if ($i == 0): ?>
                    <div class="row justify-content-center mb-3">
                <?php endif; ?>

                <div class="col-3">
                    <div class="btn-tooltip">
                        <input type="radio" class="btn-check" name="technology_id" value="<?php echo $techonlogy["id"]; ?>" id="<?php echo $techonlogy["id"]; ?>" autocomplete="off" <?php echo ($techonlogy["is_default"] == 1 ? "checked" : ""); ?>>
                        <label class="btn btn-outline-secondary d-block" for="<?php echo $techonlogy["id"]; ?>">
                            <?php // echo ($techonlogy["name"] . ($techonlogy["is_default"] == 1 ? " (по умолчанию)" : "")); ?>                
                            <?php echo $techonlogy["name"]; ?>                
                            <i class="fa fa-info-circle"></i>
                        </label>
                        <span class="tooltiptext"><?php echo $techonlogy["full_name"] . " - " .$techonlogy["description"]; ?></span>
                   </div>
                </div>

                <?php $i ++; ?>
                <?php if ($i == 3): ?>
                    </div>
                   <?php $i = 0; ?>
                <?php endif; ?>
             <?php endforeach; ?>

            <?php if ($i > 0 && $i < 3): ?>
                </div>
            <?php endif; ?>     

            <ul id = "stepProgressBar">
                <li class="step">
                   <div class="bullet">1</div>
                   <p class="step-subtext">загрузка файла</p>
                </li>
                <li class="step">
                   <div id="bullet" class="bullet completed">2</div>
                   <p class="step-subtext">выбор процесса</p>
                </li>
            </ul>

            <div class="card-body d-flex justify-content-between">
                <a href="#" class="btn btn-secondary btn-prev">Назад</a>
                <input type = "submit" name = "helper" class="btn btn-success mr-3" value = "Воспользоваться интеллектуальным помощником" />
                <input type = "submit" class="btn btn-primary" value = "Далее" />
            </div>  
        </div>
        <input type = "hidden" id = "snapshot" name = "snapshot"/>
        <input type = "hidden" id = "volume"   name = "volume" />

        <input type = "hidden" id = "size-x" name = "size_x" />
        <input type = "hidden" id = "size-y" name = "size_y" />
        <input type = "hidden" id = "size-z" name = "size_z" />
    <?php echo form_close(); ?>

       
</div>


<canvas id = "modelcanvas" height = "500" width="500" style="visibility: hidden;"></canvas>
<!--
<script type="text/javascript" src="/public/plugins/dropzone/dropzone.js"></script>
-->
<script type="text/javascript" src="/public/plugins/jsmodeler/three.min.js"></script>
<script type="text/javascript" src="/public/plugins/jsmodeler/jsmodeler.js"></script>
<script type="text/javascript" src="/public/plugins/jsmodeler/jsmodeler.ext.three.js"></script>

<script type="text/javascript" src="/public/plugins/cadviewer/floatingdialog.js"></script>
<script type="text/javascript" src="/public/plugins/cadviewer/importerviewer.js"></script>
<script type="text/javascript" src="/public/plugins/cadviewer/importermenu.js"></script>
<script type="text/javascript" src="/public/plugins/cadviewer/importerapp.js"></script>

<script>
    window.addEventListener('DOMContentLoaded', () => {


        let currentSlideNumber = 0;
        let files = [];
        
        let slides = document.querySelectorAll('.model-slide');
        let prev   = document.querySelectorAll('a.btn-prev');
        let next   = document.querySelectorAll('a.btn-next');

        slides.forEach(slide => {
            slide.number     = currentSlideNumber ++;
           
            if (slide.number + 1 < slides.length) {
                if (next[slide.number] !== undefined) {
                    next[slide.number].addEventListener('click', (e) => {
                        e.preventDefault();
                        if (slide.number === 0 && files.length === 0) {
                            alert("Выберите файлы для загузки");
                            return;
                        }
                        hideSlides();                
                        slides[slide.number + 1].style.display = '';
                    });
                }
                
                if (slide.number === slides.length - 1) {
                    next[slide.number].style.display = 'none';
                }
            }
        
            if (slide.number - 1 >= 0) {
                if (prev[slide.number] !== undefined) {
                    prev[slide.number].addEventListener('click', (e) => {
                        e.preventDefault();
                        hideSlides();                
                        slides[slide.number - 1].style.display = '';
                    });
                }
                
                if (slide.number === 0) {
                    prev[slide.number].style.display = 'none';
                }
            }
        });
                    
        // Files select
        document.querySelector('#file').addEventListener('change', function () {
            if (this.value) {
                addedFiles = document.getElementById('file').files;
                for ( i = 0; i < addedFiles.length; i++) {
                    if ((addedFiles[i].size / 1024) > <?= $maxFileSize; ?>) {
                        alert("Размер файла " + addedFiles[i].name + " не должен превышать <?= $maxFileSize; ?>");
                    } else {
                        files.push(addedFiles[i]);
                    }
                }
                updateFileList(files);
            } else {
                alert("Файл не выбран");
            }
        });
        
       
        function updateFileList(files) {
//            document.getElementById("filesTable").innerHTML = "";
//            for ( i = 0; i < files.length; i++) {
//                document.getElementById("filesTable").innerHTML += "<tr><td>" + files[i].name + "</td><td><i class='icon-remove'></i></td></tr>";
//            }
        }

        function hideSlides() {
            slides.forEach(item => item.style.display = 'none');
        }

        var importerApp = new ImporterApp ();
        importerApp.Init ();
    });

</script>

<script src="/public/js/jquery.min.js"></script>
<script src="/public/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

<script>
    $('#phone').inputmask('+9 (999) 999-99-99', { placeholder: '+_ (___) ___-__-__' }); 
    //$('#email').inputmask("email");       

    $('#email').on('blur', function(){
        var email = $('#email').val();

        if (email == '') {
            return;
        }
    }); 

    $(".stage1").click(function(){
        var $phone = $("#phone").val();
        var $email = $("#email").val();

        $.ajax({
            method:   "POST",
            url:      "/auth/pre_register",
            data: {"email" : $email, "phone" : $phone, "submit": '1', 'csrf_test_name' : $("input[name='csrf_test_name'").val()},
        }).done(function( msg ) {
            //console.log( "Data Saved: " + msg ); 
        });        
    });        
</script>