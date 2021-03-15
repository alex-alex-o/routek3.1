<?php 
    $orderReadOnly = "readonly";
    
    $orderReadOnly = "";
    if ($order["answered_by_company"]) {
        $orderReadOnly = "readonly";
    }
?>

<!-- Bootstrap Select Css -->
<link href="<?= base_url() ?>public/plugins/light-gallery/css/lightgallery.css" rel="stylesheet">

<link href="<?= base_url() ?>public/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<!-- Dropzone Css -->
<link href="<?= base_url() ?>public/plugins/dropzone/dropzone.css" rel="stylesheet">

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php if(false): ?>
            <div class="alert alert-success">
                <h4><i class="icon fa fa-warning"></i> Внимание!</h4>
                <?= 'Предложение отправлено ' . $order["response_date"]; ?>
            </div>
        <?php endif; ?>        
    </div>
    
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class = "row clearfix">
            <div class = "col-lg-7">
                <div class="card">
                    <div class="header">
                        <h2>
                            Детали заказа <?= $order["id"]; ?>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="col-lg-6">
                            <div class="col-lg-4 form-control-label">
                                <label for = "started_at">Дата начала работы</label>
                            </div>

                            <div class="col-lg-8">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input <?= $orderReadOnly; ?> type="text" id = "cost" name = "started_at" class="form-control text-right" value="<?= $order['started_at']; ?>">
                                    </div>                                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="col-lg-4 form-control-label">
                                <label for = "start_date">Дата завершения работы</label>
                            </div>

                            <div class="col-lg-8">
                                <div class="form-group">
                                    <div class="form-line">
                                        <?php 
                                            $endDate = new DateTime($order["started_at"]);
                                            $endDate->modify('+ ' . $order["lead_time"] . ' day');                                            
                                        ?>
                                        <input <?= $orderReadOnly; ?> type="text" id = "finished_at" name = "finished_at" class="form-control text-right" value="<?= $endDate->format("Y-m-d h:m:s"); ?>">
                                    </div>                                                    
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-6">
                                <div class="col-lg-4 form-control-label">
                                    <label for = "payed_at">Дата оплаты</label>
                                </div>

                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input <?= $orderReadOnly; ?> type="text" id = "payed_at" name = "payed_at" class="form-control text-right" value="<?= $order['payed_at']; ?>">
                                        </div>                                                    
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-lg-6">
                                <div class="col-lg-4 form-control-label">
                                    <label for = "cost">Стоимость (руб)</label>
                                </div>

                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input <?= $orderReadOnly; ?> type="text" id = "cost" name = "cost" class="form-control text-right" value="<?= $order['cost']; ?>">
                                        </div>                                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class = "row clearfix">
                            <div class="col-lg-12">
                                <div class="col-lg-2 form-control-label">
                                    <label for = "status_name">Текущий статус</label>
                                </div>

                                <div class="col-lg-10">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input <?= $orderReadOnly; ?> type="text" id = "status_name" name = "status_name" class="form-control text-left" value="<?= $order['status']; ?>">
                                        </div>                                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php if ($order['comment']): ?>
                            <div class="row clearfix">
                                <div class="col-lg-4 form-control-label">
                                    <label for = "comment">Комментарий</label>
                                </div>                

                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea <?= $orderReadOnly; ?> rows="4" name="comment" class="form-control" placeholder="Комментарий"><?= $order['comment']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for = "name">Название изделия</label>
                            </div>

                            <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input <?= $orderReadOnly;?> type="text" id = "name" class="form-control text-left" value="<?= $order['name']; ?>">
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
                                                <input <?= $orderReadOnly;?> type="text" id = "quantity" class="form-control text-right" value="<?= $order['quantity']; ?>" data-rule="quantity">
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
                                                        <input <?= $orderReadOnly;?> type="text" id = "size-x" name = "size_x" class="form-control text-right" value="<?= $order['size_x']; ?>" />
                                                    </div>
                                                 </div>
                                             </div>
                                             <div class="col-lg-3">
                                                 <div class="form-group">
                                                    <div class="form-line">
                                                        <input <?= $orderReadOnly;?> type="text" id = "size-y" name = "size_y" class="form-control text-right" value="<?= $order['size_y']; ?>" />
                                                    </div>
                                                 </div>
                                             </div>
                                             <div class="col-lg-3">
                                                 <div class="form-group">
                                                    <div class="form-line">
                                                        <input <?= $orderReadOnly;?> type="text" id = "size-z" name = "size_z" class="form-control text-right" value="<?= $order['size_z']; ?>" />
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
                                        <textarea <?= $orderReadOnly;?> rows="4" name="description" class="form-control" placeholder="Описание"><?= $order['description']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-5">
                <div class="card">
                    <div class="header">
                        <h2>
                            Управление заказом
                        </h2>
                    </div>
                    <div class="body">
                        <h2>Файлы</h2>
                        <?php if (isset($order["status_id"]) != 3): ?>
                            <?php echo form_open_multipart(base_url('engeneer/orders/result_upload/' .  $order['user_id'] . '/' . $order["order_id"] . '/' . $order['id']));?>
                                <div class="row clearfix">
                                    <div class="col-lg-6">
                                        <input type="file" name="files[]" multiple/>
                                    </div>

                                    <div class="col-lg-6">
                                        <input type = "submit" name = "submit" value = "Загрузить" class="btn btn-primary center-block">
                                    </div>
                                </div>
                            <?php echo form_close();?>      
                        <?php endif; ?>
                        
                        <?php if (isset($resultFiles) && count($resultFiles) > 0): ?>
                            <div class="row clearfix">
                                <div class="col-lg-12">
                                    <table with="100%">
                                        <thead>
                                            <tr>
                                                <th width = "3%"></th>
                                                <th width = "90%"></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach($resultFiles as $file): ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><a href = "<?php echo base_url($file["path"] . "/" . $file["file_name"]);?>"><?php echo $file["orig_name"]; ?></a></td>
                                                    <td>
                                                        <?php if (isset($order["status_id"]) != 3): ?>
                                                            <a  title = "Удалить" class = "delete btn btn-sm btn-danger"  data-href="<?php echo base_url('engeneer/orders/delete_file/' . $file['id'] . "/" . $order["id"]) ?>" data-toggle="modal" data-target="#confirm-delete"> <i class="material-icons">delete</i></a>
                                                        <?php endif; ?>                                                            
                                                    </td>
                                                </tr>
                                                <?php $i ++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        
                            <?php if (isset($order["status_id"]) != 3): ?>
                                <?php echo form_open(base_url('engeneer/orders/complete/' . $order['id']));?>
                                    <div class="row clearfix">
                                        <div class="col-lg-12">
                                            <input type = "submit" name = "submit" value = "Завершить заказ" class="btn btn-primary">
                                        </div>
                                    </div>

                                <?php echo form_close();?>                
                            <?php endif; ?>
                        <?php endif; ?>
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
                                <?php $url = base_url() . 'uploads/users/' . $order["user_id"] . '/'. $order["order_id"] . '/' . $order["id"] . '/' . $img['file_name']; ?>
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
                            <?php $url = base_url() . 'uploads/users/' . $order["user_id"] . '/'. $order["order_id"] . '/' . $order["id"] . '/' . $model['file_name']; ?>
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
                            <?php $url = base_url() . 'uploads/users/' . $order["user_id"] . '/'. $order["order_id"] . '/' . $order["id"] . '/' . $document['file_name']; ?>
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
<script src="<?= base_url()?>public/js/pages/tables/jquery-datatable.js"></script>
<!-- Light Gallery Plugin Js -->
<script src="<?= base_url() ?>public/plugins/light-gallery/js/lightgallery-all.js"></script>

<!-- Custom Js -->
<script src="<?= base_url() ?>public/js/pages/medias/image-gallery.js"></script>

<script>
    $(document).ready(function () {
        
    });
    
    //Delete Dialogue
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
    
    $("#orders").addClass('active');
</script>
