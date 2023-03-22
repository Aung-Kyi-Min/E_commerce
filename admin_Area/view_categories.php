<h2 class="text-center text-primary">View Categories</h2>
<table class="table table-bordered text-center mt-5">
    <thead class="bg-info text-dark">
        <th>Sl no</th>
        <th>Category Title</th>
        <th>Edit</th>
        <th>Delete</th>
    </thead>
    <tbody class="bg-secondary text-light ">
        
        <?php
        $number =0;
        $select = "select * from categories";
        $result_cat = mysqli_query($con,$select);
        while($row_data = mysqli_fetch_array($result_cat)){
            $category_id = $row_data['category_id'];
            $cat_title = $row_data['category_title'];
            $number++;
       

        ?>
        <tr>
            <td><?php echo $number; ?></td>
            <td><?php echo $cat_title ; ?></td>
            <td><a href='index.php?edit_category=<?php echo $category_id; ?>' class='text-center text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_category=<?php echo $category_id; ?>' class='text-center text-light'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
             }
        ?>
    </tbody>
</table>