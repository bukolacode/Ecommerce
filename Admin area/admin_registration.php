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
    <title>Admin Registration</title>
     <!-- CSS only -->
     <link rel="shortcut icon" href="../img/logo2.jpg" type="image/x-icon">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <style>
        body{
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-3">Admin Registration</h2>
        <div class="row d-flex justify-content-center align-items-center">
           <div class="col-lg-6 col-xl-5">
            <img src="../img/istockphoto-1160018654-612x612.jpg" alt="Admin-Registration" class="img-fluid">
           </div>
           <div class="col-lg-6 col-xl-4">
             <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" class="form-control" name="username" placeholder="Enter your username" required>
                </div>
                <div class="form-outline mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" class="form-control" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-outline mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" class="form-control" name="password" placeholder="Enter your password" required>
                </div> <div class="form-outline mb-4">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" id="confirm_password" class="form-control" name="confirm_password" placeholder="Confirm your password" required>
                </div>
                <div>
                    <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="register">
                    <p class="small fw-bold mt-2 pt-1">Already have an account <a href="admin_login.php" class="link-danger">Login</a></p>
                </div>
             </form>
           </div>
        </div>
    </div>
</body>
</html>

<!-- php codes here -->
<?php

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    //check if $pword = $confirm_pword
    if ($password!=$confirm_password) {
        echo "<script>alert('Password do not match')</script>";
        exit();
    }
    //check if usernme or emil exist
    $query = "SELECT * FROM admin_table WHERE admin_name='$username' OR admin_email='$email'";
    $result = mysqli_query($conn,$query);
    $row_count = mysqli_num_rows($result);
    if ($row_count > 0) {
        echo "<script>alert('Username or email already exist')</script>";
        exit();
    //if exist return error
    //hsh pword then insert
    
    }else{
        
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO admin_table (admin_name,admin_email,admin_password) VALUES ('$username','$email','$hash_password')";
    $result = mysqli_query($conn,$sql);

    $_SESSION['admin_name'] = $username;
     echo "<script>window.open('./index.php','_self')</script>";
    }
}

?>
