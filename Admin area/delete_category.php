<?php
 
   if (isset($_GET['delete_category'])) {
     $delete_category= $_GET['delete_category'];

    //  delete query
    $delete_cat = "DELETE FROM categories WHERE category_id ='$delete_category'";
    $result = mysqli_query($conn,$delete_cat);
    if ($result) {
        echo "<script>alert('Category is been deleted successfully')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }
   }

?>
