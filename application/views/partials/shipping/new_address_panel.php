<div id = "addressPanel" class="row mt-3 ">
   <div class="col-md-2">
   </div>
   <div class="col-md-8">
        <div class="row g-3">
            <div class="col-md-12">
                <!-- Карточка ввода адреса  -->
                <div class = "card model-slide">
                    <div class="card-body text-center">
                        <h5 class="card-title mb-3">Пожалуйста заполните информацию об адресе доставки для автоматического расчета оптимальной стоимости</h5>
                        <div class = "row">
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

                            <div class="col-sm-4 mb-2">
                                <label class="form-label h6" for="recipient">Получатель</label>
                                <input class="form-control" type = "text" id = "recipient" required="true" name = "recipient" value = "" placeholder = "Получатель">
                            </div>                                            
                        </div>

                    </div>

                    <div class="card-body d-flex justify-content-between text-right">
                        <div class="form-group">
                            <input type="checkbox" required = "true" name="terms" id="terms" class="filled-in chk-col-pink">
                            <label for="terms">Я прочитал и согласен с <a target="_blank" href="https://routek.tech/legal.html">условиями пользовательского соглашения</a>.</label>
                        </div>
                        <div class="d-flex flex-wrap">
                            <span></span>
                            <input id = "submitNotRegistered" type = "submit" disabled class="btn btn-primary" value = "Отправить на расчет" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                

