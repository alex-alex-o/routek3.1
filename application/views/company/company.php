<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Профиль компании
                </h2>
            </div>
            <div class="body">
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#base" data-toggle="tab">Общая информация</a>
                    </li>
                    <li role="presentation">
                        <a href="#address"  data-toggle="tab">Адрес</a>
                    </li>
                    <li role="presentation">
                        <a href="#bank"     data-toggle="tab">Реквизиты</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id = "base">
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <?php echo form_open(base_url('company/company/save_common'), 'id = "common-form" class="form-horizontal" enctype="multipart/form-data" type= "POST"' )?> 
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for = "logo">Логотип</label>
                                        </div>
                                        <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <?php if(!empty($company['logo'])): ?>
                                                        <img src="<?= base_url($company['logo']); ?>" class="logo" width = "150">
                                                    <?php endif; ?>
                                                        
                                                    <input type = "file" name = "logo" accept=".png, .jpg, .jpeg, .gif, .svg">
                                                    <p><small class="text-success">Поддерживаемые типы: gif, jpg, png, jpeg</small></p>
                                                    <input type = "hidden" name = "old_logo" value = "<?php echo html_escape($company['logo']); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for = "name">Название</label>
                                        </div>
                                      
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="name" value='<?= $company["name"]; ?>' class="form-control" placeholder="Название компании">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for = "email">Email</label>
                                        </div>
                                      
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="email" value="<?= $company['email']; ?>" class="form-control" placeholder="Email">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for = "phone">Телефон</label>
                                        </div>
                                      
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="phone" value="<?= $company['phone']; ?>" class="form-control" placeholder="Телефон">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for = "description">Описание</label>
                                        </div>
                                      
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <textarea rows="4" name="description" class="form-control no-resize" placeholder="Описание"><?= $company['description']; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for = "is_public_profile">Сделать профиль публичным</label>
                                        </div>

                                        <div class="demo-switch">
                                            <div class="switch">
                                                <label><input type="checkbox" name = "is_public_profile" <?=($company['is_public_profile'] ? "checked" : ""); ?> ><span class="lever switch-col-indigo"></span></label>
                                            </div>
                                        </div>
                                    </div>                               

                                    <div class="row clearfix">
                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                            <input type="submit" name="submit" value="ОБНОВИТЬ" class="btn btn-primary m-t-15 waves-effect">
                                        </div>
                                    </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div role="tabpanel" class="tab-pane fade in" id="address">
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <h2 class="card-inside-title">Адресная информация</h2>
                                <?php echo form_open(base_url('company/company'), 'id = "address-form" class="form-horizontal"' )?>
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for = "zip">Индекс</label>
                                        </div>
                                      
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="zip" value='<?= $company["zip"]; ?>' class="form-control" placeholder="Индекс" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for = "region">Регион/Область</label>
                                        </div>

                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="region" value='<?= $company["region"]; ?>' class="form-control" placeholder="Регион" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for = "city">Город</label>
                                        </div>
                                
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="city" id ="city" class = "form-control" value = "<?php echo $company["city"]; ?>" placeholder="Город" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for = "street">Улица</label>
                                        </div>
                                        
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="street" id ="street" class = "form-control" value = "<?php echo $company["street"]; ?>" placeholder="Улица" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for = "building">Дом</label>
                                        </div>

                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="building" id ="building" class = "form-control" value = "<?php echo $company["building"]; ?>" placeholder="Дом" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for = "office">Офис</label>
                                        </div>

                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="office" id ="office" class = "form-control" value = "<?php echo $company["office"]; ?>" placeholder="Офис" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                            <input type="submit" name="submit" value="ОБНОВИТЬ" class="btn btn-primary m-t-15 waves-effect">
                                        </div>
                                    </div>
                                <?php echo form_close(); ?>
                            
                                <div id="map_canvas" style="width:400px;"></div>                                        
                                
                            </div>
                        </div>
                        <!-- #END# Markers -->
                    </div>
                    
                    <div role="tabpanel" class="tab-pane fade in" id = "bank">
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <h2 class="card-inside-title">Реквизиты</h2>
                                <?php echo form_open(base_url('company/company'), 'id = "bank-form" class="form-horizontal"' )?> 
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for = "inn">ИНН</label>
                                        </div>
                                      
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="inn" value='<?= $company["inn"]; ?>' class="form-control" placeholder="ИНН" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for = "kpp">Кпп</label>
                                        </div>

                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="kpp" value='<?= $company["kpp"]; ?>' class="form-control" placeholder="Кпп" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for = "bik">БИК</label>
                                        </div>
                                
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="bik" id ="bik" class = "form-control" value = "<?php echo $company["bik"]; ?>" placeholder="БИК" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for = "account">Счет</label>
                                        </div>
                                        
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="account" id ="account" class = "form-control" value = "<?php echo $company["account"]; ?>" placeholder="Счет" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for = "kor_account">Кор.счет</label>
                                        </div>

                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="kor_account" id ="building" class = "form-control" value = "<?php echo $company["kor_account"]; ?>" placeholder="Кор.счет" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                            <input type="submit" name="submit" value="ОБНОВИТЬ" class="btn btn-primary m-t-15 waves-effect">
                                        </div>
                                    </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                        <!-- #END# Markers -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $( "#bank-form" ).submit(function( event ) {
            event.preventDefault();

            $.ajax({
                method: "POST",
                url: "<?php echo site_url().'company/company/save_bank' ?>",
                data: $("#bank-form").serialize()
            })
            .done(function( return_data ) {
                alert("Изменения сохранены!");
            });        

        });

        $( "#address-form" ).submit(function( event ) {
            event.preventDefault();

            $.ajax({
                method: "POST",
                url: "<?php echo site_url().'company/company/save_address' ?>",
                data: $("#address-form").serialize()
            })
            .done(function( return_data ) {
                alert("Изменения сохранены!");
            });        

        });
        
        $("#company").addClass('active');
    });   

    
</script>

