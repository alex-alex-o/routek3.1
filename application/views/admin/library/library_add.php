<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2> Добавить модель в библиотеку </h2>
                <a href="<?= base_url('admin/library/'); ?>" class="btn bg-deep-orange waves-effect pull-right">Библиотека моделей</a>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-md-12">
                        <?php if(isset($msg) || validation_errors() !== ''): ?>
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-warning"></i> Предупреждение</h4>
                                <?= validation_errors();?>
                                <?= isset($msg)? $msg: ''; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php echo form_open(base_url('admin/library/add'), 'class="form-horizontal"');  ?> 
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="name">Название модели</label>
                            </div>

                            <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="group_name" name="name" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class = "col-lg-6">
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                        <label for="file">Файл модели</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <input type = "file" name = "files[]"  id = "file" size="20" multiple />
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                        <label for = "technology">Технология</label>
                                    </div>
                                    
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" id = "technology_id" name = "technology_id">
                                                    <option value=""> -- Не имеет значения -- </option>
                                                    <?php foreach($machines as $machine): ?>
                                                        <option value = "<?= $machine['id']; ?>"><?= $machine['name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                        <label for = "material">Материал</label>
                                    </div>
                                    
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick cost" id = "material_id" name = "material_id">
                                                    <option value=""> -- Не имеет значения -- </option>
                                                    <?php foreach($materials as $material): ?>
                                                        <option value = "<?= $material['id']; ?>"><?= $material['name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                                
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                        <label for="size_x">Размер</label>
                                    </div>                    

                                    <div class="col-md-3">
                                        <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id = "size-x" name = "size_x" class="form-control text-center" value="" />
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id = "size-y" name = "size_y" class="form-control text-center" value="" />
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id = "size-z" name = "size_z" class="form-control text-center" value="" />
                                                </div>
                                        </div>
                                    </div>
                                </div>
                           
                                
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                        <label for = "volume">Объем (мм<sup>3</sup>)</label>
                                    </div>
                                    
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-line">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id = "volume" name="volume" value = "" readonly class="form-control text-right">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php if (false): ?>
                                    <div class="col-md-6">
                                        <label for = "cost">Стоимость (руб.)</label>

                                        <div class="form-line">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id = "cost" name="cost" value="" readonly class="form-control  text-right">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                    
                                    
                            </div>

                            <div class = "col-lg-6">
                                <canvas id = "modelcanvas" height = "500" width="400"></canvas>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="description">Описание</label>
                            </div>
                            <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4" name="description" class="form-control no-resize" placeholder="Описание"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                <input type="submit" name="submit" value="ДОБАВИТЬ" class="btn btn-primary m-t-15 waves-effect">
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="/public/plugins/jsmodeler/three.min.js"></script>
<script type="text/javascript" src="/public/plugins/jsmodeler/jsmodeler.js"></script>
<script type="text/javascript" src="/public/plugins/jsmodeler/jsmodeler.ext.three.js"></script>

<script type="text/javascript" src="/public/plugins/cadviewer/floatingdialog.js"></script>
<script type="text/javascript" src="/public/plugins/cadviewer/importerviewer.js"></script>
<script type="text/javascript" src="/public/plugins/cadviewer/importermenu.js"></script>
<script type="text/javascript" src="/public/plugins/cadviewer/importerapp.js"></script>
    
<script>
    $(document).ready(function () {
        var importerApp = new ImporterApp ();
        importerApp.Init ();
    });
    
    $("#library").addClass('active');
</script>