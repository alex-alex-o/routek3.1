<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Заказы</h1>

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

<?php foreach($actualOrders as $order): ?>
    <div class="card mb-4">    
        <div class="card-body d-flex flex-wrap justify-content-between">
            <div class="mx-2">
                <img  src="<?php echo empty($order["snapshot"]) ? base_url() . "/public/img/lc/detail.jpg" : $order["snapshot"]; ?>" height="64" alt="Изображение заказа" >
            </div>

            <div class="mx-2">
                <p class="mb-0 ">Заказ</p>
                <h6 class="font-weight-bold"><?php echo $order["name"];?></h6>
            </div>

            <div class="mx-2">
                <p class="mb-0">Технология</p>
                <h6 class="font-weight-bold"><?php echo $order["technology_short"]; ?></h6>
            </div>

            <div class="mx-2">
                <p class="mb-0">Статус</p>
                <h6 class="font-weight-bold text-primary"><?php echo $order["status"]; ?></h6>
            </div>

            <div class="mx-2">
                <p class="mb-0 ">Кол-во деталей</p>
                <h6 class="font-weight-bold"><?php echo $order["quantity"]; ?></h6>
            </div>

            <div class="mx-2">
                <p class="mb-0 ">Оплата</p>
                <h6 class="font-weight-bold">
                      <?php 
                          if (!empty($order['payed_at'])) {
                              echo strftime("%d.%m.%y", strtotime($order['payed_at'])); 
                          }
                      ?>                      
                </h6> 
            </div>

          
            <div class="mx-2">
                <p class="mb-0 ">Планируемая доставка</p>
                <h6 class="font-weight-bold">
                        <?php 

                            if (!empty($order['payed_at'])) {
                                echo strftime("%d.%m.%y", strtotime($order['payed_at'] . ' + ' . $order['lead_time'] . ' days')); 
                            }                              
                        ?>                      
                </h6>
            </div>

            <div class="mx-2">
                <?php 
                    $now = time(); 
                    $endDate = strtotime($order['payed_at'] . ' + ' . $order['lead_time'] . ' days');
                    $dateDiff = $endDate - $now;

                    $daysLeft =  $dateDiff > 0 ? round($dateDiff / (60 * 60 * 24)) : 0;    
                    $days     = $order["lead_time"];

                    $percent = 100 - ($days > 0 ? round(($daysLeft / $days) * 100, 0) : 0);
                ?>
                <p class="mb-0">Осталось дней</p>
                <div class="progress w-100 mr-2 rounded-soft bg-200" style="height: 5px;">
                    <div class="progress-bar rounded-capsule" role="progressbar" style="width: <?=$percent; ?>%;" aria-valuenow="<?= $percent; ?>"
                        aria-valuemin="0" aria-valuemax="<?= $days; ?>">

                    </div>
                </div>

                <div class="font-weight-bold ml-2"><?= $daysLeft; ?></div>
            </div>

            <div class="align-self-center mx-2">
                <a href = "/user/orders/view/<?php echo $order["public_id"]; ?>" class="btn btn-sm btn-primary waves-effect">Детали</a>
            </div>
      </div>
    </div>
<?php endforeach; ?>


<script>
    document.getElementById('orderActuality').onchange = function() {
        window.location = "<?= base_url() ?>user/orders/index/" + this.value + "/" + document.getElementById('orderType').value;
    };
    
    document.getElementById('orderType').onchange = function() {
        window.location = "<?= base_url() ?>user/orders/index/" + document.getElementById('orderActuality').value + "/" + this.value;
    };
</script>