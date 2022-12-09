<?php
 include ('../includes/connect_db.php');
 

 if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';

    // accessing image
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];
    
    // accessing image tmp
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    // checking empty condition
    if ($product_title=='' or $description=='' or $product_keywords=='' or $product_category=='' or
        $product_brand=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3=='') {
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    }else {
        move_uploaded_file($temp_image1,"./product_image/$product_image1");
        move_uploaded_file($temp_image2,"./product_image/$product_image2");
        move_uploaded_file($temp_image3,"./product_image/$product_image3");
    }

    //insert into database

    $sql = "INSERT INTO products (product_title, product_description, product_keywords, category_id, brand_id,
            product_image1, product_image2, product_image3, product_price, date, status) 
            VALUES ('$product_title','$description','$product_keywords','$product_category', '$product_brand',
            '$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Successfully inserted the products')</script>";
    }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert product-Admin Dashboard</title>
      <!-- CSS only -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
    </div>
    <!-- form -->
    <form action="" method="post" enctype="multipart/form-data">
        <!-- title -->
        <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_title" class="form-label">Product Title</label>
        <input type="text" name="product_title" id="product_title"
        class="form-control" placeholder="Enter Product Title" autocomplete="off" required>
        </div>
        <!-- description -->
        <div class="form-outline mb-4 w-50 m-auto">
        <label for="description" class="form-label">Product Description</label>
        <input type="text" name="description" id="description"
        class="form-control" placeholder="Enter Description" autocomplete="off" required>
        </div>
        <!-- product keyword -->
        <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_keywords" class="form-label">Product Keywords</label>
        <input type="text" name="product_keywords" id="product_keywords"
        class="form-control" placeholder="Enter product keywords" autocomplete="off" required>
        </div>
        <!-- categories -->
        <div class="form-outline mb-4 w-50 m-auto">
          <select name="product_category" id="" class="form-select">
            <option value="">Select a Category</option>
             <?php
                $query = "SELECT * FROM categories";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $data_title = $row['category_title'];
                    $data_id = $row['category_id'];
                    echo "<option value='$data_id'>$data_title</option>";
                }             
                            
            ?>    

          </select>
        </div>
        <!-- Brands -->
        <div class="form-outline mb-4 w-50 m-auto">
          <select name="product_brand" id="" class="form-select">
            <option value="">Select a Brands</option>  
            <?php
                $query = "SELECT * FROM brands";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $data_title = $row['brand_title'];
                    $data_id = $row['brand_id'];
                    echo "<option value='$data_id'>$data_title</option>";
                }             
                            
            ?>
          </select>
        </div>
        <!--  image 1-->
        <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_image1" class="form-label">Product Image 1</label>
        <input type="file" name="product_image1" id="product_image1"
        class="form-control" required>
        </div>
        <!-- image 2 -->
        <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_image2" class="form-label">Product Image 2</label>
        <input type="file" name="product_image2" id="product_image2"
        class="form-control" required>
        </div>
        <!-- image 3 -->
        <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_image1" class="form-label">Product Image 1</label>
        <input type="file" name="product_image3" id="product_image3"
        class="form-control" required>
        </div>
        <!-- product price -->
        <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_price" class="form-label">Product Price</label>
        <input type="text" name="product_price" id="product_price"
        class="form-control" placeholder="Enter product price" autocomplete="off" required>
        </div>
        <!-- product keyword -->
        <div class="form-outline mb-4 w-50 m-auto">
        <input type="submit" name="insert_product" class="btn btn-info mb-3 p-3" value="Insert Product">
        </div>
    </form>


    <!-- JavaScript Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" ></script>
</body>
</html>
