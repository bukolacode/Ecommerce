<?php
include ('../includes/function.php');
session_start();

 if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $select_data = "SELECT * FROM user_order WHERE order_id ='$order_id'";
    $result = mysqli_query($conn,$select_data);
    $row_fetch = mysqli_fetch_assoc($result);
    $invoice_number = $row_fetch['invoice_number'];
    $amount_due = $row_fetch['amount_due'];
 }

 if (isset($_POST['confirm_payment'])) {
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];
    $insert_query = "INSERT INTO user_payments (order_id, invoice_number, amount, payment_mode)
                     VALUES ($order_id,$invoice_number,$amount,'$payment_mode') ";
    $result_data = mysqli_query($conn,$insert_query);
    if ($result_data) {
        echo "<h3 class='text-center text-light'>Payment successfully completed</h3>";
        echo "<script>window.open('./profile.php?my_orders', '_self')</script>";
    }
    $update_query = "UPDATE user_order SET order_status = 'Complete' WHERE order_id = '$order_id'";
    $result_query= mysqli_query($conn,$update_query);
 }
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment-page</title>
     <!-- CSS only -->
     <link rel="shortcut icon" href="../img/logo2.jpg" type="image/x-icon">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>
 </head>
 <body class="bg-secondary">
    <div class="container my-5">
    <h1 class="text-center text-light">Confirm Payment</h1>
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
               <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Amount</label>
               <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
               <select name="payment_mode" class="form-select w-50 m-auto">
                <option>select payment mode</option>
                <option>Upi</option>
                <option>Netbanking</option>
                <option>Paypal</option>
                <option>Cash on delivery</option>
                <option>Pay Offline</option>
               </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
               <input type="submit" class="bg-info py-2 px-3 border-0" name="confirm_payment" value="Confirm">
            </div>
        </form>
    </div>
 </body>
 </html>
