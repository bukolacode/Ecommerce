<?php
include "../includes/connect_db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders-page</title>
    <link rel="shortcut icon" href="../img/logo2.jpg" type="image/x-icon">
</head>
<body>
    <?php
  $username = $_SESSION['username'];
  $get_user = "SELECT * FROM users_table WHERE username ='$username'";
  $result = mysqli_query($conn,$get_user);
  $row_fetch = mysqli_fetch_assoc($result);
  $row_counts = mysqli_num_rows($result);
  $user_id = $row_fetch['user_id'];
//    echo "$user_id";

?>
   <h3 class="text-success">All my Orders</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <?php
       $get_orders = "SELECT * FROM user_order WHERE user_id = '$user_id'";
       $result_order = mysqli_query($conn,$get_orders);
       $row_counts = mysqli_num_rows($result_order);
       if ($row_counts == 0) {
         echo "<h2 class='text-danger text-center mt-5'>No order yet</h2>";
       }else {
        echo " <tr>
        <th>Sl no</th>
        <th>Amount Due</th>
        <th>Total Products</th>
        <th>Invoice Number</th>
        <th>Date</th>
        <th>Complete/incomplete</th>
        <th>Status</th>
        </tr>
        </thead>
        <tbody class='bg-secondary text-light'>";
        $number = 1 ;
        while ($row_order = mysqli_fetch_assoc($result_order)) {
            $order_id = $row_order['order_id'];
            $amount_due = $row_order['amount_due'];
            $total_products = $row_order['total_products'];
            $invoice_number = $row_order['invoice_number'];
            $order_status = $row_order['order_status'];
            if ($order_status =='pending') {
                $order_status = 'Incomplete';
            }else {   
               $order_status = 'Complete';
            }
            $order_date = $row_order['order_date'];
            echo "<tr>
               <td>$number</td>
               <td>$amount_due</td>
               <td>$total_products</td>
               <td> $invoice_number</td>
               <td>$order_date</td>
               <td>$order_status</td>";
               ?>
                <?php
                if ($order_status== 'Complete') {
                   echo "<td>Paid</td>";
                }else {
                   echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text-light'>Confirm</a></td>
                   </tr>";
                }    
            $number ++;
          }     
       }

?>


            
        </tbody>
    </table>
</body>
</html>
