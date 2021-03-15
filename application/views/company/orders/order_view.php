
<!-- Bootstrap Select Css -->
<link href="<?= base_url() ?>public/plugins/light-gallery/css/lightgallery.css" rel="stylesheet">

<link href="<?= base_url() ?>public/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<div class="row clearfix">
    
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Заказ <?= $order["id"]; ?>
                </h2>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <?php echo form_open(base_url('company/orders/complete/' . $order["id"]), 'id = "covid-form" class="form-horizontal"' )?> 
                            <div class="row clearfix">
                                <div class="col-lg-2">
                                    <label for = "status_id">Статус</label>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php $value = ""; ?>
                                            <?php foreach($statuses as $status): ?>
                                                <?php 
                                                    if ($order["status_id"] == $status["id"]) {
                                                        $value = $status['name'];
                                                        break;
                                                    }
                                                ?>
                                            <?php endforeach; ?>
                                            
                                            <input readonly type="text" class="form-control text-left" value="<?php echo $value; ?>" />
                                            <?php if ($order["order_type_id"] == 2): ?>
                                                <input type="hidden" name = "status_id" class="form-control text-left" value="7" />
                                            <?php else: ?>
                                                <input type="hidden" name = "status_id" class="form-control text-left" value="3" />
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php if ($order["status_id"] != 3 && $order["status_id"] != 7): ?>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <input type="submit" name="submit" value="ЗАВЕРШИТЬ ЗАКАЗ И ПЕРЕДАТЬ В СЛУЖБУ ДОСТАВКИ" class="btn btn-primary m-t-15 waves-effect">
                                    </div>
                                </div>                                   
                            <?php endif; ?>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="header">
                <h2>
                    Детали
                </h2>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-lg-6">

                        <div class="row clearfix">
                            <div class="col-lg-2">
                                <label for = "machine_id">Технология</label>
                            </div>

                            <div class="col-lg-10">
                                <div class="form-group">
                                    <div class="form-line">
                                        <?php $value = ""; ?>
                                        <?php foreach($machines as $machine): ?>
                                            <?php 
                                                if ($order["technology_id"] == $machine["id"]) {
                                                    $value = $machine["name"]; 
                                                    break;
                                                }
                                            ?>
                                        <?php endforeach; ?>
                                        <input readonly type="text" class="form-control text-left" value="<?= $value; ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2">
                                <label for = "color_id">Материал</label>
                            </div>

                            <div class="col-lg-10">
                                <div class="form-group">
                                    <div class="form-line">
                                        <?php $value = ""; ?>
                                        <?php foreach($materials as $material): ?>
                                            <?php 
                                                if ($order["material_id"] == $material["id"]) {
                                                    $value = $material["name"]; 
                                                    break;
                                                }
                                            ?>
                                        <?php endforeach; ?>
                                        <input readonly type="text" class="form-control text-left" value="<?= $value; ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>                                   

                        <div class="row clearfix">
                            <div class="col-lg-2">
                                <label for = "color_id">Цвет</label>
                            </div>

                            <div class="col-lg-10">
                                <div class="form-group">
                                    <div class="form-line">
                                        <?php $value = ""; ?>
                                        <?php foreach($colors as $color): ?>
                                            <?php 
                                                if ($order["color_id"] == $color["id"]) {
                                                    $value = $color["name"]; 
                                                    break;
                                                }
                                            ?>
                                        <?php endforeach; ?>
                                        <input readonly type="text" class="form-control text-left" value="<?= $value; ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>                                

                        <div class="row clearfix">
                            <div class="col-lg-2">
                                <label for = "quantity">Количество</label>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input readonly type="text" id = "quantity" class="form-control text-right" value="<?= $order['quantity']; ?>" data-rule="quantity">
                                    </div>                                                    
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <label for = "volume">Объем</label>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input readonly type="text" id = "volume" name = "volume" value = "<?= $order['volume']; ?>" class="form-control text-right">
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class = "row clearfix">
                            <div class="row clearfix">
                                <div class="col-lg-3">
                                    <label for = "size">Габариты (мм)</label>
                                </div>

                                <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                     <div class="col-lg-3">
                                         <div class="form-group">
                                            <div class="form-line">
                                                <input readonly type="text" id = "size-x" name = "size_x" class="form-control text-center" value="<?= $order['size_x']; ?>" />
                                            </div>
                                         </div>
                                     </div>
                                     <div class="col-lg-3">
                                         <div class="form-group">
                                            <div class="form-line">
                                                <input readonly type="text" id = "size-y" name = "size_y" class="form-control text-center" value="<?= $order['size_y']; ?>" />
                                            </div>
                                         </div>
                                     </div>
                                     <div class="col-lg-3">
                                         <div class="form-group">
                                            <div class="form-line">
                                                <input readonly type="text" id = "size-z" name = "size_z" class="form-control text-center" value="<?= $order['size_z']; ?>" />
                                            </div>
                                         </div>
                                     </div>

                                </div>
                            </div>                                       
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                <label for = "description">Описание заказа</label>
                            </div>                

                            <div class="col-lg-10">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea readonly rows="4" name="description" class="form-control" placeholder="Описание"><?= $order['description']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class = "col-lg-6">
                        <canvas id = "modelcanvas" height = "500" width="400"></canvas>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php if ($images): ?>
            <div class="card">
                <div class="header">
                    <h2>
                        Изображения
                    </h2>
                </div>
                <div class = "body">
                    <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                        <?php foreach($images as $img): ?>

                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <?php $url = base_url() . 'uploads/orders/' . $img["path"] . '/' . $img['file_name']; ?>
                                <a href="<?= $url; ?>" data-sub-html="">
                                    <img class="img-responsive thumbnail" src = "<?= $url; ?>" /> 
                                </a>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        
        <?php if ($models): ?>
            <div class="card">
                <div class="header">
                    <h2>
                        Модели
                    </h2>
                </div>
                <div class = "body">
                    <div class="row">
                        <?php $firstModelUrl = ""; ?>
                        <?php foreach($models as $model): ?>
                        <div class="col-xs-6 col-md-3">
                            <?php $url = base_url() . $model["path"] . '/' . $model['file_name']; 
                                if (empty($firstModelUrl)) {
                                    $firstModelUrl = $url; 
                                }
                            ?>
                            <a href="<?= $url; ?>" download class="thumbnail">
                                
                                <?php             
                                    $info = pathinfo($model["file_name"]);
                                ?>
                                <?php if (strtoupper($info['extension']) == "STL"): ?>
                                    <img src="<?= base_url() . "/public/images/stl_icon.png" ?>" class="img-responsive">
                                <?php elseif (strtoupper($info['extension']) == "OBJ"): ?>
                                    <img src="<?= base_url() . "/public/images/obj_icon.png" ?>" class="img-responsive">
                                <?php endif;?>
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>        
        
        <?php if ($documents): ?>
            <div class="card">
                <div class="header">
                    <h2>
                        Документы
                    </h2>
                </div>
                <div class = "body">
                    <div class="row">
                        <?php foreach($documents as $document): ?>
                        <div class="col-xs-6 col-md-3">
                            <?php $url = base_url() . $document['path'] . "/" .$document['file_name']; ?>
                            <a href="<?= $url; ?>" download class="thumbnail">
                                <img src="<?= base_url() . "/public/images/pdf_icon.png" ?>" class="img-responsive">
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>        
    </div>
