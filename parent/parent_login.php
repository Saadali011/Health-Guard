<?php
include("../configure/connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../admin/css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../admin/css/bootstrap.min.css">

    <script src="../admin/js/bootstrap.bundle.min.js"></script>

    <!-- sweet alert CDN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="bg-gradient-light d-flex justify-content-center align-items-center min-vh-100">


    <div class="col-10">

        <div class="card shadow">
            <div class="card-body ">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <img src="../admin/img/Cute_woman_Doctor_holding_syringe_vaccine_hand_drawn_cartoon_art_illustration.jpg" height="550px" class="col-lg-6 d-none d-lg-block ">

                    <div class="col-lg-6 mt-5">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Parent Login!</h1>
                            </div>
                            <form class="" method="POST">
                                <div class="form-group mb-4">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email">
                                </div>
                                <div class="form-group mb-4">
                                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                                </div>

                                <input type="submit" value="Login" class="btn btn-primary btn-user btn-block mb-4" name="login" id="p_btn">


                            </form>

                            <div class="text-center">
                                <a class="small" href="parent_create.php">Create an Account!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
<?php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $data = mysqli_query($conn, "SELECT * FROM `parent_info` WHERE p_email = '$email' && p_password = '$password';");
    $arr = mysqli_fetch_array($data);
    if (mysqli_num_rows($data) > 0) {
        $_SESSION["parent_email"] = $arr[3];
        $_SESSION["parent_id"] = $arr[0];
        echo "<script>window.location.href='../vaccine_index/index.php';</script>";
    } else {
        echo "<script>
        Swal.fire(
            'Sorry!',
            'Email or password is incorrect!',
            'error'
        );
          </script>";
        
    }
}


?>