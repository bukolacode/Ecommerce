<?php
include ('../includes/function.php');
session_start(); 

if (!isset($_SESSION['username'])) {
   header("location: ../index.php");
}


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> User Profile-Page</title>
     <!-- CSS only -->
     <link rel="shortcut icon" href="../img/logo2.jpg" type="image/x-icon">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>
    <style>
        .profile_img{
            width: 100%;
            height: 100px;
            object-fit: contain;
        }
        .edit_image{
            width: 100px;
            height: 100px;
            object-fit: contain;
        }
        body{
            overflow-x: hidden;
        }
    </style>
</head>
<body>
     <!-- first-child -->
     <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
  <a class="navbar-brand fw-bold fs-3" href="index.php" class=""><em>MyStore</em></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"><sup><?php cart_item(); ?></sup></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price:<?php total_price(); ?>/-</a>
        </li>
        
      </ul>
      <form class="d-flex" role="search" action="../search_product.php" method="get">
        <input class="form-control me-2" type="search" name="search_data" placeholder="Search" aria-label="Search">
        <input type="submit"  class="btn btn-outline-light P-3" value="Search" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

<!-- calling cart function -->
<?php 
  cart(); 
?>

<!-- second child -->
<nav  class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class='navbar-nav me-auto'>
      
      <?php
        if (!isset($_SESSION['username'])) {
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
          </li>";
        }else {
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome " .$_SESSION['username']."</a>
          </li>";
        }

      if (!isset($_SESSION['username'])) {
        echo "<li class='nav-item'>
        <a class='nav-link' href='./login.php'>Login</a>
        </li>";
      }else {
        echo "<li class='nav-item'>
        <a class='nav-link' href='./logout.php'>Logout</a>
        </li>";
      }

      ?>
    </ul>
</nav>
<!-- end nav -->
<!-- third child -->
<div class="bg-light">
    <h3 class="text-center">Home & Office Store</h3>
    <p class="text-center">Home of Appliance</p>
</div>
<!-- fourth child -->
    <div class="row">
        <div class="col-md-2">
            <ul class="navbar-nav bg-secondary text-center" style="height: 100vh;">
                <li class="nav-item bg-info">
                    <a href="" class="nav-link text-light"><h4>Your Profile</h4></a>
                </li>
                <?php
         $username = $_SESSION['username'];  
         $sql = "SELECT * FROM users_table WHERE username = '$username'";
         $result = mysqli_query($conn,$sql);
         $row = mysqli_fetch_array($result);
         $user_image = $row['user_image']; 
         echo "<li class='nav-item'>
                    <img src='./image/$user_image' alt='' class='profile_img my-4'>
               </li>"; 
       ?>        
                
                <li class="nav-item">
                  <a class="nav-link text-light" href="profile.php">Pending Orders</a>
                </li>
                <li class="nav-item">
                 <a class="nav-link text-light" href="profile.php?edit_account">Edit Account</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light" href="profile.php?my_orders">My Orders</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
                </li>
                <li class="nav-item">
                 <a class="nav-link text-light" href="./logout.php">Logout</a>
                </li>
            </ul>
        </div>
        <div class="col-md-10 text-center">
            <?php
             get_order_details(); 
             if (isset($_GET['edit_account'])) {
                include ('edit_account.php');
             }
             if (isset($_GET['my_orders'])) {
                include ('order_details.php');
             }
             if (isset($_GET['delete_account'])) {
              include ('delete_account.php');
           }
            
            ?>
        </div>
    </div>


    <!-- last child -->
    <?php include ('../includes/footer.php');?>
    </div>




    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" ></script>
</body>
</html>
