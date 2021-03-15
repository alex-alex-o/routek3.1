<?php 
    $orderReadOnly = "readonly";
    
    $offerReadOnly = "";
    if ($offer["answered_by_company"]) {
        $offerReadOnly = "readonly";
    }
?>

<!-- Bootstrap Select Css -->
<link href="<?= base_url() ?>public/plugins/light-gallery/css/lightgallery.css" rel="stylesheet">

<link href="<?= base_url() ?>public/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php if($offer["commited_by_user"] == true): ?>
            <div class="alert alert-success">
                <h4><i class="icon fa fa-warning"></i> Внимание!</h4>
                <?= 'Ваше предложение принято заказчиком. Вы назначены исполнителем. Ожидание поступления оплаты от заказчика.'; ?>
            </div>
        <?php endif; ?>
        
        <?php if($offer["answered_by_company"] == true): ?>
            <div class="alert alert-success">
                <h4><i class="icon fa fa-warning"></i> Внимание!</h4>
                <?= 'Предложение отправлено ' . $offer["response_date"]; ?>
            </div>
        <?php endif; ?>        
    </div>
    
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class = "row clearfix">
            <div class = "col-lg-8">
                <div class="card">
                    <div class="header">
                        <h2>
                            Детали заказа <?= $offer["id"]; ?>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for = "name">Название изделия</label>
                            </div>

                            <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input <?= $orderReadOnly;?> type="text" id = "name" class="form-control text-left" value="<?= $offer['name']; ?>">
                                    </div>                                                    
                                </div>
                            </div>

                        </div>
                        
                        <div class = "row clearfix">
                            <div class = "col-lg-4">
                                <div class="row clearfix">
                                    <div class="col-lg-6 form-control-label">
                                        <label for = "quantity">Количество</label>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input <?= $orderReadOnly;?> type="text" id = "quantity" class="form-control text-right" value="<?= $offer['quantity']; ?>" data-rule="quantity">
                                            </div>                                                    
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class = "col-lg-8">
                                    <div class="row clearfix">
                                        <div class="col-lg-3 form-control-label">
                                            <label for = "size">Габариты (мм)</label>
                                        </div>

                                        <div class="col-lg-9">
                                             <div class="col-lg-3">
                                                 <div class="form-group">
                                                    <div class="form-line">
                                                        <input <?= $orderReadOnly;?> type="text" id = "size-x" name = "size_x" class="form-control text-right" value="<?= $offer['size_x']; ?>" />
                                                    </div>
                                                 </div>
                                             </div>
                                             <div class="col-lg-3">
                                                 <div class="form-group">
                                                    <div class="form-line">
                                                        <input <?= $orderReadOnly;?> type="text" id = "size-y" name = "size_y" class="form-control text-right" value="<?= $offer['size_y']; ?>" />
                                                    </div>
                                                 </div>
                                             </div>
                                             <div class="col-lg-3">
                                                 <div class="form-group">
                                                    <div class="form-line">
                                                        <input <?= $orderReadOnly;?> type="text" id = "size-z" name = "size_z" class="form-control text-right" value="<?= $offer['size_z']; ?>" />
                                                    </div>
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
                                        <textarea <?= $orderReadOnly;?> rows="4" name="description" class="form-control" placeholder="Описание"><?= $offer['description']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card">
                    <div class="header">
                        <h2>
                            Ответ на запрос
                        </h2>
                    </div>
                    <div class="body">
                        <?php echo form_open(base_url('engeneer/offers/send_to_user/' . $offer['offer_id']), 'class="form-horizontal"')?> 

                            <div class="row clearfix">

                                <div class="col-lg-4 form-control-label">
                                    <label for = "lead_time">Время выполнения (в днях)</label>
                                </div>

                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input <?= $offerReadOnly; ?> type="text" id = "lead_time" name = "lead_time" class="form-control text-right" value="<?= $offer['lead_time']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>   

                            <div class="row clearfix">

                                <div class="col-lg-4 form-control-label">
                                    <label for = "cost">Стоимость (руб)</label>
                                </div>

                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input <?= $offerReadOnly; ?> type="text" id = "cost" name = "cost" class="form-control text-right" value="<?= $offer['cost']; ?>">
                                        </div>                                                    
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-4 form-control-label">
                                    <label for = "comment">Комментарий</label>
                                </div>                

                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea <?= $offerReadOnly; ?> rows="4" name="comment" class="form-control" placeholder="Комментарий"><?= $offer['comment']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <?php if (empty($offerReadOnly)):?>
                                <div class="row clearfix">
                                    <div class="col-lg-12">
                                        <input type = "submit" name = "submit" value = "Отправить предложение" class="btn btn-primary center-block">
                                    </div>
                                </div>
                            <?php endif; ?>

                        <?php echo form_close();?>                
                    </div>
                </div>
            </div>
        </div>
        
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
                                <?php $url = base_url() . 'uploads/users/' . $this->session->userdata('user_id') . '/'. $offer["order_id"] . '/' . $order["id"] . '/' . $img['file_name']; ?>
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
