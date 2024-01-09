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
<div class="container col-11">
    <h1 class="shadow col-md-12 m-auto text-light bg-primary text-center">List Of Vaccines</h1>
    <table class="shadow col-md-12 m-auto text-light text-center table table-striped p-2">
        <thead class="bg-black">
            <tr>
                <th>Id</th>
                <th>Date Created</th>
                <th>Vaccine Name</th>
                <th>Disease</th>
                <th>Approved Ages</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody class="text-dark">
            <?php
            $x = 1;
            $q = mysqli_query($conn, "SELECT * FROM `vaccine_list`");
            while ($data = mysqli_fetch_array($q)) {
                echo '<tr>
                    <td>' . $data[0] . '</td>
                    <td>' . $data[1] . '</td>
                    <td>' . $data[2] . '</td>
                    <td>' . $data[3] . '</td>
                    <td>' . $data[4] . '</td>
            
                    <td><button class="btn btn-danger border-0"> <a href="delete.php?hospital_delete_id=' . $data[0] . '" class="text-light">Delete</a></button>
                   
                    <button class="btn btn-primary border-0 text-light"> <a href="vaccine_update.php?vaccine_id=' . $data[0] . '" class="text-light">Update</a> </button> </td>
                </tr>';
                $x++;
            }
            ?>

        </tbody>
    </table>
</div>

</div>
<!-- End of Main Content -->

<?php include("footer.php") ?>