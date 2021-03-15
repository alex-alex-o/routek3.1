<?php 
    $firstModelUrl  = ""; 
    $firstModelFile = ""; 
    
    foreach($models as $model) {
        $url = base_url() . $model["path"] . '/' . $model['file_name']; 
        if (empty($firstModelUrl)) {
            $firstModelUrl = $url; 
            $firstModelFile = $model['file_name'];
        }
    }
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h3">Заказ <?php echo $order["name"];?></h1>
</div>

<div class="container-fluid mt-3">

    <form class="row bg-white mb-3 p-3 rounded-lg">
        <div class="col-12">
            <h4 class="font-weight-normal my-4">Параметры</h4>
        </div>
  
        <div class = "col-lg-12">
            <div class = "row">
                <div class="col-md-3 mb-3">
                    <label class="form-label h6" for="detail-input12">Стоимость</label>
                    <input class="form-control" id="detail-input12" type="text" disabled="" value="<?= $order['cost']; ?>" />
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label h6" for="detail-input12">Дата оплаты</label>
                    <input class="form-control" id="detail-input12" type="text" disabled="" value="<?= strftime("%d.%m.%y", strtotime($order['payed_at'])); ?>" />
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label h6" for="detail-input12">Планируемая доставка</label>
                    <input class="form-control" id="detail-input12" type="text" disabled="" value="<?= strftime("%d.%m.%y", strtotime($order['payed_at'] . ' + ' . $order['lead_time'] . ' days')); ?>" />
                </div>            
                <div class="col-md-3 mb-3">
                    <label class="form-label h6" for="detail-input12">Статус</label>
                    <input class="form-control" id="detail-input12" type="text" disabled="" value="<?= $order['status']; ?>" />
                </div>            
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-12 mb-3">
                  <label class="form-label h6" for="detail-input1">Загруженные модели</label>
                </div>

                <div class="col-12 mb-3">
                  <canvas id = "modelcanvas" height = "500" width="400"></canvas>
                </div>
            </div>

        </div>

        <div class="col-lg-6">
            
            <div class="row">
                <div class="col-12 mb-3">
                    <label class="form-label h6" for="detail-input3">Технология</label>
                    <input class="form-control" id="detail-input3" type="text" disabled="" value = "<?= $order['technology_short']; ?>">
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label h6" for="detail-input4">Материал</label>
                    <input class="form-control" id="detail-input4" type="text" disabled="" value = "<?= $order['material']; ?>">
                </div>
                <div class="col-sm-6 mb-3">
                    <label class="form-label h6" for="detail-input5">Цвет</label>
                    <input class="form-control" id="detail-input5" type="text" disabled="" value = "<?= $order['color']; ?>">
                </div>
                <div class="col-sm-6 mb-3">
                    <label class="form-label h6" for="detail-input6">Количество</label>
                    <input class="form-control" id="detail-input6" type="text" disabled="" value = "<?= $order['quantity']; ?>">
                </div>
                <div class="col-sm-6 mb-3">
                    <label class="form-label h6" for="detail-input7">Заполнение</label>
                    <input class="form-control" id="detail-input7" type="text" disabled="" value = "<?= $order['filling']; ?>">
                </div>
                <div class="col-sm-6 mb-3">
                    <label class="form-label h6" for="detail-input8">Точность печати (мм)</label>
                    <input class="form-control" id="detail-input8" type="text" disabled="" value = "<?= $order['quality']; ?>">
                </div>
                <div class="col-4 mb-3">
                    <label class="form-label h6" for="detail-input9">Габариты (мм)</label>
                    <input class="form-control" id="detail-input9" type="text" disabled="" value = "<?= $order['size_x']; ?>">
                </div>
                <div class="col-4 mb-3">
                    <label class="form-label h6 invisible" for="detail-input10">Габариты (мм)</label>
                    <input class="form-control" id="detail-input10" type="text" disabled="" value = "<?= $order['size_y']; ?>">
                </div>
                <div class="col-4 mb-3">
                    <label class="form-label h6 invisible" for="detail-input11">Габариты (мм)</label>
                    <input class="form-control" id="detail-input11" type="text" disabled="" value = "<?= $order['size_z']; ?>" />
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label h6" for="detail-input12">Объем (мм3)</label>
                    <input class="form-control" id="detail-input12" type="text" disabled="" value="<?= $order['volume']; ?>" />
                </div>
                <div class="col-lg-12 mb-3">
                    <label class="form-label h6" for="inputDetComment">Комментарии</label>
                    <textarea class="form-control" id="inputDetComment" type="text" disabled="" rows="4"><?= $order['description']; ?></textarea>
                </div>
            </div>
        </div>
    </form>
</div>    

<?php if (!empty($files)): ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h3">Пользовательские файлы</h1>
    </div>

    <?php $i = 1; ?>
    <?php foreach($files as $file): ?>
        <!-- Card-folder 1 -->
        <div class="d-flex flex-wrap justify-content-between bg-white rounded-lg z-depth-1 p-2 mb-3">
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
            
            <div class="col-12 col-sm-6 col-md-2">
                <p class="mb-0">&nbsp;</p>
                <?php $url = base_url() . $file["path"] . '/' . $file['file_name']; ?>
                <a target = "_blank" href="<?= $url; ?>" class="h6 font-weight-normal"> <span class="mr-2"><img src="<?= base_url() ?>public/img/svg/download-lc-ico.svg"
                      alt="download"></span> Скачать</a>
            </div>            
            
        </div>
    <?php endforeach; ?>
<?php endif; ?>
      
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h3">Сообщения</h1>
</div>
        
<div class="container-fluid mt-3">
    <form class="row bg-white mb-3 p-3 rounded-lg">
        <div class="col-12">
            
        </div>
    </form>
</div>
        
<script type="text/javascript" src="/public/plugins/jsmodeler/three.min.js"></script>
<script type="text/javascript" src="/public/plugins/jsmodeler/jsmodeler.js"></script>
<script type="text/javascript" src="/public/plugins/jsmodeler/jsmodeler.ext.three.js"></script>

<script type="text/javascript" src="/public/plugins/cadviewer/floatingdialog.js"></script>
<script type="text/javascript" src="/public/plugins/cadviewer/importerviewer.js"></script>
<script type="text/javascript" src="/public/plugins/cadviewer/importermenu.js"></script>
<script type="text/javascript" src="/public/plugins/cadviewer/importerapp.js"></script>

<script>
    <?php if (isset($firstModelUrl) && !empty($firstModelUrl)): ?>
            var importerApp = new ImporterApp ();
            importerApp.Init ();
            files = ["<?= $firstModelUrl; ?>"];
            importerApp.LoadFilesFromUrl (files, false);
    <?php endif; ?>

</script>