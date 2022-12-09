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
    <title>My Store - Cart Page</title>
    <!-- CSS only -->
    <link rel="shortcut icon" href="./img/logo2.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>
</head>
<style>
  .card{
    width: 100%;
    height: 100%;
    object-fit: contain; 
}
.crt_img{
    width: 80px;
    height: 80px;
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
      </ul>
    </div>
  </div>
</nav>


<!-- second child -->
<nav  class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
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

<!-- fourth child table -->
<div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-bordered text-center">
            <tbody>
           
                <!-- to display cart -->
                <?php
     $ip = getIPAddress();
     $total_price = 0;
     $query1= "SELECT * FROM cart_details WHERE ip_address = '$ip'";
     $result = mysqli_query($conn,$query1);
     $counts = mysqli_num_rows($result);
     if ($counts > 0) {
        echo "<thead>
        <tr>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Remove</th>
            <th colspan='2'>Operations</th>
        </tr>
    </thead>
    <tbody>";
     while ($row=mysqli_fetch_array($result)) {
       $product_id = $row['product_id'];
      $query2 = "SELECT * FROM products WHERE product_id = '$product_id'"; 
      $result_product = mysqli_query($conn, $query2);
      while ($row_product=mysqli_fetch_array($result_product)) {
       $product_price = array($row_product['product_price']);
       $price_table = $row_product['product_price'];
       $product_title = $row_product['product_title'];
       $product_image1 = $row_product['product_image1'];
       $product_values = array_sum($product_price);
       $total_price+=$product_values;
     
                
    ?>            
                <tr>
                    <td><?php echo $product_title ?></td>
                    <td><img src="./Admin area/product_image/<?php echo $product_image1 ?>" alt="" class="crt_img"></td>
                    <td><input type="text" name="qty" id="" class="form-input w-50"></td>
               <?php
               $ip = getIPAddress();
               if (isset($_POST['update_cart'])) {
                $quantities = $_POST['qty'];
                $update = "UPDATE cart_details SET quantity='$quantities' WHERE ip_address='$ip'";
                $result_qty = mysqli_query($conn, $update);
                $total_price = $total_price*$quantities;
               } 
               ?>
                    <td><?php echo $price_table?>/-</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id  ?>"></td>
                    <td>
                        <input type="submit" value="Update Cart" 
                        class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">
                        <input type="submit" value="Remove Cart" 
                        class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">
                    </td>
                </tr>
                <?php }
                  }
                }else {
                  echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                }
                
                ?>
                
            </tbody>
        </table>
        <!-- subtotal -->
        <div class="d-flex mb-5">
         <?php
   $ip = getIPAddress();
   $query1= "SELECT * FROM cart_details WHERE ip_address = '$ip'";
   $result = mysqli_query($conn,$query1);
   $counts = mysqli_num_rows($result);
   if ($counts > 0) {

?>
        <h4 class="px-3">Subtotal: <strong class='text-info'> <?php echo $total_price ?> /-</strong></h4>
         <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>
         <button class='bg-secondary px-3 py-2 border-0'><a href="./users_area/checkout.php" class='text-light text-decoration-none'>Checkout</a></button>
       <?php
       }else{
        echo "<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>";
       }

       if (isset($_POST['continue_shopping'])) {
          echo "<script>window.open('index.php','_self')</script>";
       }
       ?>     
        </div>
    </div>
</div>
</form>



<!-- function to remove -->
<?php
function remove_cart_item(){
  global $conn;
  if (isset($_POST['remove_cart'])) {
    foreach ($_POST['removeitem'] as $remove_id) {
       echo $remove_id;
       $delete_query = "DELETE FROM cart_details WHERE product_id = $remove_id";
       $run_delete = mysqli_query($conn, $delete_query);
       if ($run_delete) {
         echo "<script>window.open('cart.php', '_self')</script>";
       }

    }
  }

}
  echo $remove_item = remove_cart_item();
?>

<!-- last child -->
    <?php include ('./includes/footer.php');?>
    </div>




    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" ></script>
</body>
</html>
