<div class="container-fluid">
    <div class="block-header">
        <h2>Главная</h2>
    </div>

    <!-- Widgets -->
        
    <div class="row clearfix">
        <a href = "/user/offers/sent">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-deep-orange hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">block</i>
                    </div>
                    <div class="content">
                        <div class="text">Предложений</div>
                        <div class="number count-to" data-from="0" data-to="<?= $offers_count["count"]; ?>" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
        </a>
        
        <a href = "/user/orders/progress">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-blue hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">build</i>
                    </div>
                    <div class="content">
                        <div class="text">В работе</div>
                        <div class="number count-to" data-from="0" data-to="<?= $progress_count["count"]; ?>" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
        </a>
        
        <a href = "/user/orders/completed">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-light-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">sync</i>
                    </div>
                    <div class="content">
                        <div class="text">Выполнено</div>
                        <div class="number count-to" data-from="0" data-to="<?= $completed_count["count"]; ?>" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
        </a>
        
        <a href = "/user/orders/all">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-grey hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">equalizer</i>
                    </div>
                    <div class="content">
                        <div class="text">Всего заказов</div>
                        <div class="number count-to" data-from="0" data-to="<?= $order_count["count"]; ?>" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>            
            </div>
        </a>
    </div>
    <!-- #END# Widgets -->
</div>

<!-- ======================= Scripts for this page ============================== -->
<!-- Jquery CountTo Plugin Js -->
<script src="<?= base_url()?>public/plugins/jquery-countto/jquery.countTo.js"></script>
<!-- Morris Plugin Js -->
<script src="<?= base_url()?>public/plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url()?>public/plugins/morrisjs/morris.js"></script>
<!-- ChartJs -->
<script src="<?= base_url()?>public/plugins/chartjs/Chart.bundle.js"></script>
<!-- Flot Charts Plugin Js -->
<script src="<?= base_url()?>public/plugins/flot-charts/jquery.flot.js"></script>
<script src="<?= base_url()?>public/plugins/flot-charts/jquery.flot.resize.js"></script>
<script src="<?= base_url()?>public/plugins/flot-charts/jquery.flot.pie.js"></script>
<script src="<?= base_url()?>public/plugins/flot-charts/jquery.flot.categories.js"></script>
<script src="<?= base_url()?>public/plugins/flot-charts/jquery.flot.time.js"></script>
<!-- Sparkline Chart Plugin Js -->
<script src="<?= base_url()?>public/plugins/jquery-sparkline/jquery.sparkline.js"></script>
<!-- Custom Js -->
<script src="<?= base_url()?>public/js/pages/index.js"></script>
