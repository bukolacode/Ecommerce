<?php
 
   if (isset($_GET['delete_payment'])) {
     $delete_payment= $_GET['delete_payment'];

    //  delete query
    $delete_pay = "DELETE FROM user_payment WHERE payment_id ='$delete_payment'";
    $result = mysqli_query($conn,$delete_pay);
    if ($result) {
        echo "<script>alert('Payment is been deleted successfully')</script>";
        echo "<script>window.open('./index.php?list_payments','_self')</script>";
    }
   }

?>
