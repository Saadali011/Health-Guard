<?php
include("../configure/connection.php");
session_start();
if (!isset($_SESSION['email'])) {
  echo "<script>window.location.href='../vaccine_index/index.php';</script>";
}
?>
<?php include("header.php") ?>
<?php include("siderbar.php") ?>

<!-- Start of Main Content -->
<h1 class="shadow col-md-10 m-auto text-light bg-primary text-center">All Child Details</h1>
<table class="shadow col-md-10 m-auto text-light text-center table p-2">
  <thead class="bg-dark text-light">
    <tr>
      <th>Child ID</th>
      <th>Child Name</th>
      <th>Gender</th>
      <th>Date Of Birth</th>
      <th>Place of Birth</th>
      <th>Vaccine</th>
      <th>Vaccine type</th>
      <th>Action</th>

    </tr>
  </thead>
  <tbody class="text-dark">

    <?php
    $x = 1;
    $q = mysqli_query($conn, "SELECT * FROM `appointment_shecduled`");
    while ($data = mysqli_fetch_array($q)) {
      echo '<tr>   
        <th>' . "P-" . $data[0] . '</th>
        <td>' . $data[2] . '</td>
        <td>' . $data[3] . '</td>
        <td>' . $data[4] . '</td>
        <td>' . $data[5] . '</td>
        <td>' . $data[6] . '</td>
        <td>' . $data[7] . '</td>
        <td> <button class="btn btn-primary"> <a href="delete.php?child_delete_id=' . $data[0] . ' " class="text-light">Delete</a> </button>

        <button  class="btn btn-primary"> <a href="update_child.php?update_id=' . $data[0] . '" class="text-light">Update</a> </button> </td>
      </tr>';
      $x++;
    }
    ?>

  </tbody>
</table>

</div>
<!-- End of Main Content -->

<?php include("footer.php") ?>