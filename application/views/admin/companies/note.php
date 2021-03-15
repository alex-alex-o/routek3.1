<!-- Bootstrap Select Css -->
<link href="<?= base_url() ?>public/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Заметка
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
                    
                    <?php echo form_open(base_url('admin/company/add_note/' . $company['id']), 'class="form-horizontal"')?> 
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for = "user_id">Сотрудник компании</label>
                            </div>

                            <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" id = "machine_id" name = "user_id">
                                            <option value="">-- Выбрать --</option>
                                            <?php foreach($users as $user): ?>
                                                <?php $selected = ($user["id"] == $companyNote["user_id"] ? "selected" : ""); ?>
                                                <option value = "<?= $user['id']; ?>" <?= $selected; ?>><?= $user['name']; ?>(<?= $user['username']; ?>)</option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for = "details">Детали:</label>
                            </div>

                            <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea id="details" name = "details"><?= $companyNote['details']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for = "problems">Проблемы</label>
                            </div>

                            <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea id = "problems" name = "problems"><?= $companyNote['problems']; ?></textarea>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>                    

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for = "result">Результат</label>
                            </div>

                            <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea id = "result" name = "result"><?= $companyNote['result']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>                    

                        <div class="row clearfix">
                            <div class="col-lg-12" style="text-align: center;">
                                <input type="submit" name="submit" value="Сохранить" class="btn btn-primary">
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

<!-- Ckeditor -->
<script src="<?= base_url()?>public/plugins/ckeditor/ckeditor.js"></script>
<!-- Custom Js -->
<script type="text/javascript">
//CKEditor
CKEDITOR.replace('problems');
CKEDITOR.replace('details');
CKEDITOR.replace('result');
CKEDITOR.config.height = 300;
</script>
