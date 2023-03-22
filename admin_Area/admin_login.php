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
    <title>Admin Login Page</title>

   <!--Boostrap css cdn link-->
   <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
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
        <h2 class="text-center text-primary mb-5">Admin Login</h2>
        <div class="row d-flex justify-content-center ">
            <div class="col-lg-6 col-xl-5">
                <!-- <img src="../images/admin_login.webp" alt="Admin Login" class="img-fluid rounded"> -->
            </div>
            <div class="col-lg-6 col-xl-5">
                <form action="" method="POST">
                    <div class="form-outline mb-4">
                        <label for="admin_username" class="text-light form-label">Username</label>
                        <input type="text" name="admin_username" id="admin_username" class="form-control" placeholder="Enter your username..."
                        required="required" autocomplete="off">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="admin_password" class="text-light form-label">Password</label>
                        <input type="password" name="admin_password" id="admin_password" class="form-control" placeholder="Enter password..."
                        required="required" autocomplete="off">
                    </div>
                    <input type="submit" value="Login" name="login" class="bg-info py-2 px-3 border-0 rounded">
                    <p class="fw-bold small text-light mt-2 pt-2 mb-0">Don't you have an account ? <a href="admin_registration.php" class="text-success"> Register</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>



<!-- php login -->
<?php

if(isset($_POST['login'])){
    $username = $_POST['admin_username'];
    $password = $_POST['admin_password'];


    
    $select = "select * from admin_table where admin_name = '$username'";
    $result_query = mysqli_query($con, $select);
    $row = mysqli_num_rows($result_query);
    var_dump($row);
    $row_data = mysqli_fetch_assoc($result_query);


    if($row>0){
       // var_dump(password_verify($password , $aa));
        var_dump($password);
        var_dump($row_data['admin_password']);
        // $_SESSION['admin_username'] = $username;
        // $_SESSION['admin_password'] = $password;

        // echo  $_SESSION['admin_username'] ;
        // echo  $_SESSION['admin_password'] ;

        if(password_verify($password , $row_data['admin_password'])){
            
            echo"<script>alert('Login Successfully....')</script>";
            echo"<script>window.open('./index.php','_self')</script>";


    }else{
        echo"<script>alert('Invalid Credentials')</script>";
    }

    // if(password_verify($password , $row_data['admin_password'])){
    //     // echo"<script>alert('Login Successfully....')</script>";
    //     echo"<script>alert('Login Successfully....')</script>";

    // }else{
    //     echo"<script>alert('Invalid Credentials')</script>";

    // }
}
}
?>

    