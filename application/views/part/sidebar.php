 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('Anggota');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Anggota</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Simpanan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('Simpanan');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Simpanan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('Transaksi/simpanan');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transaksi Simpanan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('Laporan/MutasiSimpanan');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mutasi Simpanan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('Laporan/TransaksiSimpanan');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Transaksi </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Pinjaman
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('Pengajuan');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Pengajuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('Pinjaman');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Pinjaman</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('Realisasi');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Realisasi Pinjaman</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('Angsuran');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pembayaran Angsuran </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('Laporan/TransaksiPinjaman');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Transaksi </p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>