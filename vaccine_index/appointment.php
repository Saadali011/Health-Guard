<?php 
include("navbar.php");

if (isset($_SESSION["parent_email"])) {

    $login_email = $_SESSION["parent_email"];
}
?>

<?php include("admin_modal.php") ?>

<!-- Admin login start -->
<?php
if (isset($_POST['ad_login'])) {
    $email = $_POST['ad_email'];
    $password = $_POST['ad_password'];

    $data = mysqli_query($conn, "SELECT * FROM `admin` WHERE ad_email = '$email' && ad_password = '$password';");

    $arr = mysqli_fetch_array($data);

    if (mysqli_num_rows($data) > 0) {
        $_SESSION["email"] = $arr[3];
        echo "<script>window.location.href='../admin/index.php';</script>";
    } else {
        $_SESSION['message'] = 'email or password incorrect';
        echo "<script>window.location.href='appointment.php';</script>";
    }
}


?>
<!-- Admin login end -->

<!-- Appointment Start -->
<div class="container-fluid bg-light my-3 m-auto">
    <div class="container-fluid p-5">
        <div class="row gx-5">
            <div class="col-lg-6 m-auto row">
                <div class="mb-4">
                    <h5 class="d-inline-block text-dark text-uppercase border-bottom border-5 ">Appointment</h5>
                    <h1 class="display-5 ">Make An Appointment For Your Child</h1>
                </div>
                <p class="text-dark mb-5">Eirmod sed tempor lorem ut dolores. Aliquyam sit sadipscing kasd ipsum. Dolor ea et dolore et at sea ea at dolor, justo ipsum duo diam duo invidunt lorem. Elitr ut dolores magna sit. Sea dolore sanctus sed et. Takimata takimata sanctus sed.</p>
            </div>

            <div class="col-lg-6 m-auto row">
                <div class="container-fluid bg-light rounded">
                    <form class="col-lg-12 form-control py-3" method="POST">
                        
                        <h3 class="text-center">Child Information</h3>
                        <div class="row g-3">
                            <div class="col-4 mb-6">
                                <label for="" class="form-label">Child Name</label>
                                <input type="text" class="form-control" placeholder="" name="c_name" required>
                            </div>

                            <div class="col-4 mb-2">
                                <label class="form-label">Gender</label>
                                <select required name="gender" class="text-center form-select">
                                    <option>-- Select --</option>
                                    <?php

                                    echo '<option value="Male">Male</option>';
                                    echo '<option value="Female">Female</option>';

                                    ?>

                                </select>
                            </div>

                            <div class="col-4 mb-2">
                                <label for="" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" placeholder="" name="DOB" required>
                            </div>

                            <div class="col-6 mb-2">
                                <label for="" class="form-label">Place of Birth</label>
                                <input type="text" class="form-control" placeholder="" name="POB" required>
                            </div>

                            <div class="col-6 mb-2">
                                <label for="" class="form-label">Already vaccinated</label>
                                <input type="text" class="form-control" placeholder="" name="already_v" required>
                            </div>

                            <div class="col-6 mb-2">
                                <label for="" class="form-label">Vaccine Type</label>
                                <input type="text" class="form-control" placeholder="" name="type_v" required>
                            </div>

                            <div class="col-6 mb-2">
                                <label for="" class="form-label">Select Vaccine</label>
                                <input type="text" class="form-control" placeholder="" name="select_v" required>
                            </div>

                            <div class="col-6 mb-5">
                                <label class="form-label">Select Hospital</label>
                                <select required name="select_h" class="text-center form-select">
                                    <option>-- Select --</option>
                                    <?php
                                    $data = mysqli_query($conn, "SELECT * FROM `hospital`");
                                    while ($arr = mysqli_fetch_array($data)) {

                                        echo '<option value=' . $arr[0] . '>' . $arr[1] . '</option>';
                                    }
                                    ?>

                                </select>

                            </div>

                            <div class="col-6 mb-5">
                                <label for="" class="form-label">Appointment Date</label>
                                <input type="date" class="form-control" placeholder="" name="app_date" required>
                            </div>

                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit" name="app">Make An Appointment</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Appointment End -->

<?php
if (isset($_SESSION['parent_email'])) {

    if (isset($_POST['app'])) {
        $c_name = $_POST['c_name'];
        $DOB = $_POST['DOB'];
        $POB = $_POST['POB'];
        $already_v = $_POST['already_v'];
        $type_v = $_POST['type_v'];
        $select_v = $_POST['select_v'];
        $select_h = $_POST['select_h'];
        $app_date = $_POST['app_date'];
        $gender = $_POST['gender'];

        $q = mysqli_query($conn, "INSERT INTO `appointment_shecduled`(`parent_email`, `c_id`, `c_name`, `gender`,`DOB`, `Place of Birth`, `Already vaccinated`, `vaccine_type`, `select_v`, `h_id`, `Appointment Date`, `Status`) VALUES ('$login_email','','$c_name','$gender','$DOB','$POB','$already_v','$type_v','$select_v','$select_h','$app_date','Pending')");

        if ($q == 1) {
            echo "<script>
            Swal.fire(
                'Thnak you!',
                'Appointment Scheduled',
                'Success'
            )
        </script>";
        } else {
            $_SESSION['appointment_message'] = "Appointment Scheduled";
        }
    }
} else {
    echo "<script>
        Swal.fire(
            'warning!',
            'Login First to Make Appointment!',
            'warning'
        )
    </script>";
}
?>

<?php include("footer.php") ?>