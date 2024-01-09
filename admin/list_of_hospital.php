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
<h1 class="shadow col-md-11 m-auto text-light bg-primary text-center">List Of Hospitals</h1>
<table class="shadow col-md-11 m-auto text-light text-center table table-striped p-2">
    <thead class="bg-black">
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Location</th>
            <th>Email address</th>
            <th>Password</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
    </thead>
    <tbody class="text-dark">

        <?php
        $x = 1;
        $q = mysqli_query($conn, "SELECT * FROM `hospital`");
        while ($data = mysqli_fetch_array($q)) {
            echo '<tr>
                    <td>' . $data[0] . '</td>
                    <td>' . $data[1] . '</td>
                    <td>' . $data[3] . '</td>
                    <td>' . $data[2] . '</td>
                    <td>' . $data[4] . '</td>
                    
                    <td> <button class="btn btn-danger text-light"> <a href="delete.php?hospital_delete_id=' . $data[0] . '" class="text-light">Delete</a> </td>

                    <td><button  class="btn btn-primary"> <a href="update_hospital.php?update_hospital=' . $data[0] . '" class="text-light">Update</a> </button> </td>
                </tr>';
            $x++;
        }
        ?>

    </tbody>
</table>


</div>
<!-- End of Main Content -->

<?php include("footer.php") ?>