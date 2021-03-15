
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
