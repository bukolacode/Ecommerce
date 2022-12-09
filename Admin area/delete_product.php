<?php

if (isset($_GET['delete_product'])) {
    $delete_id = $_GET['delete_product'];

    // delete query

   $delete_product = "DELETE FROM products WHERE product_id=' $delete_id'"; 
   $result = mysqli_query($conn,$delete_product);
   if ($result) {
      echo "<script>alert('Product deleted Successfuly')</script>";
      echo "<script>window.open('./index.php','_self')</script>";
   }

}
?>
