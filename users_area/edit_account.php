<?php

if (isset($_GET['edit_account'])) {
    $user_update = $_SESSION['username'];  
    $sql = "SELECT * FROM users_table WHERE username = '$user_update'";
    $result = mysqli_query($conn,$sql);
    $row_fetch = mysqli_fetch_assoc($result);
    $user_id = $row_fetch['user_id'];
    $username = $row_fetch['username'];
    $user_email = $row_fetch['user_email'];
    $user_address = $row_fetch['user_address'];
    $user_mobile = $row_fetch['user_mobile'];

}
    if (isset($_POST['update'])) {
        $update_id = $user_id;
        $username = $_POST['user_username'];
        $user_email = $_POST['user_email'];
        $user_address = $_POST['user_address'];
        $user_mobile = $_POST['user_mobile'];
        $user_image = $_FILES['user_image']['name'];
        $user_tmp = $_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_tmp, "./image/$user_image");

        // update query

        $update = "UPDATE users_table SET username = '$username', user_email = '$user_email', user_image = '$user_image', 
                   user_address = '$user_address', user_mobile = '$user_mobile' WHERE user_id = '$update_id'";
        $query = mysqli_query($conn,$update);
        if ($query) {
            echo "<script>alert('Data updated successfull')</script>";
            echo "<script>window.open('./logout.php','_self')</script>";
        }
    }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>
<body>
    <h3 class="text-success mb-4">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $username ?>" name="user_username">
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" value="<?php echo $user_email ?>" name="user_email">
        </div>
        <div class="form-outline mb-4 d-flex  w-50 m-auto">
            <input type="file" class="form-control m-auto" name="user_image">
            <img src="./image/<?php echo $user_image ?>" alt="" class="edit_image">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_address ?>" name="user_address">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_mobile ?>" name="user_mobile">
        </div>
        <input type="submit" class="bg-info py-2 px-3 border-0" value="Update" name="update">
    </form>
</body>
</html>
