<!-- Слайдер -->
<div class="col-md-12">
    <!-- Слайд с выбором файла -->
    <?php echo form_open_multipart(base_url("home/index/$orderTypeID"), "");?>
        <div class="card model-slide">
            <div class="card-body text-center">
                <h5 class="card-title mb-3">Запрос на оценку стоимости разработки модели изделия</h5>
                <h6 class="mb-3 text-secondary"><?= $acceptFiles?></h6>

                <?php if ($this->session->userdata("role") !== null && false): ?>
                    <a href="#" class = "btn btn-success mr-3">Недавние загрузки</a>
                <?php endif; ?>
                    <?php // <input id="modelFiles" multiple type="file" accept="" style="display: none;"  name="files[]"> ?>

                <input id="file" type="file" accept="<?= $acceptFiles?>" style="display: none;"  name="files[]" multiple>
                <label for="file" class="btn btn-primary">Загрузить файлы</label>

                <p class="mt-2">Максимальный размер файла <?= $maxFileSize / 1024; ?> Мб</p>
            </div>

            <input type="hidden" class = "form-control" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>" />

            <ul id="stepProgressBar">
                <li class="step">
                    <div class="bullet completed">1</div>
                    <p class="step-subtext">загрузка файла</p>
                </li>

                <li class="step">
                    <div id="bullet" class="bullet">2</div>
                    <p class="step-subtext">описание</p>
                </li>
            </ul>
        </div>

        <!-- Слайд с загруженным файлом -->
        <div class="card model-slide">
            <div class="card-body text-center">
                <h5 class="card-title mb-3">Выбранные файлы</h5>
                <div class="form-file">
                    <table id = "filesToUpload" class = "table mb-2">

                    </table>
                </div>

                <p></p>
            </div>

            <ul id = "stepProgressBar">
                <li class="step">
                   <div class="bullet completed">1</div>
                   <p class="step-subtext">загрузка файла</p>
                </li>
                <li class="step">
                   <div id="bullet" class="bullet">2</div>
                   <p class="step-subtext">описание</p>
                </li>
            </ul>

            <div class="card-body d-flex justify-content-between">
                <a href="#" class="btn btn-secondary btn-prev">Назад</a>

                <a href="#" class="btn btn-primary btn-next">Далее</a>
            </div>
        </div>

        <!-- Слайд с описанием -->
        <div class="card model-slide">
            <div class="card-body text-center">
                <h5 class="card-title mb-3">Опишите подробнее ваш заказ</h5>
                <div class="col-lg-12 mb-5">
                   <label class="form-label h6" for="description">Комментарии</label>
                   <textarea class="form-control" type="text" id = "description" name = "description" rows="4"></textarea>
                </div>                
            </div>

            <ul id = "stepProgressBar">
                <li class="step">
                   <div class="bullet completed">1</div>
                   <p class="step-subtext">загрузка файла</p>
                </li>
                <li class="step">
                   <div id="bullet" class="bullet">2</div>
                   <p class="step-subtext">описание</p>
                </li>
            </ul>

            <div class="card-body d-flex justify-content-between">
                <a href="#" class="btn btn-secondary btn-prev">Назад</a>

                <input type = "submit" class="btn btn-primary" value = "Далее" />
            </div>
        </div>
    <?php echo form_close(); ?>

</div>

<script>
    window.addEventListener('DOMContentLoaded', () => {

        const slides = document.querySelectorAll('.model-slide');
        const next   = document.querySelectorAll('.btn-next');
        const prev   = document.querySelectorAll('.btn-prev');

        function hideSlides() {
           slides.forEach(item => item.style.display = 'none');
        }

        function updateFileList(files) {
            $('#filesToUpload').html('');                 
            for (var key in files) {
               if (files.hasOwnProperty(key)) {           
                   $('#filesToUpload').append('<tr><td align="left">' + files[key].name + '</td><td><strong><a href = "javascript:void(0)" data-id = "' + files[key].name + '" class = "file-remove" ></a></strong></td></tr>');
               }
            }
        }

        hideSlides();
        slides[0].style.display = '';

        next[0].addEventListener('click', (e) => {
            e.preventDefault();
            hideSlides();
            slides[2].style.display = '';
        });
//
        prev[0].addEventListener('click', (e) => {
            e.preventDefault();
            hideSlides();
            slides[0].style.display = '';
        });
//
        prev[1].addEventListener('click', (e) => {
            e.preventDefault();
            hideSlides();
            slides[1].style.display = '';
        });

//        document.addEventListener('click', function(e){
//            if(e.target && e.target.className === 'file-remove'){
//                delete files[e.target.getAttribute("data-id")];
//                updateFileList(files);
//            }
//        });
                    
        // Files select
        var files = {};
        document.querySelector('#file').addEventListener('change', function () {
            if (this.value) {
                    if ($('#file')[0].files.size > <?= $maxFileSize; ?>) {
                        alert("Размер файла не должен превышать <?= $maxFileSize; ?>");
                        return;
                    }

                    addedFiles = $('#file')[0].files;
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
