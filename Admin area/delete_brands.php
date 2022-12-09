<?php
 
   if (isset($_GET['delete_brands'])) {
     $delete_brand= $_GET['delete_brands'];

    //  delete query
    $delete_brand = "DELETE FROM brands WHERE brand_id ='$delete_brand'";
    $result = mysqli_query($conn,$delete_brand);
    if ($result) {
        echo "<script>alert('Brand is been deleted successfully')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }
   }

?>
