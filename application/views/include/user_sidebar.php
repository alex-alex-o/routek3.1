<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('user/profile'); ?>">
                  <div class="d-flex align-items-center">

                    <?php if (!empty($this->session->has_userdata('company_logo'))): ?>
                        <img class="mr-3" src="<?= base_url() . $this->session->userdata('company_logo');?>" height="48" alt="User">
                    <?php endif; ?>
                      
                    <?php if (!empty($this->session->has_userdata('company_name'))): ?>
                        <h6 class="text-light font-weight-normal"><?= strtoupper($this->session->userdata('company_name'));?></h6>
                    <?php else: ?>
                        <h6 class="text-light font-weight-normal"><?= strtoupper($this->session->userdata('name'));?></h6>
                    <?php endif; ?>
                  </div>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-light" href = "<?= base_url('user/dashboard/index'); ?>">
                    <span class="mr-2"><img src="<?= base_url()?>public/img/svg/lc-rocket-w-ico.svg" height="28" alt="rocket"></span>
                    <span>Onboarding </span>
                </a>
            </li>
            
            <li class="nav-item ">
                <a class="nav-link text-light" href="<?= base_url('user/offers/index'); ?>">
                    <span class="mr-2"><img src="<?= base_url()?>public/img/svg/price-req-w-ico.svg" height="28" alt="price"></span>
                    <span>Расчет цены</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link text-light" href="<?= base_url('user/orders/index'); ?>">
                    <span class="mr-2"><img src="<?= base_url()?>public/img/svg/order-lc-w-ico.svg" height="28" alt="orders"></span>
                    Заказы
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link text-light" href="<?= base_url('user/files/index'); ?>">
                    <span class="mr-2"><img src="<?= base_url()?>public/img/svg/lib-lc-w-ico.svg" height="28" alt="library"></span>
                    Библиотека
                </a>
            </li>
        </ul>
    </div>
</nav>