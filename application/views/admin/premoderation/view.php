
<!-- Bootstrap Select Css -->
<link href="<?= base_url() ?>public/plugins/light-gallery/css/lightgallery.css" rel="stylesheet">
<link href="<?= base_url() ?>public/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />


<input type="hidden" class = "form-control" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>" />
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h2>
                    Предложения цен по заказу <?= $order["name"]; ?>
                </h2>
            </div>
            <div class="card-body">
                
                <form >
                    
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-4">
                                <label for = "summ">Справочная цена</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control summ" value = <?=$cost;?> readonly="readonly"  type="text" />
                                    </div>
                                </div>
                            </div>                        

                            <div class="col-md-4">
                            </div>

                            <div class="col-md-4">
                                <button class = "btn btn-secondary" type="button" data-toggle="modal" data-target="#companyRegister">Добавить компанию</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                    
                <div class="row clearfix">
                    <div class="col-lg-12 mr-2">
                        <div class="row clearfix">
                            <table class = "table" width = "100%">
                                <tr>
                                    <th>Компания</th>
                                    <th>Стоимость</th>
                                    <th>Стоимость постобработки</th>
                                    <th>Доставка</th>
                                    <th>Итого</th>
                                    <th>Срок выполнения(в дн.)</th>
                                    <th>Комментарий</th>
                                    <th>Выбрать</th>
                                </tr>

                                <?php foreach($offers as $offer): ?>
                                    <tr>
                                        <td width = "300px"> 
                                            <select class="form-control show-tick editable" id = "company_id<?= $offer["id"]; ?>" name = "company_id" data-id = "<?= $offer["id"]; ?>">
                                                <option value = "0">-- Выберите производителя --</option>
                                                <?php foreach($companies as $company): ?>
                                                    <?php if (!empty($company['name'])): ?>
                                                        <option <?= ($company["id"] == $offer["company_id"] ? "selected" : "")?> value = "<?= $company['id']; ?>"><?= $company['name']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                        <td><input class="form-control cost editable" name = "cost"          data-id = "<?= $offer["id"]; ?>" id="cost<?= $offer["id"]; ?>" type="text" value = "<?= $offer["cost"]; ?>" /></td>
                                        <td><input class="form-control cost editable" name = "finish_cost"   data-id = "<?= $offer["id"]; ?>" id="finish_cost<?= $offer["id"]; ?>"     type="text" value = "<?= $offer["finish_cost"]; ?>" /></td>
                                        <td><input class="form-control cost editable" name = "shipping_cost" data-id = "<?= $offer["id"]; ?>" id="shipping_cost<?= $offer["id"]; ?>"   type="text" value = "<?= $offer["shipping_cost"]; ?>" /></td>
                                        <td><strong><span id = "total<?= $offer["id"]; ?>"><?= ($offer["cost"] + $offer["shipping_cost"] + $offer["finish_cost"]); ?></span></strong></td>
                                        <td><input class="form-control editable" data-id = "<?= $offer["id"]; ?>" id="lead_time<?= $offer["id"]; ?>" name = "lead_time"  type="text" value = "<?= $offer["lead_time"]; ?>" /></td>
                                        <td width = "600px"><input class="form-control" id="comment<?= $offer["id"]; ?>"  type="text" /></td>
                                        <td>

                                            <div class = "row clearfix" >
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                                        
                                                    <input name = "select-company" type="radio" <?= (empty($selectedOfferID) ? "" : "disabled"); ?> style = "position: relative !important;left: 0px !important;opacity: 100 !important;" value="<?= $offer["id"]; ?>" <?= ($offer["is_selected"]  == true ? "checked='checked'" : ""); ?> id = "company_<?= $offer["id"]; ?>"/>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                    
                    <?php if (empty($selectedOfferID)): ?>
                        <div class="row clearfix">
                            <div class = "col-lg-12 float-right">
                                <a id = "select-offer-button" disabled class = "btn btn-primary" >
                                    Отправить заказчику
                                </a>
                            </div>
                        </div>                        
                    <?php endif; ?>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h2>
                    Контактная информация
                </h2>
            </div>
            <div class="card-body">
                <?php if (isset($shipping)): ?>
                    <div class="row clearfix">
                        <div class="col-lg-12">

                            <div class="row clearfix">
                                <div class="col-lg-3">
                                    <div class="col-lg-2">

                                        <label for = "phone">Заказчик</label>
                                    </div> 
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type = "text" readonly name="lastname" class="form-control" value = "<?= $shipping['last_name'] . ' ' . $shipping['first_name'] . ' ' . $shipping['middle_name']; ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="col-lg-2">

                                        <label for = "phone">Телефон</label>
                                    </div>                
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type = "text" readonly name="phone" class="form-control" value = "<?= $shipping['phone']; ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="col-lg-2">
                                        <label for = "email">Email</label>
                                    </div>                
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                                <input type = "text" readonly name="email" class="form-control" value = "<?= $shipping['email']; ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="col-lg-2">

                                        <label for = "address">Получатель</label>
                                    </div>                
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                                <input type = "text" readonly name="recipient" class="form-control" value = "<?= $shipping['recipient']; ?>" />
                                        </div>
                                    </div>
                                </div>                            
                            </div>
                        </div> 

                      <div class="col-lg-12">

                            <div class="row clearfix">
                                <div class="col-lg-3">
                                    <div class="col-lg-2">
                                        <label for = "phone">Город</label>
                                    </div> 
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type = "text" readonly name="city" class="form-control" value = "<?= $shipping['city']; ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="col-lg-2">

                                        <label for = "street">Улица</label>
                                    </div>                
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type = "text" readonly name="street" class="form-control" value = "<?= $shipping['street']; ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="col-lg-2">
                                        <label for = "house">Дом</label>
                                    </div>                
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                                <input type = "text" readonly name="house" class="form-control" value = "<?= $shipping['house']; ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="col-lg-2">

                                        <label for = "Office">Офис</label>
                                    </div>                
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                                <input type = "text" readonly name="offece" class="form-control" value = "<?= $shipping['office']; ?>" />
                                        </div>
                                    </div>
                                </div>                            
                            </div>
                        </div>                    
                    </div>
                <?php elseif (isset($user)): ?>
                    <div class="row clearfix">
                        <div class="col-lg-12">

                            <div class="row clearfix">
                                <div class="col-lg-3">
                                    <div class="col-lg-2">

                                        <label for = "phone">Заказчик</label>
                                    </div> 
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type = "text" readonly name="lastname" class="form-control" value = "<?= $user['name']; ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="col-lg-2">

                                        <label for = "phone">Телефон</label>
                                    </div>                
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type = "text" readonly name="email" class="form-control" value = "<?= $user['phone']; ?>" />                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="col-lg-2">
                                        <label for = "email">Email</label>
                                    </div>                
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type = "text" readonly name="phone" class="form-control" value = "<?= $user['email']; ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h2>
                    Заказ <?= $order["name"]; ?>
                </h2>
            </div>
            <div class="card-body">
                <div class="row clearfix">
                    <div class="col-lg-6">

                        <div class="row clearfix">
                            <div class="col-lg-2">
                                <label for = "machine_id">Технология</label>
                            </div>

                            <div class="col-lg-10">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick editable" id = "technology_id" name = "technology_id">
                                            <?php foreach($machines as $machine): ?>
                                                <option <?= ($order["technology_id"] == $machine["id"] ? "selected" : "")?> value = "<?= $machine["id"]; ?>"><?= $machine["name"]; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2">
                                <label for = "color_id">Материал</label>
                            </div>

                            <div class="col-lg-10">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick editable" id = "material_id" name = "material_id">
                                            <?php foreach($materials as $material): ?>
                                                <option <?= ($order["material_id"] == $material["id"] ? "selected" : "")?> value = "<?= $material["id"]; ?>"><?= $material["name"]; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>                                   

                        <div class="row clearfix">
                            <div class="col-lg-2">
                                <label for = "color_id">Цвет</label>
                            </div>

                            <div class="col-lg-10">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick editable" id = "color_id" name = "color_id">
                                        <?php foreach($colors as $color): ?>
                                            <option <?= ($order["color_id"] == $color["id"] ? "selected" : "")?> value = "<?= $color["id"]; ?>"><?= $color["name"]; ?></option>
                                        <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>                                

                        <div class="row clearfix">
                            <div class="col-lg-2">
                                <label for = "quantity">Количество</label>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id = "quantity" class="form-control text-right" value="<?= $order['quantity']; ?>" data-rule="quantity">
                                    </div>                                                    
                                </div>
                            </div>
                           
                            <div class = "col-lg-6">
                                <a id = "save-order-button" class = "btn btn-primary">Сохранить изменения</a>
                            </div>
                        </div>

                        <div class = "row clearfix">
                            <div class="col-lg-2">
                                <label for = "volume">Объем</label>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input readonly type="text" id = "volume" name = "volume" value = "<?= $order['volume']; ?>" class="form-control text-right">
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        <div class = "row clearfix">
                            <div class="col-lg-3">
                                <label for = "size">Габариты (мм)</label>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                           <div class="form-line">
                                               <input readonly type="text" id = "size-x" name = "size_x" class="form-control text-center" value="<?= $order['size_x']; ?>" />
                                           </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                           <div class="form-line">
                                               <input readonly type="text" id = "size-y" name = "size_y" class="form-control text-center" value="<?= $order['size_y']; ?>" />
                                           </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                           <div class="form-line">
                                               <input readonly type="text" id = "size-z" name = "size_z" class="form-control text-center" value="<?= $order['size_z']; ?>" />
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                <label for = "description">Описание заказа</label>
                            </div>                

                            <div class="col-lg-10">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea readonly rows="4" name="description" class="form-control" placeholder="Описание"><?= $order['description']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class = "col-lg-6">
                        <canvas id = "modelcanvas" height = "500" width="400"></canvas>
                    </div>
                </div>
                
                <?php if(false): ?>
                    <div class="row clearfix">
                        <div class = "col-lg-12">
                            <a class = "btn btn-primary col-md-4 col-md-offset-4" href = "<?=base_url('admin/premoderation/approve/' . $order["id"]);?>">
                                РАЗОСЛАТЬ НА ПРОИЗВОДСТВА
                            </a>
                        </div>
                    </div>
                <?php   endif; ?>                
            </div>
        </div>
    </div>
    
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php if ($images): ?>
            <div class="card">
                <div class="card-header">
                    <h2>
                        Изображения
                    </h2>
                </div>
                <div class = "card-body">
                    <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                        <?php foreach($images as $img): ?>

                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <?php $url = base_url() . 'uploads/orders/' . $img["path"] . '/' . $img['file_name']; ?>
                                <a href="<?= $url; ?>" data-sub-html="">
                                    <img class="img-responsive thumbnail" src = "<?= $url; ?>" /> 
                                </a>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        
        <?php if ($models): ?>
            <div class="card">
                <div class="card-header">
                    <h2>
                        Модели
                    </h2>
                </div>
                <div class = "card-body">
                    <div class="row">
                        <?php $firstModelUrl = ""; ?>
                        <?php foreach($models as $model): ?>
                        <div class="col-xs-6 col-md-3">
                            <?php $url = base_url() . $model["path"] . '/' . $model['file_name']; 
                                if (empty($firstModelUrl)) {
                                    $firstModelUrl = $url; 
                                }
                            ?>
                            <a href="<?= $url; ?>" download class="thumbnail">
                                
                                <?php             
                                    $info = pathinfo($model["file_name"]);
                                ?>
                                <?php if (strtoupper($info['extension']) == "STL"): ?>
                                    <img src="<?= base_url() . "/public/images/stl_icon.png" ?>" class="img-responsive">
                                <?php elseif (strtoupper($info['extension']) == "OBJ"): ?>
                                    <img src="<?= base_url() . "/public/images/obj_icon.png" ?>" class="img-responsive">
                                <?php endif;?>
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>        
        
        <?php if ($documents): ?>
            <div class="card">
                <div class="card-header">
                    <h2>
                        Документы
                    </h2>
                </div>
                <div class = "card-body">
                    <div class="row">
                        <?php foreach($documents as $document): ?>
                        <div class="col-xs-6 col-md-3">
                            <?php $url = base_url() . $document['path'] . "/" .$document['file_name']; ?>
                            <a href="<?= $url; ?>" download class="thumbnail">
                                <img src="<?= base_url() . "/public/images/pdf_icon.png" ?>" class="img-responsive">
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>        
    </div>
