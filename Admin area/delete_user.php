<?php
 
   if (isset($_GET['delete_user'])) {
     $delete_user= $_GET['delete_user'];

    //  delete query
    $delete_user = "DELETE FROM users_table WHERE user_id ='$delete_user'";
    $result = mysqli_query($conn,$delete_user);
    if ($result) {
        echo "<script>alert(User is been deleted successfully')</script>";
        echo "<script>window.open('./index.php?users_list','_self')</script>";
    }
   }

?>
