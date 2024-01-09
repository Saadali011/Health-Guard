<?php
include("../configure/connection.php");
if(isset($_GET['child_delete_id']))
{
    $child_delete_id = $_GET['child_delete_id'];
    $q = mysqli_query($conn,"DELETE FROM `appointment_shecduled` WHERE c_id = '$child_delete_id'");
    if($q){
        echo "<script>window.location.href='All-child-details.php'</script>";

    };
}
if(isset($_GET['hospital_delete_id']))
{
    $hospital_delete_id = $_GET['hospital_delete_id'];
    $q = mysqli_query($conn,"DELETE FROM `hospital` WHERE h_id = $hospital_delete_id");
    
    if($q){
        echo '<script>window.location.href="list_of_hospital.php"</script>';
    };

}
?>