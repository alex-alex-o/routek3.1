        <!-- Card -->
        <div class="card my-4">

          <!-- Card image -->
          <div class="view overlay">
            <img class="card-img-top" src="<?= base_url() ?>public/img/routek-wallpaper-lc.jpg" alt="Card image cap">
            <a href="#!">
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>

          <!-- Card content -->
          <div class="card-body p-0">
            <button class="btn btn-sm btn-primary btn-prof-wall">Загрузить обложку</button>

            <!-- Title -->
            <?php if(false && !empty($user['logo'])): ?>
                <img class="rounded-circle img-thumbnail shadow-sm user-avatar" width="168" height="168" src="<?= base_url($user['logo']); ?>" alt="">
                <h4 class="card-title user-title"><?= $user['name']; ?></h4>
            <?php endif; ?>
          </div>

        </div>
        <!-- Card -->



    <!-- Pills navs -->
    <ul class="nav nav-pills mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="ex1-tab-1" data-toggle="pill" href="#ex1-pills-1" role="tab"
            aria-controls="ex1-pills-1" aria-selected="true">Профиль</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="ex1-tab-2" data-toggle="pill" href="#ex1-pills-2" role="tab"
            aria-controls="ex1-pills-2" aria-selected="false">Адрес</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="ex1-tab-3" data-toggle="pill" href="#ex1-pills-3" role="tab"
            aria-controls="ex1-pills-3" aria-selected="false">Реквизиты</a>
        </li>
        <!-- <li class="nav-item" role="presentation">
          <a class="nav-link" id="ex1-tab-4" data-toggle="pill" href="#ex1-pills-4" role="tab"
            aria-controls="ex1-pills-4" aria-selected="false">Профиль организации</a>
        </li> -->
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="ex1-tab-4" data-toggle="pill" href="#ex1-pills-4" role="tab"
            aria-controls="ex1-pills-4" aria-selected="false">Учетная запись</a>
        </li>
    </ul>
    <!-- Pills navs -->

      <!--Start Pills content -->
      <div class="tab-content" id="ex1-content">
      
        <!-- Start tab 1 -->
        <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel" aria-labelledby="ex1-tab-1">
            
          <div class="card mb-3">
            <div class="card-body">
              <form>
                <div class="form-row">
                  <div class="form-group col-12">
                    <img class="rounded-lg mr-2 mb-2" width="96" height="96" src="<?= base_url() ?>public/img/routek-wallpaper-lc.jpg" alt="User-photo">
                    <button class="btn btn-sm btn-outline-primary ml-0">Загрузить логотип</button>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="formSelect">Форма</label>
                      <select id="formSelect" class="browser-default custom-select">
                        <option selected>Юр. лицо</option>
                        <option >Физ. лицо</option>
                        
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="inputName">Название</label>
                      <input type="text" class="form-control" id="inputName" placeholder="Название организации">
                    </div>

                    <div class="form-group">
                      <label for="inputPhone">Телефон</label>
                      <input type="tel" class="form-control" id="inputPhone" placeholder="8(495) 123-45-67">
                    </div>

                    <div class="form-group">
                      <label for="inputEmail">E-mail</label>
                      <input type="email" class="form-control" id="inputEmail" placeholder="Ваш E-mail">
                    </div>
                  </div>

                  <div class="col-md-6">
  
                    <div class="form-group">
                      <label for="inputPhone">Краткое описание</label>
                      <input type="text" class="form-control" id="inputPhone" placeholder="Краткое описание">
                    </div>
                    <div class="form-group">
                      <label for="company-desc">Описание</label>
                      <textarea class="form-control" name="desc" id="company-desc" rows="8"></textarea>
                    </div>
                  </div>
                </div>
      
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Обновить</button>
                </div>
              </form>
            </div>
          </div>
            
          <div class="card mb-3">
            
            <div class="card-body">
              <h4 class="card-title mb-4">Профиль заказчика</h4>
              <form>
                <div class="form-row">
                   
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="inputName">ФИО</label>
                      <input type="text" class="form-control" id="inputName" placeholder="ФИО" value="<?= $user['name']; ?>">
                    </div>

                  
                    <div class="form-group">
                      <label for="inputPhone">Телефон</label>
                      <input type="tel" class="form-control" id="inputPhone" placeholder="+7(###) ###-##-##" value="<?= $user['phone']; ?>">
                    </div>
                  </div>

                  <div class="col-md-6">
                    

                    <div class="form-group">
                      <label for="inputEmail">E-mail</label>
                      <input type="email" class="form-control" id="inputEmail" placeholder="Ваш E-mail" value="<?= $user['email']; ?>">
                    </div>
                    
                  </div>

                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Обновить</button>
                </div>
              </form>
            </div>
          </div>
      
        </div>
        <!-- End tab 1 -->
      
        <!-- Start tab 2 -->
        <div class="tab-pane fade" id="ex1-pills-2" role="tabpanel" aria-labelledby="ex1-tab-2">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title mb-4">Адрес компании</h4>
              <form>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputIndex">Индекс</label>
                    <input type="text" class="form-control" id="inputIndex" placeholder="Индекс"  value="<?= $user['zip']; ?>" >
                  </div>
      
                  <div class="form-group col-md-6">
                    <label for="inputStreet">Улица</label>
                    <input type="text" class="form-control" id="inputStreet" placeholder="Улица"  value="<?= $user['street']; ?>" >
                  </div>
                </div>
      
                <div class="form-row">
      
                  <div class="form-group col-md-6">
                    <label for="inputRegion">Регион/Область</label>
                    <input type="text" class="form-control" id="inputRegion" placeholder="Регион/Область" value="<?= $user['region']; ?>" />
                  </div>
      
                  <div class="form-group col-md-6">
                    <label for="inputHouse">Дом</label>
                    <input type="text" class="form-control" id="inputHouse" placeholder="Дом" value="<?= $user['house']; ?>" />
                  </div>
      
                </div>
      
                <div class="form-row">
      
                  <div class="form-group col-md-6">
                    <label for="inputCity">Город</label>
                    <input type="text" class="form-control" id="inputCity" placeholder="Город">
                  </div>
      
                  <div class="form-group col-md-6">
                    <label for="inputOffice">Офис</label>
                    <input type="text" class="form-control" id="inputOffice" placeholder="Офис">
                  </div>
      
                </div>
      
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Обновить</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- End tab 2 -->
      
        <!-- Start tab 3 -->
        <div class="tab-pane fade" id="ex1-pills-3" role="tabpanel" aria-labelledby="ex1-tab-3">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title mb-4">Реквизиты</h4>
              <form>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputINN">ИНН</label>
                    <input type="text" class="form-control" id="inputINN" placeholder="ИНН">
                  </div>
      
                  <div class="form-group col-md-6">
                    <label for="inputBill">Счет</label>
                    <input type="text" class="form-control" id="inputBill" placeholder="Счет">
                  </div>
                </div>
      
                <div class="form-row">
      
                  <div class="form-group col-md-6">
                    <label for="inputKPP">КПП</label>
                    <input type="text" class="form-control" id="inputKPP" placeholder="КПП">
                  </div>
      
                  <div class="form-group col-md-6">
                    <label for="inputKorBill">Кор. счет</label>
                    <input type="text" class="form-control" id="inputKorBill" placeholder="Кор. счет">
                  </div>
      
                </div>
      
      
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputBIK">БИК</label>
                    <input type="text" class="form-control" id="inputBIK" placeholder="БИК">
                  </div>
      
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Обновить</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- End tab 3 -->
      
     
        <!-- Start tab 4 -->
        <div class="tab-pane fade" id="ex1-pills-4" role="tabpanel" aria-labelledby="ex1-tab-4">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title mb-4">Сменить пароль</h4>
              <form>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputPassword">Пароль</label>
                    <input type="text" class="form-control" id="inputPassword" placeholder="Пароль"  value="<?= $user['username']; ?>" />
                  </div>
      
                  <div class="form-group col-md-6">
                    <label for="inputPassword2">Подтверждение</label>
                    <input type="text" class="form-control" id="inputPassword2" placeholder="Подтверждение">
                  </div>
                </div>
      
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Обновить</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- End tab 4 -->
      
      </div>
      <!--End Pills content -->


