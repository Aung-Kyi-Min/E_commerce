<h2 class="text-center text-primary">All Products</h2>
<table class="table table-bordered text-center mt-5">
    <thead class="bg-info text-dark">
        <th>Product Id</th>
        <th>Product Title</th>
        <th>Product Image</th>
        <th>Product Price</th>
        <th>Total Sold</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
    </thead>
    <tbody class="bg-secondary text-light ">
        <?php
        
        $number=0;
        $select = "select * from products";
        $result = mysqli_query($con,$select);
        while($row_datas = mysqli_fetch_assoc($result)){
            $product_id = $row_datas['product_id'];
            $product_title = $row_datas['product_title'];
            $product_image = $row_datas['product_image1'];
            $product_price = $row_datas['product_price'];
            $product_status = $row_datas['status'];

            $number++;
        ?>
        <tr class='text-center'>
        <td><?php echo $number ; ?></td>
        <td><?php echo $product_title; ?></td>
        <td><img src='./product_images/<?php echo $product_image; ?>' class= 'product_img' alt=''></td>
        <td><?php echo $product_price; ?></td>
        <td>
            <?php
                $select_c = "select * from orders_pending where product_id=$product_id";
                $result_c = mysqli_query($con,$select_c);
                $count  = mysqli_num_rows($result_c);
                echo $count;
                
            ?>
        </td>
        <td>true</td>
        <td><a href='index.php?edit_products=<?php echo $product_id ?>' class='text-center text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
        <td><a href='index.php?delete_products=<?php echo $product_id ?>' class='text-center text-light'><i class='fa-solid fa-trash'></i></a></td>
        </tr>


<?php

        }
?>
    </tbody>
</table>