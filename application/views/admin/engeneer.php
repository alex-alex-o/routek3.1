<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Профиль конcтруктора
                </h2>
            </div>
            <div class="body">
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                    <li role="presentation" class="active"><a href="#covid" data-toggle="tab">COVID-2019</a></li>
                    <li role="presentation"><a href="#common" data-toggle="tab">Общая информация</a></li>
                    <li role="presentation"><a href="#address"  data-toggle="tab">Адрес</a></li>
                    <li role="presentation"><a href="#bank"     data-toggle="tab">Реквизиты</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id = "covid">
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <h2 class="card-inside-title">COVID-2019</h2>
                                <?php echo form_open(base_url('admin/company'), 'id = "covid-form" class="form-horizontal"' )?> 
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for = "is_free_medic_constrict">Готов бесплатно сделать файл печати для медицинских целей</label>
                                        </div>

                                        <div class="demo-switch">
                                            <div class="switch">
                                                <label><input type="checkbox" name = "is_free_medic_construct" <?=($company['is_free_medic_construct'] ? "checked" : ""); ?> ><span class="lever switch-col-indigo"></span></label>
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
                    
                    
                    <div role="tabpanel" class="tab-pane fade in" id="common">
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <?php echo form_open(base_url('admin/company/save_common'), 'id = "common-form" class="form-horizontal" enctype="multipart/form-data" type= "POST"' )?> 
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
                                <?php echo form_open(base_url('admin/company'), 'id = "address-form" class="form-horizontal"' )?>
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
                                <?php echo form_open(base_url('admin/company'), 'id = "bank-form" class="form-horizontal"' )?> 
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
                                                    <input type="text" name="bik" id ="bik" class = "form-control" value = "<?php echo $company["bik"]; ?>" placeholder="Город" />
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
<?php if (false): ?>
                    <div role="tabpanel" class="tab-pane fade in" id = "map">
                        <div class="row clearfix">
                            <div class="col-md-12">
                    
                            <h2 class="card-inside-title">Координаты</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="lat" id ="lat" class = "form-control" value = "<?php echo $company["lat"]; ?>" placeholder="Широта" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="long" id ="long" class = "form-control" value = "<?php echo $company["lng"]; ?>" placeholder="Долгота" />
                                            </div>
                                        </div>
                                    </div>
                                </div>                                        
                            </div>
                        </div>
                        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Af13c504c6ddd4b98ed8a45a3a0eb65497d90d90bf54758ee8425522aa61744b5&amp;width=500&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
                    </div>
<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
//    $(document).ready(function () {
//        $( "#common-form" ).submit(function( event ) {
//            event.preventDefault();
//
//            $.ajax({
//                method: "POST",
//                url: "<?php echo site_url().'admin/company/save_common' ?>",
//                data: $("#common-form").serialize()
//            })
//            .done(function( return_data ) {
//                alert("Изменения сохранены!");
//            });        
//
//        });
//    });     
    

    $(document).ready(function () {
        $( "#bank-form" ).submit(function( event ) {
            event.preventDefault();

            $.ajax({
                method: "POST",
                url: "<?php echo site_url().'admin/company/save_bank' ?>",
                data: $("#bank-form").serialize()
            })
            .done(function( return_data ) {
                alert("Изменения сохранены!");
            });        

        });
    });      

    $(document).ready(function () {
        $( "#address-form" ).submit(function( event ) {
            event.preventDefault();

            $.ajax({
                method: "POST",
                url: "<?php echo site_url().'admin/company/save_address' ?>",
                data: $("#address-form").serialize()
            })
            .done(function( return_data ) {
                alert("Изменения сохранены!");
            });        

        });
    });      
    
    $(document).ready(function () {
        $( "#bank-form" ).submit(function( event ) {
            event.preventDefault();

            $.ajax({
                method: "POST",
                url: "<?php echo site_url().'admin/company/save_bank' ?>",
                data: $("#bank-form").serialize()
            })
            .done(function( return_data ) {
                alert("Изменения сохранены!");
            });        

        });
    });      

    $(document).ready(function () {
        $( "#covid-form" ).submit(function( event ) {
            event.preventDefault();

            $.ajax({
                method: "POST",
                url: "<?php echo site_url().'admin/company/save_covid' ?>",
                data: $("#covid-form").serialize()
            })
            .done(function( return_data ) {
                alert("Изменения сохранены!");
            });        

        });
    });   

    $("#company").addClass('active');
</script>

<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true&key=AIzaSyBicLi86EHsY4nHjbqiNkdF53pnXhGzhe0"></script> 
<script type="text/javascript"> 
//    $(document).ready(function () {
//        var map;
//        var marker;
//        var overlay;
//
//        var latlng = new google.maps.LatLng(<?php echo $company["lat"] ; ?>, <?php echo $company["lng"]; ?>); 
//        var myOptions = { 
//            zoom: 13, 
//            center: latlng, 
//            mapTypeId: google.maps.MapTypeId.ROADMAP 
//        }; 
//
//        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions); 
//        
//        google.maps.event.addListener(map, 'click', function(event) { 
//            placeMarker(event.latLng, true); 
//        });
//
//        overlay = new google.maps.OverlayView();
//        overlay.draw = function() {};
//        overlay.setMap(map);
//        
//        placeMarker(latlng, false); 
//
//        function placeMarker(location, save) { 
//            if (marker != null) {
//                marker.setMap(null);
//            }
//            marker = new google.maps.Marker({ 
//                position: location,  
//                map: map
//            });
//            
//            var mapType = map.mapTypes[map.getMapTypeId()];
//            
//            $("#lat").val(location.lat());
//            $("#long").val(location.lng());
//            
//            if (save === true) {
//                $.ajax({
//                    method: "POST",
//                    url: "<?php echo site_url() . 'company/save_coordinates' ?>",
//                    data: {"id" : $('#id').val(), "lat" : location.lat(), "long" : location.lng(), '<?php echo $this->security->get_csrf_token_name();?>' : $("input[name='<?php echo $this->security->get_csrf_token_name();?>'").val()}
//                })
//                .done(function( return_data ) {
//                    updateToken(return_data.csrfName, return_data.csrfHash);
//                });                 
//            }
//            
//        }
//    });
</script>
