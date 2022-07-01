<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="<?php echo base_url('dashboard') ?>" class="nav-link">Dashboard</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    
    <?php if($this->session->userdata('akses_level')=='Apoteker') { ?>
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown">
        <i class="far fa-bell"></i>
        <span class="badge badge-danger navbar-badge"><?php $total=$t_kadaluwarsa->total + $t_habis->total; if($total > 0) echo $total ?></span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header"><?php echo $t_kadaluwarsa->total + $t_habis->total ?> Notifikasi</span>
        <div class="dropdown-divider"></div>
        <a href="<?php echo base_url('obat/kadaluwarsa') ?>" class="dropdown-item">
          <i class="fas fa-exclamation-triangle mr-2"></i> Obat Kadaluwarsa
          <span class="float-right text-muted text-sm"><?php echo $t_kadaluwarsa->total ?> Obat</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="<?php echo base_url('obat/habis') ?>" class="dropdown-item">
          <i class="fas fa-exclamation-triangle mr-2"></i> Obat Habis
          <span class="float-right text-muted text-sm"><?php echo $t_habis->total ?> Obat</span>
        </a>
      </li>

    <?php } ?>
      
      <!-- user yang login -->
      <li class="nav-item">
        <a class="nav-link text-success" href="<?php echo base_url('profil') ?>" role="button">
          <i class="fas fa-user"></i> <?php echo $this->session->userdata('nama'); ?> 
          (<?php echo $this->session->userdata('akses_level'); ?>)
        </a>
      </li>

      <!-- logout -->
      <li class="nav-item">
        <a class="nav-link text-danger" href="<?php echo base_url('login/logout') ?>">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->