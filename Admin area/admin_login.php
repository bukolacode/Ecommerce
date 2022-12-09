<?php
include ('../includes/function.php');
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ./index.php");
    exit;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="row d-flex justify-content-center align-items-center">
           <div class="col-lg-6 col-xl-5">
            <img src="../img/istockphoto-1262582481-612x612.jpg" alt="Admin Login" class="img-fluid">
           </div>
           <div class="col-lg-6 col-xl-4">
             <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" class="form-control" name="username" placeholder="Enter your username" required>
                </div>
                <div class="form-outline mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" class="form-control" name="password" placeholder="Enter your password" required>
                </div>
                <div>
                    <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="login">
                    <p class="small fw-bold mt-2 pt-1">Don't have an account <a href="./admin_registration.php" class="link-danger">Regisetr here</a></p>
                </div>
             </form>
           </div>
        </div>
    </div>
</body>
</html>

<!-- php code admin_login -->

<?php
  if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $select_query = "SELECT * FROM admin_table WHERE admin_name = '$username'";
    $result = mysqli_query($conn,$select_query);
    if(mysqli_num_rows($result) > 0){
        $dt = mysqli_fetch_assoc($result);
        $dbpass = $dt['admin_password'];
        if(password_verify($password, $dbpass)){
            $_SESSION['admin_name'] = $username;
            echo "<script>alert('Successfully login')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }else{
            echo "<script>alert('Invalid Credentials. Please check and try again')</script>";
        }
    }else{
        echo "<script>alert('User Not Found')</script>";
    }
    // $fetch = mysqli_fetch_assoc($result);
    // $counts = mysqli_num_rows($result);

    //if greter thn zeeo -== get user pword

    //use pword verify
    //if true /... crete session
    //else invlid credentils
    //else ccount does not exit
    // if ($counts < 1) {
        // $_SESSION['admin_name'] = $username;
    //    echo "<script>alert('Account does not exist')</script>";
    // }else{
        // 
        // if(password_verify($password, $fetch['admin_password'] )){
            // echo "<script>alert('Successfully Login')</script>";
        // }else {
            // echo "<script>alert(' incorrect info')</script>";
        // }
//    
    // }
  }
?>