<?php if (false): ?>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Профиль
                </h2>
            </div>
            
            <div class="body">
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                    <li role="presentation" class="active"><a href="#common" data-toggle="tab">Общая информация</a></li>
                    <li role="presentation"><a href="#address"     data-toggle="tab">Адрес</a></li>
                    <li role="presentation"><a href="#bank"     data-toggle="tab">Реквизиты</a></li>
                    <li role="presentation"><a href="#profile"     data-toggle="tab">Учетная запись</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="common">
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <?php echo form_open(base_url('admin/company/save_common'), 'id = "common-form" class="form-horizontal" enctype="multipart/form-data" type= "POST"' )?> 
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for = "logo">Фото</label>
                                        </div>
                                        <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <?php if(false && !empty($user['logo'])): ?>
                                                        <img src="<?= base_url($user['logo']); ?>" class="logo" width = "150">
                                                    <?php endif; ?>
                                                        
                                                    <input type = "file" name = "logo" accept=".png, .jpg, .jpeg, .gif, .svg">
                                                    <p><small class="text-success">Поддерживаемые типы: gif, jpg, png, jpeg</small></p>
                                                    <input type = "hidden" name = "old_logo" value = "<?php //echo html_escape($user['logo']); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for = "name">Имя</label>
                                        </div>
                                      
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="name" value='<?= $user["name"]; ?>' class="form-control" placeholder="Название компании">
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
                                                    <input type="text" name="email" value="<?= $user['email']; ?>" class="form-control" placeholder="Email">
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
                                                    <input type="text" name="phone" value="<?= $user['phone']; ?>" class="form-control" placeholder="Телефон">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for = "form_select">Форма</label>
                                        </div>
                                      
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="model-radio-button">
                                                <div class = "row clearfix">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <input name = "form_select" type="radio" class="with-gap radio-col-indigo" value = "fl" id = "fl" />
                                                        <label for = "fl" class = "big">Физическое лицо</label>
                                                    </div>
                                                </div>

                                                <div class = "row clearfix">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <input name = "form_select" type="radio" class="with-gap radio-col-indigo" value="ip" id = "ip"/>
                                                        <label for = "ip" class = "big">ИП</label>
                                                    </div>
                                                </div>

                                                <div class = "row clearfix">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <input name="form_select" type="radio" class="with-gap  radio-col-indigo" value = "ul" id = "ul"/>
                                                        <label for = "ul" class = "big">Юридическое лицо</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>          
                                
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for = "description">О себе</label>
                                        </div>
                                      
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <textarea rows="4" name="description" class="form-control no-resize" placeholder="Описание"><?= ""//$user['description']; ?></textarea>
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
                                                    <input type="text" name="zip" value='<?= ""//$user["zip"]; ?>' class="form-control" placeholder="Индекс" />
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
                                                    <input type="text" name="region" value='<?= ""//$user["region"]; ?>' class="form-control" placeholder="Регион" />
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
                                                    <input type="text" name="city" id ="city" class = "form-control" value = "<?php echo "";//$user["city"]; ?>" placeholder="Город" />
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
                                                    <input type="text" name="street" id ="street" class = "form-control" value = "<?php echo "";//$user["street"]; ?>" placeholder="Улица" />
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
                                                    <input type="text" name="building" id ="building" class = "form-control" value = "<?php echo "";//$user["building"]; ?>" placeholder="Дом" />
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
                                                    <input type="text" name="office" id ="office" class = "form-control" value = "<?php echo "";//$user["office"]; ?>" placeholder="Офис" />
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
                                                    <input type="text" name="inn" value='<?= "";//$user["inn"]; ?>' class="form-control" placeholder="ИНН" />
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
                                                    <input type="text" name="kpp" value='<?= "";//$user["kpp"]; ?>' class="form-control" placeholder="Кпп" />
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
                                                    <input type="text" name="bik" id ="bik" class = "form-control" value = "<?php echo "";//$user["bik"]; ?>" placeholder="Город" />
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
                                                    <input type="text" name="account" id ="account" class = "form-control" value = "<?php echo "";//$user["account"]; ?>" placeholder="Счет" />
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
                                                    <input type="text" name="kor_account" id ="building" class = "form-control" value = "<?php echo "";//$user["kor_account"]; ?>" placeholder="Кор.счет" />
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
                    
                    <div  role="tabpanel" class="tab-pane fade in" id="profile">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="header">
                                        <h2>
                                            Сменить пароль
                                        </h2>
                                    </div>
                                    <div class="body">
                                       <?php if(validation_errors() !== ''): ?>
                                          <div class="alert alert-warning alert-dismissible">
                                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                              <h4><i class="icon fa fa-warning"></i> Внимание!</h4>
                                              <?= validation_errors();?>
                                          </div>
                                        <?php endif; ?>
                                       <?php echo form_open(base_url('user/profile/change_pwd'), 'class="form-horizontal"');  ?> 
                                          <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="password">Пароль</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" name="password" class="form-control" placeholder="Пароль">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="confirm_pwd">Подтверждение</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" name="confirm_pwd" class="form-control" placeholder="Подтверждение">
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
                            </div>
                        </div>    
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>


<?php if (false): ?>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-md-12">
                      <?php echo form_open(base_url('user/profile'), 'class="form-horizontal"' )?> 
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="name">Имя</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" value="<?= $user['name']; ?>" name="name" class="form-control" placeholder="Имя">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" value="<?= $user['email']; ?>" name="email" class="form-control" placeholder="Enter your email address">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="phone">Телефон</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" value="<?= $user['phone']; ?>" name="phone" class="form-control" placeholder="Телефон">
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
            </div>

<?php endif; ?>


<script>
    $("#users").addClass('active');
</script>
<?php endif; ?>