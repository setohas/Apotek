<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <center>
    <a href="<?php base_url('dashboard') ?>" class="brand-link">
      <img src="<?php echo base_url() ?>assets/images/SJ.png" alt="logo" height="100" width="100">
      <br>
      <span class="brand-text font-weight-light">APOTEK SUMBER JAYA</span>
    </a>
  </center>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3">
     <p class="text-center">
      <div class="text-center">
        <a href="<?php echo base_url('profil')?>" class="d-block"><?php echo $this->session->userdata('nama'); ?>
        <br><small>(<?php echo $this->session->userdata('akses_level'); ?>)</small>
      </a>
    </div>
    </p>
  </div>
  
  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <!-- Akses Level Apoteker -->
          <?php if($this->session->userdata('akses_level')=='Apoteker'){ ?>
           <!-- DASHBOARD -->
           <li class="nav-item">
            <a href="<?php echo base_url('dashboard')?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <!-- DATA OBAT -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-medkit"></i>
              <p>
                Obat
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('obat/tambah')?>" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Tambah Obat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('obat')?>" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Lihat Obat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('obat/kadaluwarsa')?>" class="nav-link">
                  <i class="icon fas fa-exclamation-triangle"></i>
                  <p>Obat Kadaluarsa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('obat/habis')?>" class="nav-link">
                  <i class="icon fas fa-exclamation-triangle"></i>
                  <p>Obat Habis</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- DATA PEMASOK -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Pemasok
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('pemasok/tambah')?>" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Tambah Pemasok</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('pemasok')?>" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Lihat Pemasok</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- DATA PENJUALAN -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Penjualan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('penjualan/tambah')?>" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Tambah Penjualan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('penjualan')?>" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Lihat Penjualan</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- DATA Pembelian -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon ion ion-bag"></i>
              <p>
                Pembelian
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Tambah Pembelian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Lihat Pembelian</p>
                </a>
              </li>
            </ul>
          </li>
        <?php } ?>
        <!-- End Akses Level Apoteker -->

        <!-- Akses Level Kepala Apoteker -->
          <?php if($this->session->userdata('akses_level')=='Kepala Apoteker'){ ?>

          <!-- Laporan -->
          <li class="nav-item">
            <a href="<?php echo base_url('laporan')?>" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>

          <!-- DATA USER -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Data Pengguna
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('user/tambah')?>" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Tambah User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('user')?>" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Data User</p>
                </a>
              </li>              
            </ul>
          </li>

        <?php } ?>
        <!-- End Akses Level Kepala Apoteker -->

          <!-- LOGOUT -->
          <li class="nav-item">
            <a href="<?php echo base_url('login/logout')?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">SISTEM INFORMASI APOTEK</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">

        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?php echo $title?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <?php
              if($this->session->flashdata('sukses')){
                ?>

                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <i class="icon fas fa-check"></i>
                  <?php echo $this->session->flashdata('sukses'); ?>
                </div>

              <?php } ?>

              <!-- valiadation error -->
              <?php echo validation_errors('<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fas fa-exclamation-triangle"></i>','</div>')?>