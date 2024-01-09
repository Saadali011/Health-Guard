<?php
include("../configure/connection.php");
session_start();
if (!isset($_SESSION['email'])) {
    echo "<script>window.location.href='../vaccine_index/index.php';</script>";
}
?>
<?php include("header.php") ?>
<?php include("siderbar.php") ?>

<!-- Start of main Content -->
<h1 class="shadow col-md-10 m-auto text-light bg-primary text-center">Date Of Vaccination</h1>
<table class="shadow col-md-10 m-auto text-light text-center table table-striped p-2">
    <thead class="bg-dark text-light">
        <tr>
            <th>Child Id</th>
            <th>Chile Name</th>
            <th>Select Vaccine</th>
            <th>Vaccine Type</th>
            <th>Hospital Name</th>
            <th>Appointment Date</th>
            <th>Status</th>

        </tr>
    </thead>
    <tbody class="text-dark">
        <?php
        $h_data = mysqli_query($conn, "SELECT * FROM `hospital`");
        $h_arr = mysqli_fetch_array($h_data);
        $x = 1;
        $q = mysqli_query($conn, "SELECT * FROM `appointment_shecduled` WHERE `Status` = 'Approved' ORDER BY c_id ASC ");
        while ($data = mysqli_fetch_array($q)) {

            echo ' <tr>
                <td>' . 'P-' . $data[0] . '</td>
                <td>' . $data[2] . '</td>
                <td>' . $data[6] . '</td>
                <td>' . $data[7] . '</td>
                <td>' . $h_arr[1] . '</td>
                <td>' . $data[10] . '</td>
                <td>' . $data[11] . '</td>
                </tr>';
            $x++;
        }
        ?>
    </tbody>
</table>
</div>
<!-- End of Main Content -->

<?php include("footer.php") ?>