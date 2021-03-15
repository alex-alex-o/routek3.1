<div class="container-fluid">
    <div class = "col-sm-12">
        <div class="card">
            <div class="header">
                <h2>Заказы</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover dashboard-task-infos">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Заказ</th>
                                <th>Название</th>
                                <th>Статус</th>
                                <th>Стоимость</th>
                                <th>Дата оплаты</th>
                                <th>Время выполнения (дни)</th>
                                <th>Прогресс</th>
                                <th>Дедлайн</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach($orders as $order): ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td>
                                        <a href = "/engeneer/orders/view/<?php echo $order["id"]; ?>">
                                            <?php echo "Заказ " . $order["id"]; ?>
                                        </a>
                                    </td>
                                    
                                    <td>
                                        <?php echo $order["name"]; ?>
                                    </td>
                                   
                                    <td>
                                        <span class="label bg-green"><?php echo $order["status"]; ?></span>
                                    </td>
                                    
                                    <td>
                                        <?php echo $order["cost"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $order["payed_at"]; ?>
                                    </td>
                                    
                                    <td>
                                        <?php echo $order["lead_time"]; ?>
                                    </td>
                                    <td> 
                                        <?php 
                                            $progress = round(100 * $order['status_order'] / count($statuses));
                                            $color = "bg-indigo";
                                            if ($progress > 90) {
                                                $color = "bg-green";
                                            }
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
                                            //if (!empty($order["payed_at"])) {
                                                $date1 = new DateTime(date("Y-m-d H:i:s"));
                                                $date2 = new DateTime($order["started_at"]);
                                                $date2->modify('+ ' . $order["lead_time"] . ' day');
                                                $diff = $date1->diff($date2);
                                                
                                                echo $diff->days . " дня осталось";
                                            //}
                                        ?>                                        
                                    </td>
                                    <td>
                                        <?php if (isset($order["status_id"]) != 3): ?>
                                            <a class = "btn btn-primary" href = "/engeneer/orders/view/<?php echo $order["id"]; ?>">Изменить статус</a>
                                        <?php endif; ?>
                                    </td>
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

