<div class="container-fluid">
    <div class = "col-sm-12">
        <div class="card">
            <div class="header">
                <h2>Запросы цен</h2>
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
                                <th>Количество</th>
                                <th>Стоимость</th>
                                <th>Дата запроса</th>
                                <th>Дата ответа</th>
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
                                        <a href = "/engeneer/offers/view/<?php echo $order["offer_id"]; ?>">
                                            <?php echo "Заказ " . $order["id"]; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?php echo $order["name"]; ?>
                                    </td>
                                    <td>
                                        <?php if ($order["answered_by_company"]): ?>
                                            <span class="label bg-indigo">Предложение отправлено</span>
                                        <?php else: ?>
                                            <span class="label bg-green"><?php echo $order["status"]; ?></span>
                                        <?php endif; ?>
                                    </td>
                                    
                                    <td style= "text-align: right;">
                                        <?php echo $order["quantity"]; ?>
                                    </td>
                                    
                                    <td style= "text-align: right;">
                                        <?php echo $order["cost"]; ?>
                                    </td>
                                    
                                    <td>
                                        <?php echo $order["request_date"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $order["response_date"]; ?>
                                    </td>
                                    <td>
                                        
                                        <?php
                                            if (empty($order["response_date"])) {
                                                $date1 = new DateTime(date("Y-m-d H:i:s"));
                                                $date2 = new DateTime($order["request_date"]);
                                                $date2->modify('+3 day');
                                                $diff = $date1->diff($date2);
                                                
                                                echo $diff->days . " дня осталось";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php if (empty($order["answered_by_company"])): ?>
                                            <a class = "btn btn-primary">Сделать предложение</a>
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

