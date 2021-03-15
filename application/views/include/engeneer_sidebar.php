<?php 
    if ($this->uri->segment(4) != null) {
        
        $cur_tab = $this->uri->segment(2) == ''? 'dashboard' : $this->uri->segment(2);
        $sub_tab = $this->uri->segment(4) == ''? 'dashboard' : $this->uri->segment(4);
    } else {
        $cur_tab = $this->uri->segment(2) == ''? 'dashboard' : $this->uri->segment(2);  
        $sub_tab = $this->uri->segment(3) == ''? 'dashboard' : $this->uri->segment(3);
        
    }
?>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <!-- <img src="<?= base_url()?>public/images/user.png" width="48" height="48" alt="User" /> -->
        </div>
        
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= strtoupper($this->session->userdata('name'));?></div>
            <div class="email"><?= $this->session->userdata('email');?></div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li id="">
                        <a href="<?= base_url('admin/profile'); ?>">
                            <i class="material-icons">person</i>Профиль
                        </a>
                    </li>
                    <li role="seperator" class="divider">
                        
                    </li>
                    <li id=""><a href="<?= base_url('auth/logout'); ?>">
                        <i class="material-icons">input</i>Выйти</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
          <li class="header">МЕНЮ</li>
              <li id="dashboard">
                  <a href="<?= base_url('engeneer/dashboard');?>">
                      <i class="material-icons">home</i>
                      <span>Главная</span>
                  </a>
              </li>

              <li id = "engeneer">
                  <a href="<?= base_url('engeneer/engeneer/index'); ?>">
                      <i class="material-icons">person</i>
                      <span>Профиль конструктора</span>
                  </a>
              </li>

              <li id = "offers">
                  <a href="<?= base_url('engeneer/offers/index'); ?>">
                      <i class="material-icons">timeline</i>
                      <span>Запросы цен</span>
                  </a>
              </li>         

              <li id = "orders">
                  <a href="<?= base_url('engeneer/orders/index'); ?>">
                      <i class="material-icons">shopping_cart</i>
                      <span>Управление заказами</span>
                  </a>
              </li>         
             
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            <a href="javascript:void(0);"><?= $this->general_settings['copyright'] ?></a>.
        </div>
    </div>
    <!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->

<script>
    $("#<?= $cur_tab; ?>").addClass('active');
    $("#<?= $sub_tab; ?>").addClass('active');
</script>
