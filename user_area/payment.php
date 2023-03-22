<?php
include("../includes/connect.php");
include("../function/common_fun.php");
// @session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment </title>

    <!--Boostrap css cdn link-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!--End Boostrap cdn link-->

<!--Boostrap js cdn link-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!--End Boostrap js cdn link-->

<!--Font awesome cdn link-->
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
 crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--End Font awesome cdn link-->

<!-- w3school icons cdn link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<!-- css link -->
<link rel="stylesheet" href="style1.css">

<style>
    .payment_img{
        width: 50%;
        display: block;
        margin: auto;
}
</style>
</head>
<body>

<!-- php code to access user's id  -->
<?php

$user_ip =getIPAddress();
$select = "select * from user_table where user_ip = '$user_ip'";
$get_id = mysqli_query($con,$select);
$row_datas = mysqli_fetch_array($get_id);
$user_id = $row_datas['user_id'];


?>

<div class="container">
    <h2 class="text-center text-primary fw-bold">Payment Options</h2>
    <div class="row d-flex justify-content-center align-items-center mt-5">
        <div class="col-md-3">
            <a href=" https://www.kbzpay.com/en/2021/10/08/kbzpay-center-for-customer-en/">
                <img src="../images/kbz.png" class="payment_img" target="_blank" alt="">
            </a>
        </div>
        <div class="col-md-3">
            <a href="https://wavemoney.com.mm/wavepay">
                <img src="../images/wave.jpg" class="payment_img" target="_blank" alt="">
            </a>
        </div>
        <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $user_id?>"><h2 class="text-center text-decoration-none p-3 m-5 border-0 text-light bg-secondary">Pay Offline</h2></a>
        </div>
    </div>
</div>

</body>
</html>