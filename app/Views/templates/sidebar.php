<aside class="main-sidebar bg-dashboard elevation-4">
  <!-- Brand Logo -->
  <a href="/user" class="brand-link text-center">
    <H3 class="tulisan"><i class="fas fa-sticky-note"></i> SIMPEL LIFE</H3>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <nav>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">MAIN NAVIGASI</li>
          <li class="nav-item <?php echo ($activePage == 'user') ? 'aktif' : ''; ?>">
            <a href="/user" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item <?php echo ($activePage == 'tugas') ? 'aktif' : ''; ?>">
            <a href="/tugas" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              Tugas
            </a>
          </li>
          <li class="nav-item <?php echo ($activePage == 'TanggalPenting') ? 'aktif' : ''; ?>">
            <a href="/TanggalPenting" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              Tanggal
            </a>
          </li>
          <li class="nav-item <?php echo ($activePage == 'kategori') ? 'aktif' : ''; ?>">
            <a href="/kategori" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              Kategori
            </a>
          </li>
          <li class="nav-header">LAINNYA</li>
          <li class="nav-item">
            <a href="/login/logout" class="nav-link" data-toggle="modal" data-target="#logoutModal">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              Keluar
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </div>
</aside>