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
<!-- session Message start -->
<?php
if (isset($_SESSION['vaccine_message_warning'])) {
?>
    <div class="text-center alert alert-warning alert-dismissible fade show" role="alert">
        <strong>hey!</strong>
        <?php echo $_SESSION['vaccine_message_warning']; ?>.
    </div>
<?php
    unset($_SESSION['vaccine_message_warning']);
};

if (isset($_SESSION['vaccine_message_success'])) {
?>
    <div class="text-center alert alert-success alert-dismissible fade show" role="alert">
        <strong>hey!</strong>
        <?php echo $_SESSION['vaccine_message_success']; ?>.
    </div>
<?php
    unset($_SESSION['vaccine_message_success']);
};
?>
<!-- session Message End -->

<!-- form start -->
<div class="col-md-6 border border-primary m-4 rounded p-4 shadow bg-light">
    <!-- Page Heading -->
    <table class="table ">
        <form class="user" method="GET" enctype="multipart/form-data">

            <h1 class="card-header h3 mb-4 text-gray-800 text-center">Add Vaccine</h1>

            <div class="form-group">
                <input type="text" class="form-control form-control-user" placeholder="Enter Vaccine Name" name="vaccine_name" required>
            </div>

            <div class="form-group">
                <input type="text" class="form-control form-control-user" placeholder="Disease" name="manufacturer" required>
            </div>

            <div class="form-group">
                <input type="text" class="form-control form-control-user" placeholder="Approved Ages" name="age" required>
            </div>

            <input type="submit" value="Add Vaccine" class="btn btn-primary btn-user col-auto btn-block" name="submit">
        </form>
    </table>
</div>
<!-- form start -->

</div>
<!-- End of Main Content -->
<?php include("footer.php") ?>

<?php
if (isset($_GET['submit'])) {
    $vaccine_name = $_GET['vaccine_name'];
    $manufacturer = $_GET['manufacturer'];
    $age = $_GET['age'];

    $check = mysqli_query($conn, "SELECT * FROM `vaccine_list` WHERE vaccine_name = '$vaccine_name'");
    if (mysqli_num_rows($check) < 1) {
        mysqli_query($conn, "INSERT INTO `vaccine_list`(`vaccine_id`, `vaccine_name`, `manufacturer`, `approved-ages`) VALUES ('','$vaccine_name','$manufacturer','$age')");
        $_SESSION["vaccine_message_success"] = "Vaccine Added";
        echo '<script>window.location.href="add_vaccine.php"</script>';
    } else {
        $_SESSION["vaccine_message_warning"] = "Vaccine is already Added";
    }
}

?>