<h2 class="text-center text-primary">All Users</h2>
<table class="table table-bordered text-center mt-5">
    <thead class="bg-info text-dark">

    <?php

    $user = "select * from user_table";
    $result_user = mysqli_query($con,$user);
    $row_count = mysqli_num_rows($result_user);


        if($row_count == 0){
            echo "<h2 class='text-center text-danger mt-5 '>No Users Yet!!!</h2>";
        }else{

            echo "  <th>Sl no</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>User Image</th>
                    <th>User Address</th>
                    <th>User Mobile</th>
                    <th>Delete</th>
                    </thead>
                    <tbody class='bg-secondary text-light'>";
            
            $number = 0;
            while($row_datas = mysqli_fetch_array($result_user)){
                $user_id = $row_datas['user_id'];
                $user_name = $row_datas['user_name'];
                $user_email = $row_datas['user_email'];
                $user_address = $row_datas['user_address'];
                $user_image = $row_datas['user_image'];
                $user_mobile = $row_datas['user_mobile'];
                $number++;
                echo " <tr class='text-center'>
                            <td>$number</td>
                            <td>$user_name</td>
                            <td>$user_email</td>
                            <td><img src='../user_area/user_images/$user_image' class='product_img'></td>
                            <td>$user_address</td>
                            <td>$user_mobile</td>
                            <td><a href='' class='text-center text-light'><i class='fa-solid fa-trash'></i></a></td>
                        </tr>
                ";

            }
        }

    ?>


    </tbody>
</table>