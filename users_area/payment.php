<?php
include ('../includes/function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Option-Page</title>
     <!-- CSS only -->
     <link rel="shortcut icon" href="../img/logo2.jpg" type="image/x-icon">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>
    <style>
       .payment_img{
            width: 90%;
            margin: auto;
            display: block;
        }
    </style>
</head>
<body>
    <!-- php code to get user_id -->
    <?php
   $user_ip = getIPAddress();
   $get_user = "SELECT * FROM users_table WHERE user_ip = '$user_ip'";
   $result = mysqli_query($conn, $get_user);
   $fetch_data = mysqli_fetch_array($result);
   $user_id = $fetch_data['user_id'];


?>
    <div class="container">
        <h2 class="text-center text-info">Payment Option</h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
               <a href="https//:www.1app.ng" target="_blank">
                <img src="../img/online-payment-gateway.jpg" alt="" class="payment_img">
              </a>
            </div>
            <div class="col-md-6">
               <a href="./order.php?user_id=<?php echo $user_id ?>">
                <h2 class="text-info text-center">Payment Offline</h2>
              </a>
            </div>
            
        </div>
    </div>
</body>
</html>
