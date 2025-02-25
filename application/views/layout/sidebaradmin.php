  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="<?= base_url('admin'); ?>" class="brand-link">
          <img src="<?= base_url('assets/dist/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Admin</span>
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
                      <a href="<?= base_url('Supplier'); ?>" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>Supplier</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="<?= base_url('Unit'); ?>" class="nav-link">
                          <i class="nav-icon fas fa-building"></i>
                          <p>UNIT</p>
                      </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('Alatadmin'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-wrench"></i>
                        <p>Alat</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-sign-in-alt"></i>
                        <p>Barang Masuk<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('BarangMasukadmin'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Barang Lama</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('BarangMasukadmin/indexbaru'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Barang Baru</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('BarangMasukadmin/surat'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Buat Surat Perminataan Barang Baru</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Barang Keluar<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('BarangKeluaradmin'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tabel Data</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('BarangKeluaradmin/surat_serah_terima'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Buat Surat</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-exclamation-triangle"></i>
                        <p>Barang Rusak<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('BarangRusakadmin'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tabel Data</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('BarangRusakadmin/surat_serah_terima'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Buat Surat</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Laporan<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('Karyawan/userprint'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Karyawan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Alat/print'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Alat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('BarangMasuk/reprint'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Barang Masuk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('BarangKeluar/reprint'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Barang Keluar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('BarangRusak/reprint'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Barang Rusak</p>
                            </a>
                        </li>
                    </ul>
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