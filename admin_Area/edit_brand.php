<?php

if(isset($_GET['edit_brands'])){
    $edit_brand_id = $_GET['edit_brands'];
    $edit_brand = "select * from brands where brand_id = $edit_brand_id";
    $result_edit = mysqli_query($con,$edit_brand);
    $row_edits = mysqli_fetch_array($result_edit);
    $brand_title = $row_edits['brand_title'];
    // echo $category_title;
}

if(isset($_POST['update'])){
    $brand_title = $_POST['brand_title'];

    $updates = "update brands set brand_title='$brand_title' where brand_id = $edit_brand_id ";
    $result_up = mysqli_query($con,$updates);
    if($result_up){
        echo "<script>alert('Brand updated successfully...')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }
}

?>


<div class="container mt-5">
    <h2 class="text-center text-primary">Edit Brand</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="category_title" class="form-label">Brand Title</label>
            <input type="text" name="brand_title" id="brand_title" value="<?php echo $brand_title ; ?>" class="form-control"
             required="required">
        </div><br>
        <div class="text-center w-50 m-auto">
            <input type="submit" value="Update Category" name="update" class="btn btn-dark">
        </div>
    </form>

</div>