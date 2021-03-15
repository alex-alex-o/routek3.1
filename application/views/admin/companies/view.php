
<!-- Bootstrap Select Css -->
<link href="<?= base_url() ?>public/plugins/light-gallery/css/lightgallery.css" rel="stylesheet">

<link href="<?= base_url() ?>public/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Компания <?= $company["name"]; ?>
                    </h2>
                </div>
                
                <div class="body">
                    <div class="row clearfix">
                        <div class = "col-lg-6">
                            <p><strong>Адрес компании:</strong> <?= $company["zip"] . ' ' . $company["city"] . ' ' . $company["region"] . ' ' . $company["street"] . ' ' . $company["building"] ; ?></p>
                            <p><strong>Телефон компании:</strong> <?= $company["email"]; ?></p>
                        </div>
                        <div class = "col-lg-6">
                            <p><strong>Email компании:</strong> <?= $company["phone"]; ?></p>
                            <p><strong>Дата регистрации:</strong> <?= $company["created_at"]; ?></p>
                        </div>
                    </div>
                   
                </div>
                    
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Сотрудники
                    </h2>
                </div>
                
                <div class="body">
                    <div class="row clearfix">
                        <?php foreach($users as $user): ?>
                            <div class = "col-lg-3">
                                <p><strong>Пользователь:</strong> <?= $user["name"]; ?></p>
                            </div>
                            <div class = "col-lg-3">
                                <p><strong>Email:</strong> <?= $user["email"]; ?></p>
                            </div>
                            <div class = "col-lg-3">
                                <p><strong>Телефон:</strong> <?= $user["phone"]; ?></p>
                            </div>
                            <div class = "col-lg-3">
                                <p><strong>Добавлен:</strong> <?= $user["created_at"]; ?></p>
                            </div>
                        <?php endforeach;?>
                    </div>
                   
                </div>
                    
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Заметки:</h2>
                    <a href="<?= base_url('admin/company/note/' . $company['id']);?>" class="btn bg-deep-orange waves-effect pull-right">ДОБАВИТЬ</a>

                </div>

                <div class="body">
                    <div class="row clearfix">
                        <?php if(isset($notes)): ?>
                            <table id = "na_datatable" class = "table table-striped table-hover dataTable">
                                <?php foreach($notes as $note): ?>
                                    <tr>
                                        <td><?= $note["owner_name"]; ?></td>
                                        <td><?= $note["created_at"]; ?></td>
                                        <td><?= $note["name"]; ?>(<?= $note["username"]; ?>)</td>
                                        <td><?= $note["result"]; ?></td>
                                        <td>
                                            <a title  = "Просмотр" class = "view btn btn-sm btn-info" href="<?php echo base_url('admin/company/note/'. $company['id'] . '/' . $note['id']); ?>"> <i class="material-icons">edit</i></a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
                    
            </div>
        </div>
    </div>
</div>

<!-- Autosize Plugin Js -->
<script src="<?= base_url() ?>public/plugins/autosize/autosize.js"></script>

<script>
    $(document).ready(function () {
        
    });
    
    $("#companies").addClass('active');
</script>
