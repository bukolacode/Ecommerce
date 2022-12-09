<?php
 include ('./includes/function.php');
 session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <title>My store</title>
    <!-- CSS only -->
    <link rel="shortcut icon" href="./img/logo2.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
  /* .card{
    width: 90%;
    height: 90%;
    object-fit: contain; 
} */
.card-img-top{
    width: 100%;
    height: 50%;
    object-fit: contain;
}
</style>
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
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Product</a>
        </li>
        <?php
    if (isset($_SESSION['username'])) {
      echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/profile.php'>My Account</a>
        </li>";
    } else {
     echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/register.php'>Register</a>
        </li>";
    }
 ?>       
        
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./cart.php"><i class="fa-solid fa-cart-shopping"><sup><?php cart_item(); ?></sup></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price:<?php total_price(); ?>/-</a>
        </li>
        
      </ul>
      <form class="d-flex" role="search" action="search_product.php" method="get">
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
        <a class='nav-link' href='./users_area/login.php'>Login</a>
        </li>";
      }else {
        echo "<li class='nav-item'>
        <a class='nav-link' href='./users_area/logout.php'>Logout</a>
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

 <div class="row px-1">
    <div class="col-md-10">
      <!-- Product -->
      <div class="row">
        <!-- fetching Product -->
        <?php
        // calling function
        get_products();
        get_unique_categories();
        get_unique_brands();
        // $ip = getIPAddress();  
        // echo 'User Real IP Address - '.$ip; 
        ?>
      </div>
    </div>

    <div class="col-md-2 bg-secondary p-0">
       <!-- brand to bedisplayed -->
       <ul  class="navbar-nav me-auto text-center"> 
       <li class="nav-item bg-info">
          <a class="nav-link text-light" href="#"><h4>Delivery Brand</h4></a>
        </li>
        <?php
        // calling function
        getbrands();  
         ?>
       </ul>
       <!-- categories to be displayed -->

       <ul  class="navbar-nav me-auto text-center"> 
       <li class="nav-item bg-info">
          <a class="nav-link text-light" href="#"><h4>Categories</h4></a>
        </li>
        <?php
         getcategories();
        ?>
      
       </ul>

    </div>
 </div>
<!-- last child -->
    <?php include ('./includes/footer.php');?>
    </div>




    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" ></script>
</body>
</html>
