<?php
  include ('../includes/connect_db.php');
  // Check if the user is already logged in, if yes then redirect him to welcome page

  if (isset($_POST['insert_cat'])) {
  $category_title = $_POST['cat_title'];

  //select data from database
  $sql = "SELECT * FROM categories WHERE category_title = '$category_title'";
  $result = mysqli_query($conn,$sql);
  $rows = mysqli_num_rows($result);
  if ($rows > 0) {
    echo "<script>alert('This category is present inside the database')</script>";
  }else {
    $query = "INSERT INTO categories (category_title) VALUES ('$category_title')";
  $result = mysqli_query($conn,$query);
   if ($result) {
     echo "<script>alert('Categories has been inserted Successfully')</script>";
     }
  } 
  }

?>
<h2 class="text-center">Insert Categories</h2>
<form action="" method="POST" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text  bg-info" id="basic-addon1">
  <i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="cat_title" 
  placeholder="Insert_Categories" aria-label="Categories" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
  <input type="submit" class="bg-info p-2 m-3 border-o" name="insert_cat" 
  value="Insert_Categories">
</div>
</form>
