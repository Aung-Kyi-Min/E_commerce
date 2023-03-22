<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete_Account</title>
</head>
<body>
    <h3 class="text-center text-primary mb-4">Delete Account</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4">
            <input type="submit" name="delete" id="" value="Delete Account" class="form-control w-50 m-auto">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" name="dont_delete" id="" value="Dont't Delete Account" class="form-control w-50 m-auto">
        </div>
    </form>
</body>
</html>


<?php

$user_session = $_SESSION['username'];
if(isset($_POST['delete'])){
$delete = "delete from user_table where user_name = '$user_session'";
$result_delete = mysqli_query($con,$delete);
if($result_delete){
    session_destroy();
    echo "<script>alert('You have deleted successfully....')</script>";
    echo "<script>window.open('../index.php','_self')</script>";
}
}
if(isset($_POST['dont_delete'])){
    echo"<script>window.open('profile.php','_self')</script>";
}

?>