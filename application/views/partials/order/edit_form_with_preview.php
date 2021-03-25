<?php echo form_open_multipart(base_url("home/order/$publicID"), '');?>
    <div class="modal fade" id="detailEdit" tabindex="-1" aria-labelledby="detailEdit" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
           <div class="modal-content">
                <div class="modal-header">
                   <h4 class="modal-title">Редактировать</h4>
                   <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <div class="container">
                        <input type = "hidden" id = "public_id" name = "public_id"  value = "<?php echo $order["public_id"]; ?>"/>
                        <div class="row bg-white mb-3 p-3 rounded-lg">
                            <div class="col-lg-6">
                                 <div class="row">
                                     <div class="col-lg-12 mb-3">
                                        <label class="form-label h6" for="detail-input1">Загруженные модели</label>
                                     </div>

                                     <div class="col-12 mb-3">
                                         <?php /* <img style="width: 100%;" class="" src="<?php echo base_url();?>/public/img/lc/detail.jpg" alt="detail-plhr"> */; ?>
                                         <canvas id = "modelcanvas" height = "500" width="400"></canvas>
                    `
                                     </div>
                                 </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                       <label class="form-label h6" for="technology_id">Технология</label>
                                        <select class="form-control show-tick" id = "technology_id" name = "technology_id">
                                            <?php foreach($technologies as $technology): ?>
                                                <?php if (!empty($technology['name'])): ?>
                                                    <option value = "<?= $technology['id']; ?>" <?= ($technology['id'] == $order["technology_id"] ? "selected" : "") ?> ><?= $technology['name']; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>                                       
                                    </div>
                                    <div class="col-12 mb-3">
                                       <label class="form-label h6" for="material_id">Материал</label>
                                        <select class="form-control show-tick" id = "material_id" name = "material_id">
                                            <?php foreach($materials as $material): ?>
                                                <?php if (!empty($material['name'])): ?>
                                                    <option value = "<?= $material['id']; ?>"  <?= ($material['id'] == $order["material_id"] ? "selected" : "") ?>><?= $material['name']; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>                                       
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                       <label class="form-label h6" for="color_id">Цвет</label>
                                        <select class="form-control show-tick" id = "color_id" name = "color_id">
                                            <?php foreach($colors as $color): ?>
                                                <?php if (!empty($color['name'])): ?>
                                                    <option value = "<?= $color['id']; ?>"  <?= ($color['id'] == $order["color_id"] ? "selected" : "") ?>><?= $color['name']; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>                                
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                       <label class="form-label h6" for="quantity">Количество</label>
                                       <input class="form-control" id="quantity" type="text" name = "quantity" value = "<?php echo $order["quantity"]; ?>" />
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                       <label class="form-label h6" for="filling">Заполнение (%)</label>
                                       <input class="form-control" id="filling" type="text" name = "filling" value = "<?php echo $order["filling"]; ?>" />
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                       <label class="form-label h6" for="quality_id">Точность (мм)</label>
                                        <select class="form-control show-tick" id = "quality_id" name = "quality_id">
                                            <?php foreach($qualities as $quality): ?>
                                                <?php if (!empty($quality['value'])): ?>
                                                    <option value = "<?= $quality['id']; ?>"  <?= ($quality['id'] == $order["quality_id"] ? "selected" : "") ?>><?= $quality['value']; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>  
                                    </div>


                                    <div class="col-lg-12 mb-5">
                                       <label class="form-label h6" for="description">Комментарии</label>
                                       <textarea class="form-control" type="text" id = "description" name = "description" rows="4"></textarea>
                                    </div>

                                    <div class="text-right">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                       <input type="submit" class="btn btn-primary" name = "submit" value = "Сохранить изменения" />
                                    </div>
                                </div>
                            </div>

                        </div>
                   </div>

                </div>
             </div>
        </div>
    </div>
<?php echo form_close(); ?>
