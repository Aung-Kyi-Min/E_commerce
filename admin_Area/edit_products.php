<?php

if(isset($_GET['edit_products'])){
    $product_id = $_GET['edit_products'];
    $edit = "select * from products where product_id = $product_id";
    $result_edit = mysqli_query($con,$edit);
    $row_edit = mysqli_fetch_array($result_edit);
    $category_id = $row_edit['category_id'];
    $brand_id = $row_edit['brand_id'];
    $product_t = $row_edit['product_title'];
    $product_desc = $row_edit['product_description'];
    $product_key = $row_edit['product_keywords'];
    $product_img1 = $row_edit['product_image1'];
    $product_img2 = $row_edit['product_image2'];
    $product_img3 = $row_edit['product_image3'];
    $product_p = $row_edit['product_price'];





// fetching categores

$categories = "select * from categories where category_id = $category_id ";
 $result_cat = mysqli_query($con,$categories);
 $row_cat = mysqli_fetch_array($result_cat);
 $category_title1 = $row_cat['category_title'];


 // fetching brands

$brands = "select * from brands where brand_id = $brand_id ";
$result_brands = mysqli_query($con,$brands);
$row_brand = mysqli_fetch_assoc($result_brands);
$brand_title1 = $row_brand['brand_title'];

}
?>


<div class="container mt-5">
    <h2 class="text-center text-primary">Edit Products</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" name="product_title" id="product_title" value="<?php echo $product_t; ?>" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_desc" class="form-label">Product Description</label>
            <input type="text" name="product_desc" id="product_desc" value="<?php echo $product_desc; ?>" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" name="product_keywords" id="product_keywords" value="<?php echo $product_key; ?>" class="form-control" required="required">
        </div><br>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_categories" class="form-label">Product Categories</label><br>
            <select name="product_categories" id="product_categories" class="custom-select">
                <option value="<?php echo $category_title1; ?>"><?php echo $category_title1; ?></option>

                <?php

                $category_all = "select * from categories";
                $result_cat_all = mysqli_query($con,$category_all);
                while($row_cat_all = mysqli_fetch_array($result_cat_all)){
                    $category_id = $row_cat_all['category_id'];
                    $category_title = $row_cat_all['category_title'];
                    echo "<option value='$category_id'>$category_title</option>";

                }

                ?>

            </select>
        </div><br>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_brands" class="form-label">Product Brands</label><br>
            <select name="product_brands" id="product_brands" class="custom-select">
            <option value="<?php echo $brand_title1; ?>"><?php echo $brand_title1; ?></option>

            <?php

            $brand_all = "select * from brands";
            $result_brand_all = mysqli_query($con,$brand_all);
            while($row_brand_all = mysqli_fetch_array($result_brand_all)){
                $brand_id = $row_brand_all['brand_id'];
                $brand_title = $row_brand_all['brand_title'];
                echo "<option value='$brand_id'>$brand_title</option>";

            }

            ?>
            </select>
        </div><br>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">Product Image1</label>
            <div class="d-flex">
            <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            <img src="product_images/<?php echo $product_img1; ?>" class="product_img"  alt="">
            </div>
        </div><br>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label">Product Image2</label>
            <div class="d-flex">
            <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            <img src="product_images/<?php echo $product_img2; ?>" class="product_img"  alt="">
            </div>
        </div><br>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image3" class="form-label">Product Image3</label>
            <div class="d-flex">
            <input type="file" name="product_image3" id="product_image3 " class="form-control" required="required">
            <img src="product_images/<?php echo $product_img3; ?>" class="product_img"  alt="">
            </div>
        </div><br>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" name="product_price" id="product_price" value="<?php echo $product_p; ?>" class="form-control" required="required">
        </div><br>
        <div class="w-50 m-auto">
            <input type="submit" value="Update Products" name="update_product" class="btn btn-dark">
        </div>
    </form>
</div>


<!-- edit products  -->

<?php  

if(isset($_POST['update_product'])){
    $product_tt = $_POST['product_title'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
    $product_categories = $_POST['product_categories'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];

    $product_image1 = $_FILES['product_image1'] ['name'];
    $product_image2 = $_FILES['product_image2'] ['name'];
    $product_image3 = $_FILES['product_image3'] ['name'];

    $product_image1_tmp = $_FILES['product_image1'] ['tmp_name'];
    $product_image2_tmp= $_FILES['product_image2'] ['tmp_name'];
    $product_image3_tmp = $_FILES['product_image3'] ['tmp_name'];

    if($product_tt == '' or $product_desc == '' or $product_keywords == '' or $product_categories == '' or 
    $product_brands == '' or $product_price == '' or $product_image1 == '' or $product_image2 == '' or
    $product_image3 == '')  {
        echo "<script>alert('Please fill all the fields and continue the process')</script>";
    }else{

        move_uploaded_file($product_image1_tmp,"./product_images/$product_image1");
        move_uploaded_file($product_image2_tmp,"./product_images/$product_image2");
        move_uploaded_file($product_image3_tmp,"./product_images/$product_image3");

        // query to update process

        $update_products = "update products set product_title='$product_tt',product_description='$product_desc',
        product_keywords='$product_keywords', category_id='$product_categories', brand_id = '$product_brands',
        product_image1 = '$product_image1', product_image2 = '$product_image2', product_image3 = '$product_image3',
        product_price = '$product_price' , date = NOW() where product_id = $product_id";
        $result_update = mysqli_query($con,$update_products);
        if($result_update){
            echo"<script>alert('Successfully Updated Products....')</script>";
            echo"<script>window.open('insert_product.php','_self')</script>";
        }
    }




    
}

?>