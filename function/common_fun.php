<?php
// connecting database
// include("./includes/connect.php");
//  if($con){
  //     echo "blabla";
  // }
  
  //diaplaying all products
  
  function getproducts(){ 
    global $con;
    
    // condition to check isset or not
    if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
        
        $select = "select * from products order by rand() limit 0,9";
        $result_display = mysqli_query($con,$select);
        while($row = mysqli_fetch_assoc($result_display)){
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];
          $product_description = $row['product_description'];
          $product_image1 = $row['product_image1'];
          $product_price = $row['product_price'];
          $category_id = $row['category_id'];
          $brand_id = $row['brand_id'];
          
          echo"<div class='col-md-4 mb-2'>
            <div class='card'>
              <img src='./admin_Area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price : $product_price/-</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
              </div>
            </div>
          </div>";
        }
        
      }
    }
  }
  
  // getting all products
  function get_all_products(){
    global $con;
    
    // condition to check isset or not
    if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
        
        $select = "select * from products order by rand()";
        $result_display = mysqli_query($con,$select);
        while($row = mysqli_fetch_assoc($result_display)){
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];
          $product_description = $row['product_description'];
          $product_image1 = $row['product_image1'];
          $product_price = $row['product_price'];
          $category_id = $row['category_id'];
          $brand_id = $row['brand_id'];
          
          echo"<div class='col-md-4 mb-2'>
            <div class='card'>
              <img src='./admin_Area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price : $product_price/-</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
              </div>
            </div>
          </div>";
        }
        
      }
    }
  }
  
  // getting unique categories
  function get_unique_categories(){
    global $con;
    
    // condition to check isset or not
    if(isset($_GET['category'])){
      $category_id = $_GET['category'];
      $select = "select * from products where category_id=$category_id";
      $result_display = mysqli_query($con,$select);
      $num_row = mysqli_num_rows($result_display);
      if($num_row == 0)
      {
        echo "<h2 class='mt-5 text-center text-danger'>This Category is not available for Service!!!!</h2>";
      }
      while($row = mysqli_fetch_assoc($result_display)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        
        echo"<div class='col-md-4 mb-2'>
          <div class='card'>
            <img src='./admin_Area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <p class='card-text'>Price : $product_price/-</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
              <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
            </div>
          </div>
        </div>";
      }
      
    }
  }
  
  
  // getting unique brands
  function get_unique_brands(){
    global $con;
    
    // condition to check isset or not
    if(isset($_GET['brand'])){
      $brand_id = $_GET['brand'];
      $select = "select * from products where brand_id=$brand_id";
      $result_display = mysqli_query($con,$select);
      $num_row = mysqli_num_rows($result_display);
      if($num_row == 0)
      {
        echo "<h2 class='mt-5 text-center text-danger'>No Stocks for this brand!!!!</h2>";
      }
      while($row = mysqli_fetch_assoc($result_display)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        
        echo"<div class='col-md-4 mb-2'>
          <div class='card'>
            <img src='./admin_Area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
              <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
            </div>
          </div>
        </div>";
      }
      
    }
  }
  
  
  
  // displaying all brands
  function getbrands(){
    global $con;
    $select_brand = "select * from brands";
    $result_brand = mysqli_query($con,$select_brand);
    while($row_data=mysqli_fetch_assoc($result_brand)){
      $brand_id = $row_data['brand_id'];
      $brand_title = $row_data['brand_title'];
      echo"<li class='nav-items'>
        <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
      </li>";
    }
    
  }
  
  
  // displaying all categories
  function getcategories(){
    global $con;
    $select_category = "select * from categories";
    $result_category = mysqli_query($con,$select_category);
    while($row_data1 = mysqli_fetch_assoc($result_category)){
      $category_id = $row_data1['category_id'];
      $category_title = $row_data1['category_title'];
      echo "<li class='nav-items'>
        <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
      </li>";
      
      
    }
    
  }
  
  
  // getting search products
  function get_search_product(){
    
    global $con;
    
    if(isset($_GET['search_data_product'])){
     
      
      $search_product =$_GET['search_data'];
      
      $search_query = "select * from products where product_keywords like '%$search_product%'";
      //  or product_title like '%${search_product}%'";
      // var_dump($search_query);
      $result_display1 = mysqli_query($con,$search_query);
      // var_dump($result_display);
      $num_row = mysqli_num_rows($result_display1);
      if($num_row == 0)
      {
        echo "<h2 class='mt-5 text-center text-danger'>No result Match.No products found on this Category!!!!</h2>";
      }
      while($row = mysqli_fetch_assoc($result_display1)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        
        echo"<div class='col-md-4 mb-2'>
          <div class='card'>
            <img src='./admin_Area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <p class='card-text'>Price : $product_price/-</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
              <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
            </div>
          </div>
        </div>";
      }
    }
  }
  
  
  // view product_detail
  function view_product_detail(){ 
    global $con;
    
    // condition to check isset or not
    if(isset($_GET['product_id'])){
      if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
          $product_id = $_GET['product_id'];
          
          $select = "select * from products where product_id=$product_id";
          $result_display = mysqli_query($con,$select);
          while($row = mysqli_fetch_assoc($result_display)){
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_image2 = $row['product_image2'];
            $product_image3 = $row['product_image3'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            
            echo"
            <div class='col-md-4 mb-2'>
              <div class='card'>
                <img src='./admin_Area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'>$product_description</p>
                  <p class='card-text'>Price : $product_price/-</p>
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                  <a href='index.php' class='btn btn-secondary'>Go Home</a>
                </div>
              </div>
            </div>
            
            <div class='col-md-8'>
              
              <div class='row'>
                <div class='col-md-12'>
                  <h3 class='text-center bg-info text-dark'>Related Images</h3>
                </div>
                <div class='col-md-6'>
                  <img src='./admin_Area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                  
                </div>
                <div class='col-md-6'>
                  <img src='./admin_Area/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                  
                </div>
              </div>
            </div>            
            ";
          }
          
        }
      }
    }
  }
  
  //getting client ip address

  function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;
  

