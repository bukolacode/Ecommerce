<?php

include ('../includes/function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Store - Login-Page</title>
    <!-- CSS only -->
    <link rel="shortcut icon" href="../img/logo2.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>


    <style>
        body{
            overflow-x: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
        <div class="row align-items-center d-flex justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post">
                <!-- Username field -->
                <div class="form-outline mb-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" class="form-control" placeholder="Enter your username"
                     autocomplete="off" name="user_username" required="required">
                </div>
                <!-- password field -->
                <div class="form-outline mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" class="form-control" placeholder="Enter your password"
                     autocomplete="off" name="user_password" required="required">
                </div>
                <div class="mt-4 pt-2">
                    <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="login">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account ?<a href="register.php" class="text-danger">Register</a></p>
                </div>
            </form>

        </div>
    </div>
    </div>
</body>
</html>
  
<!-- php code loggin -->


<?php

if (isset($_POST['login'])) {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    $sql = "SELECT * FROM users_table WHERE username = '$user_username'";
    $result = mysqli_query($conn,$sql);
    $row_counts = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();

    // crt items
    $query = "SELECT * FROM cart_details WHERE ip_address = '$user_ip'";
    $result_cart = mysqli_query($conn,$query);
    $row_counts_cart = mysqli_num_rows($result_cart);
    if ($row_counts > 0) {
        $_SESSION['username'] = $user_username;
        if (password_verify($user_password, $row_data['user_password'])) {
                            
                $_SESSION["username"] = $user_username;  
            if ($row_counts == 1 and $row_counts_cart == 0) {
                
                echo "<script>alert('Successfully login')</script>";
                echo "<script>window.open('profile.php', '_self')</script>";
            }else {
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Successfully login')</script>";
                echo "<script>window.open('payment.php', '_self')</script>";
            }
        } else {
            echo "<script>alert('Invalid Credientials')</script>";
        }
    }else {
        echo "<script>alert('Invalid Credientials')</script>";
    }
}
?>
