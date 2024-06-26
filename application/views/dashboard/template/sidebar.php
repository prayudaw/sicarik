        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('dashboard') ?>">
                <div class="sidebar-brand-icon">
                    <img src="<?php echo base_url('assets/img/perpus') ?>/logo-perpus.png" style="height:60px">
                </div>
                <div class="sidebar-brand-text mx-3">SICARIK</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
           
            <!-- Nav Item - Histori Peminjaman Buku -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('dashboard/buku') ?>">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Histori Buku</span></a>
            </li>

        
            
            <!-- Nav Item - Histori Peminjaman Skripsi -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('dashboard/skripsi') ?>">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Histori Skripsi</span></a>
            </li>

             <!-- Nav Item - Histori Peminjaman Kunci Locker -->
             <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('dashboard/loker') ?>">
                    <i class="fas fa-fw fa-key"></i>
                    <span>Histori Locker</span></a>
            </li>

    
             <!-- Nav Item - Histori Peminjaman Kunjungan -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('dashboard/pintumasuk') ?>">
                    <i class="fas fa-fw fa-clock"></i>
                    <span>Histori Kunjungan</span></a>
            </li>

 

            <!-- Nav Item - Histori Peminjaman Kunjungan -->
                <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('dashboard/serial') ?>">
                    <i class="fas fa-fw fa-clock"></i>
                    <span>Histori Kunjungan Serial</span></a>
                </li>


                   <!-- Nav Item - Histori Peminjaman Kunjungan -->
             <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('dashboard/referensi') ?>">
                    <i class="fas fa-fw fa-clock"></i>
                    <span>Histori Kunjungan Referensi</span></a>
              </li>
                
                
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->