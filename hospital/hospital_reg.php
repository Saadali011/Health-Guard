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

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../admin/css/sb-admin-2.min.css" rel="stylesheet">

      <!-- sweet alert CDN -->
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="bg-light d-flex min-vh-100 justify-content-center align-items-center">

    <div class="col-5 container rounded shadow">

        <div class="col-lg-12">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Register Hospital!</h1>
                </div>
                

                <form class="user" method="POST">
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-mb-4">
                            <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Hospital Name" name="h_name" required>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-3">
                            <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Hospital Address" name="h_address" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 ">
                            <input type="email" class="form-control form-control-user" id="exampleLastName" placeholder="Email Address" name="h_email" required>
                        </div>

                        <div class="col-sm-6 mb-3 mb-sm-3">
                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password" required>
                        </div>
                        <!-- <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" name="r_password">
                                    </div> -->
                    </div>
                    <input type="submit" value="Register Account" class="btn btn-primary btn-user btn-block" name="submit">

                    <hr>

                    <div class="text-center">
                        <a class="small" href="hospital_log.php">Already have an account? Login!</a>
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
if (isset($_POST['submit'])) {
    $h_name = $_POST['h_name'];
    $h_email = $_POST['h_email'];
    $h_address = $_POST['h_address'];
    $password = $_POST['password'];

    $data = mysqli_query($conn, "SELECT * FROM `hospital` WHERE h_name = '$h_name' && h_email = '$h_email'");
    if ($check = mysqli_num_rows($data) < 1) {
        $q = mysqli_query($conn, "INSERT INTO `hospital`(`h_id`, `h_name`, `h_email`, `h_address`, `h_password`) VALUES ('','$h_name','$h_email','$h_address','$password')");
        if ($q) {
            echo "<script>
            Swal.fire(
                'Thank you!',
                'Account Created Successfully!',
                'success'
            );
              </script>";
           
        } else {
            echo "<script>
            Swal.fire(
                'Sorry!',
                'Something went wrong!',
                'warning'
            );
              </script>";
        
        }
    } else {
        echo "<script>
        Swal.fire(
            'Sorry!',
            'Hospital is already registerd!',
            'warning'
        );
          </script>";
     
    }
}



?>

