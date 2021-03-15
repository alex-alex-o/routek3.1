<!-- Star main-header -->
<div
  class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h3">Запросы цен</h1>
  <div class="form-row">
    <div class="form-group col-6">
        <label for="orderType">Тип</label>
        <select id="orderType" class="browser-default custom-select">
            <?php foreach($orderTypes as $orderType): ?>
                <option <?php echo ($orderType["id"] == $typeID ? "selected" : ""); ?> value = "<?= $orderType["id"]; ?>"><?= $orderType["name"]; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
      
    <div class="form-group col-6">
        <label for="orderActuality">Статус</label>
        <select id="orderActuality" class="browser-default custom-select">
            <?php foreach($actualities as $key => $value): ?>
                <option <?php echo ($key == $actuality ? "selected" : ""); ?> value = "<?= $key ?>"><?= $value; ?></option>
            <?php endforeach;?>
        </select>
    </div>

  </div>

</div>
<!-- End main-header -->


<div class="container-fluid">
    <?php if (isset($actualOrders) && count($actualOrders) > 0): ?>
        <?php $i = 0; ?>
        <?php foreach($actualOrders as $order): ?>
            <div class="row px-3 py-1 bg-white mb-3 rounded-lg hoverable justify-content-between">

                <div class="my-2"><img  src="<?php echo empty($order["snapshot"]) ? base_url() . "/public/img/lc/detail.jpg" : $order["snapshot"]; ?>" height="96" alt="Изображение заказа" ></div>
                <div class="my-2">
                    <p class="mb-0 ">Название</p>
                    <h6 class="font-weight-bold"><?php echo $order["name"]; ?></h6>
                    <p class="mb-0">Цвет</p>
                    <h6 class="font-weight-bold" ><?php echo $order["color"]; ?></h6>
                </div>

                <div class="my-2">
                    <p class="mb-0">Технология</p>
                    <h6 class="font-weight-bold"><?php echo $order["technology_short"];?></h6>
                    <p class="mb-0">Материал</p>
                    <h6 class="font-weight-bold" ><?php echo $order["material"]; ?></h6>
                </div>

                <div class="my-2">
                    <p class="mb-0">Точность</p>
                    <h6 class="font-weight-bold"><?php echo $order["quality"]; ?></h6>
                    <p class="mb-0">Заполнение</p>
                    <h6 class="font-weight-bold" ><?php echo $order["filling"]; ?></h6>
                </div>

                <div class="my-2">
                    <p class="mb-0">Дата подачи</p>
                    <h6 class="font-weight-bold" ><?php echo $order["created_at"];?></h6>
                    <p class="mb-0">Габариты</p>
                    <h6 class="font-weight-bold" ><?php echo $order["size_x"];?>x<?php echo $order["size_y"];?>x<?php echo $order["size_z"];?></h6>
                </div>

                <div class="my-2">
                    <h6 class="font-weight-bold text-primary my-0" >Стоимость заказа</h6>
                    <?php if ($order["cost"] > 0): ?>
                        <table>
                            <tbody>
                                <tr>
                                    <td>Срок изготовления:</td>
                                    <td class="text-right font-weight-bold px-2"><?= $order["lead_time"]; ?></td>
                                    <td class="text-left">рабочих дней</td>
                                </tr>
                                <tr>
                                    <td>Стоимость изготовления:</td>
                                    <td class="text-right font-weight-bold px-2"><?= $order["cost"]; ?></td>
                                    <td class="text-left">рублей</td>
                                </tr>
                                <tr>
                                    <td>Стоимость доставки:</td>
                                    <td class=" text-right font-weight-bold px-2"><?= $order["shipping_cost"]; ?></td>
                                    <td class="text-left">рублей</td>
                                </tr>
                                <tr>
                                    <td>Стоимость постобработки:</td>
                                    <td class=" text-right font-weight-bold px-2"><?= $order["finish_cost"]; ?></td>
                                    <td class="text-left">рублей</td>
                                </tr>
                                
                                <tr class="border-top">
                                    <td class="font-weight-bold  text-primary">Полная стоимость:</td>
                                    <td class="font-weight-bold  text-primary text-right px-2"><?= $order["cost"] + $order["shipping_cost"] + $order["finish_cost"]; ?></td>
                                    <td class="font-weight-bold  text-primary">рублей</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class=" text-center my-auto">
                            <a class = "btn btn-sm btn-primary waves-effect" href = "/user/orders/pay/<?php echo $order["public_id"]; ?>">Оплатить</a>
                        </div>

                    <?php else: ?>
                        <table>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td class="text-right font-weight-bold px-2"></td>
                                    <td class="text-left"></td>
                                </tr>
                                <tr>
                                    <td>Стоимость изготовления:</td>
                                    <td class="text-right font-weight-bold px-2">Рассчитывается...</td>
                                    <td class="text-left"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class=" text-right font-weight-bold px-2"></td>
                                    <td class="text-left"></td>
                                </tr>

                                <tr class="border-top">
                                    <td class="font-weight-bold  text-primary"></td>
                                    <td class="font-weight-bold  text-primary text-right px-2"></td>
                                    <td class="font-weight-bold  text-primary"></td>
                                </tr>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
                
            </div>

        <?php endforeach; ?>
  <?php endif; ?>

</div>

<script>
    document.getElementById('orderActuality').onchange = function() {
        window.location = "<?= base_url() ?>user/offers/index/" + this.value + "/" + document.getElementById('orderType').value;
    };
    
    document.getElementById('orderType').onchange = function() {
        window.location = "<?= base_url() ?>user/offers/index/" + document.getElementById('orderActuality').value + "/" + this.value;
    };
    
</script>