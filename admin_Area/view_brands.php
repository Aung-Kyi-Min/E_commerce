<h2 class="text-center text-primary">View Brands</h2>
<table class="table table-bordered text-center mt-5">
    <thead class="bg-info text-dark">
        <th>Sl no</th>
        <th>Brands Title</th>
        <th>Edit</th>
        <th>Delete</th>
    </thead>
    <tbody class="bg-secondary text-light ">
        <?php
        $number =0;
        $selects = "select * from brands";
        $result_brand = mysqli_query($con,$selects);
        while($row_datas = mysqli_fetch_array($result_brand)){
            $brand_id = $row_datas['brand_id'];
            $brand_title = $row_datas['brand_title'];
            $number++;
       

        ?>
        <tr>
            <td><?php echo $number; ?></td>
            <td><?php echo $brand_title ; ?></td>
            <td><a href='index.php?edit_brands=<?php echo $brand_id; ?>' class='text-center text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_brand=<?php echo $brand_id; ?>' 
            type="button" class="text-center text-light" data-toggle="modal" data-target="#exampleModal">
            <i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
             }
        ?>
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      </div>
      <div class="modal-body">
        <h4>Are you sure want to delete this? </h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_brands" 
        class="text-light text-decoration-none"> No </a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_brand=<?php echo $brand_id; ?>' 
            type="button" class="text-center text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>