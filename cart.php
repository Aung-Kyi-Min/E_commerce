<?php
include("includes/connect.php");
include("function/common_fun.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Cart</title>

<!--Boostrap css cdn link-->
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

<style>
    .cart-image{
        width: 100px;
        height: 100px;
        object-fit: contain;
    }
</style>


</head>
<body class="bg-light">
    
<!-- navbar -->
<div class="container-fluid bg-light p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <img src="./images/logo.png" alt="" class="logo">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link text-white" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="display_all.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="./user_area/user_registration.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="cart.php"><i class="fa fa-truck"><sup><?php count_cart();?></sup></i></a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link text-white" href="#">Total Price: <?php echo total_price() ."/-";?></a>
             </li> -->
              
            
          </ul>
          <!-- <form class="form-inline my-2 my-lg-0" action="search_product.php" method="get">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
             <input type="submit" value="Search" name="serach_data_product" class="btn btn-outline-light">
          </form> -->
        </div>
      </nav>

      <!-- calling cart function -->
      <?php
        cart();
      ?>

      <!-- Second child -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto">

          <?php
            if(!isset($_SESSION['username'])){
              echo "<li class='nav-item'>
                    <a class='nav-link text-white' href='#'>Welcome guest</a>
                    </li>";
              }else{
              echo"<li class='nav-item'>
                   <a class='nav-link text-white' href='#'>Welcome : ". $_SESSION['username'] ."</a>
                   </li>";
              }
          if(!isset($_SESSION['username'])){
              echo "<li class='nav-item'>
                    <a class='nav-link text-white' href='./user_area/user_login.php'>login</a>
                  </li>";
            }else{
              echo"<li class='nav-item'>
                    <a class='nav-link text-white' href='./user_area/logout.php'>Logout</a>
                  </li>";
            }
            ?>
        </ul>
      </nav>

      <!-- third child -->
      <div class="bg-light">
        <h3 class="text-center">Hidden Store</h3>
        <p class="text-center">Communication is at heart of commerce and community!</p>
      </div>

<!-- fourth child table -->
      
    <div class="container">
        <div class="row">
        <form action="" method="POST">
            <table class="table table-bordered bg-secondary text-dark text-center">

                <tbody>
                    <!-- php code to display dyanmic cart datas -->
                    <?php
                        global $con;
                        $get_ip_address = getIPAddress();
                        $total = 0;
                        $cart_query = "select * from cart_details where ip_address='$get_ip_address'";
                        $result = mysqli_query($con,$cart_query);
                        $result_product = mysqli_num_rows($result);
                        if($result_product>0){
                            echo" <thead>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                            <th colspan='2'>Operation</th>
                        </thead>";
                        
                        
                        while($row=mysqli_fetch_array($result)){
                        $product_id = $row['product_id'];
                        $select_product_id = "select * from products where product_id= $product_id";
                        $result_id = mysqli_query($con,$select_product_id);

                        while($row1=mysqli_fetch_array($result_id)){
                            $product_price = array($row1['product_price']);
                            $price_table = $row1['product_price'];
                            $product_title = $row1['product_title'];
                            $product_image1 = $row1['product_image1'];
                            $product_total = array_sum($product_price);

                            $total += $product_total;
                        
    ?>

                    <tr>
                        <td><?php echo $product_title?></td>
                        
                        <td ><img src="./admin_Area/product_images/<?php echo $product_image1?>" class="cart-image"></td>
                        <td><input type="text" name="qty" id="" class="form-input w-50"></td>
                        <?php
                        // global $con;
                        $get_ip_address = getIPAddress();
                            if(isset($_POST['update'])){
                              
                              $quantities = $_POST['qty'];
                              $update_query = "update cart_details set quantity = $quantities where ip_address = '$get_ip_address'";
                              $result_update = mysqli_query($con,$update_query);
                              $total = $total * $quantities;

                            }

                        
                        ?>


                        <td><?php echo $price_table?>/-</td>
                        <td><input type="checkbox" name="removeitem[]" value="<?php  echo $product_id?>"></td>
                        <td>
                        <!-- <button class="p-2 mx-2 px-2 py-2 rounded bg-info border-0">
                            Update
                        </button> -->
                        <input type="submit" value="Update Cart" name="update" class="p-2 mx-2 px-2 py-2 rounded bg-info border-0" >
                        </td>
                        <td>
                        <!-- <button class="p-2 mx-2 px-2 py-2 rounded bg-info border-0">
                            Remove
                        </button> -->
                        <input type="submit" value="Remove Cart" name="remove" class="p-2 mx-2 px-2 py-2 rounded bg-info border-0" >

                        </td>
                    </tr>

                    <?php
                    }
                  }
                }
                else{
                  echo "<h2 class='text-center p-2 m-2 bg-danger text-light'>Cart is empty</h2>";
                }
                    ?>

                </tbody>
            </table>
                <!-- sub_total -->
                <div class="d-flex mb-5">
                  <?php
                        global $con;
                        $get_ip_address = getIPAddress();
                        // $total = 0;
                        $cart_query = "select * from cart_details where ip_address='$get_ip_address'";
                        $result = mysqli_query($con,$cart_query);
                        $result_product = mysqli_num_rows($result);
                        if($result_product>0){
                         echo " <h3 class='px-3'>SubTotal : <strong class='text-info'>$total/-</strong></h3>
                         <input type='submit' value='Continue Shopping' name='Continue_shopping'
                          class='p-2 mx-2 px-2 py-2 rounded bg-info border-0' >

                          
                              <button class='p-2 rounded text-light bg-dark border-0'>
                              <a href='user_area/checkout.php' class='text-light text-decoration-none'>Checkout</a>
                              </button>
                          ";
                        }else{
                          echo"
                          <input type='submit' value='Continue Shopping' name='Continue_shopping'
                          class='p-2 mx-2 px-2 py-2 rounded bg-info border-0' >";
                        }
                        if(isset($_POST['Continue_shopping'])){
                          echo"<script> window.open('index.php','_self')</script>";
                        }
                  ?>

                </div>
                </form>

                <!-- function to remove item -->
                <?php
                function remove(){
                  global $con;
                  if(isset($_POST['remove'])){
                      foreach($_POST['removeitem'] as $remove_id){
                        echo $remove_id;
                        $delete_id = "delete from cart_details where product_id = $remove_id";
                        $result_delete = mysqli_query($con,$delete_id);
                        if($result_delete){
                          echo"<script> window.open('cart.php','_self')</script>";
                        }
                      }
                  }
                }
                echo $remove_data = remove();
                
                ?>
            
        </div>
    </div>




</div>
    <!-- last child -->
<!-- footer -->
<?php
include("./includes/footer.php");
?>

</body>
</html>