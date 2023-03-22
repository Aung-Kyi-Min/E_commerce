<h2 class="text-center text-primary">All Payments</h2>
<table class="table table-bordered text-center mt-5">
    <thead class="bg-info text-dark">

    <?php

    $payment = "select * from user_payments";
    $result_payment = mysqli_query($con,$payment);
    $row_count = mysqli_num_rows($result_payment);


        if($row_count == 0){
            echo "<h2 class='text-center text-danger mt-5 '>No Payments Received Yet!!!</h2>";
        }else{

            echo "  <th>Sl no</th>
                    <th>Invoice Number</th>
                    <th>Amount</th>
                    <th>Payment Mode</th>
                    <th>Order Date</th>
                    <th>Delete</th>
                    </thead>
                    <tbody class='bg-secondary text-light'>";
            
            $number = 0;
            while($row_datas = mysqli_fetch_array($result_payment)){
                $order_id = $row_datas['order_id'];
                $payment_id = $row_datas['payment_id'];
                $amount = $row_datas['amount'];
                $invoice_number = $row_datas['invoice_number'];
                $payment_mode = $row_datas['payment_mode'];
                $date = $row_datas['date'];
                $number++;
                echo " <tr class='text-center'>
                            <td>$number</td>
                            <td>$invoice_number</td>
                            <td>$amount</td>
                            <td>$payment_mode</td>
                            <td>$date</td>
                            <td><a href='' class='text-center text-light'><i class='fa-solid fa-trash'></i></a></td>
                        </tr>
                ";

            }
        }

    ?>


    </tbody>
</table>