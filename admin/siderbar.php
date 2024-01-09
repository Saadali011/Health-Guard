<?php
$loginid = $_SESSION["loginid"];
$q = mysqli_query($conn, "SELECT * FROM `admin` WHERE ad_id = '$loginid'");
$row = mysqli_fetch_array($q);
?>
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" target="blank" href="../vaccine_index/index.php">
            <div class="sidebar-brand-icon rotate-n-15">
                <!-- <i class="fas fa-laugh-wink"></i> -->
            </div>
            
            <div class="sidebar-brand-text mx-3"><i class="fa fa-clinic-medical me-2"></i>Health Guard<sup></sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="index.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Nav Item  -->
        <li class="nav-item">
            <a class="nav-link" href="All-child-details.php">
                <i class="fa fa-info-circle"></i>
                <span>All child details</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="date_of_vaccination.php">
                <i class="fa fa-calendar"></i>
                <span>Date of vaccination</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="report.php">
                <i class="fa fa-file"></i>
                <span>Report of vaccination</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="request.php">
                <i class="fas fa-check"></i>
                <span>Request from parents</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="add_vaccine.php">
                <i class="fas fa-virus"></i>
                <span>Add Vaccine</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="list_of_vaccine.php">
                <i class="fas fa-list"></i>
                <span>List of vaccine</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="add_hospital.php">
                <i class="fas fa-hospital"></i>
                <span>Add Hospital</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="list_of_hospital.php">
                <i class="fas fa-list"></i>
                <span>List of hospitals</span>
            </a>
        </li>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>



                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <?php echo $_SESSION["email"] ?>
                            </span>
                            <?php
                            echo '<img class="img-profile rounded-circle" src="img/' . $row["profile_img"] . '">'
                            ?>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="profile.php">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->


            <!-- End of Main Content -->