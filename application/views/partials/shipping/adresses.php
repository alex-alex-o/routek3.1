<!-- Панель выбора адреса из списка сохраненных -->
<div id = "addressessPanel" class="row mt-3 ">
   <div class="col-md-2">
   </div>
   <div class="col-md-8">
        <div class="row g-3">
            <div class="col-md-12">
                <!-- Карточка ввода адреса  -->
                <div class = "card model-slide">
                    <?php echo form_open_multipart(base_url("user/shipping/$publicID"), '');?>
                        <div class="card-body text-center">
                           <h5 class="card-title mb-3">Выберите адрес доставки из сохраненных или добавьте новый</h5>
                        </div>

                        <?php $i = 0; ?>
                        <?php foreach($shippings as $shipping): ?>

                            <?php if ($i == 0): ?>
                                <div class="row justify-content-center mb-3">
                            <?php endif; ?>

                            <div class="col-4">
                                <input type="radio" class="btn-check" name="shipping_info_id" value="<?php echo $shipping["id"]; ?>" id="<?php echo $shipping["id"]; ?>" autocomplete="off" checked="checked">
                               <label class="btn btn-outline-secondary d-block" for="<?php echo $shipping["id"]; ?>">
                                   <b><?php echo $shipping["last_name"]; ?> <?php echo $shipping["first_name"]; ?> <?php echo $shipping["middle_name"]; ?> </b><br />
                                   <?php echo $shipping["city"]; ?> <?php echo $shipping["street"]; ?> <?php echo $shipping["house"]; ?> <?php echo $shipping["office"]; ?><br />
                                   <?php echo $shipping["phone"]; ?> <?php echo $shipping["email"]; ?>
                               </label>
                            </div>

                            <?php $i ++; ?>
                            <?php if ($i == 2): ?>
                                </div>
                                <?php $i = 0; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <?php if ($i > 0 && $i < 2): ?>
                            </div>
                        <?php endif; ?>   

                        <div class="card-body d-flex justify-content-between">
                            <span></span>
                            <div class="d-flex flex-wrap">
                                <button class="btn btn-success mr-3" type="button" data-toggle="modal" data-target="#addAddress">Добавить адрес</button>
                                <input type = "submit" class="btn btn-primary" value = "Отправить на расчет" />
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

