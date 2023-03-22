<?php

if(isset($_GET['edit_category'])){
    $edit_cat_id = $_GET['edit_category'];
    $edit_cat = "select * from categories where category_id = $edit_cat_id";
    $result_edit = mysqli_query($con,$edit_cat);
    $row_edits = mysqli_fetch_array($result_edit);
    $category_title = $row_edits['category_title'];
    // echo $category_title;
}

if(isset($_POST['update'])){
    $category_title = $_POST['category_title'];

    $update = "update categories set category_title='$category_title' where category_id = $edit_cat_id ";
    $result_up = mysqli_query($con,$update);
    if($result_up){
        echo "<script>alert('Catergory updated successfully...')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }
}

?>


<div class="container mt-5">
    <h2 class="text-center text-primary">Edit Category</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="category_title" class="form-label">Category Title</label>
            <input type="text" name="category_title" id="category_title" value="<?php echo $category_title ; ?>" class="form-control"
             required="required">
        </div><br>
        <div class="text-center w-50 m-auto">
            <input type="submit" value="Update Category" name="update" class="btn btn-dark">
        </div>
    </form>

</div>