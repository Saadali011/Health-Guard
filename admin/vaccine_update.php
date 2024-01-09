<?php
include("../configure/connection.php");
session_start();
if (!isset($_SESSION['email'])) {
    echo "<script>window.location.href='../vaccine_index/index.php';</script>";
}

if (isset($_GET['vaccine_id'])) {
    $vaccine_id = $_GET['vaccine_id'];
    $q = mysqli_query($conn, "SELECT * FROM `vaccine_list` WHERE vaccine_id = '$vaccine_id'");
    $data1 = mysqli_fetch_array($q);
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
    <h1 class="col-md-7 m-auto text-light bg-primary text-center">Update Vaccine Detail</h1>
    <form role="form" method="POST" class="col-md-7 m-auto border p-4 card shadow">
        <div class="row g-3">
            <div class="col-6">
                <label for="" class="form-label">Vaccine Name</label>
                <input type="text" value="<?php echo $data1[2] ?>" class="form-control" placeholder="" name="v_name" required>
            </div>

            <div class="col-6">
                <label for="" class="form-label">Date Created</label>
                <input type="text" value="<?php echo $data1[1] ?>" class="form-control" placeholder="" name="date_created" required>
            </div>

            <div class="col-6">
                <label for="" class="form-label">	Approved Ages	</label>
                <input type="text" value="<?php echo $data1["4"] ?>" class="form-control" placeholder="" name="approved_ages" required>
            </div>

            <div class="col-6">
                <label for="" class="form-label">	Disease	</label>
                <input type="text" value="<?php echo $data1["3"] ?>" class="form-control" placeholder="" name="disease" required>
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
        $v_name = $_POST['v_name'];
        $date_created = $_POST['date_created'];
        $approved_ages = $_POST['approved_ages'];
        $disease = $_POST['disease'];
    
        $q = mysqli_query($conn, "UPDATE `vaccine_list` SET `date-created`='$date_created',`vaccine_name`='$v_name',`manufacturer`='$disease',`approved-ages`='$approved_ages' WHERE vaccine_id = '$data1[0]'");

        if ($q == 1) {

            // echo "<script>
            // Swal.fire(
            //     'Good job!',
            //     'Vaccine Updated!',
            //     'success'
            // );
            //   </script>";
              echo '<script>window.location.href="list_of_vaccine.php"</script>';

        } else {
            $_SESSION['appointment_message'] = "Something went wrong!!";
        }
    }

    ?>