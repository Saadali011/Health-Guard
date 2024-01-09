<!-- Header Start -->
<?php include("navbar.php") ?>
<?php include("admin_modal.php");
$login_email = $_SESSION["parent_email"];

?>

<!-- Header End -->

<?php
if (isset($_SESSION['vaccine'])) {
?>
    <script>
        Swal.fire(
            'Thnak you!',
            '<?php echo $_SESSION['vaccine']; ?>',
            'danger'
        )
    </script>
<?php
    unset($_SESSION['vaccine']);
};
?>

<!-- Table Start -->
<div class="container">
    <table class="table shadow text-center">
        <h1 class="shadow col-md-12 mt-3 m-auto text-light bg-primary text-center">Appointment Status</h1>
        <thead class="text-light bg-dark">
            <tr>
                <!-- <th>Child ID</th> -->
                <th>Child Name</th>
                <th>Gender</th>
                <th>Date Of Birth</th>
                <th>Place of Birth</th>
                <th>Vaccine</th>
                <th>Vaccine type</th>
                <th>Appointment Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="shadow">
            <?php
            $x = 1;

            $q = mysqli_query($conn, "SELECT * FROM `appointment_shecduled`  JOIN `parent_info` ON  `appointment_shecduled`.`parent_email` = `parent_info`.`p_email` WHERE `appointment_shecduled`.parent_email = '$login_email'");
            $q1 = mysqli_num_rows($q);
            if ($q1 > 0) {
                while ($data = mysqli_fetch_array($q)) {
                    echo '<tr>   
            <td>' . $data[2] . '</td>
            <td>' . $data[3] . '</td>
            <td>' . $data[4] . '</td>
            <td>' . $data[5] . '</td>
            <td>' . $data[6] . '</td>
            <td>' . $data[7] . '</td>
            <td>' . $data[10] . '</td>
            <td>' . $data[11] . '</td>
            </form> </td>
            </tr>';
                }
            } else {
                echo '<table class="m-auto">
                <td class="p-5"><h1>No Pending Vaccination</h1></td>        
                </table>';
            }
            ?>

        </tbody>
    </table>
</div>
<!-- Table End -->


<!-- Footer Start -->
<?php include("footer.php") ?>
<!-- Footer End -->