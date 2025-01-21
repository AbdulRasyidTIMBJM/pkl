  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="<?= base_url('dashboard'); ?>" class="brand-link">
          <img src="<?= base_url('assets/dist/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">CSSD RS ISLAM</span>
      </a>

      <div class="sidebar">
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="<?= base_url('assets/dist/img/user2-160x160.jpg'); ?>" class="img-circle elevation-2" alt="User  Image">
              </div>
              <div class="info">
                  <a href="<?= base_url('profile') ?>" class="d-block"><?= $this->session->userdata('nama') ?></a>
              </div>
          </div>

          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <li class="nav-item">
                      <a href="<?= base_url('dashboard'); ?>" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>Dashboard</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="<?= base_url('Alat'); ?>" class="nav-link">
                          <i class="nav-icon fas fa-wrench"></i>
                          <p>Alat</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="<?= base_url('BarangMasuk'); ?>" class="nav-link">
                          <i class="nav-icon fas fa-sign-in-alt"></i>
                          <p>Barang Masuk</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="<?= base_url('BarangKeluar'); ?>" class="nav-link">
                          <i class="nav-icon fas fa-sign-out-alt"></i>
                          <p>Barang Keluar</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="<?= base_url('BarangRusak'); ?>" class="nav-link">
                          <i class="nav-icon fas fa-exclamation-triangle"></i>
                          <p>Barang Rusak</p>
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