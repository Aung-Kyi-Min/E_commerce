<?php
include("../includes/connect.php");
include("../function/common_fun.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Area</title>

    <!--Boostrap css cdn link-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!--End Boostrap cdn link-->

<!--Boostrap js cdn link-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!--End Boostrap js cdn link-->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
 crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--End Font awesome cdn link-->

<!-- w3school icons cdn link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-

<!-- css link -->
<link rel="stylesheet" href="../style1.css">

<style>
.admin_image{
    width: 100px;
    object-fit: contain;
}
/* .foot{
    position: absolute;
    bottom: 0;
} */
body{
    overflow-x: hidden;
    /* overflow-y: hidden; */
}
.product_img{
    width: 15%;
    object-fit: contain;
}

    </style>

</head>
<body>

    <!-- navbar -->
    <!-- first child -->
<div class="container-fluid p-0">
<nav class="navbar navbar-expand-lg navbar-light bg-dark ">
    <div class="container-fluid">
        <img src="../images/logo.png" class="logo" alt="">
        <nav class="navbar navbar-expand-lg">
            <ul class="navbar-nav">
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link text-white">Welcome guest</a>
                </li> -->
                <?php
              if(!isset($_SESSION['admin_username'])){
                echo "<li class='nav-item'>
                      <a class='nav-link text-white' href='#'>Welcome guest</a>
                      </li>";
                }else{
                echo"<li class='nav-item'>
                     <a class='nav-link text-white' href='#'>Welcome : ". $_SESSION['admin_username'] ."</a>
                     </li>";
                }
                ?>
            </ul>
        </nav>
    </div>
</nav>


<!-- second child -->
<div class="bg-light">
    <p class="text-center p-2"><strong>Manage Details</strong></p>
</div>

<!-- third child -->
<div class="row">
    <div class="col md-12 bg-secondary p-1 d-flex align-items-center">
        <div class="p-3">
            <a href="#"><img src="../images/burger.jpg" class="admin_image" alt=""></a>
            <p class="text-light text-center">Admin name</p>
        </div>
        <div class="button text-center">
            <button><a href="insert_product.php" class="nav-link text-light bg-dark my-1">Insert Products</a></button>
            <button><a href="index.php?veiw_products" class="nav-link text-light bg-dark my-1">View Products</a></button>
            <button><a href="index.php?insert_categories" class="nav-link text-light bg-dark my-1">Insert Categories</a></button>
            <button><a href="index.php?view_categories" class="nav-link text-light bg-dark my-1">View Categories</a></button>
            <button><a href="index.php?insert_brand" class="nav-link text-light bg-dark my-1">Insert Brands</a></button>
            <button><a href="index.php?view_brands" class="nav-link text-light bg-dark my-1">View Brands</a></button>
            <button><a href="index.php?list_orders" class="nav-link text-light bg-dark my-1">All Orders</a></button>
            <button><a href="index.php?list_payments" class="nav-link text-light bg-dark my-1">All Payments</a></button>
            <button><a href="index.php?list_users" class="nav-link text-light bg-dark my-1">List Users</a></button>
            <button><a href="#" class="nav-link text-light bg-dark my-1">Logout</a></button>
        </div>
    </div>
</div>

<!-- fourth child -->
<div class="container my-5">
    <?php
    if(isset($_GET['insert_categories'])){
        include('insert_category.php');
    }

    if(isset($_GET['insert_brand'])){
        include('insert_brands.php');
    }
    if(isset($_GET['veiw_products'])){
        include('veiw_products.php');
    }
    if(isset($_GET['edit_products'])){
        include('edit_products.php');
    }
    if(isset($_GET['delete_products'])){
        include('delete_products.php');
    }
    if(isset($_GET['view_categories'])){
        include('view_categories.php');
    }
    if(isset($_GET['view_brands'])){
        include('view_brands.php');
    }
    if(isset($_GET['edit_category'])){
        include('edit_category.php');
    }
    if(isset($_GET['edit_brands'])){
        include('edit_brand.php');
    }
    if(isset($_GET['delete_category'])){
        include('delete_category.php');
    }
    if(isset($_GET['delete_brand'])){
        include('delete_brand.php');
    }
    if(isset($_GET['list_orders'])){
        include('list_orders.php');
    }
    if(isset($_GET['list_payments'])){
        include('list_payments.php');
    }
    if(isset($_GET['list_users'])){
        include('list_users.php');
    }
    ?>
    </div>
</div>
<br>
            <!-- last child -->
            
<div class="foot text-center bg-dark text-white px-3 mt-3 ">
      <p>&nbsp; Copyrights From Some E-Commerce , developed by Aung Min</p>
</div>

<!-- <footer class=" text-center bg-dark text-white px-3 mt-3 ">
    <p>&nbsp; Copyrights From Some E-Commerce , developed by Aung Min</p>
</footer> -->

</body>
</html>