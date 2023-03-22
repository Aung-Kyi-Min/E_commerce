<?php

if(isset($_GET['edit_account'])){
    $username = $_SESSION['username'];
    $select = "select * from user_table where user_name = '$username'";
    $result_data = mysqli_query($con,$select);
    $row_data = mysqli_fetch_array($result_data);
    $userid  = $row_data['user_id'];
    $username  = $row_data['user_name'];
    $user_email  = $row_data['user_email'];
    $user_address  = $row_data['user_address'];
    $user_mobile  = $row_data['user_mobile'];
    
}

if(isset($_POST['submit'])){
    $update_id = $userid;
    $user_name = $_POST['user_username'];
    $email = $_POST['user_email'];
    $address = $_POST['user_address'];
    $mobile = $_POST['user_mobile'];
    $image = $_FILES['user_image']['name'];
    $image_tmp = $_FILES['user_image']['tmp_name'];

    move_uploaded_file($image_tmp,"./user_images/$image");

    // update query

    $update = "update user_table set user_name='$user_name',user_email='$email',user_image='$image',
    user_address='$address',user_mobile='$mobile' where user_id = $update_id";
    $result_update = mysqli_query($con,$update);
    if($result_update){
        echo"<script>alert('You have updated successfully....')</script>";
        echo"<script>window.open('logout.php','_self')</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User's Edit Account</title>
</head>
<body>
    <h2 class="text-center text-success">Edit Account</h2>
    <form action="" method="POST" enctype="multipart/form-data" class="text-center">
        <div class="form-outline mb-4">
            <!-- <label for="user_username" class="form-label px-3">Username</label> -->
            <input type="text" name="user_username" id="user_username" class="form-control w-50 m-auto" value="<?php echo $username;?>">
        </div>
        <div class="form-outline mb-4">
        <!-- <label for="user_email">Email</label> -->
            <input type="email" name="user_email" class="form-control w-50 m-auto" value="<?php echo $user_email;?>">
        </div>
        <div class="form-outline mb-4 d-flex w-50 m-auto">
        <!-- <label for="user_image">Image</label> -->
            <input type="file" name="user_image" class="form-control m-auto">
            <img src="./user_images/<?php echo $user_img?>" alt="" class="edit_image">
        </div>
        <div class="form-outline mb-4">
        <!-- <label for="user_address">Address</label> -->
            <input type="text" name="user_address" class="form-control w-50 m-auto" value="<?php echo $user_address;?>">
        </div>
        <div class="form-outline mb-4">
        <!-- <label for="user_mobile">Mobile</label> -->
            <input type="text" name="user_mobile" class="form-control w-50 m-auto" value="<?php echo $user_mobile;?>">
        </div>
        <input type="submit" name="submit" value="Update" class="bg-dark text-light px-3 py-2 border-0 rounded">
    </form>
</body>
</html>