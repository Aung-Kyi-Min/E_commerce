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

</head>
<body class="bg-dark">
    <div class="container-fluid m-3 text-light">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    <!-- username field-->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" name="user_username" id="user_username" class="form-control" placeholder="Enter your name..."
                        autocomplete="off" required="required">
                    </div>
                    <!-- user_email field-->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Enter your email..."
                        autocomplete="off" required="required">
                    </div>
                    <!-- user_image field -->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">User Image</label>
                        <input type="file" name="user_image" id="user_image" class="form-control" required="required">
                    </div>
                    <!-- user_password field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter your password..."
                        autocomplete="off" required="required">
                    </div>
                    <!-- user_confirmpssword field -->
                    <div class="form-outline mb-4">
                        <label for="conf_user_password" class="form-label">Confirm Password</label>
                        <input type="password" name="conf_user_password" id="conf_user_password" class="form-control" placeholder="Enter Confirm Password..."
                        autocomplete="off" required="required">
                    </div>
                    <!-- user_address -->
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" name="user_address" id="user_address" class="form-control" placeholder="Enter your address..."
                        autocomplete="off" required="required">
                    </div>
                    <!-- user_contact -->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" name="user_contact" id="user_contact" class="form-control" placeholder="Enter your Phone-number..."
                        autocomplete="off" required="required">
                    </div>
                    <!-- user_submit -->
                    <div class="mt-2 pt-2">
                        <input type="submit" value="Register" name="user_register" class="bg-primary py-2 px-3 border-0 rounded">
                        <p class="fw-bold small mt-2 pt-2 mb-0">Already have an account ?  <a href="user_login.php" class="text-danger"> Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>


<!-- php -code  -->
<?php

if(isset($_POST['user_register'])){
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $password_hash = password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();


    // select query 
    $select = "select * from user_table where user_name = '$user_username' or user_email='$user_email'";
    $result_select = mysqli_query($con,$select);
    $select_row = mysqli_num_rows($result_select);
    if($select_row>0){
        echo "<script>alert('Username or Email already exist.....')</script>";
    }else if($user_password != $conf_user_password){
        echo "<script>alert('Passwords do not match')</script>";
    }
    else{

    move_uploaded_file($user_image_tmp,"./user_images/$user_image");
    // move_uploaded_file($temp_image1,"./product_images/$product_image1");
    // insert query
    $insert_query = "insert into user_table(user_name,user_email,user_password,user_image,user_ip,user_address,
                        user_mobile) values ('$user_username','$user_email','$password_hash','$user_image','$user_ip',
                        '$user_address','$user_contact')";
    $result_insert = mysqli_query($con,$insert_query);

    if($result_insert){
        echo "<script>alert('Datas inserted successfully....')</script>";
    }else{
        die();
    }
}

// selecting cart_items
$select_cart_items = "select * from cart_details where ip_address='$user_ip'";
$result_cart = mysqli_query($con,$select_cart_items);
$cart_row = mysqli_num_rows($result_cart);
if($cart_row>0){
    $_SESSION['username'] = $user_username;
    echo "<script>alert('You have items in your cart')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";
}else{
    echo "<script>window.open('../index.php','_self')</script>";
}

}


?>