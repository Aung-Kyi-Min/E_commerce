<?php
include("../includes/connect.php");
if(isset($_POST['insert_product'])){
    $product_title =$_POST['product_title'];
    $product_description =$_POST['product_description'];
    $product_keyword =$_POST['product_keywords'];
    $product_category =$_POST['product_category'];
    $product_brand =$_POST['brand'];
   
    $product_price =$_POST['product_price'];
    $product_status ='true';

    // accessing image names
    $product_image1 = $_FILES['product_Image1']['name'];
    $product_image2 = $_FILES['product_Image2']['name'];
    $product_image3 = $_FILES['product_Image3']['name'];

    //accessing image temporay name 
    $temp_image1 = $_FILES['product_Image1']['tmp_name'];
    $temp_image2 = $_FILES['product_Image2']['tmp_name'];
    $temp_image3 = $_FILES['product_Image3']['tmp_name'];

    //Checking condition 
    if($product_title=='' or $product_description=='' or $product_keyword=='' or $product_category=='' or $product_brand=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3=='' ){
        echo "<script>alert('Please fills in available fields.......')</script>";
        exit();
    }else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");

        // insert query

        // $select ="select * from brands";
        // $s=mysqli_query($con,$select);
        // $r=mysqli_fetch_assoc($s);
        // if($product_brand==$r['brand_id']){
        //     $product=$r['brand_id'];
        // }

        $insert_products = "insert into products(product_title,product_description,product_keywords,category_id,
                        brand_id,product_image1,product_image2,product_image3,product_price,date,status) values 
                        ('$product_title','$product_description','$product_keyword','$product_category','$product_brand',
                        '$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
           
        $result_query = mysqli_query($con,$insert_products);
        
        if($result_query){
            echo"<script>alert('Successfully added the products')</script>";
            
        }
        
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products/ Admin_Area</title>
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
    
<!--Boostrap css cdn link-->


</head>
<body class="bg-dark">
    <div class="container mt-3">
        <h1 class="text-center text-light">Insert Products</h1>
        <!-- form -->
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto ">

            <!-- Product-title -->
            <label for="product_title" class="form-label text-light">Product_title</label>
            <input type="text" placeholder="Enter Product Title..." name="product_title" id="product_title" 
            class="form-control " autocomplete="off" required="required"><br>
            </div>

            <!-- Product-description -->
            <div class="form-outline mb-4 w-50 m-auto ">
            <label for="product_description" class="form-label text-light">Product_description</label>
            <input type="text" placeholder="Enter product_description..." name="product_description" id="product_description" 
            class="form-control " autocomplete="off" required="required"><br>
            </div>

            <!-- Product-keywords -->
            <div class="form-outline mb-4 w-50 m-auto ">
            <label for="product_keywords" class="form-label text-light">Product_keywords</label>
            <input type="text" placeholder="Enter product_keywords..." name="product_keywords" id="product_keywords" 
            class="form-control " autocomplete="off" required="required"><br>
            </div>

            <!-- product_category
            <div class="form-outline mb-4 w-50 m-auto ">
            <select name="product_category" id="" class="form-select">
                <option value="">Select a Category</option>
                <option value="">Category 1</option>
                <option value="">Category 2</option>
                <option value="">Category 3</option>
                <option value="">Category 4</option>
            </select>
            </div><br> -->

            <!-- Categories -->
            <div class="input-group mb-4 w-50 m-auto form-outline">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Select Categories</label>
            </div>
            <select class="custom-select" id="" name="product_category">
                <option selected>Choose...</option>
                    <!-- display categories -->
                <?php
                // $select_category= "select * from categories";
                // $result_category->$con->query($select_category) or die($con->error);
                // // $result = $conn->query($sql)or die($conn->error);
                // while($row_data->$result_category->fetch_assoc()){
                //     $category_id = $row_data['category_id'];
                //     $category_title = $row_data['category_title'];
                //     echo "<option value='$category_id'>$category_title</option>";
                // }
                $select_category ="select * from categories";
                $result_category = mysqli_query($con,$select_category);
                while($row_data1=mysqli_fetch_assoc($result_category)){
                    $category_id = $row_data1['category_id'];
                    $category_title =$row_data1['category_title'];
                    echo"<option value='$category_id'>$category_title</option>";
                }
                ?>
            </select>
            </div><br>


            <!-- Brands -->
            <div class="input-group mb-4 w-50 m-auto form-outline">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Select Brands</label>
            </div>
            <select name="brand" class="custom-select" id="" >
                <option selected>Choose...</option>

                <?php
                $select_brand ="select * from brands";
                $result_brand = mysqli_query($con,$select_brand);
                while($row_data=mysqli_fetch_array($result_brand)){
                    $brand_id = $row_data['brand_id'];
                    $brand_title =$row_data['brand_title'];
                    echo"<option value='$brand_id'>$brand_title</option>";
                }
                ?>
                

            </select>
            </div><br>

                        <!-- product_brand
            <div class="form-outline mb-4 w-50 m-auto ">
            <select name="product_brand" id="" class="form-select">
                <option value="">Select a Brand</option>
                <option value="">Brand 1</option>
                <option value="">Brand 2</option>
                <option value="">Brand 3</option>
                <option value="">Brand 4</option>
            </select>
            </div><br> -->

            <!-- Image 1 -->
            <div class="form-outline mb-4 w-50 m-auto ">
            <label for="product_Image1" class="form-label text-light">Product Image1</label>
            <input type="file" name="product_Image1" id="product_Image1" 
            class="form-control"  required="required"><br>
            </div>
        
            <!-- Image 2 -->
            <div class="form-outline mb-4 w-50 m-auto ">
            <label for="product_Image2" class="form-label text-light">Product Image2</label>
            <input type="file" name="product_Image2" id="product_Image2" 
            class="form-control"  required="required"><br>
            </div>

            <!-- Image 3 -->
            <div class="form-outline mb-4 w-50 m-auto ">
            <label for="product_Image3" class="form-label text-light">Product Image3</label>
            <input type="file" name="product_Image3" id="product_Image3" 
            class="form-control"  required="required"><br>
            </div>

            <!-- Product_price -->
            <div class="form-outline mb-4 w-50 m-auto ">
            <label for="product_price" class="form-label text-light">Product Price</label>
            <input type="text" placeholder="Enter product_price..." name="product_price" id="product_price" 
            class="form-control " autocomplete="off" required="required"><br>
            </div>

            <!-- Insert_product -->
            <div class="form-outline mb-4 w-50 m-auto ">
            <!-- <label for="product_price" class="form-label text-light">Product Price</label> -->
            <input type="submit"  name="insert_product" id="insert_product" 
            class="btn btn-info mb-3 px-3 text-white"value="Insert Products" required="required"><br>
            </div>

            
        </form>
    </div>
    
</body>
</html>