<?php

if(isset($_GET['delete_brand'])){
    $del_id = $_GET['delete_brand'];
    $deletes = "delete from brands where brand_id = $del_id ";
    $result_deletes = mysqli_query($con,$deletes);
    if($result_deletes){
        echo "<script>alert('Brand deleted successfully...')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }
}

?>