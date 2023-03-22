<?php
include("../includes/connect.php");
include("../function/common_fun.php");
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!--Boostrap css cdn link-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!--End Boostrap cdn link-->

<!--Boostrap js cdn link-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!--End Boostrap js cdn link-->
<!-- css link -->
<link rel="stylesheet" href="style1.css">
<style>
    body{
        overflow-x: hidden;
    }
</style>

</head>
<body class="bg-info">
    <div class="container-fluid m-3 text-dark">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    <!-- username field-->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" name="user_username" id="user_username" class="form-control" placeholder="Enter your name..."
                        autocomplete="off" required="required">
                    </div>

                    <!-- user_password field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter your password..."
                        autocomplete="off" required="required">
                    </div>

                    <!-- user_submit -->
                    <div class="mt-2 pt-2">
                        <input type="submit" value="Login" name="user_login" class="bg-dark text-light py-2 px-3 border-0 rounded">
                        <p class="text-dark fw-bold small mt-2 pt-2 mb-0">Don't have an account ?  <a href="user_registration.php" class="text-danger">  Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<!-- php login -->
<?php

if(isset($_POST['user_login'])){
    $username = $_POST['user_username'];
    $password = $_POST['user_password'];


    $select = "select * from user_table where user_name = '$username'";
    $result_query = mysqli_query($con, $select);
    $row = mysqli_num_rows($result_query);
    $result_fth = mysqli_fetch_assoc($result_query);

    // cart items
    $user_ip = getIPAddress();
    $select_cart = "select * from cart_details where ip_address='$user_ip'";
    $result_cart = mysqli_query($con,$select_cart);
    $row_datas = mysqli_num_rows($result_cart);


    if($row>0){
        $_SESSION['username'] = $username;
        if(password_verify($password , $result_fth['user_password'])){
            // echo"<script>alert('Login Successfully....')</script>";
            if($row == 1 && $row_datas==0){
                $_SESSION['username'] = $username;
                echo"<script>alert('Login Successfully....')</script>";
                echo"<script>window.open('profile.php','_self')</script>";
            }else{
                $_SESSION['username'] = $username;
                echo"<script>alert('Login Successfully....')</script>";
                echo"<script>window.open('payment.php','_self')</script>";
            }

        }else{
            echo"<script>alert('Invalid Credentials')</script>";

        }

    }else{
        echo"<script>alert('Invalid Credentials')</script>";
    }
}

?>