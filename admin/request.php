<?php
include("../configure/connection.php");
session_start();
if (!isset($_SESSION['email'])) {
    echo "<script>window.location.href='../vaccine_index/index.php';</script>";
}
?>
<?php include("header.php") ?>

    <!-- sidebar Start -->
    <?php include("siderbar.php") ?>
    <!-- sidebar Start -->

    <!-- Read Data -->
    <h1 class="shadow col-md-11 m-auto text-light bg-primary text-center">Booking Detail</h1>
    <table class="shadow col-md-11 m-auto text-light text-center table table-striped p-2">
        <thead class="bg-dark text-light">
            <tr>
                <th>#</th>
                <th>Chile Name</th>
                <th>DOB</th>
                <th>POB</th>
                <th>Already Vaccinated</th>
                <th>Vaccine Type</th>
                <th>Select Vaccine</th>
                <th>Hospital Name</th>
                <th>Appointment Date</th>
                <th>Accect</th>
                <th>Reject</th>
            </tr>
        </thead>
        <tbody class="text-dark">
            <?php
            $h_data = mysqli_query($conn, "SELECT * FROM `hospital`");
            $h_arr = mysqli_fetch_array($h_data);
            $x = 1;
            $q = mysqli_query($conn, "SELECT * FROM `appointment_shecduled` WHERE `Status` = 'pending' ORDER BY c_id ASC ");
            while ($data = mysqli_fetch_array($q)) {

                echo ' <tr>
                <td>' . $data[0] . '</td>
                <td>' . $data[1] . '</td>
                <td>' . $data[2] . '</td>
                <td>' . $data[3] . '</td>
                <td>' . $data[4] . '</td>
                <td>' . $data[5] . '</td>
                <td>' . $data[6] . '</td>
                <td>' . $h_arr[1] . '</td>
                <td>' . $data[10] . '</td>
                <td>
                 <form action="request.php" method="POST">
                <input type="submit" value="approve" name="approve" class="btn btn-primary">
                <input type="hidden" name="id" value=' . $data[0] . '>
                </form> </td>
               
                <td> <form action="request.php" method="POST">
                <input type="submit" value="Reject" name="delete" class="btn btn-danger">
                <input type="hidden" name="id" value=' . $data[0] . '>
                </form>
                </td>
                </tr>';
                $x++;
            }
            ?>

            <!-- Approve and Reject php mysql code Start -->
            <?php
            if (isset($_POST['approve'])) {
                $id = $_POST['id'];
                $q = mysqli_query($conn, "UPDATE `appointment_shecduled` SET `Status`='Approved' WHERE c_id = '$id'");
                echo '<script>location.href="request.php"</script>';
            };

            if (isset($_POST['delete'])) {
                $id = $_POST['id'];
                mysqli_query($conn, "DELETE FROM `appointment_shecduled` WHERE c_id = '$id'");
                echo '<script>location.href="request.php"</script>';
            }
            ?>
            <!-- Approve and Reject php mysql code End -->
        </tbody>
    </table>
    </div>
    <!-- End of Main Content -->

    <!-- Footer Stert -->
    <?php include("footer.php") ?>
    <!-- Footer Stert -->