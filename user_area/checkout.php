<?php
include("../includes/connect.php");
// include("function/common_fun.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce</title>

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
  .logo{
    width: 7%;
    height: 7%;
  }
</style>

</head>
<body class="bg-light">
    
<!-- navbar -->
<div class="container-fluid bg-light p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <img src="../images/logo.png" alt="" class="logo">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link text-white" href="../index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="../display_all.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="user_registration.php">Register</a>
            </li>

              
            
          </ul>
          <form class="form-inline my-2 my-lg-0" action="search_product.php" method="get">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
            <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
            <input type="submit" value="Search" name="search_data_product" class="btn btn-outline-light">
          </form>
        </div>
      </nav>



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
                    <a class='nav-link text-white' href='./user_login.php'>login</a>
                  </li>";
            }else{
              echo"<li class='nav-item'>
                    <a class='nav-link text-white' href='logout.php'>Logout</a>
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

      <!-- fourth child -->
      <div class="row px-1">
        <div class="col-md-12">
          <!-- products -->
            <div class="row">
                <?php
                if(!isset($_SESSION['username'])){
                    include("user_login.php");
                } else
                {
                    include("payment.php");
                }
                ?>
            </div>
        </div>
     </div>
      



</div>
    <!-- last child -->
<!-- footer -->
<?php
include("../includes/footer.php");
?>

</body>
</html>