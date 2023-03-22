<?php
include("../includes/connect.php");

if(isset($_POST['insert-cat'])){
  $category_title = $_POST['cat-title'];
  $duplicate = "select * from categories where category_title='$category_title'";
  $result_select = mysqli_query($con,$duplicate);
  $num_row=mysqli_num_rows($result_select);
  if($num_row>0){
    echo "<script>alert('Added Category is already exited in database!!!')</script>";
  }else{
  $sql = "insert into categories(category_title) values ('$category_title')";
  $result = mysqli_query($con,$sql);
  if($result){
    echo "<script>alert('Category addded Sucessfully!!!')</script>";
  }
  }
}
?>
<h2 class="text-center">Insert Categories</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <div class="input-group-prepend">
    <span class="input-group-text bg-secondary" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  </div>
  <input type="text" class="form-control" placeholder="Insert Categories" name="cat-title" aria-label="Categories" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2">

  <input type="submit" class="bg-secondary p-2 my-3 border-0" value="Insert categories" aria-label="categories" name="insert-cat">
  <!-- <button class="bg-secondary p-2 my-3 border-0">Insert Categories</button> -->
</div>




</form>