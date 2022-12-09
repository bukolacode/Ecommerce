<?php
include ('../includes/function.php');

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Store - Registration</title>
    <!-- CSS only -->
    <link rel="shortcut icon" href="../img/logo2.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }
        input[type=number] {
        -moz-appearance: textfield;
        }
    </style>
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row align-items-center d-flex justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- Username field -->
                <div class="form-outline mb-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" class="form-control" placeholder="Enter your username"
                     autocomplete="off" name="user_username" required="required">
                </div>
                <!-- user_email field -->
                <div class="form-outline mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" class="form-control" placeholder="Enter your email"
                     autocomplete="off" name="user_email" required="required">
                </div>
                <!-- user_image field -->
                <div class="form-outline mb-4">
                    <label for="image" class="form-label">User Image</label>
                    <input type="file" id="image" class="form-control" name="user_image" required="required">
                </div>
                <!-- password field -->
                <div class="form-outline mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" class="form-control" placeholder="Enter your password"
                     autocomplete="off" name="user_password" required="required">
                </div>
                <!-- confirm password field -->
                <div class="form-outline mb-4">
                    <label for="confirm password" class="form-label">Confirm Password</label>
                    <input type="password" id="conf_user_password" class="form-control" placeholder="Enter your confirm password"
                     autocomplete="off" name="conf_user_password" required="required">
                </div>
                <!-- Address field -->
                <div class="form-outline mb-4">
                    <label for="Address" class="form-label">Address</label>
                    <input type="address" id="address" class="form-control" placeholder="Enter your Address"
                     autocomplete="off" name="user_address" required="required">
                </div>
                 <!-- contact field -->
                 <div class="form-outline mb-4">
                    <label for="contact" class="form-label">Contact</label>
                    <input type="number" id=" contact" class="form-control" placeholder="Enter your mobile number"
                     autocomplete="off" name="user_contact" required="required">
                </div>
                <div class="mt-4 pt-2">
                    <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="register">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ?<a href="login.php" class="text-danger"> Login</a></p>
                </div>
            </form>
        </div>
    </div>
    </div>
</body>
</html>


<!-- php code  -->

<?php

if (isset($_POST['register'])) {
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();

    $query = "SELECT * FROM users_table WHERE username = '$user_username' OR user_email = '$user_email'";
    $result = mysqli_query($conn,$query);
    $row_counts = mysqli_num_rows($result);
    if ($row_counts > 0) {
        echo "<script>alert('Username and email already exist')</script>";
    }elseif ($user_password!=$conf_user_password) {
        echo "<script>alert('Password do not match')</script>";
    }
    
    else {
        move_uploaded_file($user_tmp, "./image/$user_image");
    $sql = "INSERT INTO users_table (username,user_email,user_password,user_image,user_ip,user_address,user_mobile) 
    values ('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
    $query = mysqli_query($conn,$sql);
    
    }

// selecting cart_details    
   $sql_query = "SELECT *FROM cart_details WHERE ip_address = '$user_ip'";
   $result_query = mysqli_query($conn,$sql_query);
   $row_counts = mysqli_num_rows($result_query);
   if ($row_counts> 0) {
    $_SESSION['username'] = $user_username;
    echo "<script>alert('You have items in your cart')</script>";
    echo "<script>window.open('checkout.php', '_self')</script>";
   }else {
    // $_SESSION['username'] = $user_username;
    echo "<script>window.open('../index.php', '_self')</script>";
   }
  
}

?>