</div>
<!-- Autosize Plugin Js -->
<script src="<?= base_url() ?>public/plugins/autosize/autosize.js"></script>
<script src="<?= base_url() ?>public/js/machines.js"></script>
<!-- Light Gallery Plugin Js -->
<script src="<?= base_url() ?>public/plugins/light-gallery/js/lightgallery-all.js"></script>

<!-- Custom Js -->
<script src="<?= base_url() ?>public/js/pages/medias/image-gallery.js"></script>

<script type="text/javascript" src="/public/plugins/jsmodeler/three.min.js"></script>
<script type="text/javascript" src="/public/plugins/jsmodeler/jsmodeler.js"></script>
<script type="text/javascript" src="/public/plugins/jsmodeler/jsmodeler.ext.three.js"></script>

<script type="text/javascript" src="/public/plugins/cadviewer/floatingdialog.js"></script>
<script type="text/javascript" src="/public/plugins/cadviewer/importerviewer.js"></script>
<script type="text/javascript" src="/public/plugins/cadviewer/importermenu.js"></script>
<script type="text/javascript" src="/public/plugins/cadviewer/importerapp.js"></script>
    
<script>
    
    <?php if (isset($firstModelUrl) && !empty($firstModelUrl)): ?>
        $(document).ready(function () {
            var importerApp = new ImporterApp ();
            importerApp.Init ();
            files = ["<?= $firstModelUrl; ?>"];
            importerApp.LoadFilesFromUrl (files, false);

        });    
    <?php endif; ?>
    
    $("#orders").addClass('active');
</script>
