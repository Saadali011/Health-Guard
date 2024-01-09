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

    <!-- sweet alert CDN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="bg-light d-flex min-vh-100 justify-content-center align-items-center">

    <div class="col-5 container rounded p-5 shadow ">
        <div class="text-center">
            <img src="../admin/img/vaccine img.jpg" width="100" alt="">
            <h1 class="h4 text-gray-900 mb-4">Hospital Login!</h1>
        </div>
        <form class="" method="POST">
            <div class="form-group mb-4">
                <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="h_email">
            </div>

            <div class="form-group mb-4">
                <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
            </div>

            <input type="submit" value="Login" class="btn btn-primary btn-user btn-block" name="login" id="h_btn">
        </form>
        <hr>
        <div class="text-center">
            <a class="" href="hospital_reg.php">Create an Account!</a>
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

    $h_email = $_POST['h_email'];
    $password = $_POST['password'];

    $data = mysqli_query($conn, "SELECT * FROM `hospital` WHERE h_email = '$h_email' && h_password = '$password' ;");
    $arr = mysqli_fetch_array($data);
    if (mysqli_num_rows($data) > 0) {
        $_SESSION["hospital_message"] = $arr[1];
        $_SESSION["hospital_data"] = $arr[0];
        echo "<script>window.location.href='../vaccine_index/index.php';</script>";
    } else {
        echo "<script>
            Swal.fire(
                'Sorry!',
                'Email or Password Incorrect..!',
                'warning'
            )
        </script>";
    }
}

?>