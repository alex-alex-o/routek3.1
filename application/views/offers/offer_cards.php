<!-- JQuery DataTable Css -->
<link href="<?= base_url()?>public/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet" />  
<!-- Bootstrap Select Css -->
<link href="<?= base_url() ?>public/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />


<!-- Bootstrap Select Css -->
<link href="<?= base_url() ?>public/plugins/light-gallery/css/lightgallery.css" rel="stylesheet">

<link href="<?= base_url() ?>public/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class = "row clearfix">
            <div class = "col-sm-4">   
                <label for = "type_id">Тип</label>
                <div class="form-group">
                    <div class="form-line">
                        <select class="form-control show-tick" id = "type_id" >
                            <option value = "0">Все</option>
                            <option value = "1">3D-печать</option>
                            <option value = "2"> Инженерные работы</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class = "col-sm-4">    
                <label for = "status_id">Статус</label>
                <div class="form-group">
                    <div class="form-line">
                        <select class="form-control show-tick" id = "status_id" >
                            <option value = "0">Все</option>
                            <option value = "1">Текущие</option>
                            <option value = "2">Архив</option>
                        </select>
                    </div>
                </div>
            </div>            
        </div>
        
        <div class="tab-content">
            <?php if (isset($actualOrders) && count($actualOrders) > 0): ?>
                <div role="tabpanel" class="tab-pane fade in active" id = "actual">
                    <div class="cards">
                        <?php foreach($actualOrders as $order): ?>
                            <div class="card">
                                
                                <div class = "header">
                                    <h2>
                                        <?php echo "B500-" . $order["id"] * 10;?>                                        
                                    </h2>
                                </div>
                                
                                <div class="body">
                                    <div class ="row clearfix">
                                        <div class="col-xs-12">
                                            <div class="col-xs-2">
                                                <div class = "row">
                                                    <img height = "200px" src = "<?php echo $order["snapshot"]; ?>" />
                                                </div>
                                            </div>
                                            
                                            <div class="col-xs-4">
                                                <div class = "row">
                                                    <div class="col-xs-4">
                                                        <b>Технология: </b>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <?php echo $order["technology_short"];?> (<?php echo $order["technology"];?>)
                                                    </div>
                                                </div>
                                                <div class = "row">
                                                    <div class="col-xs-4">
                                                        <b>Материал: </b>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <?php echo $order["material"];?>
                                                    </div>
                                                </div>
                                                <div class = "row">
                                                    <div class="col-xs-4">
                                                        <b>Дата подачи: </b>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <?php echo strftime("%B %d, %Y", strtotime($order['created_at'])); ?>
                                                    </div>
                                                </div>   
                                                <div class = "row">
                                                    <div class="col-xs-4">
                                                        <b>Качество: </b>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <?php echo "высокое"; //echo $order["quality"];?>
                                                    </div>
                                                </div>                                                   
                                                <div class = "row">
                                                    <div class="col-xs-4">
                                                        <b>Заполнение: </b>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <?php echo $order["filling"];?>
                                                    </div>
                                                </div>                                                   
                                                
                                            </div>
                                            <div class="col-xs-3">
                                                <div class = "row">
                                                    <div class="col-xs-4">
                                                        <b>Цвет: </b>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <?php echo $order["color"];?>
                                                    </div>
                                                </div>
                                                <div class = "row">
                                                    <div class="col-xs-4">
                                                        <b>Габариты (мм): </b>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <?php echo $order["size_x"];?>x<?php echo $order["size_y"];?>x<?php echo $order["size_z"];?>
                                                    </div>
                                                </div>
                                                 
                                            </div>
                                            <div class="col-xs-1">
                                                <div class = "row">
                                                    <?php echo $order["quantity"]; ?> шт.
                                                </div>
                                            </div>

                                            <div class="col-xs-2">
                                                <div class = "row">
                                                    <?php if (isset($offers[$order["id"]])): ?>
                                                        <a class = "btn bg-indigo waves-effect m-b-15" role = "button" data-toggle="collapse" href="#offers_<?php echo $order["id"]; ?>" aria-expanded="false" aria-controls="offers_<?php echo $order["id"]; ?>">
                                                            Показать предложения
                                                        </a>
                                                    <?php else: ?>
                                                        <a class = "btn bg-indigo waves-effect m-b-15 disabled" role = "button" data-toggle="collapse" href="#offers_<?php echo $order["id"]; ?>" aria-expanded="false" aria-controls="offers_<?php echo $order["id"]; ?>">
                                                            Сбор предложений...
                                                        </a>
                                                    <?php endif; ?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class = "col-sm-12">

                                            <div class="collapse" id = "offers_<?php echo $order["id"]; ?>">
                                                <div class="well">
                                                    <div class="body table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <th>Время выполнения (дн.)</th>
                                                                <th>Стоимость (руб.)</th>
                                                                <th>Дата ответа</th>
                                                                <th></th>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach($offers[$order["id"]] as $offer): ?>
                                                                    <tr>
                                                                        <td><?php echo $offer["lead_time"]; ?></td>
                                                                        <td><?php echo $offer["cost"]; ?></td>
                                                                        <td><?php echo $offer["response_date"]; ?></td>
                                                                        <td><a href = "/user/orders/select_offer/<?php echo $offer["id"]; ?>" class = "btn btn-primary">Принять</a></td>
                                                                    </tr>
                                                                <?php endforeach;?>
                                                            </tbody>
                                                        </table>
                                                    </div>                                                
                                                </div>
                                            </div>                                     
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>

                    </div>
                </div>
            <?php endif; ?>

            <?php if (false && isset($archivedOrders) && count($archivedOrders) > 0): ?>
                <div role="tabpanel" class="tab-pane" id = "archived">
                    <div class="cards">
                        
                        <?php foreach($archivedOrders as $order): ?>
                            <div class="header">
                                <h2 style="display: inline-block;">
                                    Запросы <?php ?>
                                </h2>
                            </div>
                            <div class="body">
                                <?php var_dump($order); ?>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
                
                

    </div>
</div>

    
<div id = "details">

</div>


 <!-- Jquery DataTable Plugin Js -->
<script src="<?= base_url()?>public/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?= base_url()?>public/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<!-- Autosize Plugin Js -->
<script src="<?= base_url() ?>public/plugins/autosize/autosize.js"></script> 

<!-- Custom Js -->
 <script src="<?= base_url()?>public/js/pages/tables/jquery-datatable.js"></script>
 
<!-- Autosize Plugin Js -->
<script src="<?= base_url() ?>public/plugins/autosize/autosize.js"></script>

<script>
    $("#offers").addClass('active'); 
</script>