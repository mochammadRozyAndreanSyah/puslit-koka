  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url("dashboard")?>" class="brand-link">
      <img src="<?=base_url()?>assets/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">My POS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="<?= base_url("dashboard")?>" class="nav-link <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?= $this->uri->segment(1) == 'data_barang' || $this->uri->segment(1) == 'stock_barang'  || $this->uri->segment(1) == 'data_customers'? 'active' : '' ?>">
              <i class="nav-icon fas fa fa-book"></i>
              <p>
                Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url("data_barang") ?>" class="nav-link <?= $this->uri->segment(1) == 'data_barang' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url("stock_barang") ?>" class="nav-link <?= $this->uri->segment(1) == 'stock_barang' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stock Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url("data_customers") ?>" class="nav-link <?= $this->uri->segment(1) == 'data_customers' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Customers</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?= $this->uri->segment(1) == 'pemesanan_barang' || $this->uri->segment(1) == 'data_pemesanan' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-truck"></i>
              <p>
                Pemesanan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url("pemesanan_barang") ?>" class="nav-link <?= $this->uri->segment(1) == 'pemesanan_barang' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pemesanan Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url("data_pemesanan") ?>" class="nav-link <?= $this->uri->segment(1) == 'data_pemesanan' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Data Pemesanan Barang</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?= $this->uri->segment(1) == 'pembayaran_barang' || $this->uri->segment(1) == 'data_pembayaran' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Pembayaran
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url("pembayaran_barang") ?>" class="nav-link <?= $this->uri->segment(1) == 'pembayaran_barang' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pembayaran Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url("data_pembayaran") ?>" class="nav-link <?= $this->uri->segment(1) == 'data_pembayaran' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Data Pembayaran Barang</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?= $this->uri->segment(1) == 'penjualan_bulanan' || $this->uri->segment(1) == 'penjualan_tahunan'  || $this->uri->segment(1) == 'grafik'? 'active' : '' ?>">
              <i class="nav-icon fas fa fa-book"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">              
              <li class="nav-item">
                <a href="<?php echo base_url("penjualan_bulanan") ?>" class="nav-link <?= $this->uri->segment(1) == 'penjualan_bulanan' ? 'active' : '' ?>"></i>
                  <p>Penjualan Bulanan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url("penjualan_tahunan") ?>" class="nav-link <?= $this->uri->segment(1) == 'penjualan_tahunan' ? 'active' : '' ?>"></i>
                  <p>Penjualan Tahunan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url("grafik") ?>" class="nav-link <?= $this->uri->segment(1) == 'grafik' ? 'active' : '' ?>"></i>
                  <p>Grafik</p>
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
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  