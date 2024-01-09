<?php
    include("../configure/connection.php");
    session_start();
    if (empty($_SESSION['parent_email'])) {
        echo '<script>window.location.href="../vaccine_index/index.php"</script>';
    }
    ?>
    <?php
    $parent_id = $_SESSION["parent_id"];
    $q = mysqli_query($conn, "SELECT * FROM `parent_info` WHERE p_id = '$parent_id'");
    $row = mysqli_fetch_array($q);
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <link rel="stylesheet" href="css/bootstrap.min.css">
    
        <script src="js/bootstrap.bundle.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- sweet alert CDN -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <body class="bg-light">
        <div class="container">
            <div class="row">

                <div class="col-md-6 m-auto">
                    <h1 class="card card-header text-center">Admin Profile Page</h1>
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <form class="form card card-body mb-4 shadow" enctype="multipart/form-data" method="POST" id="registrationForm">


                                <div class="col-md-12 ">
                                    <div class="text-center ">
                                        <?php echo '<img src="img/' . $row["5"] . '" width="150" class="avatar rounded-circle img-thumbnail" alt="avatar">' ?>
                                        <h6>Upload a different photo...</h6>
                                        <input type="file" class="text-center center-block file-upload" name="p_img">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 ">
                                        <label for="first_name">
                                            <h4>First name</h4>
                                        </label>
                                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" value="<?php echo $row["1"] ?>" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 ">
                                        <label for="last_name">
                                            <h4>Last name</h4>
                                        </label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $row["2"] ?>" placeholder="last name" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 ">
                                        <label for="phone">
                                            <h4>Email</h4>
                                        </label>
                                        <input type="email" class="form-control" name="email" id="email" value="<?php echo $row["3"] ?>" placeholder="enter email" required>
                                    </div>
                                </div>

                                <div class="col-md-12 ">
                                    <label for="password">
                                        <h4>Password</h4>
                                    </label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-12 ">
                                        <br>
                                        <button class="btn btn-lg btn-success" name="submit" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                        <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                    </form>
                </div>


    </body>

    </html>

    <!-- Profile Update -->
    <?php
    if (isset($_POST['submit'])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $img_name = $_FILES['p_img']["name"];
        $img_location = $_FILES['p_img']["tmp_name"];

        $data = mysqli_query($conn, "SELECT * FROM `admin`");
        $id = mysqli_fetch_array($data);

        move_uploaded_file($img_location, "img/" . $img_name);
        $q = mysqli_query($conn, "UPDATE `parent_info` SET `p_name`='$first_name',`p_lname`='$last_name',`p_email`='$email',`p_password`='$password',`p_img`='$img_name' WHERE p_id = '$parent_id'");
        if ($q) {
            $_SESSION['profile_updated'] = "Profile Updated";
        } else {
            $_SESSION['profile_updated'] = "Some thing went wrong";
        }
    }
    ?>

    <!-- Profile Update alert Start -->
    <?php
    if (isset($_SESSION['profile_updated'])) {
    ?>
        <!--begin::Alert-->
        <script>
            Swal.fire(
                'Good job!',
                '<?php echo $_SESSION['profile_updated'] ?>!',
                'success'
            );
        </script>

    <?php
        unset($_SESSION['profile_updated']);
    };
    ?>
    <!-- Profile Update alert End -->