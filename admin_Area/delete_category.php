<?php

if(isset($_GET['delete_category'])){
    $del_id = $_GET['delete_category'];
    $deletes = "delete from categories where category_id = $del_id ";
    $result_deletes = mysqli_query($con,$deletes);
    if($result_deletes){
        echo "<script>alert('Category deleted successfully...')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }
}

?>