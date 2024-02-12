<div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <!-- <a class="navbar-brand brand-logo" href="../../index.html"><img src="../../images/logo.svg" alt="logo"/></a> -->
          <!-- <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../../images/logo-mini.svg" alt="logo"/></a> -->
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
          <li class="nav-item nav-search d-none d-lg-block w-100">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="mdi mdi-magnify"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
         
         
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
              <img src="" alt=""/>
              <span class="nav-profile-name"><?= $this->session->userdata('username') ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">
    <i class="mdi mdi-logout text-primary"></i>
    Logout
</a>

            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard') ?>">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('user') ?>">
              <i class="mdi mdi-account menu-icon"></i>
              <span class="menu-title">User</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('album') ?>">
            <i class="mdi mdi-image-album menu-icon"></i>
              <span class="menu-title">Album</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('foto') ?>">
              <i class="mdi mdi-image menu-icon"></i>
              <span class="menu-title">Foto</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('like') ?>">
              <i class="mdi mdi-thumb-up menu-icon"></i>
              <span class="menu-title">Like</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('komen') ?>">
              <i class="mdi mdi-comment menu-icon"></i>
              <span class="menu-title">Komen</span>
            </a>
          </li>
          
         
        
          
        </ul>
      </nav>