    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow" style="background-color: #212121 !important;">
        <a class="navbar-brand col-md-3 col-lg-2 py-0 mr-0" href="#">
            <img class="image-fluid" src="<?= base_url()?>public/img/routek-logo-white.svg" height="64" alt="Компания Routek" loading="lazy">
        </a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
          data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="nav mx-0">
          <li class="nav-item">
            <a class="nav-link" href="mailto:info@routek.tech">Routek Support</a>
          </li>
          <!-- 
          <li class="nav-item">
            <a class="nav-link" href="#">Resources menu</a>
          </li>
            -->
          <li class="nav-item">
            <a class="nav-link" href="#">

              <i class="fas fa-bell" alt='Notifications'></i>
              <span id="navbarNotificationCounter" class="badge badge-pill red z-depth-1 ml-n1">12</span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="lang-versions" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">RU</a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="lang-versions">
              <a href="#" class="dropdown-item">EN</a>
              <a href="#" class="dropdown-item">DE</a>
              <a href="#" class="dropdown-item">FR</a>
            </div>
          </li>
          <li class="nav-item text-nowrap">
            <a class="nav-link" href="<?= base_url('auth/logout'); ?>"><i class="fas fa-sign-out-alt mr-1"></i>Выйти</a>
          </li>
        </ul>
    </nav>