<?php
include("../includes/connect.php");
include("../function/common_fun.php");
// @session_start();

if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
}


//getting total items and total price of all items
$get_ip = getIPAddress();
$total_price = 0;
$cart_query_price = "select * from cart_details where ip_address = '$get_ip'";
$result_cart_price = mysqli_query($con,$cart_query_price);
$invoice_number = mt_rand();
$status = "pending";
$count_products = mysqli_num_rows($result_cart_price);
while($row_datas = mysqli_fetch_array($result_cart_price)){
    $product_id = $row_datas['product_id'];
    $select_product = "select * from products where product_id = '$product_id'";
    $result_product = mysqli_query($con , $select_product);
    while($row_datas1 = mysqli_fetch_array($result_product)){
        $product_price = array($row_datas1['product_price']);
        $product_values = array_sum($product_price);
        $total_price += $product_values;
    }

}



// getting quantity from cart

$select = "select * from cart_details";
$result_cart = mysqli_query($con, $select);
$row_data = mysqli_fetch_array($result_cart);
$quantity = $row_data['quantity'];
if($quantity == 0 ) {
    $quantity = 1;
    $subtotal = $total_price;

}else{
    $quantity = $quantity;
    $subtotal = $total_price * $quantity;
}

// insert order

$insert_order = "insert into user_orders (user_id,amount_due,invoice_number,total_products,order_date,order_status)
values($user_id,$subtotal,$invoice_number,$count_products,NOW(),'$status')";
$result_order = mysqli_query($con, $insert_order);

if($result_order){
    echo "<script>alert('Orders submitted successfully....')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}

// insert orders pending 

$insert_query = "insert into orders_pending (user_id,invoice_number,product_id,quantity,order_status)
values ($user_id,$invoice_number,$product_id,$quantity,'$status')";
$insert_pending = mysqli_query($con, $insert_query);

// delete cart

$delete_cart = "delete from cart_details where ip_address='$get_ip'";
$result_delete = mysqli_query($con, $delete_cart);



?>