<!-- Bootstrap Select Css -->
<link href="<?= base_url() ?>public/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Добавить оборудование
                </h2>
                <a href="<?= base_url('company/machines/'); ?>" class="btn bg-deep-orange waves-effect pull-right">Парк машин</a>
            </div>

            <div class="body">
                <div class="row clearfix">
                    <div class="col-md-12">
                        <?php if(isset($msg) || validation_errors() !== ''): ?>
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-warning"></i> Внимание!</h4>
                                <?= validation_errors();?>
                                <?= isset($msg)? $msg: ''; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php echo form_open(base_url('company/machines/add'), 'class="form-horizontal"');  ?> 

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for = "machine_id">Технология</label>
                            </div>

                            <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" id = "machine_id" name = "machine_id">
                                            <option value="">-- Выбрать --</option>
                                            <?php foreach($machines as $machine): ?>
                                                <option value = "<?= $machine['id']; ?>"><?= $machine['name']; ?>)</option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for = "name">Производитель/Модель</label>
                            </div>

                            <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id = "name" name = "name" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for = "quantity">Количество</label>
                            </div>

                            <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id = "quantity" name = "quantity" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Параметры оборудования -->
                        <div id = "params-block">
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                <input type="submit" name="submit" value="ДОБАВИТЬ" class="btn btn-primary m-t-15 waves-effect">
                            </div>
                        </div>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>public/js/machines.js"></script>

<script>
    $(document).ready(function () {
        $('#machine_id').on('change', function () {
            fillParams($('#machine_id').val(), "<?php echo site_url() . 'company/machines/get_machine_params' ?>");
        });
    });
    
    $("#machines").addClass('active');
</script>