<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">OKEBUS <sup>ADMIN</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <div class="sidebar-heading">
                List Data
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBus"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-bus"></i>
                    <span>List Bus</span>
                </a>
                <div id="collapseBus" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Bus :</h6>
                        <a class="collapse-item" href="sinar_jaya.php">Sinar Jaya</a>
                        <a class="collapse-item" href="haryanto.php">Haryanto</a>
                        <a class="collapse-item" href="dewi_sri.php">Dewi Sri</a>
                        <a class="collapse-item" href="nusantara.php">Nusantara</a>
                        <a class="collapse-item" href="putra_remaja.php">Putra Remaja</a>
                        <a class="collapse-item" href="semua_bus.php">Semua Bus</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="pendapatan_terakhir.php">
                <i class="fas fa-fw fa-money-bill"></i>
                    <span>List Order Terakhir</span></a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="list_user.php">
                <i class="fas fa-fw fa-user"></i>

                    <span>List User</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Action
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>Tambah Data</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data:</h6>
                        <a class="collapse-item" href="tambah_bus.php">Bus</a>
                        <a class="collapse-item" href="tambah_user.php">User</a>
                    </div>
                </div>
            </li>
            

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->