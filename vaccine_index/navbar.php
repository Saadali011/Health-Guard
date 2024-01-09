<?php
include("../configure/connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Health Guard</title>
    <link rel="shortcut icon" href="../admin/img/favicon.png" type="image/x-icon">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    
    <!-- Jquery -->
    <script src="js/jquery.min.js"></script>
    
    <!-- sweet alert CDN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body{
            min-height: 100vh;
        }
        .sticky-footer{
            position: sticky;
            top: 100%;
        }
    </style>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid py-2 bg-light border-bottom d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-decoration-none text-body pe-3" href=""><i class="bi bi-telephone me-2"></i>+012 345 6789</a>
                        <span class="text-body">|</span>
                        <a class="text-decoration-none text-body px-3" href=""><i class="bi bi-envelope me-2"></i>info@example.com</a>
                    </div>
                </div>
                <div class="col-md-6 text-center text-lg-end">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-body px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-body px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-body px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-body px-2" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-body ps-2" href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid sticky-top  shadow-sm bg-primary">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-primary navbar-light py-3 py-lg-0">
                <a href="index.php" class="navbar-brand">
                    <h2 class="m-0 text-uppercase text-white"><i class="fa fa-clinic-medical me-2"></i>Health Guard</h2>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">

                        <a href="index.php" class="nav-item nav-link <?php if('PAGE' == 'Home'){echo 'active';} ?>">Home</a>
                        

                        <?php
                        if (isset($_SESSION['parent_email'])) {
                        ?>
                            <a href="index.php" class="nav-item nav-link">Parent/Logged in</a>
                            <a href="parent_status.php" class="nav-item nav-link">Status</a>
                            <a href="profile.php" class="nav-item nav-link">Profile</a>
                            <script>
                                $(document).ready(function() {
                                    $('#p_btn').ready(function() {
                                        $('#h_id , #a_id').hide();
                                    })
                                })
                            </script>
                            <a href="../admin/logout.php" class="nav-item nav-link">logout</a>
                        <?php
                        } else {
                        ?>
                            <a href="../parent/parent_login.php" id="p_id" class="nav-item nav-link">Parent/Login</a>
                        <?php
                        }
                        ?>


                        <?php
                        if (isset($_SESSION['hospital_message'])) {
                        ?>
                            <a href="hospital_status.php" class="nav-item nav-link">Booked appointment</a>
                            <a href="vaccinated.php" class="nav-item nav-link">Vaccinated</a>
                            <a href="index.php" class="nav-item nav-link">Hospital/Logged in</a>
                            <script>
                                $(document).ready(function() {
                                    $('#p_btn').ready(function() {
                                        $('#p_id , #a_id').hide();
                                    })
                                })
                            </script>
                            <a href="../admin/logout.php" class="nav-item nav-link">logout</a>
                        <?php
                        } else {
                        ?>
                            <a href="hospital/hospital_log.php" id="h_id" class="nav-item nav-link">Hospital/Login</a>
                        <?php
                        }
                        ?>


                        <!-- admin Login nav link Start -->
                        <?php
                        if (isset($_SESSION['email'])) {
                        ?>
                            <a href="../admin/index.php" class="nav-item nav-link">Admin/Logged in</a>
                            <script>
                                $(document).ready(function() {
                                    $('p_btn').ready(function() {
                                        $('#p_id , #h_id').hide();
                                    })
                                })
                            </script>
                            <a href="../admin/logout.php" class="nav-item nav-link">Logout</a>
                        <?php
                        } else {
                        ?>
                            <a id="a_id" class="nav-item nav-link" type="button" data-bs-toggle="modal" data-bs-target="#ModalLoginForm">Admin/Login</a>
                        <?php
                        }
                        ?>
                        <!-- admin Login nav link End -->
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Navbar End -->