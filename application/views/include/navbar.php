<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<div class="search-bar">
    <div class="search-icon">
        <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="...">
    <div class="close-search">
        <i class="material-icons">close</i>
    </div>
</div>
<!-- #END# Search Bar -->
  <!-- Top Bar -->
  <nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <?php if ($this->session->has_userdata("role")): ?>
                <?php if ($this->session->userdata("role") == 1): ?>
                    <a class="navbar-brand" href="<?= base_url('admin/dashboard');?>">Routek 2.0 - Администратор</a>
                <?php elseif ($this->session->userdata("role") == 2): ?>
                    <a class="navbar-brand" href="<?= base_url('company/dashboard');?>">Routek 2.0 - Производство</a>
                <?php elseif ($this->session->userdata("role") == 3): ?>
                    <a class="navbar-brand" href="<?= base_url('user/dashboard');?>">Routek 2.0 - Заказчик</a>
                <?php elseif ($this->session->userdata("role") == 4): ?>
                    <a class="navbar-brand" href="<?= base_url('manager/dashboard');?>">Routek 2.0 - Менеджер</a>
                <?php elseif ($this->session->userdata("role") == 5): ?>
                    <a class="navbar-brand" href="<?= base_url('manager/dashboard');?>">Routek 2.0 - Конструктор</a>
                <?php endif; ?>
            <?php else: ?>
                <a <? /*class="navbar-brand" */ ?> href="<?= base_url('home/index');?>">
			<img src="/public/images/logo.png" style = "background-color: white; padding: 5px; border-radius: 3px;" />
<? /*Routek 2.0*/ ?>
</a>
            <?php endif; ?>
        </div>
        
       
        <div class="collapse navbar-collapse navbar-left" id="navbar-main">
          <!-- Содержимое основной части -->
            <ul class="nav navbar-nav">

                <!-- Ссылки -->        
                <li class="dropdown active">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ресурсы<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="http://routek.tech/client.html">FAQ</a></li>
                        <li><a href="http://routek.tech/appearance.html">Технологии и материалы</a></li>
                        <li><a href="http://routek.tech/knowbase.html">База знаний</a></li>
                        <li><a href="http://routek.tech/legal.html">Правовая информация</a></li>
                    </ul>
                </li>                
                </li>
                <li><a href="mailto:support@routek.tech">Поддержка</a></li>
                <li><a href="#"></a></li>
            </ul>

        </div>        
        
        <div class="collapse navbar-collapse navbar-right" id="navbar-main">
          <!-- Содержимое основной части -->
            <ul class="nav navbar-nav">
                <?php if ($this->session->userdata("role") == 3): ?>
                    <li><a href="<?= base_url('home/index');?>" class = "btn btn-primary btn-xs">Сделать заказ</a></li>
                <?php endif; ?>
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">notifications</i>
                        <span class="label-count"><?php // echo $count; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">События</li>
                        <li class="body">
                            <?php if (false): ?>
                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 254px;"><ul class="menu" style="overflow: hidden; width: auto; height: 254px;">
                                <li>
                                    <a href="javascript:void(0);" class=" waves-effect waves-block">
                                        <div class="icon-circle bg-light-green">
                                            <i class="material-icons">done</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4>Заказ выполнен</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> 14 минут назад
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class=" waves-effect waves-block">
                                        <div class="icon-circle bg-red">
                                            <i class="material-icons">error</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4>Заказ не оплачен</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> 1 час назад
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class=" waves-effect waves-block">
                                        <div class="icon-circle bg-cyan">
                                            <i class="material-icons">description</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4>Поступило предложение</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> 3 часа назад
                                            </p>
                                        </div>
                                    </a>
                                </li>
                            </ul><div class="slimScrollBar" style="background: rgba(0, 0, 0, 0.5); width: 4px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 0px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                            <?php endif; ?>
                        </li>
                        <li class="footer">
                            <a href="javascript:void(0);" class=" waves-effect waves-block">Посмотреть все</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">RU<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">RU</a></li>
                        <li><a href="#">EN</a></li>
                        <li><a href="#">DE</a></li>
                    </ul>
                </li>
                <li><a href="<?= base_url('auth/logout');?>">Выход</a></li>
            </ul>

        </div>        
    </div>
</nav>
<!-- #Top Bar -->
