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
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                       <label class="form-label h6" for="detail-input1">Загруженные модели</label>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <?php /* <img style="width: 100%;" class="" src="<?php echo base_url();?>/public/img/lc/detail.jpg" alt="detail-plhr"> */; ?>
                                        <canvas id = "modelcanvas" height = "500" width="400"></canvas>
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
