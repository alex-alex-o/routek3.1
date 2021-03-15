
<!-- Bootstrap Select Css -->
<link href="<?= base_url() ?>public/plugins/light-gallery/css/lightgallery.css" rel="stylesheet">

<link href="<?= base_url() ?>public/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<div class="row clearfix">
    
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Заказ <?= $order["id"]; ?>
                    </h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="row clearfix">
                            <div class="col-lg-8">
                                <div class="row clearfix">
                                    <?php echo form_open(base_url('admin/orders/change_status/' . $order["id"]), 'id = "covid-form" class="form-horizontal"' )?> 
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for = "status_id">Статус</label>
                                        </div>

                                        <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select readonly class="form-control show-tick" id = "status_id" name = "status_id">
                                                        <?php $disabled = "disabled"; ?>
                                                        <?php foreach($statuses as $status): ?>
                                                            <?php $selected = ($order["status_id"] == $status["id"] ? "selected" : ""); ?>
                                                            <option <?=$disabled; ?> value = "<?= $status['id']; ?>" <?= $selected; ?>><?= $status['name']; ?></option>
                                                            <?php $disabled = ""; ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                                <input type="submit" name="submit" value="ОБНОВИТЬ" class="btn btn-primary m-t-15 waves-effect">
                                            </div>
                                        </div>                                   
                                    <?php echo form_close(); ?>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                    </div>

                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <?php $checked = ($order["no_model"] ? "" : "checked='checked'"); ?>
                                        <input readonly type = "checkbox" id = "i_have_model" <?=$checked; ?> />
                                        <label class = "big" for = "i_have_model">У меня есть STL-файл модели для печати</label>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                    </div>

                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <?php $checked = ($order["is_free"] ? "checked='checked'" : ""); ?>
                                        <input readonly type="checkbox" id = "is_free" name = "is_free" <?=$checked; ?>  />
                                        <label class= "big" for="is_free">Заказ для неотложных медицинских целей (бесплатное выполнение)</label>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for = "machine_id">Технология</label>
                                    </div>

                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select readonly class="form-control show-tick" id = "machine_id" name = "machine_id">
                                                    <option value="">-- Выбрать --</option>
                                                    <?php foreach($machines as $machine): ?>
                                                        <?php $selected = ($order["technology_id"] == $machine["id"] ? "selected" : ""); ?>
                                                        <option value = "<?= $machine['id']; ?>" <?= $selected; ?>><?= $machine['name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for = "color_id">Материал</label>
                                    </div>

                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select readonly class="form-control show-tick" id = "color_id" name = "material_id">
                                                    <option value="">-- Выбрать --</option>
                                                    <?php foreach($materials as $material): ?>
                                                        <?php $selected = ($order["material_id"] == $material["id"] ? "selected" : ""); ?>
                                                        <option value = "<?= $material['id']; ?>" <?= $selected; ?>><?= $material['name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                   

                                <div class="row clearfix">

                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for = "finishes">Финишная обработка</label>
                                    </div>

                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select readonly class="form-control show-tick" id = "finish_id" name = "finishes">
                                                    <option value="">-- Выбрать --</option>
                                                    <?php foreach($finishes as $finish): ?>
                                                        <?php $selected = ($order["finish_id"] == $finish["id"] ? "selected" : ""); ?>
                                                        <option value = "<?= $finish['id']; ?>" <?= $selected; ?>><?= $finish['name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for = "color_id">Цвет</label>
                                    </div>

                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select readonly class="form-control show-tick" id = "color_id" name = "color_id">
                                                    <option value="">-- Выбрать --</option>
                                                    <?php foreach($colors as $color): ?>
                                                        <?php $selected = ($order["color_id"] == $color["id"] ? "selected" : ""); ?>
                                                        <option value = "<?= $color['id']; ?>" <?= $selected; ?>><?= $color['name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for = "quantity">Количество</label>
                                    </div>

                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input readonly type="text" id = "quantity" class="form-control text-center" value="<?= $order['quantity']; ?>" data-rule="quantity">
                                            </div>                                                    
                                        </div>
                                    </div>

                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for = "volume">Объем</label>
                                    </div>

                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input readonly  type="text" id = "volume" name = "volume" value = "<?= $order['volume']; ?>" class="form-control text-right">
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class = "row clearfix">
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for = "size">Габариты (мм)</label>
                                        </div>

                                        <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                             <div class="col-lg-3">
                                                 <div class="form-group">
                                                    <div class="form-line">
                                                        <input readonly  type="text" id = "size-x" name = "size_x" class="form-control text-center" value="<?= $order['size_x']; ?>" />
                                                    </div>
                                                 </div>
                                             </div>
                                             <div class="col-lg-3">
                                                 <div class="form-group">
                                                    <div class="form-line">
                                                        <input readonly  type="text" id = "size-y" name = "size_y" class="form-control text-center" value="<?= $order['size_y']; ?>" />
                                                    </div>
                                                 </div>
                                             </div>
                                             <div class="col-lg-3">
                                                 <div class="form-group">
                                                    <div class="form-line">
                                                        <input readonly  type="text" id = "size-z" name = "size_z" class="form-control text-center" value="<?= $order['size_z']; ?>" />
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

                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea readonly  rows="4" name="description" class="form-control" placeholder="Описание"><?= $order['description']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            
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
                                <?php $url = base_url() . 'uploads/users/' . $this->session->userdata('user_id') . '/'. $order["order_id"] . '/' . $order["id"] . '/' . $img['file_name']; ?>
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
                        <?php foreach($models as $model): ?>
                        <div class="col-xs-6 col-md-3">
                            <?php $url = base_url() . 'uploads/users/' . $this->session->userdata('user_id') . '/'. $order["order_id"] . '/' . $order["id"] . '/' . $model['file_name']; ?>
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
                            <?php $url = base_url() . 'uploads/users/' . $this->session->userdata('user_id') . '/'. $order["order_id"] . '/' . $order["id"] . '/' . $document['file_name']; ?>
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

<script>
    $(document).ready(function () {
        
    });
    
    $("#orders").addClass('active');
</script>
