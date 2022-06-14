<style>
    #accordionSidebar{
         background:url(./img/6.jpg);
    }
</style>
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../../../index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                </div>
                <div class="sidebar-brand-text mx-3">Petro En </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item  -->
            <li class="nav-item active">
        <a class="nav-link" href="../../../index.php">
            <i class="fas fa-home"></i>
            <span>Home</span></a>
    </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
        Station
    </div>


           
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-gas-pump"></i>
            <span>Station accounts</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="../../purchase/purchase.php">Bon Commande</a>
                <a class="collapse-item" href="../../sale/sale.php">The sales</a>
                                <a class="collapse-item"  href="../../invoice/invoice.php">The Invoices</a>

            </div>
        </div>
    </li>

           
    <hr class="sidebar-divider">

    <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-user-friends"></i>
            <span>Employees</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../listEmp/employees list.php"> Employees List</a>
                <a class="collapse-item" href="../absence/absence.php"> Attendance list</a>
                                <a class="collapse-item"  href="salary.php"> Salary</a>
                    </div>
                </div>
            </li>
                                    
    <hr class="sidebar-divider">

<li class="nav-item">
    <a class="nav-link" href="../../artical/artical.php">
    <i class="fa-solid fa-oil-can"></i>

                            <span>Artical</span></a>
</li>
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="../../acounts/acounts.php">
            <i class="fas fa-user-friends"></i>
                                <span>Account management</span></a>
    </li>
    

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item">
                <a class="nav-link" href="pages/settings.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Settings</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/help.php">
                    <i class="fas fa-question-circle"></i>  
                                              <span>Help</span></a>
            </li>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->