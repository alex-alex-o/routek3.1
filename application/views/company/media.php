<!-- Bootstrap Select Css -->
<link href="<?= base_url() ?>public/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<!-- Dropzone Css -->
<link href="<?= base_url() ?>public/plugins/dropzone/dropzone.css" rel="stylesheet">

﻿<!-- Light Gallery Plugin Css -->
<link href="<?= base_url() ?>public/plugins/light-gallery/css/lightgallery.css" rel="stylesheet">

<div class="container-fluid">
    <!-- Image Gallery -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div class="card">
                <div class="header">
                    <h2>
                        Загрузка файлов
                    </h2>
                </div>
                <div class="body">
                <!-- Upload  -->
                    <?php echo form_open_multipart(base_url('company/media/upload/' . $media_type['id']), 'class="dropzone" id="myDropzone"');?>
                        <div class="dz-message">
                            <div class="drag-icon-cph">
                                <i class="material-icons">touch_app</i>
                            </div>
                            <h3>Перетащите файлы или нажмите на данную область для загрузки файлов.</h3>
                        </div>
                        <input type="file" name="files[]" class="hidden" multiple/>
                    <?php echo form_close(); ?>
                    <p><small class="text-success">Поддерживаемые типы: gif, jpg, png, jpeg | Максимальный размер: 2 MB | Максимальное количество : 10</small></p>
                </div>
            </div> 


            <div class="card">
                <div class="header">
                    <h2>
                        <?= $media_type['name']; ?>
                    </h2>
                </div>
                <div class="body">
                    <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                        <?php if (isset($media)): ?>
                            <?php foreach($media as $img): ?>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="<?= base_url() . 'uploads/' . $this->session->userdata('company_id') . '/'. $img['name']; ?>" data-sub-html="">
                                        <img class="img-responsive thumbnail" src = "<?= base_url() . 'uploads/' . $this->session->userdata('company_id') . '/'. $img['name']; ?>" /> 
                                    </a>
                                </div>
                            <?php endforeach;?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
<!-- Light Gallery Plugin Js -->
<script src="<?= base_url() ?>public/plugins/light-gallery/js/lightgallery-all.js"></script>

<!-- Custom Js -->
<script src="<?= base_url() ?>public/js/pages/medias/image-gallery.js"></script>

<!-- Dropzone Plugin Js -->
<script src="<?= base_url() ?>public/plugins/dropzone/dropzone.js"></script>

<script>
    switch (<?= $media_type['id']; ?>) {
        case 1:
            $("#products").addClass('active');
            break;
        case 2:
            $("#certificates").addClass('active');
            break;
        case 3:
            $("#gallery").addClass('active');
            break;
            
    }
    
</script>