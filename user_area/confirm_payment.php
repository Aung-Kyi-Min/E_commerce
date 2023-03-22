<?php

use LDAP\Result;

include("../includes/connect.php");
session_start();


if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
    $select = "select * from user_orders where order_id = $order_id";
    $result = mysqli_query($con,$select);
    $row_data = mysqli_fetch_array($result);
    $invoice_number = $row_data['invoice_number'];
    $amount = $row_data['amount_due'];
}

if(isset($_POST['confirm_payment'])){
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode =$_POST['payment_mode'];
    $select = "insert into user_payments (order_id,invoice_number,amount,payment_mode) values ($order_id,$invoice_number,$amount,'$payment_mode')";
    $result = mysqli_query($con,$select);
    if($result){
        echo "<script>alert('Successfully completed with the payment...')</script>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }

    $update = "update user_orders set order_status='Complete' where order_id = $order_id";
    $result_update = mysqli_query($con,$update);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>

<!--Boostrap css cdn link-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!--End Boostrap cdn link-->

<!--Boostrap js cdn link-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!--End Boostrap js cdn link-->


</head>
<body class="bg-dark">
    <div class="container my-5">
        <h1 class="text-center text-light">Confirm Payment</h1>
        <form action="" method="POST">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" id="" class="form-control w-50 m-auto" name="invoice_number" 
                value="<?php echo $invoice_number ?>"><br>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="amount" class="text-light">Amount</label>
                <input type="text" name="amount" id="" class="form-control w-50 m-auto" 
                value="<?php echo $amount ?>"><br>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto"><br>
                <select name="payment_mode" id="" class="form-select w-50 m-auto">
                    <option >Select Payment Mode</option>
                    <option >Banking</option>
                    <option >Cash On Delivery</option>
                    <option >Pay-Offline</option>
                </select>
            </div>
            <br>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" value="Confirm" name="confirm_payment" class="bg-primary text-light py-2 px-3 border-0 rounded">
            </div>
        </form>
    </div>
    
</body>
</html>