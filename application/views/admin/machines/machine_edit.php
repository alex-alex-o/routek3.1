<!-- Bootstrap Select Css -->
<link href="<?= base_url() ?>public/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Редактирование параметров оборудования
                </h2>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <?php if(isset($msg) || validation_errors() !== ''): ?>
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-warning"></i> Внимание!</h4>
                            <?= validation_errors();?>
                            <?= isset($msg)? $msg: ''; ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php echo form_open(base_url('admin/machines/edit/' . $companyMachine['id']), 'class="form-horizontal"')?> 
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for = "machine_id">Тип оборудования</label>
                            </div>

                            <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" id = "machine_id" name = "machine_id">
                                            <option value="">-- Выбрать --</option>
                                            <?php foreach($machines as $machine): ?>
                                                <?php $selected = ($machine["id"] == $companyMachine["machine_id"] ? "selected" : ""); ?>
                                                <option value = "<?= $machine['id']; ?>" <?= $selected; ?>><?= $machine['name']; ?></option>
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
                                        <input type="text" id = "name" name = "name" value = "<?= $companyMachine['name']; ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for = "name">Количество</label>
                            </div>

                            <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id = "quantity" name = "quantity" value = "<?= $companyMachine['quantity']; ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Параметры оборудования -->
                        <div id = "params-block">
                        </div>
                    
                        <div class="row clearfix">
                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                <input type = "submit" name = "submit" value = "ОБНОВИТЬ" class="btn btn-primary m-t-15 waves-effect">
                            </div>
                        </div>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Autosize Plugin Js -->
<script src="<?= base_url() ?>public/plugins/autosize/autosize.js"></script>
<script src="<?= base_url() ?>public/js/machines.js"></script>

<script>
    $(document).ready(function () {
        fillParamValues(<?= $companyMachine['id']; ?>, "<?php echo site_url() . 'admin/machines/get_machine_param_values' ?>");
        
        $('#machine_id').on('change', function () {
            fillParams($('#machine_id').val(), "<?php echo site_url() . 'admin/machines/get_machine_params' ?>");
        });
    });
    
    $("#machines").addClass('active');
</script>
