 <!-- Modal -->
 <!-- Modal HTML Markup -->
 <div id="ModalLoginForm" class="modal fade">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title">Admin Login</h1>
             </div>
             <!-- session message start -->
             <?php
                if (isset($_SESSION['message'])) {
                ?>
                 <script>
                     Swal.fire(
                         'warning!',
                         '<?php echo $_SESSION['message']; ?>',
                         'error'
                     )
                 </script>
             <?php
                    unset($_SESSION['message']);
                }
                ?>

             <!-- session message end -->
             <div class="modal-body">

                 <form role="form" method="POST">
                     <input type="hidden" name="_token" value="">
                     <div class="form-group">
                         <label class="control-label">E-Mail Address</label>
                         <div>
                             <input type="email" class="form-control input-lg" name="ad_email" id="ad_email" required>
                         </div>
                     </div><br>
                     <div class="form-group">
                         <label class="control-label">Password</label>
                         <div>
                             <input type="password" class="form-control input-lg" name="ad_password" id="ad_password" required>
                         </div>
                     </div><br>

                     <div class="form-group">
                         <div>
                             <input type="submit" class="btn btn-success " value="Login" name="ad_login" id="ad_login">
                         </div>
                     </div>
                 </form>
             </div>
         </div><!-- /.modal-content -->
     </div><!-- /.modal-dialog -->
 </div><!-- /.modal -->


    <!-- Admin login start -->
    <?php
    if (isset($_POST['ad_login'])) {
        $email = $_POST['ad_email'];
        $password = $_POST['ad_password'];

        $data = mysqli_query($conn, "SELECT * FROM `admin` WHERE ad_email = '$email' && ad_password = '$password';");
        $arr = mysqli_fetch_array($data);
    
        if (mysqli_num_rows($data) > 0) {
            $_SESSION["email"] = $arr[3];
            $_SESSION["loginid"] = $arr[0];
         
            echo "<script>window.location.href='../admin/index.php';</script>";
        } else {
            $_SESSION['message'] = 'Email or Password Incorrect';
            echo "<script>window.location.href='index.php';</script>";
        }
    }
    ?>
    <!-- Admin login end -->
