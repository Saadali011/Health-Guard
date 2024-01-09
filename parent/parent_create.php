<?php
include ("../configure/connection.php");
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

    <link rel="stylesheet" href="../admin/css/bootstrap.min.css">
  
    <script src="../admin/js/bootstrap.bundle.min.js"></script>

        <!-- sweet alert CDN -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="bg-gradient-light min-vh-100 d-flex justify-content-center align-items-center">

    <div class="col-10">
        <div class="card shadow ">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <img src="../admin/img/vaccine img.jpg" class="col-lg-6 d-none d-lg-block">
                    
                    <div class="col-lg-6 mt-5">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name" name="f_name" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name" name="l_name" required >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" name="email" required >
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password" required >
                                    </div>
                                 
                                </div>
                                <input type="submit" value="Register Account" class="btn btn-primary btn-user btn-block" name="submit">

                            </form>
                            <hr>
                    
                            <div class="text-center">
                                <a class="small" href="parent_login.php">Already have an account? Login!</a>
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
if(isset($_POST['submit'])){
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $data = mysqli_query($conn,"SELECT * FROM `parent_info` where p_email = '$email'");
    if($check = mysqli_num_rows($data) < 1 ){
      $q = mysqli_query($conn,"INSERT INTO `parent_info`(`p_id`, `p_name`, `p_lname`, `p_email`, `p_password`) VALUES ('','$f_name','$l_name','$email','$password')");
      if($q){
        echo "<script>
            Swal.fire(
                'Thank You!',
                'account registered!',
                'Success'
            );
              </script>";
      }else{
        echo "<script>
        Swal.fire(
            'Sorry!',
            'Something Went Wrong!',
            'warning'
        );
          </script>";
      }
    }else{
        echo "<script>
        Swal.fire(
            'Sorry!',
            'email is already registerd!',
            'warning'
        );
          </script>";
    }
}

?>