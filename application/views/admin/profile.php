<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Профиль пользователя
                </h2>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-md-12">
                      <?php echo form_open(base_url('admin/profile'), 'class="form-horizontal"' )?> 
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
                                            <input type="text" value="<?= $user['email']; ?>" name="email" class="form-control" placeholder="Email">
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
        </div>
    </div>
</div>


<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Смена пароля
                </h2>
            </div>
            <div class="body">
               <?php if(validation_errors() !== ''): ?>
                  <div class="alert alert-warning alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                      <?= validation_errors();?>
                  </div>
                <?php endif; ?>
               <?php echo form_open(base_url('admin/profile/change_pwd'), 'class="form-horizontal"');  ?> 
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
                          <input type="submit" name="submit" value="ИЗМЕНИТЬ" class="btn btn-primary m-t-15 waves-effect">
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>    

<script>
    $("#users").addClass('active');
</script>
