<?php
 include ('../includes/function.php');
 if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    echo $user_id;
}  

    // getting total items and total price of all items
    $get_ip_address =  getIPAddress();
    $total_price = 0;
    $query_price = "SELECT * FROM cart_details WHERE ip_address = '$get_ip_address'";
    $result_price = mysqli_query($conn,$query_price);
    $invoice_number = mt_rand();
    $status = 'pending';
    $count_product = mysqli_num_rows($result_price);
    while ($row_price = mysqli_fetch_array($result_price)) {
        $product_id = $row_price['product_id'];
        $query_product = "SELECT * FROM products WHERE product_id = '$product_id'";
        $result_product = mysqli_query($conn,$query_product);
        while ($row_product_price = mysqli_fetch_array($result_product)) {
            $product_price = array($row_product_price['product_price']);
            $product_values= array_sum($product_price);
            $total_price+=$product_values;
        }
    }
 


    // getting quantity from cart

    $get_cart = "SELECT * FROM cart_details";
    $run_cart = mysqli_query($conn,$get_cart);
    $get_items = mysqli_fetch_array($run_cart);
    $quantity = $get_items['quantity'];
    if ($quantity == 0) {
        $quantity = '1';
        $subtotal = $total_price;
    }else {
        $quantity = $quantity;
        $subtotal = $total_price*$quantity;
    }
    // inserting data
    $insert_orders = "INSERT INTO user_order (user_id, amount_due, invoice_number, total_products, order_date, order_status)
                      VALUES ('$user_id','$subtotal','$invoice_number','$count_product',NOW(),'$status')";
     $result = mysqli_query($conn,$insert_orders);
     if ($result) {
        echo "<script>alert('Orders are submitted successfully')</script>";
        echo "<script>window.open('./profile.php','_self')</script>";
      
     }
    //    pending order
     $pendig_orders = "INSERT INTO pending_order (user_id, invoice_number, product_id, quantity, order_status)
                      VALUES ('$user_id','$invoice_number','$product_id','$quantity','$status')";
     $result_pending = mysqli_query($conn,$pendig_orders);

    // delete from cart
     $delete = "DELETE FROM cart_details WHERE ip_address = '$get_ip_address'";
     $result_det = mysqli_query($conn,$delete);   
 ?>
