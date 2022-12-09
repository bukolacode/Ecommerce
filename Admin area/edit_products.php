<?php



 if (isset($_GET['edit_products'])) {
    $edit_id = $_GET['edit_products'];
    // echo $edit_id ;
    $get_data = "SELECT *FROM products WHERE product_id = '$edit_id'";
    $result = mysqli_query($conn,$get_data);
    $row = mysqli_fetch_assoc($result);
    $product_title = $row['product_title'];
    $product_desc = $row['product_description'];
    $product_keywords = $row['product_keywords'];
    $category = $row['category_id'];
    $brand_id = $row['brand_id'];
    $product_img1 = $row['product_image1'];
    $product_img2 = $row['product_image2'];
    $product_img3 = $row['product_image3'];
    $product_price = $row['product_price'];

    // fetching category name
    $select_catgogry = "SELECT * FROM categories WHERE category_id='$category'";
    $result_query = mysqli_query($conn,$select_catgogry);
    $rows_cat = mysqli_fetch_assoc($result_query);
    $category_title = $rows_cat['category_title'];
   

    // fetching brand name
    $select_brand = "SELECT * FROM brands WHERE brand_id='$brand_id'";
    $result_brand = mysqli_query($conn,$select_brand);
    $rows_brd = mysqli_fetch_assoc($result_brand);
    $brand_title = $rows_brd['brand_title'];
   
 }

?>

<div class="container mt-5">
    <h3 class="text-center">Edit Products</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" name="product_title" value="<?php echo $product_title ?>" class="form-control" required>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_desc" class="form-label">Product Description</label>
            <input type="text" id="product_desc" name="product_description" value="<?php echo $product_desc ?>" class="form-control" required>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" id="product_keywords" name="product_keywords" value="<?php echo $product_keywords ?>" class="form-control" required>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_category" class="form-label">Product Categories</label>
           <select name="category_id" id="" class="form-select">
            <option value="<?php echo $category_title ?>"><?php echo $category_title ?></option>
           <?php
            // fetching ctegorynme
    $select_all = "SELECT * FROM categories";
    $result_all = mysqli_query($conn,$select_all);
    while($rows = mysqli_fetch_assoc($result_all)){;
    $category_title = $rows['category_title'];
    $category_id = $rows['category_id'];
    echo "<option value='$category_id'>$category_title </option>";
    }
    ?>
           </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_brands" class="from-label">Product Brands</label>
           <select name="brand_id" id="" class="form-select">
           <option value="<?php echo $brand_title ?>"><?php echo $brand_title ?></option>
           <?php
            // fetching ctegorynme
    $select_brd = "SELECT * FROM brands";
    $result_brd = mysqli_query($conn,$select_brd);
    while($rows = mysqli_fetch_assoc($result_brd)){;
    $brand_title = $rows['brand_title'];
    $brand_id = $rows['brand_id'];
    echo "<option value='$brand_id'>$brand_title </option>";
    }
    ?>
        
           </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">Product Image1</label>
            <div class="d-flex">
            <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto">
            <img src="./product_image/<?php echo $product_img1 ?>" alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label">Product Image2</label>
            <div class="d-flex">
            <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto">
            <img src="./product_image/<?php echo $product_img2 ?>" alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image3" class="form-label">Product Image3</label>
            <div class="d-flex">
            <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto">
            <img src="./product_image/<?php echo $product_img3 ?>" alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" id="product_price" name="product_price" value="<?php echo $product_price ?>" class="form-control" required>
        </div>
        <div class="w-50 m-auto">
            <input type="submit" name="edit_product" value="Update Product" class="btn btn-info border-0 px-3 mb-3">
        </div>
    </form>
</div>



<?php
if (isset($_POST['edit_product'])) {
    $product_title = $_POST['product_title'];
    $product_desc = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['category_id'];
    $product_brand = $_POST['brand_id'];
    $product_price = $_POST['product_price']; 
    $product_img1 = $_FILES['product_image1']['name'];
    $product_img2 = $_FILES['product_image2']['name'];
    $product_img3 = $_FILES['product_image3']['name'];

    $tmp_img1 = $_FILES['product_image1']['tmp_name'];
    $tmp_img2 = $_FILES['product_image2']['tmp_name'];
    $tmp_img3 = $_FILES['product_image3']['tmp_name'];
    

    // checking for field empty or not

    if ($product_title=='' or $product_desc=='' or $product_keywords=='' or $category=='' or $brand_id==''
       or $product_img1=='' or $product_img2=='' or $product_img3=='' or $product_price=='') {
       echo "<script>alert('Please fill all the fields and continue the process')</script>";
    }else {
        move_uploaded_file($tmp_img1,"./product_image/$product_img1");
        move_uploaded_file($tmp_img2,"./product_image/$product_img2");
        move_uploaded_file($tmp_img3,"./product_image/$product_img3");

        // query to update product
        $sql_update = "UPDATE products SET product_title='$product_title', product_description='$product_desc',
        product_keywords='$product_keywords', category_id ='$product_category', brand_id='$product_brand', 
        product_image1='$product_img1',product_image2='$product_img2',product_image3='$product_img1', product_price='$product_price', date=NOW()
        WHERE product_id='$edit_id'";
        $query_update  = mysqli_query($conn,$sql_update );
        if ($query_update ) {
            echo "<script>alert('Product updated successfully')</script>";
            echo "<script>window.open('./index.php','_self')</script>";
        }
    }
}
?>
