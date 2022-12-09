<?php
 
   if (isset($_GET['delete_orders'])) {
     $delete_order= $_GET['delete_orders'];

    //  delete query
    $delete_order = "DELETE FROM user_order WHERE order_id ='$delete_order'";
    $result = mysqli_query($conn,$delete_order);
    if ($result) {
        echo "<script>alert(Order is been deleted successfully')</script>";
        echo "<script>window.open('./index.php?list_orders','_self')</script>";
    }
   }

?>
