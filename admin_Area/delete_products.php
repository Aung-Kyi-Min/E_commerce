<?php

if(isset($_GET['delete_products'])){
    $delete_id = $_GET['delete_products'];
    $delete = "delete from products where product_id = $delete_id";
    $result_delete = mysqli_query($con,$delete);
    if($result_delete){
        echo "<script>alert('Products deleted successfully...')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}

?>