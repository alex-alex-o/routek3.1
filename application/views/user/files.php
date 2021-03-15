    <div
      class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h3">Библиотека файлов</h1>
    </div>

    <!-- Pills navs -->
    <ul class="nav nav-pills mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="ex1-tab-1" data-toggle="pill" href="#ex1-pills-1" role="tab"
            aria-controls="ex1-pills-1" aria-selected="true">Мои файлы</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="ex1-tab-2" data-toggle="pill" href="#ex1-pills-2" role="tab"
            aria-controls="ex1-pills-2" aria-selected="false">Общие файлы</a>
        </li>
    </ul>
    <!-- Pills navs -->
        
    <div class="tab-content" id="ex1-content">
      
        <!-- Start tab 1 -->
        <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel" aria-labelledby="ex1-tab-1">
            <?php $i = 1; ?>
            <?php foreach($files as $file): ?>
                <!-- Card-folder 1 -->
                <div class="d-flex flex-wrap justify-content-between bg-white rounded-lg z-depth-1 p-2 mb-3">
                    <div class="mx-2">
                        <p class="mb-0 ">№</p>
                        <h6 class="font-weight-bold"><?php echo $i; ?></h6>
                    </div>

                  <div class="w-25">
                    <p class="mb-0">Имя папки</p>
                    <a href="#folder-<?php echo $file["id"]; ?>" data-toggle="collapse" aria-controls="folder-01" aria-expanded="false">
                        <h6 class="font-weight-bold"><i class="far fa-folder fa-lg mr-2"></i>
                            <?php echo $file["orig_name"]; ?>
                        </h6>
                    </a>

                  </div>

                  <div class="mx-2">
                    <p class="mb-0">Дата</p>
                    <h6 class="font-weight-bold"><?php echo $file["created_at"]; ?></h6>
                  </div>

                  <div class="p-2 align-self-center">
                    <a href="#" class="h6 font-weight-normal"> <span class="mr-2"><img src="<?= base_url() ?>public/img/svg/download-lc-ico.svg"
                          alt="download"></span> Скачать</a>
                  </div>


                  <div class="mx-2 py-2 custom-control custom-switch align-self-center">
                    <input type="checkbox" class="custom-control-input" id="switch-<?php echo $file["id"]; ?>">
                    <label for="switch-<?php echo $file["id"]; ?>" class="custom-control-label h6">Сделать публичной</label>
                  </div>

                  <div class="container-fluid collapse border rounded-lg grey lighten-5" id="<?php echo 'folder-' . $file['id']; ?>">
                    <div class="row  p-2 border-bottom">
                      <div class="col-12 col-sm-6 col-md-1">
                        <p class="mb-0 ">№</p>
                        <h6 class="font-weight-bold">1</h6>
                      </div>
                      <div class="col-12 col-sm-6 col-md-3">
                        <p class="mb-0">Имя файла</p>
                        <h6 class="font-weight-normal"><span class="mr-2"><img src="<?= base_url() ?>public/img/svg/doc-lc-ico.svg" alt="download"></span>
                          <?php echo $file["orig_name"]; ?></h6>
                      </div>

                      <div class="col-12 col-sm-6 col-md-3">
                        <p class="mb-0">Тип файла</p>
                        <h6 class="font-weight-normal">
                            <?php 
                                $info = pathinfo($file["file_name"]);
                                switch (strtolower($info['extension'])) {
                                    case "stl":
                                    case "obj":
                                    case "3ds":
                                        echo "3D-модель";
                                        break;
                                    case "jpg":
                                    case "jpeg":
                                    case "png":
                                    case "tiff":
                                    case "gif":
                                    case "bmp":
                                        echo "Картинка";
                                        break;
                                    case "pdf":
                                    case "doc":
                                        echo "Документ";
                                        break;
                                }                                            
                            ?>                    
                        </h6>
                      </div>
                      <div class="col-12 col-sm-6 col-md-3">
                        <p class="mb-0">Дата изменения</p>
                        <h6 class="font-weight-normal"><?php echo $file["created_at"]; ?></h6>
                      </div>

                    </div>
                  </div>
                </div>
                <?php $i ++; ?>
            <?php endforeach; ?>

        </div>
        
        <div class="tab-pane fade show active" id="ex1-pills-2" role="tabpanel" aria-labelledby="ex1-tab-1">
            <div
              class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            </div>
        </div>
    </div>
