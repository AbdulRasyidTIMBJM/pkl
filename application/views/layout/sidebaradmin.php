  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="<?= base_url('admin'); ?>" class="brand-link">
          <img src="<?= base_url('assets/dist/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <div class="sidebar">
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="<?= get_user_image(); ?>" class="img-circle elevation-2" alt="User Profile">
              </div>
              <div class="info">
                  <a href="<?= base_url('profile') ?>" class="d-block"><?= $this->session->userdata('nama') ?></a>
              </div>
          </div>

          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <li class="nav-item">
                      <a href="<?= base_url('Karyawan'); ?>" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>KARYAWAN</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="<?= base_url('Unit'); ?>" class="nav-link">
                          <i class="nav-icon fas fa-building"></i>
                          <p>UNIT</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="<?= base_url('login/logout'); ?>" class="nav-link">
                          <i class="nav-icon fas fa-sign-out-alt"></i>
                          <p>Log Out</p>
                      </a>
                  </li>
                  </a>
                  </li>
              </ul>
          </nav>
      </div>
  </aside>