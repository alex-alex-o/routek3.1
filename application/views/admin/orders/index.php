    <!-- Bootstrap Select Css -->
    <link href="<?= base_url() ?>public/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<div class="container-fluid">
    <div class = "col-sm-12">
        <div class="card">
            <div class="header">
                <h2>Заказы</h2>
            </div>
            <div class="body">
                <div class = "row clearfix">
                    
                    <div class = "col-sm-4">   
                        <label for = "type_id">Тип</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control show-tick" id = "type_id" >
                                    <option value = "0">Все</option>
                                    <option value = "1">3D-печать</option>
                                    <option value = "2">Инженерные работы</option>
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
                                    <option value = "2">Выполненные</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class = "col-sm-4 align-right">    
                        <a href = "/home/index" class="btn btn-primary">Сделать новый заказ</a>
                    </div>
                        
                </div>
                
                <div class="table-responsive">
                    <table class="table table-hover dashboard-task-infos">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Заказ</th>
                                <th>Изображение</th>
                                <th>Технология</th>
                                <th>Статус</th>
                                <th>Количество</th>
                                <th>Стоимость</th>
                                <th>Дата оплаты</th>
                                <th>Дата доставки</th>
                                <th>Прогресс</th>
                                <th>Дедлайн</th>
                                <th>Заказчик</th>
                                <th>Исполнитель</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php $j = 0; ?>
                            <?php foreach($orders as $order): ?>
                                <?php 
                                    $images[0] = "/uploads/tmp/perehodnik.png";
                                    $images[1] = "/uploads/tmp/bear.png";
                                ?>                            
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td>
                                        <a href = "/user/orders/view/<?php echo $order["id"]; ?>">
                                            <?php echo "Z500-" . $order["id"] * 100; ?>
                                        </a>
                                    </td>                                    
                                    <td>
                                        <div class = "row">
                                            <img height = "50px" src = "<?php echo $order["snapshot"]; ?>" />
                                            <?php 
//                                                $j ++;
//                                                if ($i > 1) {
//                                                    $j = 0;
//                                                }
                                            ?>
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <?php echo $order["technology"]; ?>
                                    </td>
                                   
                                    <td>
                                        <span class="label bg-green"><?php echo $order["status"]; ?></span>
                                    </td>
                                    <td>
                                        <?php echo $order["quantity"]; ?>
                                    </td>                                    
                                    <td>
                                        <?php echo $order["cost"]; ?>
                                    </td>
                                    <td>
                                        <?php echo strftime("%B %d, %Y", strtotime($order['payed_at'])); ?>
                                    </td>
                                    <td>
                                        <?php echo strftime("%B %d, %Y", strtotime($order['shipped_at'])); ?>
                                    </td>

                                    <td> 
                                        <?php 
                                            $progress = 0;
                                            if ($order["status_id"] == 6) {
                                                $progress = 20;
                                            } 
                                            if ($order["status_id"] == 7) 
                                            {
                                                $progress = 100;
                                            }
                                            $color = "bg-green";
                                        ?>
                                        <div class="progress">
                                            <div class="progress-bar <?php echo $color; ?>" role="progressbar" 
                                                 aria-valuenow="<?php echo $progress?>" aria-valuemin="0" aria-valuemax="100" 
                                                 style="width: <?php echo  $progress; ?>%">
                                                
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                            if ($order["status_id"] != 7) {
                                                $date1 = new DateTime(date("Y-m-d H:i:s"));
                                                $date2 = new DateTime($order["started_at"]);
                                                $date2->modify('+ ' . $order["lead_time"] . ' day');
                                                $diff = $date1->diff($date2);
                                                
                                                echo $diff->days . " дня осталось";
                                            }
                                        ?>                                        
                                    </td>
                                    <td><?php echo $order["customer_name"]; ?> <br /> <?php echo $order["customer_email"]; ?></td>
                                    <td><?php echo $order["company_name"]; ?></td>
                                </tr>
                                <?php $i ++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

