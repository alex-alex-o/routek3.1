<?php echo form_open_multipart(base_url("auth/company_register"), '');?>
    <div class="modal fade" id="companyRegister" tabindex="-1" aria-labelledby="companyRegister" aria-hidden="true">
        <input type="hidden" class="form-control" name="registration_type" value = "manager">
        <input type="hidden" class="form-control" name="order_id" value = "<?php echo $order["id"];?>">
        
        <div class="modal-dialog modal-fullscreen">
           <div class="modal-content">
                <div class="modal-header">
                   <h4 class="modal-title">Добавить компанию</h4>
                   <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="name" placeholder="Контактное лицо" required autofocus>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="company" placeholder="Название компании (Необязательно)" autofocus>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control phone-number" name="phone" placeholder="Телефон" required autofocus>
                                </div>
                            </div>
                        </div>
                    </div>                    
                    
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="email" placeholder="Email" required autofocus>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="form-group">                            
                                <div class="form-line">
                                    <input type="text" class="form-control" name="city" placeholder="Город" required autofocus>
                                </div>
                            </div>
                        </div>                    
                    </div>
             
                    <div class="col-lg-12">
                        <div class="form-line">
                            <input type="hidden" class="form-control" name="password" value = "12345678">
                        </div>
                    </div>
                    
                    <div class="col-lg-12">
                        <div class="form-line">
                            <input type="hidden" class="form-control" name="confirm_password" value = "12345678">
                        </div>
                    </div>
               
                    
                    <div class="col-lg-12">
                        <input type="checkbox" name="is_free_medic_production" id="is_free_medic_production" class="filled-in chk-col-pink">
                        <label for="is_free_medic_production">Могу произвести изделие.</label>
                    </div>

                    <div class="col-lg-12">
                        <input type="checkbox" name="is_free_medic_construct" id="is_free_medic_construct" class="filled-in chk-col-pink">
                        <label for="is_free_medic_construct">Могу разработать модель.</label>
                    </div>                    
                    
                    <div class="text-right">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                       <input type="submit" class="btn btn-primary" name = "submit" value = "Добавить" />
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php echo form_close(); ?>
