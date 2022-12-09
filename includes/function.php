<?php
include("connect_db.php");


// getting function

  function get_products(){
      global $conn;
      // condition to check isset or not
      if (!isset($_GET['category'])) {
      if (!isset($_GET['brand'])) {
    $query = "SELECT * FROM products ORDER BY rand() LIMIT 0,9";
          $result = mysqli_query($conn,$query);
          // echo
          while ($row = mysqli_fetch_assoc($result)) {
            $product_id =  $row['product_id'];
            $product_title =  $row['product_title'];
            $product_description =  $row['product_description'];
            // $product_keywords =  $row['product_keywords'];
            $product_image1 =  $row['product_image1'];
            $product_price =  $row['product_price'];
            $category_id =  $row['category_id'];
            $brand_id =  $row['brand_id'];
            echo " <div class='col-md-4 mb-2'>
            <div class='card'>
            <img src='./Admin area/product_image/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                <a href='product_details.php?product_id=$product_id'class='btn btn-secondary'>View more</a>
            </div>
            </div>
        </div>";
          }


  }
}
}


// getting all product
   
function get_all_products(){
    global $conn;

    // condition to check isset or not
    if (!isset($_GET['category'])) {
    if (!isset($_GET['brands'])) {
  $query = "SELECT * FROM products ORDER BY rand()";
        $result = mysqli_query($conn,$query);
        // echo
        while ($row = mysqli_fetch_assoc($result)) {
          $product_id =  $row['product_id'];
          $product_title =  $row['product_title'];
          $product_description =  $row['product_description'];
          // $product_keywords =  $row['product_keywords'];
          $product_image1 =  $row['product_image1'];
          $product_price =  $row['product_price'];
          $category_id =  $row['category_id'];
          $brand_id =  $row['brand_id'];
          echo " <div class='col-md-4 mb-2'>
          <div class='card'>
          <img src='./Admin area/product_image/$product_image1' class='card-img-top' alt='$product_title'>
          <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <p class='card-text'>Price: $product_price/-</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
              <a href='product_details.php?product_id=$product_id'class='btn btn-secondary'>View more</a>
          </div>
          </div>
      </div>";
        }


}
}
}


// getting unique categories

function get_unique_categories(){
    global $conn;
   if (isset($_GET['category'])) {
    $category_id = $_GET['category'];
  $query = "SELECT * FROM products WHERE category_id = $category_id";
        $result = mysqli_query($conn,$query);
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
            echo "<h2 class='text-center text-danger'> No stock for this Category</h2>";
        }
        while ($row = mysqli_fetch_assoc($result)) {
          $product_id =  $row['product_id'];
          $product_title =  $row['product_title'];
          $product_description =  $row['product_description'];
          // $product_keywords =  $row['product_keywords'];
          $product_image1 =  $row['product_image1'];
          $product_price =  $row['product_price'];
          $category_id =  $row['category_id'];
          $brand_id =  $row['brand_id'];
          echo " <div class='col-md-4 mb-2'>
          <div class='card'>
          <img src='./Admin area/product_image/$product_image1' class='card-img-top' alt='$product_title'>
          <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <p class='card-text'>Price: $product_price/-</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
              <a href='product_details.php?product_id=$product_id'class='btn btn-secondary'>View more</a>
          </div>
          </div>
      </div>";
        }


}
}
// getting unique brand
function get_unique_brands(){
    global $conn;
   if (isset($_GET['brand'])) {
    $brand_id = $_GET['brand'];
    $query = "SELECT * FROM products WHERE brand_id = $brand_id";
        $result = mysqli_query($conn,$query);
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
            echo "<h2 class='text-center text-danger'>This Brand is not available for this service</h2>";
        }
        while ($row = mysqli_fetch_assoc($result)) {
          $product_id =  $row['product_id'];
          $product_title =  $row['product_title'];
          $product_description =  $row['product_description'];
          // $product_keywords =  $row['product_keywords'];
          $product_image1 =  $row['product_image1'];
          $product_price =  $row['product_price'];
          $category_id =  $row['category_id'];
          $brand_id =  $row['brand_id'];
          echo " <div class='col-md-4 mb-2'>
          <div class='card'>
          <img src='./Admin area/product_image/$product_image1' class='card-img-top' alt='$product_title'>
          <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <p class='card-text'>Price: $product_price/-</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
              <a href='product_details.php?product_id=$product_id'class='btn btn-secondary'>View more</a>
          </div>
          </div>
      </div>";
        }


}
}

 
  // displaying brand in sidenav

   function getbrands(){
    global $conn;
    $sql = "SELECT * FROM brands"; 
    $result = mysqli_query($conn,$sql);
    while ($data = mysqli_fetch_assoc($result)) {
        $row = $data['brand_title'];
        $row_id = $data['brand_id'];
        echo " <li class='nav-item'>
        <a class='nav-link text-light' href='index.php?brand=$row_id'>$row</a>
    </li>";
    }
   }

   // displaying categories in sidenav
  function getcategories(){
    global $conn;
    $sql = "SELECT * FROM categories"; 
    $result = mysqli_query($conn,$sql);
    while ($data = mysqli_fetch_assoc($result)) {
        $row = $data['category_title'];
        $row_id = $data['category_id'];
        echo " <li class='nav-item'>
        <a class='nav-link text-light' href='index.php?category=$row_id'>$row</a>
    </li>";
    }
}

