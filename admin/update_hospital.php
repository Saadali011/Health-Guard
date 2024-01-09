<?php
include("../configure/connection.php");
session_start();
if (!isset($_SESSION['email'])) {
    echo "<script>window.location.href='../vaccine_index/index.php';</script>";
}

if (isset($_GET['update_hospital'])) {
    $update_hospital = $_GET['update_hospital'];
    $q = mysqli_query($conn, "SELECT * FROM `hospital` WHERE h_id = '$update_hospital'");
    $data = mysqli_fetch_array($q);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- sweet alert CDN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body id="page-top">
    <?php include("siderbar.php") ?>
    <h1 class="col-md-6 m-auto text-light bg-primary text-center">Update Hospital Detail</h1>
    <form role="form" method="POST" class="col-md-6 m-auto border p-4 card shadow">
        <div class="row g-4">
            <div class="col-12">
                <label for="" class="form-label">Hospital Name</label>
                <input type="text" value="<?php echo $data[1] ?>" class="form-control" placeholder="" name="h_name" required>
            </div>

            <div class="col-12">
                <label for="" class="form-label">Email</label>
                <input type="email" value="<?php echo $data[2] ?>" class="form-control" placeholder="" name="email" required>
            </div>

            <div class="col-12">
                <label for="" class="form-label">Location</label>
                <input type="text" value="<?php echo $data[3] ?>" class="form-control" placeholder="" name="location" required>
            </div>

            <div class="col-12">
                <label for="" class="form-label">Password</label>
                <input type="text" value="<?php echo $data[4] ?>" class="form-control" placeholder="" name="password" required>
            </div>

            <div class="col-12">
                <button class="btn btn-primary w-100" type="submit" name="update">Update</button>
            </div>

        </div>
    </form>

    </div>
    <!-- End of Main Content -->

    <?php include("footer.php") ?>

    <?php

    if (isset($_POST['update'])) {
        $h_name = $_POST['h_name'];
        $email = $_POST['email'];
        $location = $_POST['location'];
        $password = $_POST['password'];

        $q = mysqli_query($conn, "UPDATE `hospital` SET `h_name`='$h_name',`h_email`='$email',`h_address`='$location',`h_password`='$password' WHERE h_id = '$data[0]'");

        if ($q == 1) {

              echo '<script>window.location.href="list_of_hospital.php"</script>';

        } else {
            echo "<script>
            Swal.fire(
                'Good job!',
                'Something went wrong!',
                'Error'
            );
              </script>";
        }
    }

    ?>