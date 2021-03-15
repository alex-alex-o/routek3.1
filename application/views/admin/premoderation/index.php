<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="display: inline-block;">
                    Заказы
                </h2>
            </div>
            <div class="body">
                <div class="table-responsive ml-2 mr-2">
                  <table id = "na_datatable" class = "table">
                    <thead>
                      <tr>
                        <th>Название</th>
                        <th>Изображение</th>
                        <th>Технология</th>
                        <th>Материал</th>
                        <th>Цвет</th>
                        <th>Количество</th>
                        <th>Описание</th>
                        <th>Дата</th>
                        <th>Заказчик</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders  as $order): ?>
                            <tr>
                                <td><a href = "/admin/premoderation/view/<?php echo $order["id"]; ?>"><?php echo $order["name"]; ?></a></td>
                                <td><img src = "<?php  echo $order["snapshot"]; ?>" style = 'max-height: 100px'></td>
                                <td><?php echo $order["technology"]; ?></td>
                                <td><?php echo $order["material"]; ?></td>
                                <td><?php echo $order["color"]; ?></td>
                                <td><?php echo $order["quantity"]; ?></td>
                                <td><?php echo $order["description"]; ?></td>
                                <td><?php echo $order["created_at"]; ?></td>
                                <td><?php echo $order["user_name"]; ?><br /><?php echo $order["email"]; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>