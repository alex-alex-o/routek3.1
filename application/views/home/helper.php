
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
   <link rel="stylesheet" href="<?= base_url()?>public/css/helper.css">
</head>

<body class="home-page" style="padding-top: 48px;">
    <?php if (false): ?>
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
    <?php endif; ?>
    
    <?php if($nextStep): ?>
        <section class="helper">
            <?php echo form_open_multipart(base_url("home/helper/$publicID/$nextStep"), '');?>
                <div class="helper__window">
                    <div class="helper__logo-box">
                        <img src="<?= base_url()?>public/img/Logo-helper.svg" alt="helper" width="48" height="48">
                        <h4 class="helper__logo-text">интеллектуальный</br> помощник (beta)</h4>
                    </div>

                    <?php foreach($questions as $question): ?>
                        <h2 class="helper__title "><?php echo $question["text"]; ?></h2>
                        <div class="helper__radio-box">
                            <?php foreach($question["variants"] as $variant): ?>
                                <input type="radio" class="helper-btn-check" name="variant" value = "<?php echo $variant["id"];?>" id="variant<?php echo $variant["id"];?>">
                                <label class="helper__btn-md helper__btn-md--muted mb-2" for="variant<?php echo $variant["id"];?>">
                                    <?php echo $variant["value"]; ?>
                                </label>
                            <?php endforeach; ?>
                        </div>

                        <div class="helper__btn-box">
                            <!-- <a href="#" class="helper__btn-lg">Назад</a> -->
                            <input type = "submit" class="helper__btn-md helper__btn-md--primary ml-auto" value = "Далее" />
                        </div>
                    <?php endforeach; ?>

                </div>
            <?php echo form_close(); ?>
        </section>
    <?php else: ?>
        <section class="helper">
            <?php echo form_open_multipart(base_url("home/helper/$publicID"), '');?>
                <div class="helper__window">
                    <div class="helper__logo-box">
                        <img src="<?= base_url()?>public/img/Logo-helper.svg" alt="helper" width="48" height="48">
                        <h4 class="helper__logo-text">интеллектуальный</br> помощник (beta)</h4>
                    </div>

                    <h2 class="helper__title ">Помощник подобрал для Вас следующие материалы</h2>
                    <div class="helper__radio-box">
                        <?php foreach($materials as $material): ?>
                            <input type="radio" class="helper-btn-check" name="options" value = "<?php echo $material["id"];?>" id="option<?php echo $material["id"];?>" autocomplete="off">
                            <label class="helper__btn-md helper__btn-md--muted mb-2" for="option<?php echo $material["id"];?>">
                                <?php echo $material["name"]; ?>
                            </label>
                        <?php endforeach; ?>
                    </div>

                    <div class="helper__btn-box">
                        <!-- <a href="#" class="helper__btn-lg">Назад</a> -->
                        <input type = "submit" name = "order" class="helper__btn-md helper__btn-md--primary ml-auto" value = "Сделать заказ" />
                    </div>

                </div>
            <?php echo form_close(); ?>
        </section>
    <?php endif;?>
    
    <main style="margin-top: 71px;" class="py-4">
       <div class="container">

          <div class="row">
             <div class="col-md-2">
             </div>
             <div class="col-md-8">
                <div class="row g-3">
                   <!-- Слайдер -->
                   <div class="col-md-12">
                        <!-- Слайд с выбором файла -->
                        <?php echo form_open_multipart(base_url('home'), '');?>
                      
                            <!-- Цель использования -->
                            <div class = "card model-slide">
                                <div class="card-body text-center">
                                   <h5 class="card-title mb-3">Цель использования изделия</h5>

                                </div>
                                
                                <div class="row justify-content-center mb-3">
                                    <div class="col-3">
                                       <input type="radio" class="btn-check" name="purpose" value="1" id = "purpose-1">
                                       <label class="btn btn-outline-secondary d-block" for="purpose-1" selected>Декор и посуда</label>
                                    </div>
                                    <div class="col-3">
                                       <input type="radio" class="btn-check" name="purpose" value="2" id = "purpose-2">
                                       <label class="btn btn-outline-secondary d-block" for="purpose-2">Запчасти и инструменты</label>
                                    </div>
                                    <div class="col-3">
                                       <input type="radio" class="btn-check" name="purpose" value="3" id = "purpose-3">
                                       <label class="btn btn-outline-secondary d-block" for="purpose-3">Медицина</label>
                                    </div>
                                </div>
                                
                                <div class="row justify-content-center mb-3">
                                    <div class="col-3">
                                       <input type="radio" class="btn-check" name="purpose" value="5" id = "purpose-5">
                                       <label class="btn btn-outline-secondary d-block" for="purpose-5">Другое</label>
                                    </div>
                                </div>

                                <div class="card-body d-flex justify-content-between">
                                    <span></span>
                                    <a href="#" class="btn btn-primary btn-next">Далее</a>
                                </div>    
                                
                            </div>
                            
                            <!-- Материал использования -->
                            <div class = "card model-slide">
                                <div class="card-body text-center">
                                   <h5 class="card-title mb-3">Материал изделия</h5>

                                </div>
                                
                                <div class="row justify-content-center mb-3">
                                    <div class="col-3">
                                       <input type="radio" class="btn-check" name="material" value="1" id = "material-1">
                                       <label class="btn btn-outline-secondary d-block" for="material-1">Пластик</label>
                                    </div>
                                    <div class="col-3">
                                       <input type="radio" class="btn-check" name="material" value="2" id = "material-2">
                                       <label class="btn btn-outline-secondary d-block" for="material-2">Металл</label>
                                    </div>
                                </div>
                                
                                <div class="card-body d-flex justify-content-between">
                                    
                                    <a href="#" class="btn btn-secondary btn-prev">Назад</a>

                                    <a href="#" class="btn btn-primary btn-next">Далее</a>
                                </div>    
                                
                            </div>

                            <!-- Точность печати -->
                            <div class = "card model-slide">
                                <div class="card-body text-center">
                                   <h5 class="card-title mb-3">Точность печати</h5>

                                </div>
                                
                                <div class="row justify-content-center mb-3">
                                    <div class="col-3">
                                       <input type="radio" class="btn-check" name="accuracy" value="1" id = "accuracy-1">
                                       <label class="btn btn-outline-secondary d-block" for="accuracy-1">Высокая</label>
                                    </div>
                                    <div class="col-3">
                                       <input type="radio" class="btn-check" name="accuracy" value="2" id = "accuracy-2">
                                       <label class="btn btn-outline-secondary d-block" for="accuracy-2">Средняя</label>
                                    </div>
                                    <div class="col-3">
                                       <input type="radio" class="btn-check" name="accuracy" value="1" id = "accuracy-3">
                                       <label class="btn btn-outline-secondary d-block" for="accuracy-3">Низкая</label>
                                    </div>
                                    
                                </div>
                                
                                <div class="card-body d-flex justify-content-between">
                                    <a href="#" class="btn btn-secondary btn-prev">Назад</a>

                                    <input type = "submit" class="btn btn-primary" value = "Подобрать параметры и отправить на расчет" />
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
        
        
    <script>
        window.addEventListener('DOMContentLoaded', () => {
               
            const slides = document.querySelectorAll('.model-slide');
            const next   = document.querySelectorAll('.btn-next');
            const prev   = document.querySelectorAll('.btn-prev');

            function hideSlides() {
               slides.forEach(item => item.style.display = 'none');
            }

            hideSlides();
            slides[0].style.display = '';

            next[0].addEventListener('click', (e) => {
                e.preventDefault();
                hideSlides();
                slides[1].style.display = '';
            });

            next[1].addEventListener('click', (e) => {
                e.preventDefault();
                hideSlides();
                slides[2].style.display = '';
            });

            prev[0].addEventListener('click', (e) => {
                e.preventDefault();
                hideSlides();
                slides[1].style.display = '';
            });

            prev[1].addEventListener('click', (e) => {
                e.preventDefault();
                hideSlides();
                slides[2].style.display = '';
            });

//            prev[2].addEventListener('click', (e) => {
//                e.preventDefault();
//                hideSlides();
//                slides[1].style.display = '';
//            });           
        });

    </script>
</body>

</html>
