<?php
include("../includes/connect.php");

if(isset($_POST['insert-brand'])){
  $brand_title = $_POST['cat-title'];
  $duplicate = "select * from brands where brand_title='$brand_title'";
  $result_select = mysqli_query($con,$duplicate);
  $num_row=mysqli_num_rows($result_select);
  if($num_row>0){
    echo "<script>alert('Added Brand is already exited in database!!!')</script>";
  }else{
  $sql = "insert into brands(brand_title) values ('$brand_title')";
  $result = mysqli_query($con,$sql);
  if($result){
    echo "<script>alert('Brand addded Sucessfully!!!')</script>";
  }
  }
}
?>
<h2 class="text-center mb-2">Insert Brands</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <div class="input-group-prepend">
    <span class="input-group-text bg-secondary" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  </div>
  <input type="text" class="form-control" placeholder="Insert Brands" name="cat-title" aria-label="Brands" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2">

<input type="submit" class="bg-secondary p-2 my-3 border-0" value=" Insert brands" aria-label="brands" name="insert-brand">
  <!-- <button class="bg-secondary p-2 my-3 border-0">Insert Brands</button> -->
</div>




</form>