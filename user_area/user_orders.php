<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User's Orders</title>
</head>
<body>
    <?php

    $username = $_SESSION['username'];
    $select = "select * from user_table where user_name='$username'";
    $result = mysqli_query($con,$select);
    $data = mysqli_fetch_array($result);
    $user_id = $data['user_id'];

    ?>
    <h3 class="text-primary mb-3">All My Orders</h3>
    <table class="table text-light table-bordered my-4">
        <thead class="bg-dark">
            <tr>
                <th>SI no</th>
                <th>Amount Due</th>
                <th>Total Products</th>
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Complete/Incomplete</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="bg-secondary">
            <?php

$number =1;
            $select_data = "select * from user_orders where user_id = $user_id";
            $result = mysqli_query($con,$select_data);
            while($row_data = mysqli_fetch_array($result)){
            $order_id = $row_data['order_id'];
            $amount_due = $row_data['amount_due'];
            $invoice_number = $row_data['invoice_number'];
            $total_products = $row_data['total_products'];
            $order_date = $row_data['order_date'];
            $order_status = $row_data['order_status'];
            if($order_status=="pending"){
                $order_status="Incomplete";
            }else{
                $order_status="Complete";
            }
            // $amount_due = $row_data['amount_due'];
           
            echo " <tr>
                        <td>$number</td>
                        <td>$amount_due</td>
                        <td>$total_products</td>
                        <td>$invoice_number</td>
                        <td>$order_date</td>
                        <td>$order_status</td>";
                    ?>
                    <?php
                    if($order_status=='Complete'){
                        echo "<td>Paid</td>";
                    }else{
                        echo"<td><a href='confirm_payment.php?order_id=$order_id' class='text-light'>Confirm</a></td>
                    </tr>";
                    }
                    
            $number++;
            }

            ?>

        </tbody>
    </table>
</body>
</html>