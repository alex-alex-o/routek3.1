<!-- Всплывающая форма добавления адреса -->
<div class="modal fade" id="addAddress" tabindex="-1" aria-labelledby="addAddress" aria-hidden="true">
    <div class="modal-dialog modal-lg">
       <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ввдедите адрес доставки</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">

                    <?php echo form_open_multipart(base_url("user/shipping/add/$publicID"), 'id = "shipping-form"');?>
                        <div class="col-md-2">
                        </div>
                        <input type = "hidden" id = "public_id" name = "public_id"  value = ""/>
                        <div class="col-md-12">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <!-- Карточка ввода адреса  -->
                                    <div class = "row">
                                        <div class="col-sm-12 mb-12">
                                            <label class="form-label">Получатель</label>
                                        </div>
                                        
                                        <div class="col-sm-4 mb-2">
                                            <label class="form-label h6" for="LastName">Фамилия</label>
                                            <input class="form-control" type = "text" id = "recipient" required="true" name = "last_name" placeholder = "Фамилия">
                                        </div>
                                        <div class="col-sm-4 mb-2">
                                            <label class="form-label h6" for="FirstName">Имя</label>
                                            <input class="form-control" type = "text" id = "recipient" required="true" name = "first_name" placeholder = "Имя">
                                        </div>
                                        <div class="col-sm-4 mb-2">
                                            <label class="form-label h6" for="MiddleName">Отчество</label>
                                            <input class="form-control" type = "text" id = "recipient" required="true" name = "middle_name" placeholder = "Отчество">
                                        </div>

                                        <div class="col-sm-4 mb-2">
                                            <label class="form-label h6" for="phone">Телефон</label>
                                            <input class="form-control" type = "text" id = "phone" name = "phone" placeholder = "Телефон" >
                                        </div>

                                        <div class="col-sm-4 mb-2">
                                            <label class="form-label h6" for="email">Email*</label>
                                            <input class="form-control" type = "text" id = "email" required="true"  name = "email" placeholder = "Email" >
                                        </div>

                                        <div class="col-sm-5 mb-2">
                                            <label class="form-label h6" for="city">Город *</label>
                                            <input class="form-control" type = "text" id = "city"   name = "city"  required="true"  placeholder = "Город" value = "">
                                        </div>

                                        <div class="col-sm-7 mb-2">
                                            <label class="form-label h6" for="street">Улица *</label>
                                            <input class="form-control" type = "text" id = "street" name = "street" required="true" placeholder = "Улица" value = "">
                                        </div>

                                        <div class="col-sm-4 mb-2">
                                            <label class="form-label h6" for="house">Дом *</label>
                                            <input class="form-control" type = "text" id = "house"  name = "house" required="true" placeholder = "Дом" value = "">
                                        </div>

                                        <div class="col-sm-4 mb-2">
                                            <label class="form-label h6" for="office">Офис/Квартира</label>
                                            <input class="form-control" type = "text" id = "office" name = "office" placeholder = "Офис/Квартира" value = "">
                                        </div>
                                    </div>

                                    <div class="card-body d-flex justify-content-between  text-right">
                                        <span></span>
                                        <div class="d-flex flex-wrap">
                                            <input type = "submit" class="btn btn-primary" value = "Добавить адрес" />
                                        </div>
                                    </div>   
                                </div>
                            </div>
                        </div>
                    <?php echo form_close(); ?>                        
                </div>
            </div>
         </div>
    </div>
</div>

