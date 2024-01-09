<?php
session_start();
include("../configure/connection.php");
if (empty($_SESSION['email'])) {
    echo '<script>window.location.href="../vaccine_index/index.php"</script>';
}
?>
<?php include("header.php") ?>
<?php include("siderbar.php") ?>

<!-- Begin Page Content -->
<!-- form start -->
<div class="col-md-6 border border-primary m-4 rounded p-4 shadow bg-light">
    <!-- Page Heading -->
    <table class="table ">
        <form class="user" method="POST">

            <h1 class="card-header h3 mb-4 text-gray-800 text-center">Add Hospital</h1>

            <div class="form-group">
                <input type="text" class="form-control form-control-user" placeholder="Enter Hospital Name" name="hospital_name" required>
            </div>

            <div class="form-group">
                <input type="email" class="form-control form-control-user" placeholder="email" name="email" required>
            </div>

            <div class="form-group">
                <input type="text" class="form-control form-control-user" placeholder="Address" name="address" required>
            </div>

            <div class="form-group">
                <input type="password" class="form-control form-control-user" placeholder="password" name="password" required>
            </div>

            <input type="submit" value="Add Hospital" class="btn btn-primary btn-user col-auto btn-block" name="submit">
        </form>
    </table>
</div>
<!-- form start -->

</div>
<!-- End of Main Content -->
<?php include("footer.php") ?>

<?php
if (isset($_POST['submit'])) {
    $hospital_name = $_POST['hospital_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    $check = mysqli_query($conn, "SELECT * FROM `hospital` WHERE h_name = '$hospital_name'");
    if (mysqli_num_rows($check) == 0) {
        mysqli_query($conn, "INSERT INTO `hospital`(`h_id`, `h_name`, `h_email`, `h_address`, `h_password`) VALUES ('','$hospital_name','$email','$address','$password')");
        echo '<script>Swal.fire(
            "Good job!",
            "You clicked the button!",
            "success"
          )</script>';
    } else {
        echo '<script>Swal.fire(
                "Duplicate Entry",
                "Hospital is already Added",
                "warning"
              )</script>';
    }
}

?>