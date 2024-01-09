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
    <link rel="stylesheet" href="font/https___fonts.googleapis.com_css2_family=Roboto+Condensed_wght@400;700&family=Roboto_wght@400;700&display=swap_.css">

    <!-- Icon Font Stylesheet -->
    <!-- <link rel="stylesheet" href="font/all.min.css"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <script src="js/main.js"></script>
    <script src="js/jquery.min.js"></script>
    
    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

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

<body class="min-vh-100">
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

                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        

                        <?php
                        if (isset($_SESSION['parent_email'])) {
                        ?>
                            <a href="index.php" class="nav-item nav-link">Parent/Logged In</a>
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
                                    $('#h_btn').ready(function() {
                                        $('#p_id , #a_id,#app_btn').hide();
                                    })
                                })
                            </script>
                            <a href="../admin/logout.php" class="nav-item nav-link">logout</a>
                        <?php
                        } else {
                        ?>
                            <a href="../hospital/hospital_log.php" id="h_id" class="nav-item nav-link">Hospital/Login</a>
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
                                    $('#a_btn').ready(function() {
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

    <!-- Modal Start -->
    <?php include("admin_modal.php") ?>
    <!-- modal end -->

    <!-- Hero-Section Start -->
    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h5 class="d-inline-block text-white text-uppercase border-bottom border-5" style="border-color: rgba(256, 256, 256, .3) !important;">Your Health, Our Priority</h5>
                    <h1 class="display-2 text-white mb-md-4">Empowering Wellness for Everyone</h1>
                    <p class="lead text-white">Discover convenient COVID testing and vaccination solutions tailored for your community.</p>
                    <div class="pt-3">
                        <a href="appointment.php" id="app_btn" class="btn btn-outline-light rounded-pill py-md-3 px-md-5 mx-2">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero-Section End -->



   <!-- Best Medical Care Section -->
   <div class="container-fluid bg-white py-5">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <!-- Left Side -->
                <div class="col-lg-6 text-center">
                    <h2 class="display-3 mb-md-4">Exceptional Healthcare for You</h2>
                    <p class="lead">Experience the pinnacle of medical care with HealthGuardianHub. Our dedicated team of healthcare professionals is committed to delivering personalized and compassionate services for you and your family.</p>
                    <div class="pt-3">
                        <a href="#services" class="btn btn-primary rounded-pill py-md-3 px-md-5 mx-2">Explore Services <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <!-- Right Side -->
                <div class="col-lg-6 text-center">
                    <img src="img/healthcare.webp" alt="Medical Care Image" class="img-fluid rounded-circle"> 
                </div>
            </div>
        </div>
    </div>
    <!-- Best Medical Care Section -->

    <!-- Team Start -->
    <div class="container-fluid py-5 bg-light">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-danger text-uppercase border-bottom border-5">Our Doctors</h5>
                <h1 class="display-4">Qualified Healthcare Professionals</h1>
            </div>
            <div class="owl-carousel team-carousel position-relative">
                <div class="team-item">
                    <div class="row g-0 bg-light rounded overflow-hidden">
                        <div class="col-12 col-sm-5 h-100">
                            <img class="img-fluid h-100" src="img/team-1.jpg" style="object-fit: cover;">
                        </div>
                        <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                            <div class="mt-auto p-4">
                                <h3>Dr. Alex Rodriguez</h3>
                                <h6 class="fw-normal fst-italic text-danger mb-4">Cardiology Specialist</h6>
                                <p class="m-0">Providing compassionate care for your little ones, our Pediatric Specialist ensures the health and happiness of your children.</p>
                            </div>
                            <div class="d-flex mt-auto border-top p-4">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle" href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="team-item">
                    <div class="row g-0 bg-light rounded overflow-hidden">
                        <div class="col-12 col-sm-5 h-100">
                            <img class="img-fluid h-100" src="img/team-2.jpg" style="object-fit: cover;">
                        </div>
                        <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                            <div class="mt-auto p-4">
                                <h3>Dr. Andrew Mitchell</h3>
                                <h6 class="fw-normal fst-italic text-danger mb-4">Cardiology Specialist</h6>
                                <p class="m-0">Experience expert guidance in cardiology, ensuring your heart health is in capable hands.</p>
                            </div>
                            <div class="d-flex mt-auto border-top p-4">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle" href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="team-item">
                    <div class="row g-0 bg-light rounded overflow-hidden">
                        <div class="col-12 col-sm-5 h-100">
                            <img class="img-fluid h-100" src="img/team-3.jpg" style="object-fit: cover;">
                        </div>
                        <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                            <div class="mt-auto p-4">
                                <h3>Dr. Emily Johnson</h3>
                                <h6 class="fw-normal fst-italic text-danger mb-4">Cardiology Specialist</h6>
                                <p class="m-0">Delivering heart-centered care, our Cardiology Specialist is dedicated to your cardiovascular well-being.</p>
                            </div>
                            <div class="d-flex mt-auto border-top p-4">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle" href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Team End -->

    <!-- Footer START -->                    
    <footer class="bg-dark text-light text-center p-3">
        <div class="container">
            <div class="row mt-3">
                <div class="col-md-12 text-center">
                    <p class="text-light">&copy; <?php echo date("Y"); ?> Your Company. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <!-- sweet alert CDN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>    