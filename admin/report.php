<?php
session_start();
include("../configure/connection.php");
if (empty($_SESSION['email'])) {
    echo '<script>window.location.href="../vaccine_index/index.php"</script>';
}

?>
<?php include ("header.php") ?>

<?php include ("siderbar.php") ?>

 <!-- Begin Page Content -->
 <div class="container-fluid">
   
   <h1 class="shadow col-md-12 m-auto text-light bg-primary text-center">Vaccination Report</h1>
 <table class="shadow col-md-12 m-auto text-center table p-2">
  <thead class="bg-black text-light">
    <tr>
      <th scope="col">Patient ID</th>
      <th scope="col">Name</th>
      <th scope="col">Date of birth</th>
      <th scope="col">Status</th>
      <th scope="col">Date</th> 
      <th scope="col">Manufacturer/Product Name</th>
      <th scope="col">Hospital Name</th>
      <th scope="col">Download</th>
    </tr>
  </thead>
  <tbody class="text-dark">
    <tr>
      <?php
      $data = mysqli_query($conn,"SELECT * FROM `appointment_shecduled`  WHERE Status = 'Vaccinated'");
      while($q = mysqli_fetch_array($data)){
        echo '<tr>
              <td>P-'.$q[0].'</td>
              <td>'.$q[2].'</td>
              <td>'.$q[4].'</td>
              <td>'.$q[11].'</td>
              <td>'.$q[12].'</td>
              <td>Covid</td>
              <td>OMI</td>
              <td> <a href="#">Click here to download</a> </td>
              </tr>';
      }
      
      ?>
    </tr>
  </tbody>
</table>


</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<?php include ("footer.php") ?>