//  search product function
 function search_product(){
    global $conn;
      // condition to check isset or not
      if (isset($_GET['search_data_product'])) {
        $search_value = $_GET['search_data'];
    $query = "SELECT * FROM products WHERE product_keywords LIKE '%$search_value%'";
          $result = mysqli_query($conn,$query);
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
            echo "<h2 class='text-center text-danger'>No results match. No products found on this category!</h2>";
        }
          while ($row = mysqli_fetch_assoc($result)) {
            $product_id =  $row['product_id'];
            $product_title =  $row['product_title'];
            $product_description =  $row['product_description'];
            // $product_keywords =  $row['product_keywords'];
            $product_image1 =  $row['product_image1'];
            $product_price =  $row['product_price'];
            $category_id =  $row['category_id'];
            $brand_id =  $row['brand_id'];
            echo " <div class='col-md-4 mb-2'>
            <div class='card'>
            <img src='./Admin area/product_image/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                <a href='product_details.php?product_id=$product_id'class='btn btn-secondary'>View more</a>
            </div>
            </div>
        </div>";
          }
  }
   
}

// getting vview details

function view_details(){
  global $conn;
      // condition to check isset or not
      if (isset($_GET['product_id'])) {
      if (!isset($_GET['category'])) {
      if (!isset($_GET['brands'])) {
        $product_id = $_GET['product_id'];
    $query = "SELECT * FROM products WHERE product_id = $product_id";
          $result = mysqli_query($conn,$query);
          // echo
          while ($row = mysqli_fetch_assoc($result)) {
            $product_id =  $row['product_id'];
            $product_title =  $row['product_title'];
            $product_description =  $row['product_description'];
            // $product_keywords =  $row['product_keywords'];
            $product_image1 =  $row['product_image1'];
            $product_image2 =  $row['product_image2'];
            $product_image3 =  $row['product_image3'];
            $product_price =  $row['product_price'];
            $category_id =  $row['category_id'];
            $brand_id =  $row['brand_id'];
            echo " <div class='col-md-4 mb-2'>
            <div class='card'>
            <img src='./Admin area/product_image/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                <a href='index.php'class='btn btn-secondary'>Go home</a>
            </div>
            </div>
        </div>
        
        <div class='col-md-8'>
        <div class='row'>
            <div class='col-md-12'>
                <h4 class='text-center text-info mb-5'>Related products</h4>
            </div>
            <div class='col-md-6'>
               <img src='./Admin area/product_image/$product_image2' class='card-img-top' alt='$product_title'>
            </div>
            <div class='col-md-6'>
              <img src='./Admin area/product_image/$product_image3' class='card-img-top' alt='$product_title'>
            </div>
        </div>
     </div>";
          }
  }
}
}
}

 // getting ip address

      function getIPAddress() {  
        //whether ip is from the share internet  
        if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                    $ip = $_SERVER['HTTP_CLIENT_IP'];  
            }  
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
        }  
       //whether ip is from the remote address  
        else{  
                $ip = $_SERVER['REMOTE_ADDR'];  
        }  
        return $ip;  
      }  
      // $ip = getIPAddress();  
      // echo 'User Real IP Address - '.$ip; 
      
      // cart function
      function cart(){
      if (isset($_GET['add_to_cart'])) {
        global $conn;
        $ip = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $query = "SELECT * FROM cart_details WHERE ip_address = '$ip' AND product_id =$get_product_id";
        $result = mysqli_query($conn, $query);
        $rows = mysqli_num_rows($result);
        if ($rows > 0) {
            echo "<script>alert('This item is already present inside cart')</script>";
            echo "<script>window.open('index.php'. '_self')</script>";
        }else {
          $query = "INSERT INTO cart_details (product_id, ip_address, quantity) Values ('$get_product_id', '$ip', '0')";
          $result = mysqli_query($conn, $query);
          echo "<script>alert('item is added cart')</script>";
          echo "<script>window.open('index.php'. '_self')</script>";
        }
      }
    }


    // function to get cart item
    function cart_item(){
      if (isset($_GET['add_to_cart'])) {
        global $conn;
        $ip = getIPAddress();
        $query = "SELECT * FROM cart_details WHERE ip_address = '$ip'";
        $result = mysqli_query($conn, $query);
        $count_items = mysqli_num_rows($result);
        }else {
          global $conn;
          $ip = getIPAddress();
          $query = "SELECT * FROM cart_details WHERE ip_address = '$ip'";
          $result = mysqli_query($conn, $query);
          $count_items = mysqli_num_rows($result);
        }
        echo $count_items;
      }

  // total price function

  function total_price(){
    global $conn;
    $ip = getIPAddress();
    $total_price = "0";
    $query1= "SELECT * FROM cart_details WHERE ip_address = '$ip'";
    $result = mysqli_query($conn,$query1);
    while ($row=mysqli_fetch_array($result)) {
      $product_id = $row['product_id'];
     $query2 = "SELECT * FROM products WHERE product_id = '$product_id'"; 
     $result_product = mysqli_query($conn, $query2);
     while ($row_product=mysqli_fetch_array($result_product)) {
      $product_price = array($row_product['product_price']);
      $product_values = array_sum($product_price);
      $total_price+=$product_values;
     }
    }
    echo $total_price;
  }



  // getting user orders details
  function get_order_details(){
    global $conn;
    $username = $_SESSION['username']; 
    $get_details = "SELECT * FROM users_table WHERE username = '$username'";
    $result_query = mysqli_query($conn,$get_details);
    while ($row_query = mysqli_fetch_array($result_query)) {
      $user_id = $row_query['user_id'];
      if (!isset($_GET['edit_account'])) {
        if (!isset($_GET['my_orders'])) {
          if (!isset($_GET['delete_account'])) {
            $get_order = "SELECT * FROM user_order WHERE user_id = '$user_id' AND order_status ='pending'";
            $result_order = mysqli_query($conn,$get_order);
            $row_counts = mysqli_num_rows($result_order);
            if ($row_counts > 0) {
              echo "<h3 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'> $row_counts </span>pending order</h3>
                    <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
                  
            }else {
              echo "<h3 class='text-center text-success mt-5 mb-2'>You have zero pending order</h3>
              <p class='text-center'><a href='../index.php' class='text-dark'>Explore Products</a></p>";
            }
          }
        }
      }
    }
  }
    
?>
