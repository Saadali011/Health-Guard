<?php
include("../configure/connection.php");
session_start();
if (!isset($_SESSION['email'])) {
    echo "<script>window.location.href='../vaccine_index/index.php';</script>";
}

if (isset($_GET['update_id'])) {
    $update_id = $_GET['update_id'];
    $q = mysqli_query($conn, "SELECT * FROM `appointment_shecduled` WHERE c_id = '$update_id'");
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
    <h1 class="col-md-7 m-auto text-light bg-primary text-center">Update Child Detail</h1>
    <form role="form" method="POST" class="col-md-7 m-auto border p-4 card shadow">
        <div class="row g-4">
            <div class="col-6">
                <label for="" class="form-label">Child Name</label>
                <input type="text" value="<?php echo $data1[2] ?>" class="form-control" placeholder="" name="c_name" required>
            </div>

            <div class="col-6">
                <label for="" class="form-label">Date of Birth</label>
                <input type="date" value="<?php echo $data1[4] ?>" class="form-control" placeholder="" name="DOB" required>
            </div>

            <div class="col-6">
                <label for="" class="form-label">Place of Birth</label>
                <input type="text" value="<?php echo $data1["5"] ?>" class="form-control" placeholder="" name="POB" required>
            </div>

            <div class="col-6">
                <label for="" class="form-label">Already vaccinated</label>
                <input type="text" value="<?php echo $data1["6"] ?>" class="form-control" placeholder="" name="already_v" required>
            </div>

            <div class="col-6">
                <label for="" class="form-label">Vaccine Type</label>
                <input type="text" value="<?php echo $data1["7"] ?>" class="form-control" placeholder="" name="type_v" required>
            </div>

            <div class="col-6">
                <label for="" class="form-label">Select Vaccine</label>
                <input type="text" value="<?php echo $data1["8"] ?>" class="form-control" placeholder="" name="select_v" required>
            </div>


            <div class="col-6">
                <label for="" class="form-label">Appointment Date</label>
                <input type="date" value="<?php echo $data1["10"] ?>" class="form-control" placeholder="" name="app_date" required>
            </div>

            <div class="col-6">
                <label for="" class="form-label">Gender</label>
                <select class="form-select text-center" required name="gender">
                    <option>-- Select --</option>
                    <?php
         

                        echo '<option value=' . "Male" . '>Male</option>
                        <option value=' . "Female" . '>Female</option>';
                    
                    ?>

                </select>
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
        $c_name = $_POST['c_name'];
        $DOB = $_POST['DOB'];
        $POB = $_POST['POB'];
        $gender = $_POST['gender'];
        $already_v = $_POST['already_v'];
        $type_v = $_POST['type_v'];
        $select_v = $_POST['select_v'];
        $select_h = $_POST['select_h'];
        $app_date = $_POST['app_date'];

        $q = mysqli_query($conn, "UPDATE `appointment_shecduled` SET `c_name`='$c_name',`gender`='$gender',`DOB`='$DOB',`Place of Birth`='$POB',`Already vaccinated`='$already_v',`vaccine_type`='$type_v',`select_v`='$select_v',`Appointment Date`='$app_date',`Status`='pending' WHERE c_id = '$data1[0]'");

        if ($q == 1) {

            // echo "<script>
            // Swal.fire(
            //     'Good job!',
            //     'Child Detail Updated!',
            //     'success'
            // );
            //   </script>";
              echo '<script>window.location.href="All-child-details.php"</script>';

        } else {
            $_SESSION['appointment_message'] = "Appointment Scheduled";
        }
    }

    ?>