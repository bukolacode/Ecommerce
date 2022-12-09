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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <title>Admin Dashboard</title>
     <!-- CSS only -->
     <link rel="shortcut icon" href="../img/logo2.jpg" type="image/x-icon">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
    /* .admin-image{
        width: 80px;
        object-fit: contain;
      }
      */ 
      .footer{
        position: absolute;
        bottom: 0;
      } 
      body{
        overflow-x: hidden;
      }
      .product_img{
        width: 70px;
      }
</style>
</head>
<body>
   <!-- Navbar -->
   <div class="container-fluid p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
      <div class="container-fluid">
         <a href="" class="navbar-brand"> My Store</a>
         <nav class="navbar navbar-expand-lg">
          <ul class="navbar-nav">
          <?php
        if (!isset($_SESSION['admin_name'])) {
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
          </li>";
        }else {
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome " .$_SESSION['admin_name']."</a>
          </li>";
        }

      ?>
          </ul>
         </nav>
      </div>
    </nav>
    <!-- second child -->
    <div class="bg-light">
      <h3 class="text-center">Manage Details</h3>
    </div>

    <!-- third child -->
    <div class="row">
      <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
        <div class="p-2">
          <a href=""><img src="../img/profile.jpg" alt="" width="100" object-fit="contain"></a>
          <?php
        if (!isset($_SESSION['admin_name'])) {
          echo "<p class='text-light text-center'>Admin Name</p>";
        }else {
          echo "<p>Hello " .$_SESSION['admin_name']."</p>";
        }

      ?>
      </p>
        </div>
        <!-- button*10>a.nav-link.text-center.bg-info.my-1 -->
        <div class="button text-center p-3">
        <button><a href="./insert_product.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
        <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Products</a></button>
        <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
        <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View Categories</a></button>
        <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
        <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a></button>
        <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All Orders</a></button>
        <button><a href="index.php?list_payments" class="nav-link text-light bg-info my-1">All Payments</a></button>
        <button><a href="index.php?users_list" class="nav-link text-light bg-info my-1">Users List </a></button>
       <?php
        if (!isset($_SESSION['admin_name'])) {
          echo "<button>
          <a class='nav-link text-light bg-info my-1' href='./admin_login.php'>Login</a>
          </button>";
        }else {
          echo "<button>
          <a class='nav-link text-light bg-info my-' href='./admin_logout.php'>Logout</a>
          </button>";
        }
       ?>
        </div>
      </div>
    </div>

    <!-- forth child -->
    <div class="container my-3">
      <?php 
       if (isset($_GET['insert_category'])) {
        include('insert_categories.php');
       }
       if (isset($_GET['insert_brand'])) {
        include('insert_brands.php');
       }
       if (isset($_GET['view_products'])) {
        include('view_products.php');
       }
       if (isset($_GET['edit_products'])) {
        include('edit_products.php');
       }
       if (isset($_GET['delete_product'])) {
        include('delete_product.php');
       }
       if (isset($_GET['view_categories'])) {
        include('view_categories.php');
       }
       if (isset($_GET['view_brands'])) {
        include('view_brands.php');
       }
       if (isset($_GET['edit_category'])) {
        include('edit_category.php');
       }
       if (isset($_GET['edit_brands'])) {
        include('edit_brands.php');
       }
       if (isset($_GET['delete_category'])) {
        include('delete_category.php');
       }
       if (isset($_GET['delete_brands'])) {
        include('delete_brands.php');
       }
       if (isset($_GET['list_orders'])) {
        include('list_orders.php');
       }
       if (isset($_GET['list_payments'])) {
        include('list_payments.php');
       }
       if (isset($_GET['users_list'])) {
        include('users_list.php');
       }
      ?>
    </div>


    <!-- last child -->
    <?php include ('../includes/footer.php');?>
    
   </div>



 <!-- JavaScript Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" ></script>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
 integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" 
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" 
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
