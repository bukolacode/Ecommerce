<?php
  include ('../includes/connect_db.php');
 



  if (isset($_POST['insert_brand'])) {
  $brand_title = $_POST['brand_title'];

  //select data from database
  $sql = "SELECT * FROM brands WHERE brand_title = '$brand_title'";
  $result = mysqli_query($conn,$sql);
  $rows = mysqli_num_rows($result);
  if ($rows > 0) {
    echo "<script>alert('This Brand is present inside the database')</script>";
  }else {
    $query = "INSERT INTO brands (brand_title) VALUES ('$brand_title')";
    $result = mysqli_query($conn,$query);
   if ($result) {
     echo "<script>alert('Brand has been inserted Successfully')</script>";
     }
  } 
  }

?>

<h2 class="text-center">Insert Brands</h2>
<form action="" method="POST" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text  bg-info" id="basic-addon1">
  <i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="brand_title" 
  placeholder="Insert Brands" aria-label="Brand" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
  <input type="submit" class="bg-info p-2 m-3 border-o" name="insert_brand" 
  value="Insert Brands" aria-label="Insert Brands">
</div>
</form>