// cart function

function cart(){

if(isset($_GET['add_to_cart'])){
  global $con;
     $get_product_id = $_GET['add_to_cart'];
     $get_ip_address = getIPAddress();

     $select_query = "select * from cart_details where product_id=$get_product_id and ip_address = '$get_ip_address'";
     $result_display1 = mysqli_query($con,$select_query);
      $num_row = mysqli_num_rows($result_display1);
      if($num_row > 0)
      {
        echo "<script>alert('This cart is already added to Cart!!!!!')</script>";
        echo "<script>window.open('index.php','_self')</script>";
      }else{
        $insert_query = "insert into cart_details(product_id,ip_address,quantity) values
                          ($get_product_id,'$get_ip_address',0)";
        $result_query = mysqli_query($con,$insert_query);
        echo "<script>alert('Succefully added to Cart!!!!!')</script>";
        echo "<script>window.open('index.php','_self')</script>";
      }
}

}
  


// get count cart function

function count_cart(){

  if(isset($_GET['add_to_cart'])){
    global $con;
       $get_ip_address = getIPAddress();
  
       $select_query = "select * from cart_details where ip_address = '$get_ip_address'";
       $result_display1 = mysqli_query($con,$select_query);
        $count_cart = mysqli_num_rows($result_display1);

        }else{
          global $con;
          $get_ip_address = getIPAddress();
     
          $select_query = "select * from cart_details where ip_address ='$get_ip_address'";
          $result_display1 = mysqli_query($con,$select_query);
           $count_cart = mysqli_num_rows($result_display1);
        }
        echo $count_cart;
  }


  // getting total price function

  function total_price(){
    global $con;
    $get_ip_address = getIPAddress();
    $total = 0;
    $cart_query = "select * from cart_details where ip_address='$get_ip_address'";
    $result = mysqli_query($con,$cart_query);
    
    while($row=mysqli_fetch_array($result)){
      $product_id = $row['product_id'];
      $select_product_id = "select * from products where product_id= $product_id";
      $result_id = mysqli_query($con,$select_product_id);

      // $sql="SELECT SUM(alltotal) As GrandTotal FROM products WHERE product_id= $product_id" ;
      // // $result = $con->query($sql)or die($con->error);
      // $result = mysqli_query($con,$sql);
      // // $rowgrand=$result->fetch_assoc();
      // $rowgrand = mysqli_fetch_assoc($result);
      // $total=number_format($rowgrand['GrandTotal']);

      while($row1=mysqli_fetch_array($result_id)){
        $product_price = array($row1['product_price']);
        $product_total = array_sum($product_price);
        $total += $product_total;
      }
    }
    echo $total;

  }


  // getting users_order fun

  function user_orders(){
    global $con;
    $username = $_SESSION['username'];
    $select = "select * from user_table where user_name = '$username'";
    $result_name = mysqli_query($con,$select);
    while ($row_id = mysqli_fetch_array($result_name)){
      $user_id = $row_id['user_id'];
      if(!isset($_GET['edit_account'])){
        if(!isset($_GET['my_orders'])){
          if(!isset($_GET['delete_account'])){
            $select_orders = "select * from user_orders where user_id = $user_id and order_status = 'pending'";
            $result_orders = mysqli_query($con,$select_orders);
            $row = mysqli_num_rows($result_orders);
            if($row>0){
              echo "<h3 class='text-center text-success my-5 mb-3'>You have 
              <span class= 'text-danger'>$row </span>pending orders.</h3>
              <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Orders Detail</a></p>";
            }else{
              echo "<h3 class='text-center text-success my-5 mb-3'>You have 
              <span class= 'text-danger'>zero </span>pending orders.</h3>
              <p class='text-center'><a href='../index.php' class='text-dark'>Explore Products</a></p>";
            }
          }
        }
      }
    }
  }



  
  ?>