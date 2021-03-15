<!-- JQuery DataTable Css -->
<link href="<?= base_url()?>public/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">  
<!-- Bootstrap Select Css -->
<link href="<?= base_url() ?>public/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<?php echo form_open(base_url('admin/premoderation/company_select/' . $id), 'class="form-horizontal"');  ?> 
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2 style="display: inline-block;">
                Выберите компанию
            </h2>
            <input type="submit" name="submit" value="Разослать" class="btn btn-primary m-t-15 pull-right">
          </div>
          <div class="body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                <thead>
                  <tr>
                    <th width = "20px"></th>
                    <th>#</th>
                    <th>Название комании</th>
                    <th>Представитель</th>
                  </tr>
                </thead>
                <tbody>
                    <input type = "hidden" name = "offer_id" value = "<?php echo $id; ?>" />
                    <?php $count=0; foreach($companies as $company):?>
                        <tr>
                          <td>
                              <input type = "checkbox" id = "company.<?= $company["id"]?>" name = "company[<?= $company['id']?>]" class="filled-in" value = "<?= $company['id']?>"/>
                              <label for="company.<?= $company["id"]?>"></label>
                          </td>                      
                          <td><?= ++$count; ?></td>
                          <td><?= $company['name']; ?></td>
                          <td>
                              <?= $company['user_name']; ?>
                              <br />
                              <?= $company['user_email']; ?>
                          </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php echo form_close(); ?>