</div>

<?php $this->load->view('partials/company/company_register'); ?>

<!-- Autosize Plugin Js -->
<script src="<?= base_url() ?>public/plugins/autosize/autosize.js"></script>
<script src="<?= base_url() ?>public/js/machines.js"></script>
<!-- Light Gallery Plugin Js -->
<script src="<?= base_url() ?>public/plugins/light-gallery/js/lightgallery-all.js"></script>

<!-- Custom Js -->
<script src="<?= base_url() ?>public/js/pages/medias/image-gallery.js"></script>

<script type="text/javascript" src="/public/plugins/jsmodeler/three.min.js"></script>
<script type="text/javascript" src="/public/plugins/jsmodeler/jsmodeler.js"></script>
<script type="text/javascript" src="/public/plugins/jsmodeler/jsmodeler.ext.three.js"></script>

<script type="text/javascript" src="/public/plugins/cadviewer/floatingdialog.js"></script>
<script type="text/javascript" src="/public/plugins/cadviewer/importerviewer.js"></script>
<script type="text/javascript" src="/public/plugins/cadviewer/importermenu.js"></script>
<script type="text/javascript" src="/public/plugins/cadviewer/importerapp.js"></script>
    
<script>
    
    <?php if (isset($firstModelUrl) && !empty($firstModelUrl)): ?>
        $(document).ready(function () {
            var importerApp = new ImporterApp ();
            importerApp.Init ();
            files = ["<?= $firstModelUrl; ?>"];
            importerApp.LoadFilesFromUrl (files, false);

        });    
    <?php endif; ?>
    
    $(".cost").change(function() {
        var id = $(this).attr("data-id");
        var production = Number($("#cost" + id).val());
        var shipping   = Number($("#shipping_cost"   + id).val());
        var finish     = Number($("#finish_cost" + id).val());
        $("#total" + id).text(production + shipping + finish);
        
        $.ajax({
            method: "POST",
            url: "<?php echo site_url() . 'admin/premoderation/save_offer' ?>",
            data: {"id" : id, "name" : $(this).attr("name"), "value" : $(this).val(), '<?php echo $this->security->get_csrf_token_name();?>' : $("input[name='<?php echo $this->security->get_csrf_token_name();?>'").val()}
        })
        .done(function( return_data ) {

        });         
    });
    
    $("#select-offer-button").click(function() {
        var offerRadio = $('input[name="select-company"]:checked');
        
        if (offerRadio.length == 0) {
            alert("Выберите предложение");
            return;
        }

        id = offerRadio.val();
        if ($("#lead_time" + id).val() == 0) {
            alert("Укажите срок выполнения");
            return;
        }

        if (($("#cost" + id).val() + $("#finish_cost" + id).val() + $("#shipping_cost" + id).val()) == 0) {
            alert("Укажите стоимость");
            return;
        }        
        
        if ($("#company_id" + id).val() == 0) {
            alert("Выберите производителя");
            return;
        }          
        
        $.ajax({
            method: "POST",
            url: "<?php echo site_url() . 'admin/premoderation/select_offer' ?>",
            data: {"id" : id, '<?php echo $this->security->get_csrf_token_name();?>' : $("input[name='<?php echo $this->security->get_csrf_token_name();?>'").val()}
        })
        .done(function( return_data ) {
            $("#select-offer-button").hide();
            $('input[name="select-company"]').prop('disabled', true)
        }); 
    }); 
    
    $(".editable").change(function() {
        var id = $(this).attr("data-id");
        $.ajax({
            method: "POST",
            url: "<?php echo site_url() . 'admin/premoderation/save_offer' ?>",
            data: {"id" : id, "name" : $(this).attr("name"), "value" : $(this).val(), '<?php echo $this->security->get_csrf_token_name();?>' : $("input[name='<?php echo $this->security->get_csrf_token_name();?>'").val()}
        })
        .done(function( return_data ) {
            //updateToken(return_data.csrfName, return_data.csrfHash);
        });         
    });    
    
    $("#save-order-button").click(function() {
        if (confirm("Вы действительно хотите изменить заказ?")) {
            var id = <?= $order["id"];?>;
            $.ajax({
                method: "POST",
                url: "<?php echo site_url() . 'admin/premoderation/save_order' ?>",
                data: {"id" : id, 
                       "technology_id" : $("#technology_id").val(), 
                       "material_id"   : $("#material_id").val(), 
                       "color_id"      : $("#color_id").val(),
                       "quantity"      : $("#quantity").val(), 
                       '<?php echo $this->security->get_csrf_token_name();?>' : $("input[name='<?php echo $this->security->get_csrf_token_name();?>'").val()
                }
            })
            .done(function( return_data ) {
                console.log(return_data);
            });         
        }
    });
</script>
    