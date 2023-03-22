<?php
include("../includes/connect.php");
include("../function/common_fun.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration Page</title>

   <!--Boostrap css cdn link-->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!--End Boostrap cdn link-->

<!--Boostrap js cdn link-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!--End Boostrap js cdn link-->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
 crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--End Font awesome cdn link-->

<!-- w3school icons cdn link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-

<!-- css link -->
<link rel="stylesheet" href="../style1.css">

<style>
    body{
        overflow: hidden;
    }
</style>

</head>
<body class="bg-dark">
    <div class="container-fluid m-3">
        <h2 class="text-center text-primary mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center ">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/admin_reg.webp" alt="Admin Registration" class="img-fluid rounded">
            </div>
            <div class="col-lg-6 col-xl-5">
                <form action="" method="POST">
                    <div class="form-outline mb-4">
                        <label for="username" class="text-light form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username..."
                        required="required" autocomplete="off">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="email" class="text-light form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email..."
                        required="required" autocomplete="off">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="text-light form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter password..."
                        required="required" autocomplete="off">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="text-light form-label">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Enter Confirm Password..."
                        required="required" autocomplete="off">
                    </div>
                    <input type="submit" value="Register" name="register" class="bg-info py-2 px-3 border-0 rounded">
                    <p class="fw-bold small text-light mt-2 pt-2 mb-0">Already have an account ?  <a href="admin_login.php" class="text-success"> Login</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>


<!-- php -code  -->
<?php

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $admin_email = $_POST['email'];
    $admin_password = $_POST['password'];
    $password_hash = password_hash($user_password,PASSWORD_DEFAULT);
    $conf_admin_password = $_POST['confirm_password'];
    // $user_ip = getIPAddress();


    // select query 
    $select = "select * from admin_table where admin_name = '$username' or admin_email='$admin_email'";
    $result_select = mysqli_query($con,$select);
    $select_row = mysqli_num_rows($result_select);
    if($select_row>0){
        echo "<script>alert('Username or Email already exist.....')</script>";
    }else if($admin_password != $conf_admin_password){
        echo "<script>alert('Passwords do not match')</script>";
    }
    else{

    // move_uploaded_file($user_image_tmp,"./user_images/$user_image");
    // move_uploaded_file($temp_image1,"./product_images/$product_image1");
    // insert query
    $insert_query = "insert into admin_table(admin_name,admin_email,admin_password) values
     ('$username','$admin_email','$password_hash')";
    $result_insert = mysqli_query($con,$insert_query);

    if($result_insert){
        echo "<script>alert('Datas inserted successfully....')</script>";
        echo "<script>window.open('admin_login.php','_self')</script>";
    }else{
        die();
    }
}
}
?>