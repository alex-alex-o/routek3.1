<input type="hidden" class = "form-control" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>" />

<!-- Star main-header -->
<div
  class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h3">Onboarding</h1>
</div>
<!-- End main-header -->


<!-- Start row 1 -->
<div class="row wow fadeInUp">
    <?php foreach($cards as $card): ?>
        <div class="col-lg-4 mb-4">
            <div id = "card_<?php echo $card["id"]; ?>" class="card h-100 card-tips">    
                
                <?php 
                    $card = str_replace('btn-data', 'btn-data="' . $card["id"]. '"', $card["card"]);
                    echo $card; 
                ?>
                
            </div>
        </div>
    <?php endforeach; ?>
</div>
<!-- End row 1 -->

<!-- Start Carousel -->
<div class="card card-carousel mb-4">
  <div id="carouselOnboard-1" class="carousel slide" data-ride="carousel" style="background: #C3DAFF;">
    <ol class="carousel-indicators">
      <li data-target="#carouselOnboard-1" data-slide-to="0" class="active"></li>
      <li data-target="#carouselOnboard-1" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner">

      <div class="carousel-item active ">
        <div class="container">
          <div class="row align-items-center" style="background: #C3DAFF;">
            <div class="col-lg-4">
              <img class="my-5 d-block mx-auto" src="<?= base_url()?>public/img/onbrd-slider-01.png" alt="">
            </div>
            <div class="col-lg-8">
              <h3 class="card-title font-weight-normal">Делайте заказы быстро и удобно!</h3>
              <p class="carousel-text">Загрузите модель, заполните параметры и отправьте запрос на расчет цены! Оплачивайте понравившееся предложение и получайте детали!</p>
              <div class="text-center">
                <a href="/home" class="btn btn-primary btn-lg mb-5">Сделать заказ</a>
              </div>

            </div>

          </div>

        </div>


      </div>

      <div class="carousel-item">
        <div class="container">
          <div class="row align-items-center" style="background: #C3DAFF;">
            <div class="col-lg-4">
              <img class="d-block my-5 mx-auto" src="<?= base_url()?>public/img/onbrd-slider-01.png" alt="">
            </div>

            <div class="col-lg-8">
              <h3 class="card-title font-weight-normal">Удобное управление текущими заказами.</h3>
              <p class="carousel-text">Отслеживайте все этапы исполнения заказа на платформе или в удобном
                мобильном приложении.</p>
              <div class="text-center">
                <a href="/user/orders/index" class="btn btn-primary btn-lg mb-5">Текущие заказы</a>
              </div>
            </div>

          </div>

        </div>


      </div>

    </div>
    <a class="carousel-control-prev" href="#carouselOnboard-1" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselOnboard-1" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<!-- End Carousel -->

<!-- Start row-2 -->
<div class="row">
  <div class="col-md-6 mb-4 wow fadeInLeft">
    <h4 class="font-weight-normal">Заказы</h4>
    <div class="card">
      <div class="card-body text-center">
        <img class="d-block mx-auto mb-2" src="<?= base_url()?>public/img/svg/order-lc.svg" alt="advice">
        <h5 class="card-title ">У вас пока нет заказов</h5>
        <p class="card-text">
          Сделайте первый заказ и получите скидку 10%!
        </p>

        <a class="btn btn-block btn-primary mx-auto" style="max-width: 200px;" href = "/home">Сделать заказ</a>
      </div>
    </div>
  </div>

  <div class="col-md-6 mb-4 wow fadeInRight">
    <h4 class="font-weight-normal">Уведомления</h4>
    <div class="card">
      <div class="card-body text-center">
        <img class="d-block mx-auto mb-2" src="<?= base_url()?>public/img/svg/plane-lc.svg" alt="advice">
        <h5 class="card-title ">Нет уведомлений</h5>
        <p class="card-text">
          Здесь появится список уведомлений!
        </p>

        <button type="button" class="btn btn-block btn-primary mx-auto"
          style="max-width: 200px;">Просмотр</button>
      </div>
    </div>
  </div>
</div>
<!-- End row-2 -->


<script>
    $( ".card-btn" ).click(function() {
        id = $(this).attr("btn-data");
        $("#card_" + id).hide();

        $.ajax({
            method: "POST",
            url: "<?php echo site_url().'user/dashboard/ajax_showed' ?>",
            data: {"id" : id, '<?php echo $this->security->get_csrf_token_name();?>' : $("input[name='<?php echo $this->security->get_csrf_token_name();?>'").val()}
        })
        .done(function( return_data ) {
        });        
    });

</script>